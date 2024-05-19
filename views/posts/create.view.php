<?php require(base_path('views/partials/head.php')) ?>
<?php require(base_path('views/partials/nav.php')) ?>
<?php require(base_path('views/partials/banner.php')) ?>
<main>
    <div class="mx-auto max-w-7xl py-6 px-8">
        <form method="post">

            <div class="flex flex-col w-full gap-4">

                <div class="flex items-center gap-2 justify-between">
                    <label for="userId" class="font-medium text-gray-700 flex-1">Author</label>
                    <div>:</div>
                    <select required id="userId" name="userId" class="flex-4 px-4 py-2 text-base bg-black/10 border-gray-300 rounded-md">
                        <?php foreach ($users as $user) : ?>
                            <option value="<?= htmlspecialchars($user['id']) ?>"><?= htmlspecialchars($user['name']) ?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="flex-4"></div>
                </div>
                <div>

                    <div class="flex items-center gap-2 justify-between">
                        <label for="title" class="font-medium text-gray-700 flex-1">Title</label>
                        <div>:</div>
                        <Input value="<?= $_POST['title'] ?? '' ?>" required type="text" id="title" name="title" placeholder="Title Posts" class="flex-4 focus:border-[1px] focus:ring-0  border-[1px] px-4 ring-0 py-2 text-base bg-black/10 border-gray-300 rounded-md <?= isset($errors['title']) ? 'border-red-500' : '' ?>" />
                        <div class="flex-4"></div>
                    </div>
                    <p class="<?= isset($errors['title']) ? 'block' : 'block' ?> text-red-600"><?= $errors['title'] ?? '' ?></p>
                </div>
                <div>
                    <div class="flex items-start justify-between gap-2">
                        <label for="body" class="font-medium text-gray-700 flex-1">Body</label>
                        <div>:</div>
                        <textarea required name="body" id="body" class="flex-8 px-4 py-2 ring-0 focus:ring-0 text-base border-[1px] focus:border-[1px] bg-black/10 border-gray-300 rounded-md <?= isset($errors['body']) ? 'border-red-500' : '' ?>" placeholder="Body Post" rows="10"><?= $_POST['body'] ?? '' ?></textarea>
                    </div>
                    <p class="<?= isset($errors['body']) ? 'block' : 'block' ?> text-red-600"><?= $errors['body'] ?? '' ?></p>
                </div>
                <button type="submit" class="text-white px-10 py-2 self-end rounded-3xl bg-blue-400 transition-all duration-300 hover:bg-blue-700 hover:animate-pulse">Submit</button>
            </div>
        </form>

    </div>
</main>
<?php require(base_path('views/partials/footer.php')) ?>