<?php

namespace App\Controllers\CategoriesController;

use App\Models\CategoriesModel;
use App\Models\RecipesModel;

function indexAction(\PDO $connexion)
{
    include_once '../app/models/categoriesModel.php';
    $categories = CategoriesModel\findAll($connexion);
    
    $title = "Catégories";
    ob_start();
    include '../app/views/categories/_index.php';
    $content = ob_get_clean();
}

function showAction(\PDO $connexion, int $categorieId = 1)
{
    include_once '../app/models/recipesModel.php';  
    $recipes = RecipesModel\findAllByCategorie($connexion);

    include_once '../app/models/categoriesModel.php';
    $ingredients = CategoriesModel\findAll($connexion, $categorieId);

    global $content, $title;
    $title = 'Catégorie'; 

    ob_start();
    include '../app/views/categories/partials/_show.php';
    $content = ob_get_clean();
}
