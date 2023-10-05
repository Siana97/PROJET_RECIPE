<?php

namespace App\Controllers\UsersController;

use \App\Models\UsersModel;

include_once '../app/models/usersModel.php';

function indexAction(\PDO $connexion)
{
    // Je mets le findAll() dans $users
    $users = UsersModel\findAll($connexion);

    // Je charge la vue users.index dans $content
    global $title, $content;
    $title = "Liste des users";
    ob_start();
    include '../app/views/users/index.php';
    $content = ob_get_clean();
}

function dashboardAction(\PDO $connexion)
{
    global $title, $content;
    $title = "Dashboard";
    ob_start();
    include '../app/views/users/dashboard.php';
    $content = ob_get_clean();
}

function logoutAction()
{
    // On tue la variable de session 'user'
    unset($_SESSION['user']);
    // On redirige vers le site public (PUBLIC_ROOT)
    header('Location: ' .  PUBLIC_ROOT);
}
