<?php $this->load->view('templates/admin/header'); ?>

<div class="flex min-h-screen">
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
            <h1 class="text-2xl font-bold mb-8 flex items-center space-x-4"> <a href="<?= base_url('penjualan'); ?>">
                    <img src="<?= base_url(); ?>/assets/images/arrow-left-icon.png" alt="Arrow Left Icon"
                        class="w-5 h-5" /> </a>
                <span>Detail Penjualan</span>
            </h1>
            <!-- <?php var_dump($detail_order); ?> -->
            <div class="bg-white p-12">
                <table>
                    <tr>
                        <td class="p-4">ID</td>
                        <td class="p-4">:</td>
                        <td class="p-4"><?= $detail_order->id_penjualan ?></td>
                    </tr>
                    <tr>
                        <td class="p-4">Nama</td>
                        <td class="p-4">:</td>
                        <td class="p-4"><?= $detail_order->nama ?></td>
                    </tr>
                    <tr>
                        <td class="p-4">Nama Produk</td>
                        <td class="p-4">:</td>
                        <td class="p-4"><?= $detail_order->nama_produk ?></td>
                    </tr>
                    <tr>
                        <td class="p-4">Tanggal Beli</td>
                        <td class="p-4">:</td>
                        <td class="p-4"><?= date('d/m/Y', strtotime($detail_order->tanggal_beli)) ?></td>
                    </tr>
                    <tr>
                        <td class="p-4">Tanggal Selesai</td>
                        <td class="p-4">:</td>
                        <td class="p-4"><?= date('d/m/Y', strtotime($detail_order->tanggal_selesai)) ?></td>
                    </tr>
                    <tr>
                        <td class="p-4">Total Harga</td>
                        <td class="p-4">:</td>
                        <td class="p-4"><?= $detail_order->total_harga?></td>
                    </tr>
                    <tr>
                        <td class="p-4">Alamat</td>
                        <td class="p-4">:</td>
                        <td class="p-4"><?= $detail_order->alamat_pengiriman ?></td>
                    </tr>
                    <tr>
                        <td class="p-4">Ongkir</td>
                        <td class="p-4">:</td>
                        <td class="p-4">
                            <?php echo form_open_multipart('Main/updateOngkir'); ?>
                            <div class="flex space-x-2">
                                <input type="hidden" name="id_penjualan" value="<?= $detail_order->id_penjualan ?>" />
                                <input type="number" name="ongkir" class="border p-2 border-black rounded"
                                    value="<?= $detail_order->ongkir ?>" />
                                <button type="submit" class="bg-blue-600 px-4 py-2 text-white rounded">Ubah</button>
                            </div>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-4">Total Pembayaran</td>
                        <td class="p-4">:</td>
                        <td class="p-4"><?= ($detail_order->total_harga + $detail_order->ongkir) ?></td>
                    </tr>
                    <tr>
                        <td class="p-4">Bukti Pembayaran</td>
                        <td class="p-4">:</td>
                        <td class="p-4"><img
                                src="<?= base_url() ?>/assets/images/payment/<?= $detail_order->bukti_pembayaran ?>"
                                alt="" class="w-52 h-52 border object-cover"></td>
                    </tr>
                    <tr>
                        <td class="p-4">Status</td>
                        <td class="p-4">:</td>
                        <td class="p-4"><?= $detail_order->status ?></td>
                    </tr>
                    <tr>
                        <td class="p-4">Aksi</td>
                        <td class="p-4">:</td>
                        <td class="p-4">
                            <a href="https://api.whatsapp.com/send?phone=+6285722071700&text=Halo <?= $detail_order->nama ?>"
                                class="bg-green-600 text-white p-2 rounded-md w-28 text-center" target="_blank">Hubungi
                                Customer</a>
                        </td>
                    </tr>
                </table>
            </div>
        </section>
    </div>
</div>

<?php $this->load->view('templates/admin/footer'); ?>