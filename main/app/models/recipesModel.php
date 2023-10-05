<?php 

namespace App\Models\RecipesModel;

function findOneRecipeRandom(\PDO $connexion)
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
            ORDER BY d.created_at DESC
            LIMIT 9;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

// Toutes les recettes les plus populaires (3)
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

// Toutes les recettes par catégorie
function findAllByCategorie(\PDO $connexion, int $categoryId = 1): array
{
    $sql = "SELECT d.*,        
                    ROUND(AVG(r.value), 1) AS average_rating,
                    COUNT(c.id) AS comment_count,
                    t.name AS category_name
            FROM dishes d
            LEFT JOIN comments c ON d.id = c.dish_id
            LEFT JOIN ratings r ON d.id = r.dish_id
            LEFT JOIN types_of_dishes t ON d.type_id = t.id
            WHERE t.id = :categoryId
            GROUP BY d.id";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':categoryId', $categoryId, \PDO::PARAM_INT);
    $rs->execute();
    
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

// Toutes les recettes par ingrédient
// MODIFIER MA FONCTION CAR PAS CORRECTE
function findAllByIngredient(\PDO $connexion, int $ingredientId = 1): array
{
    $sql = "SELECT d.*,        
                    ROUND(AVG(r.value), 1) AS average_rating,
                    COUNT(c.id) AS comment_count,
                    i.name AS ingredient_name
            FROM dishes d
            LEFT JOIN comments c ON d.id = c.dish_id
            LEFT JOIN ratings r ON d.id = r.dish_id
            LEFT JOIN dishes_has_ingredients di ON d.id = di.dish_id
            LEFT JOIN ingredients i ON di.ingredient_id = i.id
            WHERE i.id = :ingredientId
            GROUP BY d.id";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':ingredientId', $ingredientId, \PDO::PARAM_INT);
    $rs->execute();
    
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

// Toutes les recettes par USER
function findAllByUserId(\PDO $connexion, int $userId = 1): array
{
    $sql = "SELECT d.*,        
                    ROUND(AVG(r.value), 1) AS average_rating,
                    COUNT(c.id) AS comment_count
            FROM dishes d
            LEFT JOIN comments c ON d.id = c.dish_id
            LEFT JOIN ratings r ON d.id = r.dish_id
            WHERE d.user_id = :userId
            GROUP BY d.id";;
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':userId', $userId, \PDO::PARAM_INT);
    $rs->execute();
    
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findOneById(\PDO $connexion, int $id): array
{
        $sql = "SELECT d.name,
                        d.description,
                        d.picture,
                        ROUND(AVG(r.value), 1) AS average_rating,
                        d.prep_time,
                        u.name AS user_name,
                        COUNT(c.id) AS comment_count
                FROM dishes d
                LEFT JOIN ratings r ON d.id = r.dish_id
                LEFT JOIN users u ON d.user_id = u.id
                LEFT JOIN comments c ON d.id = c.dish_id
                WHERE d.id = :id
                GROUP BY d.id";
    
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

function findAllBySearch(\PDO $connexion, string $search)
{
    $words = explode(' ', trim($search));
    $sql = "SELECT DISTINCT d.*
            FROM dishes d
            LEFT JOIN dishes_has_ingredients di ON d.id = di.dish_id
            LEFT JOIN ingredients i ON di.ingredient_id = i.id
            WHERE 1 = 0";

    for ($i = 0; $i < count($words); $i++) {
        $sql .= " OR d.name LIKE :word$i
                  OR d.description LIKE :word$i
                  OR i.name LIKE :word$i";
    }

    $sql .= ";";

    $rs = $connexion->prepare($sql);

    for ($i = 0; $i < count($words); $i++) {
        $rs->bindValue(":word$i", '%' . $words[$i] . '%', \PDO::PARAM_STR);
    }

    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
