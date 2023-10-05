<?php 

namespace App\Models\RecipesModel;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT *
            FROM dishes d
            GROUP BY d.id
            ORDER BY name ASC;";
            
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
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
