<?php

namespace App\Controllers\PagesController;

function homeAction(\PDO $connexion)
{
    include_once '../app/models/recipesModel.php';
    $recipes = \App\Models\recipesModel\findAllPopulars($connexion);
    $topRatedRecipe = \App\Models\recipesModel\findOneByRating($connexion);

    global $title, $content;
    $title = "Popular Recipes - Popular Chief";
    ob_start();
    include '../app/views/pages/home.php';
    $content = ob_get_clean();
}
