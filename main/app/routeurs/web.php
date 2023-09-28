<?php

 // ROUTEUR PRINCIPAL 

// RECIPES: ROUTER DES RECIPES
// PATTERN: /
// CTRL: recipesController
// ACTION: index

    include_once '../app/controllers/recipesController.php';
    \App\Controllers\RecipesController\indexAction($connexion);