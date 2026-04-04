<?php 
  namespace App\controllers;

  class BoutiqueController extends Controller {
  
      public function index(){
          $boutique = new \App\models\BoutiqueModel();
          self::status(200)->json($boutique->all());
      }
      
      public function create(){
           $boutique = new \App\models\BoutiqueModel();
           
           $boutique->name= "Test de la boutique 3";
           $boutique->describe = "Une boutique 3 boutique pour un premier test";
           $boutique->seller_id = 1;
           $boutique->market_id = 2;
         
           $boutique->save();   
           
           self::status(200)->json([
             'message' => 'shop create with success'
           ]);
      
      }
  }
?>
