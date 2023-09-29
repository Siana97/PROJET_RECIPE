<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Recipe Card (Repeat for each recipe) -->
    <?php foreach ($recipes as $recipe) :?>
        <article
        class="bg-gray-800 rounded-lg overflow-hidden shadow-lg relative"
        >
        <img
            src="<?= $recipe['picture'] ;?>"
            alt="<?= $recipe['name'] ;?>"
            class="w-full h-48 object-cover"
        />
        <div class="p-4">
            <h5 class="text-lg font-bold mb-2">
                <?= $recipe['name'] ;?>
            </h5>
            <div class="flex items-center mb-2">
            <span class="text-yellow-500 mr-1"
                ><i class="fas fa-star"></i
            ></span>
            <span>
                <?= $recipe['average_rating'] ;?>
            </span>
            </div>
            <p class="text-gray-500">
                <?= truncate($recipe['description'], 15); ?>
            </p>
            <a
            href="recipes/<?= $recipe['id']; ?>/<?=slugify($recipe['name']); ?>"
            class="text-yellow-500 hover:text-yellow-600 mt-2 inline-block"
            >Voir la recette</a
            >
        </div>
        </article>
    <?php endforeach; ?>
</div>    