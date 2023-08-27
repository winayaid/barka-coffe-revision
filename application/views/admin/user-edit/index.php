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
		<section class="container mx-auto p-8 h-screen">
			<!-- Your content goes here -->
			<h1 class="text-black flex items-center flex space-x-3 text-xl font-bold">
				<img src="<?= base_url(); ?>/assets/images/produk-white-icon.svg" alt="Account Icon" class="w-6 h-6">
				<span class="text-white">
					Edit Data Pengguna
				</span>
			</h1>
			<div class="flex justify-center">
				<div class="w-1/2">
					<?php echo form_open_multipart('Main/updatePenggunaProcess'); ?>
					<input type="hidden" name="id_pengguna" value="<?= $detail_pengguna->id_pengguna ?>">
					<input type="hidden" name="foto_lama" value="<?= $detail_pengguna->foto ?>">
					<div class="my-2">
						<label for="nama" class="block">Nama</label>
						<input type="text" id="nama" name="nama" required
							class="border border-gray-300 rounded-lg px-4 py-2 w-full"
							value="<?= $detail_pengguna->nama ?>">
					</div>
					<div class="my-2">
						<label for="email" class="block">Email</label>
						<input type="email" id="email" name="email" required
							class="border border-gray-300 rounded-lg px-4 py-2 w-full"
							value="<?= $detail_pengguna->email ?>">
					</div>
					<div class="my-2">
						<img src="<?= base_url() ?>/assets/images/user/<?= $detail_pengguna->foto ?>" alt=""
							class="rounded-full w-32 h-32 object-cover">
					</div>
					<div class="my-2">
						<label for="foto" class="block">Foto</label>
						<input type="file" id="foto" name="foto"
							class="border border-gray-300 rounded-lg px-4 py-2 w-full">
					</div>
					<button type="submit" class="bg-primary text-white py-2 px-4 rounded-lg">Simpan Perubahan</button>
					</form>
				</div>
			</div>
		</section>

	</div>
</div>

<?php $this->load->view('templates/admin/footer'); ?>