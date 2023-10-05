<?php

use \App\Controllers\RecipesController;

include_once '../app/controllers/recipesController.php';

switch ($_GET['recipes']):
    case 'add':
        RecipesController\addAction();
        break;
    case 'create':
        RecipesController\createAction($connexion, [
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'prep_time' => $_POST['prep_time'],
            'portions' => $_POST['portions'],
            'categories' => $_POST['categories']
        ]);
        break;
    case 'delete':
        RecipesController\deleteAction($connexion, $_GET['id']);
        break;
    default:
        RecipesController\indexAction($connexion);
        break;
endswitch;
