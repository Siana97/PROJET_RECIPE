<div class="bg-yellow-500 text-white rounded-lg shadow-md p-4 mb-4">
        <h2 class="font-bold text-lg mb-4">Catégories</h2>
        <?php
            include_once '../app/models/categoriesModel.php';
            $categories = \App\Models\CategoriesModel\findAll($connexion);
            include '../app/views/categories/_index.php';
        ?>
        </div>
