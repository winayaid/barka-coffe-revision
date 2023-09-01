 <!-- Hero Section -->
 <section class="h-96 bg-cover bg-center bg-secondary flex items-center justify-center relative"
     style="background-image: url('<?= base_url(); ?>/assets/images/biji-robusta.png')">
     <div class="bg-white w-[50%] py-6 rounded-xl shadow-md absolute -bottom-8">
         <h1 class="text-4xl font-bold text-center">BIJI KOPI ROBUSTA</h1>
     </div>
 </section>
 <!-- End Hero Section -->
 <section class="bg-secondary">
     <div class="w-3/5 mx-auto py-16 bg-secondary">
         <div class="w-full grid grid-cols-4 mt-6 gap-8">
             <!-- Card 1 -->
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