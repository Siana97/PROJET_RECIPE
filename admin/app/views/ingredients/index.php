<?php
/*
    Variables disponibles
        $ingredients ARRAY(ARRAY(id, name, created_at))
*/
?>
<div class="page-header">
    <h1>LISTE DES INGREDIENTS</h1>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Unit</th>
            <th>Created_at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ingredients as $ingredient) : ?>
            <tr>
                <td><?= $ingredient['id'] ?></td>
                <td><?= $ingredient['name'] ?></td>
                <td><?= $ingredient['unit'] ?></td>
                <td><?= $ingredient['created_at'] ?></td>
                <td>
                    <a href="ingredients/edit/form/<?= $ingredient['id']; ?>" class="btn btn-primary">Modifier</a>
                    <a href="ingredients/delete/<?= $ingredient['id']; ?>" class="btn btn-secondary">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>