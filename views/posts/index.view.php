<?php require(base_path('views/partials/head.php')) ?>
<?php require(base_path('views/partials/nav.php')) ?>
<?php require(base_path('views/partials/banner.php')) ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div>

            <p>Hello welcome tailwind about</p>

            <p class="text-2xl text-black">
                Post by <?= $user['name'] ?>
            </p>
            <?php foreach ($posts as $post) :  ?>
                <a href="/post?id=<?= $post['id'] ?>" class="text-black/80 my-4 transition-colors duration-300 hover:text-blue-800">
                    <p class="text-xl font-bol mb-2">
                        Title : <?= htmlspecialchars($post['title']); ?>
                    </p>
                </a>
            <?php endforeach; ?>
        </div>
        <a class=" mt-10 max-w-fit py-2 px-4 bg-blue-400 text-white rounded-full flex items-center justify-center hover:bg-blue-600 hover:scale-110 duration-300 transition-all" href="/post-create">Create Post</a>
    </div>
</main>
<?php require(base_path('views/partials/footer.php')) ?>