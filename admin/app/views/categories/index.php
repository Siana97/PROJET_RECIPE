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
            <th>Created_at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category) : ?>
            <tr>
                <td><?= $category['id'] ?></td>
                <td><?= $category['name'] ?></td>
                <td><?= $category['created_at'] ?></td>
                <td>
                    <a href="categories/edit/<?= $category['id']; ?>" class="btn btn-primary">Modifier</a>
                    <a href="categories/delete/<?= $category['id']; ?>" class="btn btn-secondary">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>