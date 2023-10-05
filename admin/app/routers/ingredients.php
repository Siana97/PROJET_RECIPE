<?php

use \App\Controllers\IngredientsController;

include_once '../app/controllers/ingredientsController.php';

switch ($_GET['ingredients']):
    case 'add':
        IngredientsController\addAction();
        break;
    case 'create':
        IngredientsController\createAction($connexion,[
            'name' => $_POST['name'],
            'unit' => $_POST['unit']
        ]);
        break;
    case 'delete':
        IngredientsController\deleteAction($connexion, $_GET['id']);
        break;
    case 'editForm':
        IngredientsController\editFormAction($connexion, $_GET['id']);
        break;
    case 'edit':
        IngredientsController\editAction($connexion, [
            'id'     => $_GET['id'],
            'name'   => $_POST['name'],
            'unit'   => $_POST['unit']
        ]);
        break;
    default:
        IngredientsController\indexAction($connexion);
        break;
endswitch;
