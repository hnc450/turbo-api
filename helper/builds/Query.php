<?php
  namespace Helper\Build;

  use Container\Dic;


  class Query {

    private $database;
    
    public function __construct()
    {
       $this->database = Dic::get(Database::class); 
    }

    public function get(string $query, array $params = []){
      if ($params != []) 
      {
        $stmt = $this->database->prepare($query, $params);
      }

      else 
      {
        $stmt = $this->database->query($query);
      }
      return $stmt ? $stmt->fetchAll() : [];
    }
    
    public function fetch(string $query, array $params = []){
      if( $params != []) 
      {
        $stmt = $this->database->prepare($query, $params);
      }
      else 
      {
        $stmt = $this->database->query($query);
      }
  
      return $stmt ? $stmt->fetch() : null;
    }

    public function insert(string $query , array $params = []){
 
      if($params != []){
          $this->database->prepare($query,$params);
          return;
       }
       $this->database->query($query);
    }
  }
?>
