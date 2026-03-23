<?php 
 namespace App\models;

use Container\Dic;
use Helper\Build\Query;
use Helper\String\Stringy;

 class UserModel extends Model {
        protected string $table = 'users';
        private string $uuid;
        public string $username;
        public string $email;
        public string $password;
        public string $phone;
        public string $role;

        public function save() {
            $this->uuid = Stringy::randUUID();
            Dic::get(Query::class)->insert("INSERT INTO $this->table(uuid,username,email,`password`,phone,`role`) 
                 VALUES (:uuid, :username, :email, :password, :phone, :role)", [
                ':uuid' => $this->uuid,
                ':username' => $this->username,
                ':email' => $this->email,
                ':password' => $this->password,
                ':phone' => $this->phone,
                ':role' => $this->role
            ]);
           
        }

 }
?>