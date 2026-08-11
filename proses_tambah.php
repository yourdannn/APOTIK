<?php
include "koneksi.php";

$seri = $_POST['seri'] ?? '';
$nama_barang = $_POST['nama_barang'] ?? '';
$jenis = $_POST['jenis'] ?? '';
$harga = $_POST['harga'] ?? 0;
$deskripsi = $_POST['deskripsi'] ?? '';

// upload foto
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
$folder = "uploads/";

// Create uploads directory if not exists
if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

if (move_uploaded_file($tmp, $folder . $foto)) {
    // using prepared statements for security
    $stmt = $koneksi->prepare("INSERT INTO barang (seri, nama_barang, jenis, harga, deskripsi, foto) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssis", $seri, $nama_barang, $jenis, $harga, $deskripsi, $foto);
    
    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location='stok_barang.php';</script>";
    } else {
        echo "Gagal menyimpan data: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "<script>alert('Upload foto gagal!'); window.history.back();</script>";
}