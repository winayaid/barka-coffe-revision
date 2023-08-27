<!-- Section -->
<section class="py-16 w-full h-screen flex items-center bg-secondary">
    <div class="container mx-auto border bg-white p-10 rounded-xl">
        <div class="flex">
            <!-- Left Side -->
            <div class="w-1/2 flex flex-col justify-center items-left">
                <h2 class="text-3xl font-bold mb-4">Bukti Pembayaran</h2>
                <p class="text-gray-600 mb-4">
                    Tolong kirim bukti pembayarannya di sini
                </p>
            </div>
            <!-- Right Side -->
            <div class="w-1/2 flex justify-center items-center">
                <img src="<?= base_url(); ?>/assets/images/ilustrasi.png" alt="Image" class="w-80 rounded-lg" />
            </div>
        </div>
        <?php echo form_open_multipart('User/uploadPaymentProcess'); ?>
        <input type="hidden" name="id_penjualan" value="<?= $my_detail_order->id_penjualan ?>">
        <div class="flex">
            <input type="file" name="foto" class="border p-2" required />
            <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg ml-4">
                Upload
            </button>
        </div>
        </form>
    </div>
</section>
<!-- End Section -->