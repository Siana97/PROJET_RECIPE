<?php

namespace App\Controllers\PagesController;

use App\Models\RecipesModel;
use App\Models\UsersModel;
use App\Models\IngredientsModel;

function homeAction(\PDO $connexion)
{
    include_once '../app/models/recipesModel.php';
    $recipes = RecipesModel\findAllPopulars($connexion);
    $recipeRandom = RecipesModel\findOneRecipeRandom($connexion);
    

    include_once '../app/models/usersModel.php';
    $topUser = UsersModel\findOneWithMostRecipes($connexion);

    include_once '../app/models/ingredientsModel.php';
    $ingredients = IngredientsModel\findAll($connexion);

    global $title, $content;
    $title = "Popular Recipes - Popular Chief";
    ob_start();
    include '../app/views/pages/home.php';
    $content = ob_get_clean();
}
