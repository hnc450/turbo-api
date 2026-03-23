<?php 
  namespace App\controllers;

use App\models\MarketModel;

 class MarketController extends Controller {

    public function create() {
        $market = new MarketModel();
        $market->name = 'Coete';
        $market->location = 'Kinshasa , Victoire';
        $market->save();
        return $this->status(201)->json(['message' => 'Market created successfully']);
    }

 }
?>