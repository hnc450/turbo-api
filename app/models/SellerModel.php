<?php 
  namespace App\models;

use Container\Dic;
use Helper\Build\Query;

  class SellerModel extends UserModel 
  {
    public function all(){
      return Dic::get(Query::class)->get('SELECT * FROM '.$this->table.' WHERE role = "seller"');
    }
  }

?>