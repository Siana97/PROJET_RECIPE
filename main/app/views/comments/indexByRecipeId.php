<div class="p-4 border-t">
    <h2 class="text-2xl font-bold mb-4">Commentaires</h2>
    
    <!-- Boucle foreach pour afficher les commentaires -->
    <?php foreach ($comments as $comment) :
    ?>
    <div class="mb-4">
        <div class="flex items-center mb-2">
            <img
                src="./../../documents/pictures/user_<?= $comment['user_id']; ?>.jpeg"
                alt="<?= $comment['user_name']; ?>"
                class="w-10 h-10 rounded-full mr-2"
            />
            <span class="font-bold"><?= $comment['user_name']; ?></span>
        </div>
        <p class="text-gray-700">
            <?= $comment['content']; ?>
        </p>
    </div>
    <?php endforeach; ?>
</div>




