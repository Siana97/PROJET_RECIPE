<?php

use \App\Controllers\UsersController;

include_once '../app/controllers/usersController.php';

switch ($_GET['users']):
    case 'logout':
        UsersController\logoutAction();
        break;
    case 'add':
        UsersController\addAction();
        break;
    case 'create':
        UsersController\createAction($connexion,[
            'name'      => $_POST['name'],
            'email'     => $_POST['email'],
            'password'  => $_POST['password'],
            'biography' => $_POST['biography'],
            'picture'   => $_POST['picture']
        ]);
        break;
    case 'delete':
        UsersController\deleteAction($connexion, $_GET['id']);
        break;
    case 'editForm':
        CUsersController\editFormAction($connexion, $_GET['id']);
        break;
    case 'edit':
        UsersController\editAction($connexion, [
            'id'          => $_GET['id'],
            'name'      => $_POST['name'],
            'email'     => $_POST['email'],
            'password'  => $_POST['password'],
            'biography' => $_POST['biography'],
            'picture'   => $_POST['picture']
        ]);
        break;
    case 'index':
        UsersController\indexAction($connexion);
        break;
    default:
        UsersController\dashboardAction($connexion);
    break;
endswitch;
