<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <?php foreach ($users as $user) : ?>
    <article
    class="bg-white rounded-lg overflow-hidden shadow-lg relative"
    >
    <img
        src="./../documents/pictures/user_<?= $user['id'] ;?>.jpeg"
        alt="<?= $user['name'];?>"
        class="w-full h-48 object-cover"
    />
    <div class="p-4">
        <h3 class="text-xl font-bold mb-2">
            <?= $user['name'];?>
        </h3>
        <div class="flex items-center mb-2">
        </div>
        <p class="text-gray-600">
            <?= truncate($user['biography'], 15); ?>
        </p>
        <a
        href="users/<?= $user['id']; ?>/<?=slugify($user['name']); ?>"
        class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white"
        >Voir le chef</a
        >
    </div>
    </article>
    <?php endforeach; ?>
</div>