<?php

 // ROUTEUR PRINCIPAL 

// USERS: ROUTER DES USERS
// PATTERN: ?users=xxx
if (isset($_GET['users'])) :
    include_once '../app/routers/users.php';

// RECIPES: ROUTER DES RECIPES
// PATTERN: ?recipes=xxx
elseif (isset($_GET['recipes'])) :
    include_once '../app/routers/recipes.php';

// PATTERN: / 
// CTRL: pagesController
// ACTION: home
// VIEW: pages/home.php
else : 
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
endif;