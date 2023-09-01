<!-- Hero Section -->
<section
    class="w-full h-screen bg-secondary bg-cover bg-center mt-6 bg-no-repeat flex flex-col justify-center items-start p-8"
    style="background-image: url('<?= base_url(); ?>/assets/images/barka-bg-2.jpeg')">
    <div class="container mx-auto">
        <h1 class="text-5xl text-primary font-bold">
            Beli biji kopi yang berkualitas
        </h1>
        <p class="text-lg text-white mt-4 w-1/2 mb-12">
            Kopi Arabika dan Kopi Robusta dengan Jenis Kopi Roast Beans dan Green Beans Fullwash, Natural, Honey, serta
            Wine.
        </p>
        <a href="<?= base_url(); ?>#beliProduk"
            class="mt-6 bg-primary hover:bg-blue-600 text-white font-semibold py-3 px-8 rounded-full">
            Beli Sekarang
        </a>
        <span id="beliProduk" />
    </div>
</section>
<!-- End Hero Section -->

<!-- Category Section -->
<section class="py-12 bg-secondary">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold uppercase text-center">
            Kategori <span class="text-primary">Kopi</span>
        </h2>
        <div class="flex justify-center items-center mt-8">
            <a href="<?= base_url(); ?>user/arabicaCoffe" class="w-1/4 mr-4 ">
                <img src="<?= base_url(); ?>/assets/images/kopi-arabika.png" alt="Product 1" class="w-full shadow" />
            </a>

            <a href="<?= base_url(); ?>user/robustaCoffe" class="w-1/4 mr-4 ">
                <img src="<?= base_url(); ?>/assets/images/kopi-robusta.png" alt="Product 2"
                    class="w-full ml-4 shadow" />
            </a>
        </div>
        <h2 class="font-bold text-2xl mt-6">Macam macam produk</h2>
        <div class="w-full grid grid-cols-6 mt-6 gap-5">
            <!-- Card 1 -->
            <?php foreach($product as $row) : ?>
            <a href="<?= base_url(); ?>user/orderProduct/<?= $row->id_produk ?>"
                class="bg-white rounded-lg p-6 shadow-md">
                <img src="<?= base_url(); ?>assets/images/produk/<?= $row->foto_produk ?>" alt="Card 1"
                    class="w-full h-40 object-cover rounded-md mb-4" />
                <hr class="border-dashed border-gray-300 my-4" />
                <!-- Dashed line -->
                <h3 class="text-lg font-medium text-center"><?= $row->nama_produk ?></h3>
                <hr class="mt-3" />
                <div class="flex justify-between text-gray-600 mt-2 flex flex-col space-y-1">
                    <p class="font-bold text-lg">Rp. <?= $row->harga ?></p>
                    <div class="flex flex-col">
                        <p class="flex space-x-2 items-center text-sm"><span>Berat:</span>
                            <span><?= $row->berat ?>g</span>
                        </p>
                        <p class="flex space-x-2 items-center text-sm"><span>Stok:</span> <span><?= $row->stok ?>
                                bks</span>
                        </p>
                    </div>

                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- End Category Section -->

<!-- CTA Section -->
<section class="py-16 bg-secondary">
    <div class="container mx-auto py-16" style="
          background-image: url('<?= base_url(); ?>/assets/images/cta-background.png');
          background-size: cover;
          background-position: center;
        ">
        <div class="flex flex-col items-center">
            <h2 class="text-4xl font-bold mb-6 text-white">
                Kopi Asli Sumedang Tanah Margawindu
            </h2>
            <a href="<?= base_url(); ?>#beliProduk"
                class="bg-primary hover:bg-[#FF6600] text-white font-semibold py-3 px-8 rounded-full">
                Beli Sekarang
            </a>
        </div>
    </div>
</section>
<!-- End CTA Section -->

<!-- About Barka Coffe -->
<section class="bg-secondary">
    <div class="container mx-auto pb-16">
        <h2 class="font-bold text-2xl mb-6">Tentang Barka Coffe</h2>
        <div class="flex items-center space-x-16">
            <!-- Map -->
            <div class="w-[60%]">
                <!-- Add your map code here -->
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.687555539638!2d107.96614431477298!3d-6.927899994994439!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68cd9622b732e5%3A0x683403aa658bc336!2sBarka%20coffee!5e0!3m2!1sid!2sid!4v1688355967962!5m2!1sid!2sid"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <!-- List -->
            <div class="w-[40%]">
                <h2 class="font-bold text-3xl mb-4">Barka Coffee</h2>
                <ul class="flex flex-col space-y-4">
                    <li class="flex items-center space-x-2">
                        <img src="<?= base_url(); ?>/assets/images/maps.svg" alt="Location Icon" class="w-6 h-6 mr-2" />
                        <span>Kp. Cisoka Desa Margawindu</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <img src="<?= base_url(); ?>/assets/images/email.svg" alt="Email Icon" class="w-6 h-6 mr-2" />
                        <span>barka@gmail.com</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <img src="<?= base_url(); ?>/assets/images/instagram.svg" alt="Website Icon"
                            class="w-6 h-6 mr-2" />
                        <span>Barka.coffee</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <img src="<?= base_url(); ?>/assets/images/call.svg" alt="Phone Icon" class="w-6 h-6 mr-2" />
                        <span>+6281931436696</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End About Barka Coffe -->