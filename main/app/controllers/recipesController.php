<?php

namespace App\Controllers\RecipesController;

use App\Models\RecipesModel;

function indexAction(\PDO $connexion)
{
    include_once '../app/models/recipesModel.php';
    $recipes = RecipesModel\findAllPopulars($connexion);

    global $title, $content;
    $title = "Recipes";
    ob_start();
    include '../app/views/recipes/_index.php';
    $content = ob_get_clean();
}

// function showAction(\PDO $connexion, int $id)
// {
//     include_once '../app/models/recipesModel.php';
//     $book = RecipesModel\findOneById($connexion, $id);

//     global $title, $content;
//     $title = $book['title'];
//     ob_start();
//     include '../app/views/recipes/show.php';
//     $content = ob_get_clean();
// }
