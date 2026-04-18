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
        $boutique = new \App\models\BoutiqueModel();

        $boutique->name = "Test de la boutique 3";
        $boutique->describe = "Une boutique 3 boutique pour un premier test";
        $boutique->seller_id = 1;
        $boutique->market_id = 2;

        $boutique->save();

        self::status(200)->json([
          'message' => 'shop create with success'
        ]);

    }
    public function delete($uuid)
    {
        $uuid = (string)$uuid['uuid'];

        if ($this->get("products", "uuid", $uuid)) {
            Dic::get(QueryBuilder::class)->delete('boutiques')->where("uuid", $uuid)->run();
            $this->status(201)->json(['message' => 'boutique deleted with successfully']);
            return;
        } else {
            $this->status(404)->json(['message' => 'boutique already deleted or not exist']);
            return;
        }

    }

}
