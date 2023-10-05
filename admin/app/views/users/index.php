<?php
/*
    Variables disponibles
        $recipes ARRAY(ARRAY(id, name, created_at))
*/
?>
<div class="page-header">
    <h1>LISTE DES USERS</h1>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Pseudo</th>
            <th>Email</th>
            <th>Password</th>
            <th>Biography</th>
            <th>Picture</th>
            <th>Created_at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['name'] ?></td>
                <td><?= $user['pseudo'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['password'] ?></td>
                <td><?= $user['biography'] ?></td>
                <td><?= $user['picture'] ?></td>
                <td><?= $user['created_at'] ?></td>
                <td>
                    <a href="users/edit/form/<?= $user['id']; ?>" class="btn btn-primary">Modifier</a>
                    <a href="users/delete/<?= $user['id']; ?>" class="btn btn-secondary">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>