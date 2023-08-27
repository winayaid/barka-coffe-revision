  <!-- Section -->
  <section class="py-24 mt-6 bg-secondary">
      <div class="mx-auto container px-16 flex flex-col space-y-5">
          <!-- ---------------- -->
          <div class="border bg-white flex p-10 rounded-xl">
              <div class="w-full flex flex-col justify-center items-left">
                  <h2 class="text-2xl font-bold mb-4 flex items-center">
                      <img src="<?= base_url(); ?>/assets/images/map-orange.svg" alt="Title Icon"
                          class="w-6 h-6 mr-2 inline" />
                      <span class="text-primary">Alamat Penerima </span>
                  </h2>
                  <div class="flex space-x-4 mt-4">
                      <div class="w-1/5">
                          <p class="font-bold"><?= $my_detail_order->nama ?></p>
                      </div>
                      <div class="flex-1">
                          <?php echo form_open_multipart('User/updateOrderProcess'); ?>
                          <div id="addressForm" style="display: none;">
                              <input type="hidden" name="id_penjualan" value="<?= $my_detail_order->id_penjualan ?>">
                              <input type="text" class="w-full border border-primary rounded p-2 "
                                  name="alamat_pengiriman" value="<?= $my_detail_order->alamat_pengiriman ?>"
                                  placeholder="Jl. Prabu geusan ulun..." />
                              <div class="flex items-center space-x-2 mt-4">
                                  <button type="button" id="cancelButton"
                                      class="border border-primary rounded  py-2 px-4  text-primary">Batal</button>
                                  <button type="submit"
                                      class="border border-primary rounded  py-2 px-4  text-primary">Simpan</button>
                              </div>
                          </div>
                          </form>
                          <p id="addressText">
                              <?= $my_detail_order->alamat_pengiriman == '' ? 'Belum ada alamat!' :  $my_detail_order->alamat_pengiriman?>
                          </p>
                      </div>
                      <div class="w-max">
                          <span id="editButton" class="text-primary cursor-pointer">Ubah</span>
                      </div>
                  </div>

                  <script>
                  const editButton = document.getElementById('editButton');
                  const addressText = document.getElementById('addressText');
                  const addressForm = document.getElementById('addressForm');
                  const cancelButton = document.getElementById('cancelButton');

                  editButton.addEventListener('click', function() {
                      addressText.style.display = 'none';
                      addressForm.style.display = 'block';
                      editButton.style.display = 'none';
                  });

                  cancelButton.addEventListener('click', function() {
                      addressText.style.display = 'block';
                      addressForm.style.display = 'none';
                      editButton.style.display = 'block';
                  });
                  </script>

              </div>
          </div>
          <!-- ---------------- -->
          <div class="border bg-white flex p-10 rounded-xl">
              <div class="w-full flex flex-col justify-center items-left">
                  <h2 class="text-2xl font-bold mb-4 flex items-center">
                      <span class="text-primary">Produk Dipesan</span>
                  </h2>
                  <div class="flex space-x-4 mt-4 justify-between">
                      <div class="w-1/3">
                          <p class="font-bold"><?= $my_detail_order->nama_produk ?></p>
                          <p class="font-bold text-lg mt-20">Total Pembayaran</p>
                          <?php if ($my_detail_order->ongkir == 0): ?>
                            <p class="font-bold text-primary text-lg">Rp <?= $my_detail_order->total_harga ?> <span class="text-sm text-red-600 font-normal">(Belum termasuk ongkir)</span></p>
                          <?php else: ?>
                            <p class="font-bold text-primary text-lg">Rp <?= $my_detail_order->total_harga + $my_detail_order->ongkir ?></p>
                          <?php endif; ?>
                      </div>
                      <div class="w-max flex space-x-6 items-start pr-16">
                          <div class="w-max text-center">
                              <p>Harga Satuan:</p>
                              <p class="mt-2"><?= $my_detail_order->harga ?></p>
                          </div>
                          <div class="w-max text-center">
                              <p>Jumlah</p>
                              <p class="mt-2"><?= $my_detail_order->jumlah_beli ?></p>
                          </div>
                          <div class="w-max text-center">
                              <p>Total Harga</p>
                              <p class="mt-2"><?= $my_detail_order->total_harga ?></p>
                          </div>
                          <div class="w-max text-center">
                              <p>Ongkos Kirim</p>
                              <?php if ($my_detail_order->ongkir == 0): ?>
                                <a href="https://api.whatsapp.com/send?phone=+6281546859083&text=Saya%20ingin%20mengetahui%20berapa%20ongkir%20untuk%20pesanan%20saya.%20Saat%20ini,%20informasi%20ongkir%20belum%20muncul.%20Mohon%20bantuannya%20untuk%20memberikan%20detail%20ongkos%20kirim.%0A%0ATerima%20kasih!%0A%0ASalam,%0A<?= $my_detail_order->nama ?>" target="_blank">
                                    <button class="bg-primary w-max text-white px-4 py-2 rounded-lg mb-4">Konfirmasi Ongkos Kirim</button>
                                </a>
                              <?php else: ?>
                                <p class="mt-2"><?= $my_detail_order->ongkir ?></p>
                              <?php endif; ?>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <!-- <?php var_dump($my_detail_order); ?> -->
          <!-- ---------------- -->
          <?php if ($my_detail_order->ongkir > 0): ?>
          <div class="border bg-white flex p-10 rounded-xl">
              <div class="w-full flex flex-col justify-center items-left">

                  <h2 class="text-2xl font-bold mb-4 flex items-center">
                      <span class="text-primary">Pembayaran</span>
                  </h2>
                  <p class="text-lg font-medium">Anda dapat dengan mudah melakukan pembayaran melalui nomor rekening berikut:</p>
                  <p><span class="font-medium">Bank:</span> BCA</p>
                  <p><span class="font-medium">Nomor Rekening:</span> 7310252738</p>
                  <h1 class="mt-4">Bukti Pembayaran </h1>
                  <?php if($my_detail_order->bukti_pembayaran != '') : ?>
                  <img src="<?= base_url(); ?>assets/images/payment/<?= $my_detail_order->bukti_pembayaran ?>"
                      alt="Card 1" class=" h-40 w-40 object-cover rounded-md mb-4" />
                  <?php else: ?>
                  <h1 class="text-red-500">Anda belum upload bukti pembayaran!</h1>
                  <?php endif; ?>
                  <hr class="border-dashed border-gray-300 my-2" />
                  <a href="<?= base_url(); ?>user/payment/<?= $my_detail_order->id_penjualan ?>"
                      class="bg-primary w-max text-white px-4 py-2 rounded-lg mb-4">
                      <?= $my_detail_order->bukti_pembayaran == '' ? 'Upload bukti Pembayaran' : 'Ubah bukti pembayaran' ?>
                  </a>
                  <hr class="border-dashed border-gray-300 my-2" />
                  <!-- <p class="font-bold my-2 flex items-center space-x-2">
                      <span class="dot inline-block w-4 h-4 bg-black rounded-full ml-2 bg-primary"></span>
                      <span> Bank BCA </span>
                  </p> -->


                  <!-- <table class="table-fixed w-1/2">
                      <tbody>
                          <tr>
                              <td class="py-2">Subtotal untuk Produk</td>
                              <td class="py-2">Rp50.000</td>
                          </tr>
                          <tr>
                              <td class="py-2">Total Proteksi Produk</td>
                              <td class="py-2">Rp8.000</td>
                          </tr>
                          <tr>
                              <td class="py-2">Total Ongkos Kirim</td>
                              <td class="py-2">Rp9.000</td>
                          </tr>
                          <tr>
                              <td class="py-2">Biaya Layanan</td>
                              <td class="py-2">Rp1.000</td>
                          </tr>
                      </tbody>
                  </table> -->
              </div>
          </div>
          <?php endif; ?>
          <!-- ---------------- -->
      </div>
  </section>
  <!-- End Section -->