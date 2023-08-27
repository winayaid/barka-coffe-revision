<?php $this->load->view('templates/admin/header'); ?>

<div class="flex h-screen">
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
			<h1 class="text-2xl font-bold">Daftar Pengguna</h1>
			<div class="grid grid-cols-5 gap-4 mt-8">
				<?php foreach ($pengguna as $row): ?>
				<div class="bg-white rounded-lg shadow-md p-4">
                    <div class="flex justify-center">
                        <img src="<?= base_url() ?>/assets/images/user/<?= $row->foto ?>" alt=""
						class="rounded-full w-32 h-32 border object-cover">
                    </div>
					<div class="mt-4">
						<h3 class="text-lg font-medium"><?= $row->nama ?></h3>
						<p class="text-gray-500"><?= $row->email ?></p>
						<!-- <p class="text-gray-500"><?= $row->role ?></p> -->
					</div>
					<div class="mt-4 flex space-x-2">
						<a href="<?= base_url('user/edit/') ?><?= $row->id_pengguna ?>"
							class="text-blue-500">Edit</a>
						<a href="<?= base_url('main/deletePengguna/') ?><?= $row->id_pengguna ?>"
							class="text-red-500">Hapus</a>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

		</section>
	</div>
</div>

<?php $this->load->view('templates/admin/footer'); ?>
