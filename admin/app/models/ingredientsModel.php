<?php

namespace App\Models\IngredientsModel;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT *
            FROM ingredients
            ORDER BY name ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findOneById(\PDO $connexion, int $id): array
{
        $sql = "SELECT * 
                FROM ingredients
                WHERE id = :id;";
    
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

function insertOne(\PDO $connexion, array $data)
{
    $sql = "INSERT INTO ingredients
            SET name = :name,
                unit = :unit,
                created_at = NOW();";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);    $rs->bindValue(':unit', $data['unit'], \PDO::PARAM_STR);
    return $rs->execute();
}

function updateOne(\PDO $connexion, array $data)
{
    $sql = "UPDATE ingredients
            SET name  = :name,
                unit  = :unit
            WHERE id  = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':unit', $data['unit'], \PDO::PARAM_STR);
    $rs->bindValue(':id', $data['id'], \PDO::PARAM_INT);
    return intval($rs->execute());
}

function deleteOne(\PDO $connexion, int $id)
{
    $sql = "DELETE FROM ingredients
            WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    return intval($rs->execute());
}

