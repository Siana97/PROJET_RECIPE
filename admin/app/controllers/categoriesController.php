<?php

namespace App\Controllers\CategoriesController;

use \App\Models\CategoriesModel;

include_once '../app/models/categoriesModel.php';


function indexAction(\PDO $connexion)
{
    // Je mets le findAll() dans $categories
    $categories = CategoriesModel\findAll($connexion);

    // Je charge la vue categories.index dans $content
    global $title, $content;
    $title = "Liste des catégories";
    ob_start();
    include '../app/views/categories/index.php';
    $content = ob_get_clean();
}

function addAction()
{
    // Je charge la vue categories.add dans $content
    global $title, $content;
    $title = "Ajouter une catégorie";
    ob_start();
    include '../app/views/categories/add.php';
    $content = ob_get_clean();
}

function createAction(\PDO $connexion, array $data)
{
    $categorie = CategoriesModel\insertOne($connexion, $data);
    header('location: ' . ADMIN_ROOT . 'categories');
}

function deleteAction(\PDO $connexion, int $id)
{
    // Je demande au modele de supprimer la catégorie 
    $return = CategoriesModel\deleteOne($connexion, $id);

    // Je me redirige vers la liste des catégories
    header('location: ' . ADMIN_ROOT . 'categories');
}

function editFormAction(\PDO $connexion, int $id)
{
    // Je demande au modele de modifieer la catégorie 
    $categorie = CategoriesModel\findOneById($connexion, $id);

    global $title, $content;
    $title = "Modifier une catégorie";
    ob_start();
    include '../app/views/categories/edit.php';
    $content = ob_get_clean();
}

function editAction(\PDO $connexion, array $data = null)
{
    // Je demande au modele de modifier la catégorie 
    $return = CategoriesModel\updateOne($connexion, $data);

    // Je me redirige vers la liste des catégories
    header('location: ' . ADMIN_ROOT . 'categories');
}