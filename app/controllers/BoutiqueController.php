<?php 
  namespace App\controllers;

  class BoutiqueController extends Controller {
      public function create(){
           $boutique = new \App\models\BoutiqueModel();
           
           $boutique->name= "Test de la boutique 1";
           $boutique->describe = "Une premiere boutique pour un premier test";
           $boutique->seller_id = 2;
           $boutique->markert_id = 1;
         
           $boutique->save();   
      
      }
  }
?>
