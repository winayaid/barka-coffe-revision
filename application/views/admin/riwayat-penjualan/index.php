<?php $this->load->view('templates/admin/header'); ?>

<div class="flex min-h-screen">
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
			<h1 class="text-2xl font-bold mb-8">Riwayat Penjualan</h1>
			<div class="bg-white">
				<table class="w-full">
					<tr>
						<th class="bg-primary py-4 text-white">Nama Pengguna</th>
						<th class="bg-primary py-4 text-white">Nama Produk</th>
						<th class="bg-primary py-4 text-white">Total Pembayaran</th>
						<th class="bg-primary py-4 text-white" width="20">Bukti Pembayaran</th>
						<th class="bg-primary py-4 text-white">Tanggal Beli</th>
						<th class="bg-primary py-4 text-white">Tanggal Selesai</th>
						<th class="bg-primary py-4 text-white">Status</th>
						<th class="bg-primary py-4 text-white">Aksi</th>
					</tr>
					<?php foreach ($order as $row): ?>
					<tr class="border">
						<td class="p-5"><?= $row->nama ?></td>
						<td class="p-5"><?= $row->nama_produk ?></td>
						<td class="p-5"><?= $row->total_harga ?></td>
						<td class="p-5"><img src="<?= base_url() ?>/assets/images/payment/<?= $row->bukti_pembayaran ?>"
								alt="" class="w-32 h-20 border object-cover"></td>
						<td class="p-5"><?= date('d/m/Y', strtotime($row->tanggal_beli)) ?></td>
						<td class="p-5"><?= date('d/m/Y', strtotime($row->tanggal_selesai)) ?></td>
						<td class="p-5">
							<div class="flex space-x-2 items-center">
								<?php if ($row->status === 'verified'): ?>
								<span class="text-green-600 p-2 rounded-md"><?= $row->status ?></span>
								<?php elseif ($row->status === 'onprocess'): ?>
								<span class="text-yellow-600 p-2 rounded-md"><?= $row->status ?></span>
								<?php elseif ($row->status === 'rejected'): ?>
								<span class="text-red-600 p-2 rounded-md"><?= $row->status ?></span>
								<?php endif; ?>
							</div>
						</td>
						<td class="p-5">
							<div class="flex space-x-2 items-center">
								<?php if ($row->status !== 'verified'): ?>
								<?php echo form_open_multipart('Main/updatePaymentStatus'); ?>
								<input type="hidden" name="id_penjualan" value="<?= $row->id_penjualan ?>">
								<input type="hidden" name="status" value="verified">
								<button type="submit"
									class="bg-green-600 text-white p-2 rounded-md w-28">Verified</button>
								</form>
								<?php endif; ?>
								<?php if ($row->status !== 'onprocess'): ?>
								<?php echo form_open_multipart('Main/updatePaymentStatus'); ?>
								<input type="hidden" name="id_penjualan" value="<?= $row->id_penjualan ?>">
								<input type="hidden" name="status" value="onprocess">
								<button class="bg-yellow-600 text-white p-2 rounded-md w-28">On Process</button>
								</form>
								<?php endif; ?>
								<?php if ($row->status !== 'rejected'): ?>
								<?php echo form_open_multipart('Main/updatePaymentStatus'); ?>
								<input type="hidden" name="id_penjualan" value="<?= $row->id_penjualan ?>">
								<input type="hidden" name="status" value="rejected">
								<button class="bg-red-600 text-white p-2 rounded-md w-28">Rejected</button>
								</form>
								<?php endif; ?>
							</div>
						</td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</section>
	</div>
</div>

<?php $this->load->view('templates/admin/footer'); ?>