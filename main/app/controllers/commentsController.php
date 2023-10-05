<?php

namespace App\Controllers\CommentsController;
use \App\Models\CommentsModel;

function indexByRecipeIdAction(\PDO $connexion, int $recipeId)
{
    include_once '../app/models/commentsModel.php';
    $comments = CommentsModel\findAllByRecipeId($connexion, $recipeId);

    include '..app/views/comments/indexByPostId.php';

}