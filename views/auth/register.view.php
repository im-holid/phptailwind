<?php require(base_path('views/partials/head.php')) ?>
<?php require(base_path('views/partials/nav.php')) ?>
<?php require(base_path('views/partials/banner.php')) ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p>Hello welcome in Register</p>
    </div>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-2" action="/register" method="POST">
            <div class="flex flex-col space-y-2">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                <div class="mt-2">
                    <input id="name" name="name" type="text" value="<?= $post['name'] ?? '' ?>" required class="block w-full rounded-md py-1.5 px-2 text-gray-900 shadow-sm placeholder:text-gray-400">
                </div>
                <p class="text-red-600"><?= $errors['name'] ?? '' ?></p>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" value="<?= $post['email'] ?? '' ?>" autocomplete="email" required class="block w-full rounded-md  py-1.5 px-2 text-gray-900 shadow-sm">
                </div>
                <p class="text-red-600"><?= $errors['email'] ?? '' ?></p>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                <div class="mt-2">
                    <input value="<?= $post['password'] ?? '' ?>" id="password" name="password" type="password" required class="block w-full rounded-md  py-1.5 px-2 text-gray-900 shadow-sm">
                </div>
                <p class="text-red-600"><?= $errors['password'] ?? '' ?></p>
            </div>
            <div>
                <label for="repassword" class="block text-sm font-medium leading-6 text-gray-900">Re Password</label>
                <div class="mt-2">
                    <input value="<?= $post['repassword'] ?? '' ?>" id="repassword" name="repassword" type="password" required class="block w-full rounded-md  py-1.5 px-2 text-gray-900 shadow-sm">
                </div>
                <p class="text-red-600"><?= $errors['repassword'] ?? '' ?></p>
            </div>



            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500">Register</button>
            </div>
        </form>
    </div>

</main>
<?php require(base_path('views/partials/footer.php')) ?>