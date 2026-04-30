<?php

namespace App\controllers;

use Container\Dic;
use Helper\Build\QueryBuilder;
use App\models\MarketModel;

class MarketController extends Controller
{
    public function index()
    {
        $market = new MarketModel();
        self::status(200)->json($market->all());
    }

    public function create()
    {
       // $market = new MarketModel();
        // $faker = \Faker\Factory::create();
        // for ($i = 0; $i <= 20; $i++) {
            // $market->name = $faker->company;
            // $market->location = $faker->address;
            // $market->save();
        // }
      
        return $this->status(201)->json(['message' => 'Market created successfully']);
    }

    public function delete($uuid)
    {
        $uuid = (string)$uuid['uuid'];

        if ($this->get("market", "uuid", $uuid)) {
            Dic::get(QueryBuilder::class)->delete('market')->where("uuid", $uuid)->run();
            $this->status(201)->json(['message' => 'market deleted with successfully']);
            return;
        } else {
            $this->status(404)->json(['message' => 'market already deleted or not exist']);
            return;
        }

    }

}
