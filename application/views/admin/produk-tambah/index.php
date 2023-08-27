<?php $this->load->view('templates/admin/header'); ?>

<div class="flex">
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
			<h1 class="text-black flex items-center flex space-x-3 text-xl font-bold">
				<img src="<?= base_url(); ?>/assets/images/produk-white-icon.svg" alt="Account Icon" class="w-6 h-6">
				<span class="text-white">
					Tambah Produk
				</span>
			</h1>
			<div class="flex justify-center">
				<div class="w-1/2">
					<?php echo form_open_multipart('Main/produkAddProcess'); ?>
					<div class="my-2">
						<label for="nama" class="block">Nama Produk</label>
						<input type="text" id="nama" name="nama_produk" required
							class="border border-gray-300 rounded-lg px-4 py-2 w-full">
					</div>
					<div class="my-2">
						<label for="kategori" class="block">Kategori</label>
						<select name="kategori" id="kategori" required
							class="border border-gray-300 rounded-lg px-4 py-2 w-full">
							<option value="arabica">Arabica</option>
							<option value="robusta">Robusta</option>
						</select>
					</div>
					<div class="my-2">
						<label for="berat" class="block">Berat</label>
						<input type="number" id="berat" name="berat" required
							class="border border-gray-300 rounded-lg px-4 py-2 w-full">
					</div>
					<div class="my-2">
						<label for="stok" class="block">Stok</label>
						<input type="number" id="stok" name="stok" required
							class="border border-gray-300 rounded-lg px-4 py-2 w-full">
					</div>
					<div class="my-2">
						<label for="harga" class="block">Harga</label>
						<input type="number" id="harga" name="harga" required
							class="border border-gray-300 rounded-lg px-4 py-2 w-full">
					</div>
					<div class="my-2">
						<label for="foto_produk" class="block">Foto Produk</label>
						<input type="file" id="foto_produk" name="foto_produk" required
							class="border border-gray-300 rounded-lg px-4 py-2 w-full">
					</div>
					<div class="my-2">
						<label for="deskripsi" class="block">Deskripsi</label>
						<textarea name="deskripsi" id="deskripsi" cols="30" rows="10" required
							class="border border-gray-300 rounded-lg px-4 py-2 w-full"></textarea>
					</div>
					<button type="submit" class="bg-primary text-white py-2 px-4 rounded-lg">Simpan</button>
					</form>
					<!-- <a href="<?= base_url('main/produkAdmin') ?>" class="text-blue-500">Data Produk</a> -->
				</div>
			</div>
		</section>
	</div>
</div>

<?php $this->load->view('templates/admin/footer'); ?>
