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

// RECIPES: ROUTER DES CATEGORIES
// PATTERN: ?categories=xxx
elseif (isset($_GET['categories'])) :
    include_once '../app/routers/categories.php';    

// RECIPES: ROUTER DES INGREDIENTS
// PATTERN: ?ingredients=xxx
elseif (isset($_GET['ingredients'])) :
    include_once '../app/routers/ingredients.php';    

// PATTERN: / 
// CTRL: pagesController
// ACTION: home
// VIEW: pages/home.php
else : 
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
endif;