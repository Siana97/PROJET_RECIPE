<?php

namespace App\Models\CategoriesModel;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT *
            FROM types_of_dishes
            ORDER BY name ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findOneById(\PDO $connexion, int $id): array
{
        $sql = "SELECT * 
                FROM types_of_dishes
                WHERE id = :id;";
    
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}


function insertOne(\PDO $connexion, array $data)
{
    $sql = "INSERT INTO types_of_dishes
            SET name       = :name,
                created_at = NOW();";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    return $rs->execute();
}

function updateOne(\PDO $connexion, array $data)
{
    $sql = "UPDATE types_of_dishes
            SET name         = :name,
                description  = :description
            WHERE id  = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':description', $data['description'], \PDO::PARAM_STR);
    $rs->bindValue(':id', $data['id'], \PDO::PARAM_INT);
    return intval($rs->execute());
}

function deleteOne(\PDO $connexion, int $id)
{
    $sql = "DELETE FROM types_of_dishes
            WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    return intval($rs->execute());
}

