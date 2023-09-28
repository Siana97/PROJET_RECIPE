<section class="relative mb-6">
    <img
    class="w-full h-96 object-cover"
    src="<?= $topRatedRecipe['picture'] ;?>"
    alt="Featured Recipe Image"
    />
    <div
    class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-gray-900 to-transparent"
    >
        <h1 class="text-3xl font-bold mb-2 text-white">
            <?= $topRatedRecipe['name'] ;?>
        </h1>
        <div class="flex items-center mb-4">
            <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
            <span class="text-white">
                <?= $topRatedRecipe['average_rating'] ;?>
            </span>
        </div>
        <p class="text-gray-300 mb-4">
            <?= truncate($topRatedRecipe['description'], 40); ?>
        </p>
        <div class="flex items-center mb-4">
            <span class="text-gray-400 mr-2">
                <?= $topRatedRecipe['author_name'];?> 
            </span>
            <span class="text-gray-500"><i class="fas fa-comment"></i>
                <?= $topRatedRecipe['comment_count'] ;?>
            </span>
        </div>
        <!-- books/ < ?php echo $book['id']; ?>/< ?php echo Core\Tools\slugify($book['title']); ?> -->
        <a
            href="recipe.html"
            class="inline-block bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white"
        >
            Voir la recette
        </a>
    </div>
</section>