<?php

namespace App\Models\UsersModel;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT *
            FROM users
            ORDER BY name ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}