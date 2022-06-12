<header class="absolute w-full z-50 px-4">
    <div class="container mx-auto py-4 px-2">
        <div class="flex items-center">
            <div class="w-56 pl-6 flex items-center">
                <img class="w-6 md:w-8" src="./img/logonew.svg" alt="gunung">
                <p class="text-lg font-semibold ml-4 md:text-xl tracking-wider">ExMount</p>
            </div>

            <div class="w-full"></div>
            <!-- hamburg menu -->
            <div class="w-auto">
                <ul id="menu" class="fixed flex-col invisible items-center justify-center opacity-0
                    md:visible md:flex-row md:bg-transparent md:relative md:opacity-100 md:flex">
                    <li class="mx-5 py-5 md:py-0">
                        <a id="navlink" href="index.php?halaman=home" class="text-black hover:text-orange-500" onclick="document.location.reload(true)">Home</a>
                    </li>
                    <li class="mx-5 py-5 md:py-0">
                        <a id="navlink" href="index.php?halaman=produk" class="text-black hover:text-orange-500" onclick="document.location.reload(true)">Product</a>
                    </li>
                    <li class="mx-5 py-5 md:py-0">
                        <a id="navlink" href="#review" class="text-black hover:text-orange-500" onclick="document.location.reload(true)">Review</a>
                    </li>
                    <?php if (isset($_SESSION["users"])) : ?>
                        <li class="mx-5 py-5 md:py-0">
                            <div class="rounded-3xl w-24 pl-5 py-2 bg-orange-400 hover:bg-orange-500 cursor-pointer">
                                <a href="logout.php" class="text-orange-100">Logout</a>
                            </div>
                        </li><br>
                    <?php else : ?>
                        <li class="mx-5 py-5 md:py-0">
                            <div class="rounded-3xl w-24 pl-5 py-2 bg-green-400 hover:bg-green-500 cursor-pointer">
                                <a href="login.php" class="text-green-100">Login</a>
                            </div>
                        </li><br>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- menu & cart -->
            <div class="w-auto">
                <ul class="flex items-center">
                    <li class="ml-6">
                        <a href="index.php?halaman=keranjang" class="flex items-center justify-center w-8 h-8 text-black hover:text-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                            </svg>
                        </a>
                    </li>

                    <li class="ml-6 block md:hidden">
                        <button class="relative flex z-50 items-center justify-center w-8 h-8 text-black hover:text-orange-500 focus:outline-none" id="menu-toggler">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </li>
                </ul>
            </div>

        </div>

    </div>
</header>