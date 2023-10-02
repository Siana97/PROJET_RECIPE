<?php

use App\Controllers\UsersController;

include_once '../app/controllers/usersController.php';

switch ($_GET['users']):
    case 'show':
        UsersController\showAction($connexion, $_GET['id']);
        break;

    case 'loginForm':
        UsersController\loginFormAction($connexion);
        break;

    case 'login':
        UsersController\loginAction($connexion, [
            'pseudo' => $_POST['pseudo'],
            'password' => $_POST['password']
        ]);
        break;

    default:
        UsersController\indexAction($connexion);
        break;
endswitch;