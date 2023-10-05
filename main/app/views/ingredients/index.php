<div class="bg-yellow-600 text-white rounded-lg shadow-md p-4">
<h2 class="font-bold text-lg mb-4">Ingrédients</h2><?php
    include_once '../app/models/ingredientsModel.php';
    $ingredients = \App\Models\IngredientsModel\findAll($connexion);
    include '../app/views/ingredients/_index.php';?>
</div>