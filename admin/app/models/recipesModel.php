<?php 

namespace App\Models\RecipesModel;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT d.*,
                d.user_id AS dish_user_id,
                d.type_id AS dish_categorie_id,
                u.name AS user_name,
                t.name AS category_name,
                GROUP_CONCAT(i.name) AS ingredient_names
            FROM dishes d
            LEFT JOIN users u ON d.user_id = u.id
            LEFT JOIN dishes_has_ingredients di ON d.id = di.dish_id
            LEFT JOIN ingredients i ON di.ingredient_id = i.id
            LEFT JOIN types_of_dishes t ON d.type_id = t.id
            GROUP BY d.id
            ORDER BY d.created_at DESC;";
            
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findOneById(\PDO $connexion, int $id): array
{
        $sql = "SELECT * 
                FROM dishes
                WHERE id = :id;";
    
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

function insertOne(\PDO $connexion, array $data)
{
    $sql = "INSERT INTO dishes
    SET name = :name,
        description = :description,
        prep_time = :prep_time,
        portions = :portions,
        user = :user,
        categorie = :categorie,
        ingredients = :ingredients,
        created_at = NOW();";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);   
    $rs->bindValue(':description', $data['description'], \PDO::PARAM_STR);
    $rs->bindValue(':prep_time', $data['prep_time'], \PDO::PARAM_STR); 
    $rs->bindValue(':portions', $data['portions'], \PDO::PARAM_INT); 
    $rs->bindValue(':user', $data['user'], \PDO::PARAM_STR); 
    $rs->bindValue(':categorie', $data['categorie'], \PDO::PARAM_STR);
    $rs->bindValue(':ingredients', $data['ingredients']);
    return $rs->execute();
}

function deleteOne(\PDO $connexion, int $id): bool
{
    try {
        // Préparez la requête DELETE
        $sql = "DELETE 
                FROM dishes";

        $rs = $connexion->prepare($sql);
        $rs->bindValue(':id', $id, \PDO::PARAM_INT);
        $result = $rs->execute();

        // Vérifiez si la suppression a réussi (nombre de lignes affectées)
        if ($result && $rs->rowCount() > 0) {
            return true; // Suppression réussie
        } else {
            return false; // Aucune recette supprimée (peut être introuvable par ID)
        }
    } catch (\PDOException $e) {
        // Gérez les exceptions PDO ici (par exemple, enregistrer les erreurs)
        echo "Erreur de suppression de la recette : " . $e->getMessage();
        return false;
    }
}
