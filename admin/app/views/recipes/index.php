<?php
/*
    Variables disponibles
        $recipes ARRAY(ARRAY(id, name, created_at))
*/
?>
<div class="page-header">
    <h1>LISTE DES RECIPES</h1>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Portions</th>
            <th>Prep_time</th>
            <th>Picture</th>
            <th>User</th>
            <th>Catégorie</th>
            <th>Ingrédients</th>
            <th>Created_at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($recipes as $recipe) : ?>
            <tr>
                <td><?= $recipe['id'] ?></td>
                <td><?= $recipe['name'] ?></td>
                <td><?= $recipe['description'] ?></td>
                <td><?= $recipe['portions'] ?></td>
                <td><?= $recipe['prep_time'] ?></td>
                <td><?= $recipe['picture'] ?></td>
                <td><?= $recipe['user_name'] ?></td>
                <td><?= $recipe['category_name'] ?></td>
                <td><?= $recipe['ingredient_names'] ?></td>
                <td><?= $recipe['created_at'] ?></td>
                <td>
                    <a href="recipes/edit/form/<?= $recipe['id']; ?>" class="btn btn-primary">Modifier</a>
                    <a href="recipes/delete/<?= $recipe['id']; ?>" class="btn btn-secondary">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>