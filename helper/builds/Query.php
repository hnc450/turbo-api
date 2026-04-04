<?php
  namespace Helper\Build;

  use Container\Dic;


  class Query {

    private $database;
    private string $request;
    
    public function __construct()
    {
       $this->database = Dic::get(Database::class); 
    }
    public function get($table,$mode =\PDO::FETCH_ASSOC){
     return $this->database->query("SELECT * FROM $table")->fetchAll($mode);
    }
    
    public function fetch($table){
      return $this->database->query("SELECT * FROM $table")->fetch();
    }

    public function insert(string $query , $params = []){
 
      if($params != []){
          $this->database->prepare($query,$params);
          return;
       }
       $this->database->query($query);
    }
  }
?>
