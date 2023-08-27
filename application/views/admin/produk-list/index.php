<?php $this->load->view('templates/admin/header'); ?>

<div class="flex h-screen">
    <!-- Sidebar -->
    <?php $this->load->view('templates/admin/sidebar'); ?>
    <div class="bg-white w-1/6 h-full"></div>

    <!-- Main Content -->
    <div class="flex-1 bg-secondary">

        <!-- Navbar -->
        <?php $this->load->view('templates/admin/navbar'); ?>

        <!-- Content Area -->
        <section class="container mx-auto p-8">
            <!-- Your content goes here -->
            <div class="flex justify-between py-6">
                <h1 class="text-black flex items-center flex space-x-3 text-xl font-bold">
                    <img src="<?= base_url(); ?>/assets/images/produk-white-icon.svg" alt="Account Icon"
                        class="w-6 h-6">
                    <span class="text-white">
                        Produk
                    </span>
                </h1>
                <a href="<?= base_url('produk/tambah') ?>">
                    <button class="bg-white rounded px-4 py-2">
                        Tambah Produk
                    </button>
                </a>
            </div>

            <div class="bg-white">
                <table class="w-full">
                    <tr>
                        <th class="bg-primary py-4 text-white">Nama Produk</th>
                        <th class="bg-primary py-4 text-white">Kategori</th>
                        <th class="bg-primary py-4 text-white">Berat</th>
                        <th class="bg-primary py-4 text-white">Stok</th>
                        <th class="bg-primary py-4 text-white">Harga</th>
                        <th class="bg-primary py-4 text-white">Tanggal Perubahan</th>
                        <th class="bg-primary py-4 text-white">Deskripsi</th>
                        <th class="bg-primary py-4 text-white">Aksi</th>
                    </tr>
                    <?php foreach ($produk as $row): ?>
                    <tr class="border">
                        <td class="p-5"><?= $row->nama_produk ?></td>
                        <td class="p-5"><?= $row->kategori ?></td>
                        <td class="p-5"><?= $row->berat ?></td>
                        <td class="p-5"><?= $row->stok ?></td>
                        <td class="p-5"><?= $row->harga ?></td>
                        <td class="p-5"><?= date('d/m/Y', strtotime($row->tanggal_perubahan)) ?></td>
                        <td class="p-5"><?= $row->deskripsi ?></td>
                        <td class="p-5">
                            <a href="<?= base_url('produk/edit/') ?><?= $row->id_produk ?>">Edit</a>
                            <a href="<?= base_url('main/deleteProduk/') ?><?= $row->id_produk ?>">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>

        </section>
    </div>
</div>

<?php $this->load->view('templates/admin/footer'); ?>