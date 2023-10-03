<div class=" p-3">
    <!-- Hero User Profile -->
    <section class="relative mb-6">
        <img
        class="w-full h-96 object-cover"
        src="./../documents/pictures/user_<?= $user['id'] ;?>.jpeg"
        alt="User Profile Image de <?= $user['name'] ;?>"
        />
        <div
        class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-gray-900 to-transparent"
        >
        <h1 class="text-3xl font-bold mb-2 text-white">
            <?= $user['name'] ;?>
        </h1>
        <p class="text-gray-300 mb-4">
            <?= $user['biography'] ;?>
        </p>
        </div>
    </section>

    <!-- User's Recipes -->
    <section>
        <h2 class="text-2xl font-bold mb-4">Mes recettes</h2>
        <?php include '../app/views/recipes/recipesByUserId.php'; ?>
    </section>
</div>
