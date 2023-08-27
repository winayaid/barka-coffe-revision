<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Barka Coffe</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: "#FF881A",
                    secondary: "#ffc692",
                },
            },
        },
    }
    </script>
</head>

<body>
    <!-- Navbar -->
    <nav class="bg-white p-4 border fixed w-full top-0 shadow-md z-10">
        <div class="container mx-auto flex items-center justify-between">
            <a href="<?= base_url(); ?>" class="text-black font-medium text-lg flex items-center space-x-2">
                <img src="<?= base_url(); ?>/assets/images/logo.svg" width="50" height="50" alt="" />
                <span>Barka Coffee</span>
            </a>
            <ul class="flex space-x-4 justify-end items-center w-[40%] space-x-[4rem]">
                <!-- <li>
                    <a href="#" class="text-black">Produk</a>
                </li> -->
                <li><a href="<?= base_url(); ?>user/aboutProduct" class="text-black">Tentang Produk</a></li>
                <?php if($this->session->userdata('id_pengguna')): ?>
                <li><a href="<?= base_url(); ?>user/myOrder" class="text-black">Pesanan Saya</a></li>
                <?php endif; ?>
                <!-- <li>
                    <form class="flex justify-center relative">
                        <input type="text" placeholder="Search Produk"
                            class="px-4 py-2 border border-gray-300 bg-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        <button class="absolute right-2 top-2">
                            <img src="<?= base_url(); ?>/assets/images/search.svg" width="24" height="24" alt="" />
                        </button>
                    </form>
                </li> -->
                <li>
                    <?php if($this->session->userdata('id_pengguna')): ?>
                    <a href="<?= base_url('main/logout') ?>" s class="text-black flex items-center space-x-3">
                        <img src="<?= base_url(); ?>/assets/images/logout-icon.svg" width="18" height="18" alt="" />
                        <span>Logout</span>
                    </a>
                    <?php else: ?>
                    <a href="<?= base_url('user/login') ?>" s class="text-black flex items-center space-x-3">
                        <img src="<?= base_url(); ?>/assets/images/user.svg" width="18" height="18" alt="" />
                        <span>Login</span>
                    </a>
                    <?php endif; ?>

                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->