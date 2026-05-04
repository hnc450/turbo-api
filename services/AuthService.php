<?php 
    namespace Service;

    use App\controllers\Controller;

    class AuthService {
        public function login()
        {
            $controller  = new Controller();
            $credentials = $controller->inputs();
        }

        public function register()
        {
            $controller  = new Controller();
            $credentials = $controller->inputs();

            if($credentials == null)
            {
                $controller->status(400)->json(['message' => 'aucune information renseigner']);
            }
        }
    }
?>