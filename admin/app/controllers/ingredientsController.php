<?php

namespace App\Controllers\IngredientsController;

use \App\Models\IngredientsModel;

include_once '../app/models/ingredientsModel.php';


function indexAction(\PDO $connexion)
{
    // Je mets le findAll() dans $ingredients
    $ingredients = IngredientsModel\findAll($connexion);

    // Je charge la vue ingredients.index dans $content
    global $title, $content;
    $title = "Liste des ingredients";
    ob_start();
    include '../app/views/ingredients/index.php';
    $content = ob_get_clean();
}

function addAction()
{
    // Je charge la vue ingredients.add dans $content
    global $title, $content;
    $title = "Ajouter une ingredients";
    ob_start();
    include '../app/views/ingredients/add.php';
    $content = ob_get_clean();
}

function createAction(\PDO $connexion, array $data)
{
    $ingredients = IngredientsModel\insertOne($connexion, $data);
    header('location: ' . ADMIN_ROOT . 'ingredients');
}

function deleteAction(\PDO $connexion, int $id)
{
    // Je demande au modele de supprimer la ingredients
    $return = IngredientsModel\deleteOne($connexion, $id);

    // Je me redirige vers la liste des ingredients
    header('location: ' . ADMIN_ROOT . 'ingredients');
}

function editFormAction(\PDO $connexion, int $id)
{
    // Je demande au modele de modifier l'ingrédient
    $ingredient = IngredientsModel\findOneById($connexion, $id);

    global $title, $content;
    $title = "Modifier un ingrédient";
    ob_start();
    include '../app/views/ingredients/edit.php';
    $content = ob_get_clean();
}

function editAction(\PDO $connexion, array $data = null)
{
    // Je demande au modele de modifier l'ingrédient  
    $return = IngredientsModel\updateOne($connexion, $data);

    // Je me redirige vers la liste des ingredients
    header('location: ' . ADMIN_ROOT . 'ingredients');
}