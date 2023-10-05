<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <?php foreach ($recipes as $recipe) : ?>
    <article
    class="bg-white rounded-lg overflow-hidden shadow-lg relative"
    >
    <img
        src="<?= $recipe['picture'];?>"
        alt="<?= $recipe['name'];?>"
        class="w-full h-48 object-cover"
    />
    <div class="p-4">
        <h3 class="text-xl font-bold mb-2">
            <?= $recipe['name'];?>
        </h3>
        <div class="flex items-center mb-2">
        <span class="text-yellow-500 mr-1"
            ><i class="fas fa-star"></i
        ></span>
        <span><?= $recipe['average_rating'];?></span>
        </div>
        <p class="text-gray-600">
            <?= truncate($recipe['description'], 15); ?>
        </p>
        <a
        href="recipes/<?= $recipe['id']; ?>/<?=slugify($recipe['name']); ?>"
        class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white"
        >Voir la recette</a
        >
    </div>
    </article>
    <?php endforeach; ?>
</div>