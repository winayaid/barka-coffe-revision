<!-- Hero Section -->
<section class="h-96 bg-cover bg-secondary bg-center flex items-center justify-center relative"
    style="background-image: url('<?= base_url(); ?>/assets/images/biji-kopi-arabika.png')">
    <div class="bg-white w-[50%] py-6 rounded-xl shadow-md absolute -bottom-8">
        <h1 class="text-4xl font-bold text-center">BIJI KOPI ARABICA</h1>
    </div>
</section>
<!-- End Hero Section -->
<section class="bg-secondary">
    <div class="w-3/5 mx-auto py-16">
        <div class="w-full grid grid-cols-4 mt-6 gap-8">
            <?php foreach($product as $row) : ?>
            <a href="<?= base_url(); ?>user/orderProduct/<?= $row->id_produk ?>"
                class="bg-white rounded-lg p-6 shadow-md relative">
                <img src="<?= base_url(); ?>assets/images/produk/<?= $row->foto_produk ?>" alt="Card 1"
                    class="w-full h-40 object-cover rounded-md mb-4" />
                <!-- <img src="<?= base_url(); ?>/assets/images/cart.svg" alt="Icon"
                     class="w-6 h-6 absolute top-3 right-3" /> -->
                <hr class="border-dashed border-gray-300 my-4" />
                <!-- Dashed line -->
                <h3 class="text-lg font-medium text-center"><?= $row->nama_produk ?></h3>
                <div class="flex justify-between text-gray-600 mt-2">
                    <span><?= $row->berat ?>g</span>
                    <span>Rp. <?= $row->harga ?></span>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>