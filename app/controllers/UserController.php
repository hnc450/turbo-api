<?php

namespace App\controllers;

use App\models\UserModel;
use Container\Dic;
use Helper\Build\QueryBuilder;

class UserController extends Controller
{
    public function create(): void
    {
        // johndoe@gmail.com 12345678 seller
        // arthur@gmail.com 12345678 user
        // henock@gmail.com 12345678 admin
        $user = new UserModel();
        $user->username = 'arthur';
        $user->email = 'arthur@gmail.com';
        $user->password = password_hash('12345678', PASSWORD_DEFAULT);
        $user->phone = '1234567890';
        $user->role = 'seller';
        $user->save();
        self::status(201)->json(['message' => 'User created successfully']);
    }

    public function index(): void
    {
        $user = new UserModel();
        self::status(200)->json($user->all());
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
