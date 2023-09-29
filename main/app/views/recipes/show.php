<?php
/*  
    Variables disponibles
        $recipe ARRAY(...)
*/
?>

<!-- Recipe Detail -->
<section class="bg-white rounded-lg shadow-lg p-6 mb-6">
    <!-- Recipe Image -->
    <img
    class="w-full h-96 object-cover rounded-t-lg"
    src="<?= $recipe['picture'] ;?>"
    alt="<?= $recipe['name'] ;?>"
    />

    <!-- Recipe Info -->
    <div class="p-4">
    <h1 class="text-3xl font-bold mb-4">
        <?= $recipe['name'] ;?>
    </h1>
    <div class="flex items-center mb-4">
        <span class="text-yellow-500 mr-1"
        ><i class="fas fa-star"></i
        ></span>
        <span>
            <?= $recipe['average_rating'] ;?>
        </span>
        <span class="ml-4 text-gray-700"><i class="fas fa-clock"></i>
            <?= $recipe['prep_time'] ;?>
        </span>
    </div>
    <p class="text-gray-700 mb-4">
        <?= $recipe['description'] ;?>
    </p>
    <div class="flex items-center mb-4">
        <span class="text-gray-700 mr-2">Par <?= $recipe['user_name'] ;?>
        </span>
        <span class="text-gray-500"
        ><i class="fas fa-comment"></i> <?= $recipe['comment_count'] ;?> commentaires</span>
    </div>
    </div>

    <!-- Ingredients -->
    <div class="p-4 border-t">
    <h2 class="text-2xl font-bold mb-4">Ingrédients</h2>
    <ul>
        <?php foreach (explode(',', $recipe['ingredients']) as $ingredient) : ?>
            <li><?= trim($ingredient); ?></li>
        <?php endforeach; ?>
    </ul>
    </div>

    <!-- Steps -->
    <div class="p-4 border-t">
    <h2 class="text-2xl font-bold mb-4">Étapes</h2>
    <ol class="list-decimal pl-5">
        <li>Préchauffez le four à 180°C.</li>
        <li>Dans un saladier, mélangez la farine et le sucre.</li>
        <li>
        Ajoutez les œufs un à un en mélangeant bien entre chaque ajout.
        </li>
        <!-- ... (autres étapes) ... -->
    </ol>
    </div>

    <!-- Comments -->
    <div class="p-4 border-t">
    <h2 class="text-2xl font-bold mb-4">Commentaires</h2>
    <!-- Comment -->
    <div class="mb-4">
        <div class="flex items-center mb-2">
        <img
            src="https://source.unsplash.com/50x50/?portrait"
            alt="Nom de l'utilisateur"
            class="w-10 h-10 rounded-full mr-2"
        />
        <span class="font-bold">Marie Durand</span>
        </div>
        <p class="text-gray-700">
        J'ai adoré cette recette ! Merci pour le partage.
        </p>
    </div>
    <!-- ... (autres commentaires) ... -->
    </div>
</section>


