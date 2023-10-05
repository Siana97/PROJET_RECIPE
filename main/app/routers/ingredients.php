<?php

use App\Controllers\IngredientsController;

include_once '../app/controllers/ingredientsController.php';

switch ($_GET['ingredients']):
    case 'show':
        IngredientsController\showAction($connexion);
        break;

    default:
        IngredientsController\indexAction($connexion);
        break;
endswitch;
