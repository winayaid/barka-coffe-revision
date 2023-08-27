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
			<h1 class="text-2xl font-bold">Dashboard</h1>

			<div class="flex justify-center mt-8">
				<div class="flex w-full space-x-5">
					<!-- Left Pie Chart -->
					<div class="w-1/2 bg-white p-4 rounded-lg">
						<!-- Place your pie chart here -->
						<h2 class="text-lg font-semibold mb-2">Ringkasan</h2>
						<!-- Add your pie chart implementation -->
						<div class="flex space-x-4 ">
							<!-- Score Card for Robusta -->
							<div class="bg-gray-200 p-4 rounded-lg w-full">
								<h3 class="text-xl font-semibold">Total Penjualan</h3>
								<p class="text-2xl font-bold">Rp <?= $total_penjualan[0]->total_penjualan ?></p>
							</div>
							<!-- Score Card for Arabica -->
							<div class="bg-gray-200 p-4 rounded-lg w-full">
								<h3 class="text-xl font-semibold">Total Produk</h3>
								<p class="text-2xl font-bold"><?= $total_produk[0]->total_produk ?></p>
							</div>
						</div>
					</div>

					<!-- Right Bar Chart -->
					<div class="w-1/2 bg-white p-4 rounded-lg">
						<!-- Place your bar chart here -->
						<h2 class="text-lg font-semibold mb-2">Laporan Produk</h2>
						<!-- Add your bar chart implementation -->
						<canvas id="barChart"></canvas>
					</div>
				</div>
			</div>

			<div class="bg-white mt-6">
				<table class="w-full">
					<tr>
						<th class="bg-primary py-4 text-white">Nama Pengguna</th>
						<th class="bg-primary py-4 text-white">Nama Produk</th>
						<th class="bg-primary py-4 text-white">Total Pembayaran</th>
						<th class="bg-primary py-4 text-white">Tanggal Beli</th>
						<th class="bg-primary py-4 text-white">Tanggal Selesai</th>
						<th class="bg-primary py-4 text-white">Status</th>
					</tr>
					<?php foreach ($ringkasan_penjualan as $row): ?>
					<tr class="border">
						<td class="p-5"><?= $row->nama ?></td>
						<td class="p-5"><?= $row->nama_produk ?></td>
						<td class="p-5"><?= $row->total_harga ?></td>
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
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</section>
	</div>
</div>

<!-- Include the Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
	// Data for the bar chart
	var chartData = {
		labels: ["Arabica","Robusta"],
		datasets: [{
			label: "Barka Coffee",
			data: [ <?= $total_kopi_arabica[0]->total_kopi_arabica ?>,
				<?= $total_kopi_robusta[0]->total_kopi_robusta ?>,],
			backgroundColor: ["rgba(75, 192, 192, 0.6)",
			"rgba(192, 75, 192, 0.6)"],
		}, ],
	};

	// Configuration options for the bar chart
	var chartOptions = {
		responsive: true,
		scales: {
			y: {
				beginAtZero: true,
			},
		},
		plugins: {
			legend: {
				display: false, // Set display property to false to hide the legend
			},
		},
	};

	// Get the canvas element and initialize the bar chart
	var ctx = document.getElementById("barChart").getContext("2d");
	var barChart = new Chart(ctx, {
		type: "bar",
		data: chartData,
		options: chartOptions,
	});

</script>

<?php $this->load->view('templates/admin/footer'); ?>