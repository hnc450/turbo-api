<?php 
  namespace App\models;
use Container\Dic;
use Helper\Build\Query;

  class Model
  {
    protected string $table = "models";

    public function all(){
      return Dic::get(Query::class)->get($this->table);
    }
  }
?>
