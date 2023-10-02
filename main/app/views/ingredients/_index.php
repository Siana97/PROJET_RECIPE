<?php
/*
    Variables disponibles
        - $ingredients ARRAY(ARRAY(id, name, created_at))
*/
function indexActionIngredients(\PDO $connexion)
{
    include_once '../app/models/ingredientsModel.php';
    $ingredients = IngredientsModel\findAll($connexion);

    global $title, $content;
    ob_start();
    include '../app/views/ingredients/_index.php';
    $content = ob_get_clean();
}
?>
<ul class="list-reset text-gray-200">
    <?php foreach ($ingredients as $ingredient) : ?>
        <li>
            <a class="hover:text-white hover:bg-yellow-700 px-2 block"
                href="#">
                <?= $ingredient['name']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>