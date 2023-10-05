<?php
/*
    Variables disponibles
        $categories ARRAY(ARRAY(id, name, created_at))
*/
?>
<div class="page-header">
    <h1>LISTE DES CATEGORIES</h1>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Descrition</th>
            <th>Created_at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $categorie) : ?>
            <tr>
                <td><?= $categorie['id'] ?></td>
                <td><?= $categorie['name'] ?></td>
                <td><?= $categorie['description'] ?></td>
                <td><?= $categorie['created_at'] ?></td>
                <td>
                    <a href="categories/edit/form/<?= $categorie['id']; ?>" class="btn btn-primary">Modifier</a>
                    <a href="categories/delete/<?= $categorie['id']; ?>" class="btn btn-secondary">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>