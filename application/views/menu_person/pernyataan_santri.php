<?php
function tgl_indo($tanggal)
{
	$bulan = array(
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);

	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun

	return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?= site_url() ?>plugin/dist/img/pdst.png" type="image/x-icon">
	<title>PERNYATAAN SANTRI</title>
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= site_url() ?>plugin/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= site_url() ?>plugin/dist/css/adminlte.min.css">
	<style>
		* {
			font-family: Arial;
			font-size: 16px;
		}
	</style>
</head>

<body>
	<div>
		<div style="font-size: 19px;">
			<h1>SURAT PERNYATAAN SANTRI</h1><br>
			<p>Yang bertanda tangan di bawah ini, saya :</p>
			<input type="hidden" value="<?= $data->id_person ?>">
			<table>
				<tr>
					<td>Nama Lengkap </td>
					<td>:</td>
					<td><?= $data->nama ?></td>
				</tr>
				<tr>
					<td>Alamat </td>
					<td>:</td>
					<td><?= $data->alamat_lengkap ?></td>
				</tr>
				<tr>
					<td>Desa </td>
					<td>:</td>
					<td><?= $data->nama_desa ?></td>
				</tr>
				<tr>
					<td>Kecamatan</td>
					<td>:</td>
					<td><?= $data->nama_kecamatan ?></td>
				</tr>
				<tr>
					<td>Kabupaten </td>
					<td>:</td>
					<td><?= $data->nama_kabupaten ?></td>
				</tr>
				<tr>
					<td>Provinsi </td>
					<td>:</td>
					<td><?= $data->nama_provinsi ?></td>
				</tr>
				<tr>
					<td>NO HP </td>
					<td>:</td>
					<td><?= $data->hp_w ?></td>
				</tr>
				<tr>
					<td>NO Telp </td>
					<td>:</td>
					<td><?= $data->telp_w ?></td>
				</tr>
			</table><br>
			<p>Menyatakan Dengan Sesungguhnya, Bahwa Saya : </p><br>

			<ul>
				<li>Menjalankan perintah agama islam secara murni dan penuh tanggung jawab</li>
				<li>Taat dan patuh pada seluruh undang undang negara RI secara konsekuen</li>
				<li>Taat dan patuh pada peraturan / Tata Tertib PPNAA</li>
				<li>Taat dan patuh pada pengasuh, dewan pengasuh, pengurus dan dewan asatidz PPNAA</li>
				<li>Menerima dan menyadari manakala saya diberi sanksi atas pelanggaran yang saya lakukan</li>
				<li>Mengikuti seluruh program PPNAA</li>
				<li>Mengikuti seluruh program MAKTAB NUBDZATUL BAYAN PPNAA</li>
				<li>Mengikuti seluruh program kegiatan Non Formal pada setiap jenjang pendidikan yang ada di PPNAA</li>
			</ul><br>
			<p style="font-size: 19px; font-family: 'Times New Roman', Times, serif; text-align: justify;">Demikian pernyataan ini saya buat dengan sadar, sungguh sungguh dan penuh tanggung jawab, jika kemudian hari ternyata saya tidak memenuhi pernyataan yang saya buat ini,
				maka saya bersedia dituntut sesuai dengan ketentuan yang berlaku.</p><br>
			<div class="float-right">
				Banyuwangi, <?= tgl_indo(date('Y-m-d')); ?> <p>Yang Membuat pernyataan,</p><br><br><br>
				<hr style="width: 200px;">
				<p>Santri</p>
			</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<span>Keterangan :</span>
			<ul>
				<li>PPNAA : Pondok Pesantren Nurul Abror Al Robbaniyin.</li>
				<li>MAKTAB NUBDZATUL BAYAN : Program wajib untuk seluruh santri, yakni program akselerasi baca kitab kuning yang disingkat menjadi MAKTUBA.</li>
			</ul>
		</div>
	</div>

	<!-- jQuery -->
	<script src="<?= site_url() ?>plugin/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= site_url() ?>plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= site_url() ?>plugin/dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?= site_url() ?>plugin/dist/js/demo.js"></script>
	<script>
		window.print();
		window.onfocus = setTimeout(function() {
			window.close();
		}, 1000);
	</script>
</body>

</html>