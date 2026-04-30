<?php

namespace App\controllers;

use Container\Dic;
use Helper\Build\QueryBuilder;

class BoutiqueController extends Controller
{
    public function index()
    {
        $boutique = new \App\models\BoutiqueModel();
        self::status(200)->json($boutique->all());
    }

    public function create()
    {
        // $boutique = new \App\models\BoutiqueModel();

        // $faker = \Faker\Factory::create('fr_FR');
    
        //     $boutique->name = $faker->company;
        //     $boutique->describe = $faker->text();
        //     $boutique->seller_id = $faker->numberBetween(11, 30);
        //     $boutique->market_id = $faker->numberBetween(1, 50);
        //       $boutique->save();
    

        self::status(201)->json([
          'message' => 'shop create with success'
        ]);

    }
    public function delete($uuid)
    {
        $uuid = (string)$uuid['uuid'];

        if ($this->get("boutiques", "uuid", $uuid)) {
            Dic::get(QueryBuilder::class)->delete('boutiques')->where("uuid", $uuid)->run();
            $this->status(201)->json(['message' => 'boutique deleted with successfully']);
            return;
        } else {
            $this->status(404)->json(['message' => 'boutique already deleted or not exist']);
            return;
        }

    }

}
