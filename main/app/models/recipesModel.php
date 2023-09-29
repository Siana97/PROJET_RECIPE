<?php 

namespace App\Models\RecipesModel;

function findOneRandomRecipe(\PDO $connexion)
{
    $sql = "SELECT d.*,        
                    ROUND(AVG(r.value), 1) AS average_rating,
                    u.name AS user_name,
                    COUNT(c.id) AS comment_count
            FROM dishes d
            LEFT JOIN ratings r ON d.id = r.dish_id
            LEFT JOIN users u ON d.user_id = u.id
            LEFT JOIN comments c ON d.id = c.dish_id
            GROUP BY d.id
            ORDER BY RAND()
            LIMIT 1;";
    $rs = $connexion->query($sql);
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

function findAll(\PDO $connexion): array
{
    $sql = "SELECT d.*,        
                    ROUND(AVG(r.value), 1) AS average_rating,
                    d.description,
                    d.picture
            FROM dishes d
            LEFT JOIN ratings r ON d.id = r.dish_id
            GROUP BY d.id
            ORDER BY d.created_at DESC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllPopulars(\PDO $connexion): array
{
    $sql = "SELECT d.*,        
                    ROUND(AVG(r.value), 1) AS average_rating,
                    u.name AS user_name,
                    COUNT(c.id) AS comment_count
            FROM dishes d
            LEFT JOIN ratings r ON d.id = r.dish_id
            LEFT JOIN users u ON d.user_id = u.id
            LEFT JOIN comments c ON d.id = c.dish_id
            GROUP BY d.id
            ORDER BY AVG(r.value) DESC
            LIMIT 3;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllByUser(\PDO $connexion): array
{
    $sql = "SELECT d.*,        
                    ROUND(AVG(r.value), 1) AS average_rating,
                    u.name AS user_name,
                    COUNT(c.id) AS comment_count
            FROM dishes d
            LEFT JOIN ratings r ON d.id = r.dish_id
            LEFT JOIN users u ON d.user_id = u.id
            LEFT JOIN comments c ON d.id = c.dish_id
            WHERE d.user_id = (
                                SELECT user_id
                                FROM dishes
                                GROUP BY user_id
                                ORDER BY COUNT(id) DESC
                                LIMIT 1
                                )
            ORDER BY d.created_at DESC
            LIMIT 3;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findOneById(\PDO $connexion, int $id): array
{
        $sql =  "SELECT d.name,
                d.description,
                d.picture,
                ROUND(AVG(r.value), 1) AS average_rating,
                d.prep_time,
                u.name AS user_name,
                COUNT(c.id) AS comment_count,
                GROUP_CONCAT(DISTINCT i.name) AS ingredients,
                GROUP_CONCAT(DISTINCT com.content) AS comments
            FROM dishes d
            LEFT JOIN ratings r ON d.id = r.dish_id
            LEFT JOIN users u ON d.user_id = u.id
            LEFT JOIN comments c ON d.id = c.dish_id
            LEFT JOIN dishes_has_ingredients di ON d.id = di.dish_id
            LEFT JOIN ingredients i ON di.ingredient_id = i.id
            LEFT JOIN comments com ON d.id = com.dish_id
            WHERE d.id = :id
            GROUP BY d.id;";
    
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}


