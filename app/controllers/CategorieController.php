<?php 
  namespace App\controllers;

use Container\Dic;
use Helper\Build\Query;
use Helper\Build\QueryBuilder;

 class CategorieController extends Controller {
 
      public function index()
      {
        $categories = new \App\models\CategorieModel();
        $categories = $categories->all();
        self::status(200)->json($categories);
     }
     
     public function create()
     {
      $categories = new \App\models\CategorieModel();
      $faker = \Faker\Factory::create();
         
         for ($i = 0 ; $i < 50 ; $i++){
             $categories->name = $faker->text();
             $categories->save();
         }
        self::status(200)->json(['message' =>"categorie create with successfull"]);
     }
     public function delete($uuid)
    {
        $uuid = (string)$uuid['uuid'];
       
        if ($this->get("categories", "uuid", $uuid)) {
            Dic::get(QueryBuilder::class)->delete('categories')->where("uuid", $uuid)->run();
            $this->status(201)->json(['message' => 'category deleted with successfully']);
            return;
        } else {
            $this->status(404)->json(['message' => 'category already deleted or not exist']);
            return;
        }

    }
 }
?>
