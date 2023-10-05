<?php

namespace App\Controllers\RecipesController;

use App\Models\RecipesModel;
use App\Models\CommentsModel;

include_once '../app/models/recipesModel.php';

function indexAction(\PDO $connexion)
{
    $recipes = RecipesModel\findAll($connexion);

    global $title, $content;
    $title = "Recipes";
    ob_start();
    include '../app/views/recipes/index.php';
    $content = ob_get_clean();
}

function showAction(\PDO $connexion, int $id)
{
    $recipe = RecipesModel\findOneById($connexion, $id);

    include_once '../app/models/commentsmodel.php';
    $comments = CommentsModel\findAllByRecipeId($connexion, $id);

    global $title, $content;
    $title = $recipe['name'];
    ob_start();
    include '../app/views/recipes/show.php';
    $content = ob_get_clean();
}

function searchAction(\PDO $connexion, string $search)
{
    $recipes = RecipesModel\findAllBySearch($connexion, $search);

    global $title, $content;
    $title = $search;
    ob_start();
    include '../app/views/recipes/search.php';
    $content = ob_get_clean();
}