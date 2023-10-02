<?php
/*
    Variables disponibles
        - $categories ARRAY(ARRAY(id, name, created_at))
*/
function indexAction(\PDO $connexion)
{
    include_once '../app/models/categoriesModel.php';
    $categories = CategoriesModel\findAll($connexion);

    global $title, $content;
    ob_start();
    include '../app/views/categories/_index.php';
    $content = ob_get_clean();
}
?>
<ul class="list-reset text-gray-100">
    <?php foreach ($categories as $categorie) : ?>
        <li>
            <a class="hover:text-white hover:bg-yellow-600 px-2 block"
                href="#">
                <?= $categorie['name']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>