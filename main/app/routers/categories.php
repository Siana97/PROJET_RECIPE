<?php

use App\Controllers\CategoriesController;

include_once '../app/controllers/categoriesController.php';

switch ($_GET['categories']):
    case 'show':
        CategoriesController\showAction($connexion);
        break;

    default:
        CategoriesController\indexAction($connexion);
        break;
endswitch;
