<?php 

namespace App\Models\UsersModel;

function findOneUserWithMostRecipes(\PDO $connexion)
{
    $sql = "SELECT u.name AS user_name,
                   DATE(u.created_at) AS registration_date,
                   COUNT(d.id) AS recipe_count,
                   u.picture AS user_picture
            FROM users u
            LEFT JOIN dishes d ON u.id = d.user_id
            GROUP BY u.id
            ORDER BY COUNT(d.id) DESC
            LIMIT 1;";
    $rs = $connexion->query($sql);
    return $rs->fetch(\PDO::FETCH_ASSOC);
}