<?php

namespace App\controllers;

use Container\Dic;
use Helper\Build\QueryBuilder;

class ProdcutsController extends Controller
{
    public function index()
    {
        $product = new \App\models\ProdcutsModel();
        self::status(200)->json($product->all());

    }

    public function create()
    {
        // $product = new \App\models\ProdcutsModel();
        // $faker = \Faker\Factory::create('fr_FR');
        // for ($i = 0; $i < 100; $i++) {
        //    $product->name = $faker->name();
        //    $product->description = $faker->sentence();
        //    $product->price = $faker->randomNumber(4);
        //     $product->quantity = $faker->numberBetween(100, 200);
        //    $product->boutique_id = $faker->numberBetween(1, 3);
        //    $product->category_id = $faker->numberBetween(1, 10);
          
        //    $product->save();
        // }

    }

    public function delete($uuid)
    {
        $uuid = (string)$uuid['uuid'];
       
        if ($this->get("products", "uuid", $uuid)) {
            Dic::get(QueryBuilder::class)->delete('products')->where("uuid", $uuid)->run();
            $this->status(201)->json(['message' => 'prodduct deleted with successfully']);
            return;
        } else {
            $this->status(404)->json(['message' => 'product already deleted or not exist']);
            return;
        }

    }

}
