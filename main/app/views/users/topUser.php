<!-- User Info -->
<div class="flex items-center mb-6">
<!-- User Avatar -->
<img
    src="<?= $topUser['picture'];?>"
    alt="<?= $topUser['name'];?>"
    class="w-24 h-24 rounded-full border-4 border-yellow-500 mr-4"
/>

<!-- User Details -->
<div>
    <h3 class="text-2xl font-bold"><?= $topUser['name'];?></h3>
    <p class="text-gray-400">Membre depuis: <?= $topUser['registration_date'];?></p>
    <p class="text-gray-400">Nombre de recettes postées: <?= $topUser['recipe_count'];?></p>
</div>
</div>

<!-- User Actions -->
<div class="flex justify-between items-center mb-4">
    <a
        href="show.php"
        class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 rounded-full px-6 py-2"
        >Voir mes recettes</a
    >
</div>