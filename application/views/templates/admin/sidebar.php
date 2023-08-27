<aside class="bg-white w-1/6 h-full fixed">
    <div class="p-4 h-full">
        <div class="text-black font-medium text-lg flex items-center space-x-2">
            <img src="<?= base_url(); ?>/assets/images/logo.svg" width="50" height="50" alt="" />
            <span>Barka Coffee</span>
        </div>
        <div class="flex flex-col justify-between h-[90%]">
            <ul class="space-y-4 mt-16">
                <li>
                    <a href="<?= base_url(); ?>admin"
                        class="block py-3 px-4 hover:bg-secondary rounded flex space-x-2 items-center">
                        <img src="<?= base_url(); ?>/assets/images/dashboard-icon.svg" className="w-[18px] h-[18px]"
                            alt="">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(); ?>produk"
                        class="block py-3 px-4 hover:bg-secondary rounded flex space-x-2 items-center">
                        <img src="<?= base_url(); ?>/assets/images/produk-icon.svg" className="w-[18px] h-[18px]"
                            alt="">
                        <span>Produk</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(); ?>penjualan" class="block py-3 px-4 hover:bg-secondary rounded flex space-x-2 items-center">
                        <img src="<?= base_url(); ?>/assets/images/penjualan-icon.svg" className="w-[18px] h-[18px]"
                            alt="">
                        <span>Riwayat Penjualan</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url(); ?>user"
                        class="block py-3 px-4 hover:bg-secondary rounded flex space-x-2 items-center">
                        <img src="<?= base_url(); ?>/assets/images/user-icon.svg" className="w-[18px] h-[18px]" alt="">
                        <span>User</span>
                    </a>
                </li>
            </ul>
            <a href="<?= base_url('main/logout') ?>"
                class="block py-3 px-4 hover:bg-secondary rounded flex space-x-2 items-center">
                <img src="<?= base_url(); ?>/assets/images/logout-icon.svg" className="w-[18px] h-[18px]" alt="">
                <span>Logout</span>
            </a>
        </div>
    </div>
</aside>