<?php 
  namespace App\controllers;

 class CategorieController extends Controller {
 
      public function index(){
        $categories = new \App\models\CategorieModel();
        
        self::status(200)->json($categories->all());
     }
     
     public function create(){
      $categories = new \App\models\CategorieModel();
      $faker = \Faker\Factory::create();
         
         for ($i = 0 ; $i < 4 ; $i++){
             $categories->name = $faker->text();
             $categories->save();
         }
        self::status(200)->json(['message' =>"categorie create with successfull"]);
     }
 }
?>
