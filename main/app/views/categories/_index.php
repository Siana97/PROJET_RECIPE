<?php
/*
    Variables disponibles
        - $categories ARRAY(ARRAY(id, name, created_at))
*/
?>
<ul class="list-reset text-gray-100">
    <?php foreach ($categories as $categorie) : ?>
        <li>
            <a class="hover:text-white hover:bg-yellow-600 px-2 block"
                href="categories/<?= $categorie['id']; ?>/<?=slugify($categorie['name']); ?>">
                <?= $categorie['name']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>