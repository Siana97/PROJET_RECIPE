<?php

namespace App\Controllers\RecipesController;

use \App\Models\RecipesModel;

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

function addAction()
{
    // Je charge la vue recipes.add dans $content
    global $title, $content;
    $title = "Ajouter une recipe";
    ob_start();
    include '../app/views/recipe/add.php';
    $content = ob_get_clean();
}

function createAction(\PDO $connexion, array $data)
{
    $recipe = RecipesModel\insertOne($connexion, $data);
    header('location: ' . ADMIN_ROOT . 'recipes');
}

function deleteAction(\PDO $connexion, int $id)
{
    // Je demande au modele de supprimer la recipe 
    $return = RecipesModel\deleteOne($connexion, $id);

    // Je me redirige vers la liste des recipes
    header('location: ' . ROOT . 'recipes');
}
