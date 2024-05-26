    <nav class="bg-gray-800 mx-auto max-w-7xl px-8 flex h-16 items-center justify-between">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
            </div>
            <div class="ml-10 flex items-baseline space-x-4">
                <a href="/" class="<?php classNav('/') ?>  rounded-md px-3 py-2 text-sm font-medium">Home</a>
                <a href="/about" class="<?php classNav('/about') ?> rounded-md px-3 py-2 text-sm font-medium">About</a>
                <a href="/posts" class="<?php classNav('/posts') ?> rounded-md px-3 py-2 text-sm font-medium">Posts</a>
                <a href="/contact" class="<?php classNav('/contact') ?> rounded-md px-3 py-2 text-sm font-medium">Contact</a>
            </div>
        </div>
        <div class="relative flex justify-end items-center pl-10 group h-full">
            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">

            <div class="absolute -mt-3 right-0 top-full flex flex-col rounded-md bg-white  shadow-lg overflow-hidden transition-all duration-300 max-h-[0px] group-hover:max-h-[400px] whitespace-nowrap">
                <?php if ($_SESSION['isLogin'] ?? false) : ?>
                    <p class="px-4 py-2 text-base text-gray-70 font-bold ">Hello <?= $_SESSION['name'] ?? 'Guest' ?></p>
                    <a href="#" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-300" id="user-menu-item-0">Your Profile</a>
                    <a href="#" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-300" id="user-menu-item-1">Settings</a>
                    <a href="#" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-300" id="user-menu-item-2">Sign out</a>
                <?php else : ?>
                    <a href="/register" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-300" id="user-menu-item-0">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>