<?php
/*
    Variables disponibles
        - $ingredients ARRAY(ARRAY(id, name, created_at))
*/
?>
<ul class="list-reset text-gray-200">
    <?php foreach ($ingredients as $ingredient) : ?>
        <li>
            <a class="hover:text-white hover:bg-yellow-700 px-2 block"
                href="ingredients/<?= $ingredient['id']; ?>/<?=slugify($ingredient['name']); ?>">
                <?= $ingredient['name']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>