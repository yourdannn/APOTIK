<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
    <style>
        body { background:black; color:white; font-family:Arial, sans-serif; padding:20px; }
        input, textarea { padding:8px; margin:5px; width:300px; border-radius:4px; border:1px solid #444; background:#222; color:white; }
        button { padding:10px 20px; border:1px solid gold; background:none; color:white; cursor:pointer; font-weight:bold; border-radius:4px;}
        button:hover { background:gold; color:black; }
        table td { padding: 5px; }
    </style>
</head>
<body>
    <a href="index.php" style="color:gold; text-decoration:none;">&laquo; Kembali ke Home</a>
    <br><br>
    <form action="proses_tambah.php" method="POST" enctype="multipart/form-data">
        <h3 style="color:gold;">Tambah Stok Data Barang</h3>
        <table>
            <tr>
                <td>Seri</td>
                <td><input type="text" name="seri" required></td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="nama_barang" required></td>
            </tr>
            <tr>
                <td>Jenis</td>
                <td><input type="text" name="jenis" required></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="number" name="harga" required></td>
            </tr>
            <tr>
                <td style="vertical-align:top;">Deskripsi</td>
                <td><textarea name="deskripsi" rows="4" required></textarea></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><input type="file" name="foto" accept="image/*" required style="border:none; background:transparent;"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Simpan</button></td>
            </tr>
        </table>
    </form>
</body>
</html>