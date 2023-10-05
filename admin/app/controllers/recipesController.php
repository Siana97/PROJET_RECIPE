<?php

namespace App\Controllers\RecipesController;

use \App\Models\RecipesModel;
use \App\Models\UsersModel;
use \App\Models\CategoriesModel;
use \App\Models\IngredientsModel;

include_once '../app/models/recipesModel.php';


function indexAction(\PDO $connexion)
{
    // Je mets le findAll() dans $recipes
    $recipes = RecipesModel\findAll($connexion);

    // Je charge la vue recipes.index dans $content
    global $title, $content;
    $title = "Liste des recipes";
    ob_start();
    include '../app/views/recipes/index.php';
    $content = ob_get_clean();
}

function addAction(\PDO $connexion)
{
    include_once '../app/models/usersModel.php';
    $users = UsersModel\findAll($connexion);

    include_once '../app/models/categoriesModel.php';
    $categories = CategoriesModel\findAll($connexion);

    include_once '../app/models/ingredientsModel.php';
    $ingredients = IngredientsModel\findAll($connexion);

    // Je charge la vue recipes.add dans $content
    global $title, $content;
    $title = "Ajouter une recipe";
    ob_start();
    include '../app/views/recipes/add.php';
    $content = ob_get_clean();
}

function createAction(\PDO $connexion, array $data) 
{
    $id = RecipesModel\insertOne($connexion, $data);
    // Je me redirige vers la liste des recipes
    header('location: ' . ADMIN_ROOT . 'recipes');
}

function deleteAction(\PDO $connexion, int $id)
{
    // Je demande au modele de supprimer la recipe 
    $return = RecipesModel\deleteOne($connexion, $id);

    // Je me redirige vers la liste des recipes
    header('location: ' . ADMIN_ROOT . 'recipes');
}
