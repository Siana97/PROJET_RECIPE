<?php

namespace App\Controllers\ingredientsController;

use App\Models\IngredientsModel;
use App\Models\RecipesModel;

function indexAction(\PDO $connexion)
{
    include_once '../app/models/ingredientsModel.php';
    $ingredients = IngredientsModel\findAll($connexion);

    global $title, $content;
    $title = "Ingrédients";
    ob_start();
    include '../app/views/ingredients/index.php';
    $content = ob_get_clean();
}

function showAction(\PDO $connexion, int $ingredientId = 1)
{
    include_once '../app/models/recipesModel.php';  
    $recipes = RecipesModel\findAllByIngredient($connexion);

    include_once '../app/models/ingredientsModel.php';
    $ingredients = IngredientsModel\findAll($connexion, $ingredientId);

    global $content, $title;
    $title = 'Ingrédient'; 

    ob_start();
    include '../app/views/ingredients/partials/_show.php';
    $content = ob_get_clean();
}
