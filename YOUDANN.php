<!DOCTYPE html>
<html>
<head>
    <title>Tabel Sederhana</title>
	<style>
				html, body {  /* menatur layar supaya website bisa penuh */
				margin: 0;
				padding: 0;
				height: 100%;
				background-color: ;	/* ini untuk layar belakang hitam */
				color: white;	/*opsional biar teks tetap kelihatan */ 
			}
			
			table {
				width: 100%;
				height: 100%;
				border-collapse: collapse;
			}
			th, td { /* Mengatur tinggi tabel */
				border: 1px solid black;
				text-align: center;
			}
			/* Mangatur lebar kolom 1 */
			th.kecil, td.kecil {
				Width: 100px;

			}

			/*Mengatur tinggi baris */
			tr.baris1 td {
				height: 5%; /* baris pertama: 40% dari tinggi tabel */
			}

			tr.baris2 td {
				height: 15%; /* baris kedua: 30% dari tinggi tabel */
			}

			tr.baris3 td {
				height: 80%; /* baris ketiga: 30% dari tinggi tabel */
			}

			/* Layout teks kiri-kanan di dalam sel */
			.cell-flex {
				display: flex;
				justify-content: space-between; /* pisahkan kiri & kanan */
				align-items: center; /* vertikal tengah */
				height: 100%;
				padding: 0 5px;
			}

			/* Bungkus teks kiri dan kanan */
			.left-text, .right-text {
				display: flex;
				flex-direction: column; /* dua teks ditumpuk */
				gap: 2px; /* jarak antar teks */
			}

			</style>
</head>
<body>

<?php
echo "<table border='1'>";
echo "<tr class='baris1'>
        <th class='kecil'>
		<div class='cell-flex'>
				<div class='left-text'>
					<span>OBAT OBATAN | ZRDN STR WSN |</span>
				</div>
				<div class='right-text'>
					<span>TLP +628675673653431			|			Mail .jayaabadi@gail.com</span>
				</div>
			</div>
		</th>
      </tr>";

echo "<tr class='baris2'>
        <td class='kecil'>
		<div class='cell-flex'>
		<!-- kiri: logo + nama -->
				<div class='left-text' style='dispaay:flex; align-item:center; gap: 10px;'>
				<img src='LOGO1.png' alt='logo' width='100' height='88'>
				<span></span>
				</div>
			
		<div class='menpo'z'z>
			<a href='home.php'>Home</a>	|
			<a href='profil.php'>Profil</a>	|
			<a href='stok_barang.php'>Stok Barang<a/>	|
			<a href='tambah_penjualan.php'>Tambah Penjualan</a>	|
			<a href='kontak.php'>Kontak</a>	|
		</div>

		<div class='cell-flex'>
		<!-- kanan: search -->
		<div class='search'>
			<form action='cari.php' method='get'>
				<input type='text' name='q' placeholder='Cari...'>
				<input type='submit' value='Cari'>
			</form>
		</div>

	</div>

		</td>
      </tr>";

echo "<tr class='baris3'>
        <td class='kecil' colspan='3'>
			<div class='row-cards' style='display:flex; justify-content:space-around; gap:20px;'>

				<!-- card 1 -->
				<div class='card' style='background: rgb(14, 12, 12); color:white; width:30%; padding:15px; text-align:center;'>
					<img src='KAPSUL.jpg' alt='KAPSUL OBAT' style='width:100%; height:auto;'>
					<h2>15.000 <small>  </small></h2>
					<h3>KAPSUL OBAT</h3>
					<p>* * * * *</p>
					<p>OBAT KHUSUS YANG DILAPISI KAPSUL UNTUK MEMPERCEPAT MASUK KE ORGAN TERTENTU</p>
					<button style='margin-top:10px; padding:8px 15px; border:1px solid gold; background:none;
					color:white;'>Buy</button>
					</div> 

				<!-- Card 2 -->
				<div class='card' style='background: rgb(8, 8, 8); color:white; width:30%; padding: 15px; text-align:center;'>
					<img src='AMOX.jpg' alt='AMOXICILLIN' style='width:100%; height:auto;'>
					<h2>5.000 <small></small></h2>
					<h3>AMOXICILLIN</h3>
					<p>* * *</p>
					<p>MEMBASMI SEMUA BAKTERI DAN KUMAN</p>
					<button style='margin-top: 10px; padding: 8px 15px; border:1px solid gold; background:none;
					Color:white;'>Buy</button>
					</div>

				<!-- Card 3 -->
				<div class='card' style='background: rgb(14, 12, 12); color:white; width:30%; padding: 15px; text-align:center;'>
					<img src='BODREX2.jpg' alt='BODREX' style='width: 100%; height:auto;'>
					<h2>25.000 <small></small></h2>
					<h3>BODREX</h3>
					<p>* * * * *</p>
					<p>MEREDAKAN DEMAM DAN PUSING KEPALA SERTA NYERI</P>
					<button style='margin-top:10px; padding: 8px 15px; border:1px solid gold; background:none;
					Color:white; '>Buy</button>
					</div>
				
		</td>	
      </tr>";
echo "</table>";
?>

</body>
</html>