<?php

namespace App\Models\CommentsModel;

function findAllByRecipeId(\PDO $connexion, $recipeId): array
{
    $sql = "SELECT c.content,
                    u.name AS user_name,
                    u.picture AS user_picture
            FROM comments c
            INNER JOIN users u ON c.user_id = u.id
            WHERE c.dish_id = :recipeId
            ORDER BY c.created_at DESC";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':recipeId', $recipeId, \PDO::PARAM_INT);
    $rs->execute();

    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}