<?php 
 namespace App\models;
 
 
use Container\Dic;
use Helper\Build\Query;
use Helper\String\Stringy;

 class CategorieModel extends Model {
    public string $name;
    protected string$table = "categories";
    

    public function save(){
             Dic::get(Query::class)->insert("INSERT INTO $this->table(uuid,`name`) 
                 VALUES (:uuid, :name)", [
                ':uuid' => Stringy::randUUID(10),
                ':name' => $this->name,
            ]);
    }
 }
?>$
