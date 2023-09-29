<?php

 // ROUTEUR PRINCIPAL 

// RECIPES: ROUTER DES RECIPES
// PATTERN: ?recipes=xxx
if (isset($_GET['recipes'])) :
    include_once '../app/routeurs/recipes.php';

 // USERS: ROUTER DES USERS
// PATTERN: ?users=xxx
elseif (isset($_GET['users'])) :
    include_once '../app/routeurs/users.php';

// PATTERN: / 
// CTRL: pagesController
// ACTION: home
// VIEW: pages/home.php
else : 
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
endif;