<?php 
  namespace App\controllers;

 class ProdcutsController extends Controller {
     public function index(){
     
       $product = new \App\models\ProdcutsModel();
       self::status(200)->json($product->all());
       
     }
     
     public function create(){
        $product = new \App\models\ProdcutsModel();
        $product->name = "un nom".rand(1,100);
        $product->description = "Une descrption de test". rand(1,100);
        $product->price = rand(2000,7000);
        $product->boutique_id = rand(1,3);
        $product->category_id = rand(1,10);
        $product->quantity = rand(100,200);
        $product->save();
        
     }
 }
?>
