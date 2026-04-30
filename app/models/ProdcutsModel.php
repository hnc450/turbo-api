<?php 
namespace App\models;
 
use Container\Dic;
use Helper\Build\Query;
use Helper\String\Stringy;

 class ProdcutsModel extends Model {
   protected string $table = "products";
     
   public string $name;
   public string $description;
   public float $price;
   public int $quantity;
   public int $boutique_id;
   public int $category_id;
   
   public function save() {
        
    Dic::get(Query::class)->insert("INSERT INTO $this->table(uuid,name,description,price,quantity,boutique_id,category_id) 
                 VALUES (:uuid, :name, :describe,:price, :qty, :btq, :cat)", [
                ':uuid' => Stringy::randUUID(10),
                ':name' => $this->name,
                ':describe' => $this->description,
                ':price' => $this->price,
                ':qty' => $this->quantity,
                ':btq' => $this->boutique_id,
                ':cat' => $this->category_id
            ]);
           
        }
 }
?>
