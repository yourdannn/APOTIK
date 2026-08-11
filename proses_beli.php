<?php
include "koneksi.php";

// ambil data dari form
$no_faktur = $_POST['no_faktur'] ?? '';
$tanggal = $_POST['tanggal'] ?? '';
$nama = $_POST['nama_pembeli'] ?? '';
$alamat = $_POST['alamat'] ?? '';
$ktp = $_POST['ktp'] ?? '';

$id = $_POST['id_barang'] ?? 0;
$jumlah = $_POST['jumlah'] ?? 0;
$total = $_POST['total'] ?? 0;

if (!$id) {
    die("Data tidak valid. <a href='index.php'>Kembali</a>");
}

// ambil data barang untuk ditampilkan di struk
$id = mysqli_real_escape_string($koneksi, $id);
$data = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$id'");
$row = mysqli_fetch_assoc($data);

// (OPSIONAL) simpan ke database
$stmt = $koneksi->prepare("INSERT INTO transaksi (no_faktur, tanggal, nama_pembeli, alamat, ktp, id_barang, jumlah, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssiii", $no_faktur, $tanggal, $nama, $alamat, $ktp, $id, $jumlah, $total);
$stmt->execute();
$stmt->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Struk Pembelian</title>
    <style>
        body { font-family: 'Courier New', Courier, monospace; background:#f5f5f5; margin:0; padding:20px;}
        .struk { width:320px; background:white; padding:20px; margin:20px auto; border:1px solid #ccc; box-shadow: 0 4px 8px rgba(0,0,0,0.1);}
        .center { text-align:center; }
        hr { border: none; border-top: 1px dashed #000; margin: 15px 0; }
        p { margin: 5px 0; font-size: 14px;}
        h3 { margin: 5px 0; }
        button { display:block; margin:20px auto 10px; padding:10px 20px; cursor:pointer; background: gold; border: 1px solid #997a00; border-radius: 5px; font-weight: bold; font-size:16px;}
        button:hover { background: #e6b800; }
        
        /* PRINT STYLE */
        @media print {
            button, .no-print { display:none !important; }
            body { background:white; padding:0; }
            .struk { border:none; box-shadow:none; margin:0; width:100%; max-width: 100%;}
        }
    </style>
</head>
<body>
    <div class="struk">
        <div class="center">
            <h3>APOTIK<br>ZRDN STR WSN</h3>
            <p>Terima Kasih 🙏</p>
        </div>
        <hr>
        <p>No Faktur: <strong><?php echo htmlspecialchars($no_faktur); ?></strong></p>
        <p>Tanggal  : <?php echo htmlspecialchars($tanggal); ?></p>
        <hr>
        <p>Nama : <?php echo htmlspecialchars($nama); ?></p>
        <p>KTP  : <?php echo htmlspecialchars($ktp); ?></p>
        <p>Alamat: <?php echo htmlspecialchars($alamat); ?></p>
        <hr>
        <p><strong><?php echo htmlspecialchars($row['nama_barang'] ?? 'Item tidak diketahui'); ?></strong></p>
        <p>Harga  : Rp <?php echo number_format($row['harga'] ?? 0, 0, ',', '.'); ?></p>
        <p>Jumlah : <?php echo htmlspecialchars($jumlah); ?></p>
        <hr>
        <p><b>Total Bayar:</b></p>
        <h3>Rp <?php echo number_format($total, 0, ',', '.'); ?></h3>
        <hr>
        <div class="center">
            <p>Barang sudah dibayar ✅</p>
            <p style="font-size:12px; color:#555; margin-top:10px;">Simpan struk ini sebagai bukti pembayaran yang sah.</p>
        </div>
    </div>
    
    <button onclick="window.print()">🖨️ Cetak Struk</button>
    <div class="center no-print">
        <a href="index.php" style="text-decoration:none; color:blue; font-family: sans-serif;">&laquo; Kembali ke Home</a>
    </div>
</body>
</html>