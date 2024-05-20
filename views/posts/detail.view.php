<?php require(base_path('views/partials/head.php')) ?>
<?php require(base_path('views/partials/nav.php')) ?>
<?php require(base_path('views/partials/banner.php')) ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p>Hello welcome tailwind about</p>

        <p class="text-2xl text-black">
            Post by <?= htmlspecialchars($user['name']); ?>
        </p>
        <div class="my-4">
            <p class="text-xl font-bold text-black/80 mb-2">
                Title : <?= htmlspecialchars($post['title']); ?>
            </p>
            <p class="text-base text-black/50">
                Body : <?= htmlspecialchars($post['body']); ?>
            </p>
        </div>
        <div class="flex items-center justify-between">

            <form method="post">
                <input name="__method" value="DELETE" type="hidden" />
                <input name="id" value="<?= $post['id'] ?>" type="hidden" />
                <button class="px-8 py-3 rounded-full bg-blue-400 border-white border-2 text-white font-semibold uppercase hover:shadow-2xl transition-shadow duration-300">Delete</button>
            </form>
            <a href="/post-edit?id=<?= $post['id'] ?>" class="px-8 py-3 rounded-full bg-blue-400 border-white border-2 text-white font-semibold uppercase hover:shadow-2xl transition-shadow duration-300">Edit</a>
        </div>
    </div>
</main>
<?php require(base_path('views/partials/footer.php')) ?>