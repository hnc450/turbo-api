<?php 
 namespace App\models;
 use Container\Dic;
 use Helper\Build\Query;
 use Helper\String\Stringy;
 
class BoutiqueModel extends Model {
      protected string $table = "boutiques";
      public string $name;
      public string $describe;
      public int $seller_id;
      public int $market_id;

      public function save(){
        Dic::get(Query::class)->insert("INSERT INTO $this->table(uuid,name,description,seller_id,market_id) VALUE(:uuid,:name,:describe,:seller,:market)",
          [
            ':uuid' => Stringy::randUUID(10),
            ':name' => $this->name,
            ':describe' => $this->describe,
            ':seller' => $this->seller_id,
            ':market' => $this->market_id
          ]
        )        
      }
}
?>
