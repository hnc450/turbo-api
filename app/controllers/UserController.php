<?php

namespace App\controllers;

use App\models\BoutiqueModel;
use App\models\MarketModel;
use App\models\SellerModel;
use App\models\UserModel;
use Container\Dic;
use Helper\Build\QueryBuilder;

class UserController extends Controller
{
    public function create(): void
    {
        $user = new UserModel();
        $user->username = '';
        $user->email = '';
        $user->password = password_hash('', PASSWORD_DEFAULT);
        $user->phone = '';
        $user->role = 'user';
        $user->save();
        self::status(201)->json(['message' => 'User created successfully']);
    }

    public function index(): void
    {
        $user = new UserModel();
        self::status(200)->json($user->all());
    }

    public function stats()
    {
        $user = new UserModel();
        $market = new MarketModel();
        $boutique = new BoutiqueModel();
        $seller = new SellerModel();

        $this->status(200)->json([
          'users' => $user->quantity(),
          'markets'=>$market->quantity(),
          'shops'=>$boutique->quantity(),
          'sellers' => count($seller->all())
        ]);
    }
    public function delete($uuid)
    {
        $uuid = (string)$uuid['uuid'];

        if ($this->get("users", "uuid", $uuid)) {
            Dic::get(QueryBuilder::class)->delete('users')->where("uuid", $uuid)->run();
            $this->status(201)->json(['message' => 'user deleted with successfully']);
            return;
        } else {
            $this->status(404)->json(['message' => 'user already deleted or not exist']);
            return;
        }

    }
}
