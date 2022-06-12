<?php


// Jika tidak ada session pelanggan (belum login)
if (!isset($_SESSION['users']) or empty($_SESSION['users'])) {
	echo "<script>alert('Silahkan login');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}

// if(!isset($_SESSION["keranjang"])){
//   // Diarahkan ke ke index.php
//   echo "<script>alert('Belum ada riwayat pembayaran!')</script>";
//   echo "<script>location='index.php';</script>";
// }

// echo "<pre>";
// print_r($_SESSION['pelanggan']);
// echo "</pre>";

?>

<section class="pt-20 pb-20 bg-emerald-500">
	<div class="container">
		<div class="w-full px-4">
			<div class="mx-auto">
				<div class="w-full flex items-center" style="padding-top: 30px;">

					<p class="text-white text-2xl md:text-4xl pl-3">Riwayat Belanja</p>

				</div>
			</div>
		</div>
	</div>
</section>

<section class="py-12 bg-slate-100" style="margin-bottom: 100px;">
	<div class="container">
		<div class="w-full px-4 py-3">
			<div class="mx-auto">
				<div class="p-4 bg-white items-center">
					<p class="font-bold text-lg mb-3">Ticket Pendakian Yang di pesan</p>
					<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
						<table class="w-full text-sm text-left text-gray-500">
							<thead class="text-xs text-gray-700 uppercase bg-gray-100">
								<tr>
									<th scope="col" class="px-6 py-3">No</th>
									<th scope="col" class="px-6 py-3">Tanggal</th>
									<th scope="col" class="px-6 py-3">Status</th>
									<th scope="col" class="px-6 py-3">Total</th>
									<th scope="col" class="px-6 py-3">Opsi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								// Mendapatkan id_user yang login dari session
								$id_user = $_SESSION['users']['id_user'];
								$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_user='$id_user'");
								if ($ambil->num_rows == 0) :
								?>
									<tr class="bg-white border-b">
										<td colspan="5">Tidak ada data riwayat... </td>
									</tr>

								<?php endif; ?>
								<?php
								while ($pecah = $ambil->fetch_assoc()) :
								?>
									<tr class="bg-white border-b">
										<td class="px-6 py-4"><?= $no; ?></td>
										<td class="px-6 py-4"><?= date("d F Y", strtotime($pecah['tanggal_pembelian'])); ?></td>
										<td class="px-6 py-4">
											<?= $pecah['status_pembelian']; ?>
										</td>
										<td class="px-6 py-4">Rp. <?= number_format($pecah['total_pembelian']); ?>,-</td>
										<td class="px-6 py-4">
											<a href="nota.php?id=<?= $pecah['id_pembelian']; ?>" class="font-medium text-sm text-white bg-green-600 py-3 px-6 rounded-lg hover:opacity-80">Bayar</a>
										</td>
									</tr>
								<?php
									$no++;
								endwhile;
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>



<script src="https://cdn.tailwindcss.com"></script>
<script src="./js/script.js"></script>
<script src="https://unpkg.com/flowbite@1.4.6/dist/flowbite.js"></script>