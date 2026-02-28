<?php 
   require __DIR__ . '/../config/config.php';

  use App\Controllers\AuthController;
    $requestUri = $_SERVER['REQUEST_URI'];
    $scriptName = dirname($_SERVER['SCRIPT_NAME']);
    $requestMethod = $_SERVER['REQUEST_METHOD'];

    $url = str_replace($scriptName, '', $requestUri);
    $url = trim($url, '/');
    $url = strtok($url,'?');


    switch ($url) {
        case '':
        case 'home':
            require_once __DIR__ . '/../views/index.php';
            break;
        case 'about':
            require_once __DIR__ . '/../views/client/about.php';
            break;
        case 'login':
           // require_once __DIR__ . '/../views/auth/login.php';
         $authcontroller = new AuthController();
           if($requestMethod === 'POST')
            {
                $authcontroller->login();
            }
            if($requestMethod === 'GET')
                {
                    $authcontroller->showLoginForm();
                }
            break;
        case 'register':
             $authcontroller = new AuthController();
             if($requestMethod === 'POST'){
                $authcontroller->register();
             }
             if($requestMethod === 'GET'){
                $authcontroller->showRegisterForm();
             }
            break;
        default:
            http_response_code(404);
            echo "Page not found";
            break;
    }
?>