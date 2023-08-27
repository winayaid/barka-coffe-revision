<div class="my-[10rem] container mx-auto">
    <h1 class="mt-[10rem] font-bold text-3xl">Pesanan Saya</h1>
    <?php foreach($my_order as $row): ?>
    <div class="grid grid-cols-2 gap-8 mt-8   border-2 border-primary rounded p-8">
        <div class="flex flex-col space-y-4">
            <div class=" flex items-center space-x-4">
                <p>Nama Produk:</p>
                <p><?= $row->nama_produk ?></p>
            </div>
            <div class=" flex items-center space-x-4">
                <p>Status:</p>
                <p><?= $row->status ?></p>
            </div>
        </div>
        <div class="flex flex-col space-y-4">
            <div class=" flex items-center space-x-4">
                <p>Jumlah Beli:</p>
                <p><?= $row->jumlah_beli ?></p>
            </div>
            <div class=" flex items-center space-x-4">
                <p>Harga:</p>
                <p><?= $row->harga ?></p>
            </div>
            <div class=" flex items-center space-x-4">
                <p>Total Harga:</p>
                <p><?= $row->total_harga ?></p>
            </div>
            <div class=" flex items-center space-x-4">
                <a href="<?= base_url() ?>user/detailOrder/<?= $row->id_penjualan ?>"
                    class="bg-primary rounded text-white py-2 px-4">Detail</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>