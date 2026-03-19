<?php 
   require __DIR__ . '/../config/config.php';

    use App\Controllers\AuthController;
    use App\Controllers\Teacherscontroller;

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
        case 'logout':  
            $authcontroller = new AuthController();
            $authcontroller->logout();
            break;


        case 'admin':
            require_once __DIR__ . '/../views/admin/admin-dashboard.php';
            break; 
            
        case 'dashboard':
            require_once __DIR__ . '/../views/admin/dashboard.php';
            break;

        case 'statistiques':
            require_once __DIR__ . '/../views/admin/statistiques.php';
            break;
        case 'teachers/register':
            $teacherscontroller = new Teacherscontroller();
            if($requestMethod === 'POST'){
                $teacherscontroller->register();
            }
            break;
        case 'password-reset':
            $teacherscontroller = new Teacherscontroller();
            if($requestMethod === 'POST'){
               $teacherscontroller->passwordReset();
            }
            if($requestMethod === 'GET'){
                $teacherscontroller->showAdminPasswordForm();
            }
            break;
        // case 'teacher':
        //     $teacherscontroller = new Teacherscontroller();
        //     if($requestMethod === 'GET'){
        //         $teacherscontroller->index();
        //     }
        //     break;

        default:
            http_response_code(404);
            echo "Page not found";
            break;
    }
?>