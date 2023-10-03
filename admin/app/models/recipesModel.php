<?php

namespace App\Models\RecipesModel;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT *
            FROM dishes
            ORDER BY name ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function insertOne(\PDO $connexion, array $data)
{
    $sql = "INSERT INTO dishes
            SET name = :name,
                description = :description,
                prep_time = :prep_time,
                portions = :portions, 
                created_at = NOW();";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':description', $data['description'], \PDO::PARAM_STR);
    $rs->bindValue(':prep_time', $data['prep_time'], \PDO::PARAM_STR);
    $rs->bindValue(':portions', $data['portions'], \PDO::PARAM_STR);
    return $rs->execute();
}

// MODIFIER LA REQUETE POUR POUVOIR AVOIR ACCES  POUR SUPP KEYFOREIGN 
function deleteOne(\PDO $connexion, int $id)
{
    $sql = "DELETE FROM dishes
            WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    return intval($rs->execute());
}
