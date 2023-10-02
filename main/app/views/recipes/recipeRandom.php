<section class="relative mb-6">
    <img
    class="w-full h-96 object-cover"
    src="<?= $recipeRandom['picture'] ;?>"
    alt="Featured Recipe Image"
    />
    <div
    class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-gray-900 to-transparent"
    >
        <h1 class="text-3xl font-bold mb-2 text-white">
            <?= $recipeRandom['name'] ;?>
        </h1>
        <div class="flex items-center mb-4">
            <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
            <span class="text-white">
                <?= $recipeRandom['average_rating'] ;?>
            </span>
        </div>
        <p class="text-gray-300 mb-4">
            <?= truncate($recipeRandom['description'], 40); ?>
        </p>
        <div class="flex items-center mb-4">
            <span class="text-gray-400 mr-2">
                <?= $recipeRandom['user_name'];?> 
            </span>
            <span class="text-gray-500"><i class="fas fa-comment"></i>
                <?= $recipeRandom['comment_count'] ;?>
            </span>
        </div>
        <a
            href="recipes/<?= $recipeRandom['id']; ?>/<?=slugify($recipeRandom['name']); ?>"
            class="inline-block bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white"
        >
            Voir la recette
        </a>
    </div>
</section>