<!-- Section -->
<section class="py-24 mt-6 bg-secondary">
    <div class="mx-auto container border bg-[#FFE9D6] flex p-14 rounded-2xl">
        <!-- Left Side -->
        <div class="w-1/2 flex flex-col justify-center items-left">
            <h2 class="text-4xl font-bold mb-4"><?= $product_detail->nama_produk ?></h2>
            <p class="text-gray-600 mb-4">
                <?= $product_detail->deskripsi ?>
            </p>
            <!-- <p class="font-bold mb-1">Karakter Kopi</p>
            <p class="text-gray-600 mb-2">
                kopi arabica memiliki cita rasa khas, yaitu asam yang tertinggal
                lama di mulut. Cita rasa kopi ini tidak ditemukan pada cita rasa
                kopi daerah lain.
            </p> -->
            <?php echo form_open_multipart('User/orderProcess'); ?>
            <p class="text-2xl font-bold mb-4">Rp. <?= $product_detail->harga ?></p>
            <div class="flex justify-between items-center mb-4 w-max space-x-3">
                <button type="button" class="bg-primary text-white px-4 py-2 rounded-lg" onclick="decreaseOrder()">
                    -
                </button>
                <input type="hidden" name="id_pengguna" value="<?= $_SESSION['id_pengguna'] ?>">
                <input type="hidden" name="id_produk" value="<?= $product_detail->id_produk ?>">
                <input type="hidden" name="harga" value="<?= $product_detail->harga ?>">
                <input type="hidden" name="jumlah_beli" id="jumlah_beli" value="1">
                <p id="orderCount" class="text-gray-600">Total Order: 1</p>
                <button type="button" class="bg-primary text-white px-4 py-2 rounded-lg" onclick="increaseOrder()">
                    +
                </button>
            </div>
            <button type="submit" class="bg-primary w-max text-white px-16 py-2 rounded-lg mb-4">
                Order
            </button>
            </form>
        </div>

        <!-- Right Side -->
        <div class="w-1/2 flex justify-center items-center">
            <img src="<?= base_url(); ?>assets/images/produk/<?= $product_detail->foto_produk ?>" alt="Product Image"
                class="w-80 rounded-lg" />
        </div>
    </div>
</section>
<!-- End Section -->