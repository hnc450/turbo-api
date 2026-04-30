<?php 
  namespace App\models;
use Container\Dic;
use Helper\Build\Query;

  class Model
  {
    protected string $table = "models";

    public function all(){
      return Dic::get(Query::class)->get('SELECT * FROM '.$this->table);
    }
    public function quantity(){
      return Dic::get(Query::class)->fetch('SELECT COUNT(id) as quantity FROM '.$this->table)['quantity'];
    }
  }
?>
