<?php
/*
    Variables disponibles
        - $topRatedRecipe (ARRAY(ARRAY(...)))
        - $recipes (ARRAY(ARRAY(...)))
        - $users (ARRAY(ARRAY(...)))
*/
?>

<!-- Hero Recipe Card -->
<?php include '../app/views/recipes/topRatedRecipe.php'; ?>

<section>
    <h2 class="text-2xl font-bold mb-4">Recettes populaires</h2>
    <?php include '../app/views/recipes/recipesByRating.php'; ?>
</section>

<!-- User Profile Section -->
<section class="bg-gray-700 text-white rounded-lg shadow-2xl p-6 my-6">
    <?php include '../app/views/users/topUser.php'; ?>

    <!-- User's Latest Recipes -->
    <div>
    <h4
        class="text-xl font-bold mb-4 border-b-2 border-yellow-500 pb-2"
    >
        Mes dernières recettes
    </h4>
    <?php include '../app/views/recipes/recipesByUserId.php'; ?>
    </div>
</section>