<?php 

namespace App\Models\UsersModel;

function findOneWithMostRecipes(\PDO $connexion)
{
    $sql = "SELECT u.name,
                   DATE(u.created_at) AS registration_date,
                   COUNT(d.id) AS recipe_count,
                   u.picture
            FROM users u
            LEFT JOIN dishes d ON u.id = d.user_id
            GROUP BY u.id
            ORDER BY COUNT(d.id) DESC
            LIMIT 1;";
    $rs = $connexion->query($sql);
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

function findOneById(\PDO $connexion, int $id = 1)
{
    $sql = "SELECT u.name, u.biography, u.picture
            FROM users u
            WHERE u.id = :id";
    
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

function findAll(\PDO $connexion): array
{
    $sql = "SELECT u.*,        
                    u.biography,
                    u.picture
            FROM users u
            WHERE u.id <> 1
            ORDER BY u.created_at DESC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}