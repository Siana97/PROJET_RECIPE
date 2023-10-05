<?php

use \App\Controllers\RecipesController;

include_once '../app/controllers/recipesController.php';

switch ($_GET['recipes']):
    case 'add':
        RecipesController\addAction($connexion);
        break;
    case 'create':
        RecipesController\createAction($connexion, [
            'name'        => $_POST['name'],
            'description' => $_POST['description'],
            'prep_time'   => $_POST['prep_time'],
            'portions'    => $_POST['portions'],
            'user'        => $_POST['user'],
            'categorie'   => $_POST['categorie'],
            'ingredients' => $_POST['ingredients']

        ]);;
        break;
    case 'delete':
        RecipesController\deleteAction($connexion, $_GET['id']);
        break;
    case 'editForm':
        RecipesController\editFormAction($connexion, $_GET['id']);
        break;
    case 'edit':
        RecipesController\editAction($connexion, [
            'id'          => $_GET['id'],
            'name'        => $_POST['name'],
            'description' => $_POST['description'],
            'prep_time'   => $_POST['prep_time'],
            'portions'    => $_POST['portions'],
            'user'        => $_POST['user'],
            'categorie'   => $_POST['categorie'],
            'ingredients' => $_POST['ingredients']
        ]);
        break;
    default:
        RecipesController\indexAction($connexion);
        break;
endswitch;
