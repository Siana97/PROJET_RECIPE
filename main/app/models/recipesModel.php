<?php 

namespace App\Models\RecipesModel;

function findOneByRating(\PDO $connexion): array
{
    $sql = "SELECT d.*,        
                    ROUND(AVG(r.value), 1) AS average_rating,
                    u.name AS author_name,
                    COUNT(c.id) AS comment_count
            FROM dishes d
            LEFT JOIN ratings r ON d.id = r.dish_id
            LEFT JOIN users u ON d.user_id = u.id
            LEFT JOIN comments c ON d.id = c.dish_id
            GROUP BY d.id
            ORDER BY AVG(r.value) DESC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}


function findAllPopulars(\PDO $connexion): array
{
    $sql = "SELECT d.*,        
                    ROUND(AVG(r.value), 1) AS average_rating,
                    u.name AS author_name,
                    COUNT(c.id) AS comment_count
            FROM dishes d
            LEFT JOIN ratings r ON d.id = r.dish_id
            LEFT JOIN users u ON d.user_id = u.id
            LEFT JOIN comments c ON d.id = c.dish_id
            GROUP BY d.id
            ORDER BY AVG(r.value) DESC
            LIMIT 3 OFFSET 1 ;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
