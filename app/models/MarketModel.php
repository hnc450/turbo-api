<?php 
 namespace App\models;

use Container\Dic;
use Helper\Build\Query;
use Helper\String\Stringy;

 class MarketModel extends Model {
    protected string $table = 'market';
    private string $uuid;
    public  string $name;
    public  string $location;

    public function save() {

        $this->uuid = Stringy::randUUID(10);
        
        Dic::get(Query::class)->insert("INSERT INTO $this->table(uuid,name,location) 
        VALUES (:uuid, :name, :location)", [
            ':uuid' => $this->uuid,
            ':name' => $this->name,
            ':location' => $this->location
        ]);
       
    }
 }  
?>
