<?php 

    $requestUri = $_SERVER['REQUEST_URI'];
    $scriptName = dirname($_SERVER['SCRIPT_NAME']);

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
            require_once __DIR__ . '/../views/auth/login.php';
            break;
        case 'register':
            require_once __DIR__ . '/../views/auth/register.php';
            break;
        default:
            http_response_code(404);
            echo "Page not found";
            break;
    }
?>