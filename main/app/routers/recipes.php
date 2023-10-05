<?php

use App\Controllers\RecipesController;

include_once '../app/controllers/recipesController.php';

switch ($_GET['recipes']):
    case 'show':
        RecipesController\showAction($connexion, $_GET['id']);
        break;
    
    case 'search':
        RecipesController\searchAction($connexion, $_POST['search']);
        break;

    default:
        RecipesController\indexAction($connexion);
        break;
endswitch;
