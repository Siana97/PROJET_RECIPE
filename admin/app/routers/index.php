<?php

// ROUTE DES RECIPES
// PATTERN: ?recipes=xxx
// ROUTER: recipes
if (isset($_GET[('recipes')])) :
    include_once '../app/routers/recipes.php';

// ROUTE DES CATEGORIES
// PATTERN: ?categories=xxx
// ROUTER: categories
elseif (isset($_GET[('categories')])) :
    include_once '../app/routers/categories.php';

// ROUTE DES INGREDIENTS
// PATTERN: ?ingredients=xxx
// ROUTER: ingredients
elseif (isset($_GET[('ingredients')])) :
    include_once '../app/routers/ingredients.php';

// ROUTE DES USERS
// PATTERN: ?users=xxx
// ROUTER: users
elseif (isset($_GET[('users')])) :
    include_once '../app/routers/users.php';


else :
    include_once '../app/controllers/usersController.php';
    \App\Controllers\UsersController\dashboardAction($connexion);
endif;
