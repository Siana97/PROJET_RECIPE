<?php

 // ROUTEUR PRINCIPAL 

// RECIPES: ROUTER DES RECIPES
// PATTERN: /
// CTRL: recipesController
// ACTION: index

    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
