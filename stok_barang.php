<?php
include "koneksi.php";

$search = $_GET['q'] ?? '';
$query = "SELECT * FROM barang";
if ($search) {
    // Basic protection against SQL injection for the search query
    $search = mysqli_real_escape_string($koneksi, $search);
    $query .= " WHERE nama_barang LIKE '%$search%' OR seri LIKE '%$search%'";
}
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Stok Barang</title>
    <style>
        body { background: #0f0f0f; color: white; font-family: 'Segoe UI', sans-serif; margin: 0; padding: 20px; }
        h2 { text-align: center; }
        .card {
            background: #1a1a1a;
            border-radius: 15px;
            width: 250px;
            padding: 15px;
            margin: 15px;
            display: inline-block;
            vertical-align: top;
            text-align: center;
            transition: 0.3s;
            box-shadow: 0 0 10px rgba(255,255,255,0.05);
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 20px rgba(255,215,0,0.3);
        }
        img { width: 100%; height: 160px; object-fit: cover; border-radius: 10px; background: #333; }
        .price { color: gold; font-size: 18px; margin: 5px 0; font-weight: bold;}
        .qty-box { display: flex; justify-content: center; align-items: center; margin-top: 10px; }
        .qty-box button { width: 35px; height: 35px; border: none; background: gold; color: black; font-weight: bold; font-size: 18px; border-radius: 8px; cursor: pointer; }
        .qty-box input { width: 50px; text-align: center; margin: 0 8px; padding: 5px; border-radius: 8px; border: none; font-weight:bold;}
        .buy-btn { padding: 10px; width: 100%; border: none; background: linear-gradient(45deg, gold, orange); color: black; font-weight: bold; border-radius: 10px; cursor: pointer; transition: 0.3s; margin-top: 10px;}
        .buy-btn:hover { filter: brightness(1.1); }
    </style>
    <script>
        function tambah(id) {
            let qty = document.getElementById('qty_' + id);
            qty.value = parseInt(qty.value) + 1;
            setQty(id);
        }
        function kurang(id) {
            let qty = document.getElementById('qty_' + id);
            if (parseInt(qty.value) > 1) {
                qty.value = parseInt(qty.value) - 1;
                setQty(id);
            }
        }
        function setQty(id) {
            let val = document.getElementById('qty_' + id).value;
            document.getElementById('buy_qty_' + id).value = val;
        }
    </script>
</head>
<body>
    <a href="index.php" style="color:gold; text-decoration:none; display:inline-block; margin-bottom: 20px;">&laquo; Kembali ke Home</a>
    
    <h2>Selamat Datang</h2>
    <h2 style="color:gold;">Selamat Berbelanja di Toko Kami</h2>

    <div style="text-align:center;">
        <?php 
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) { 
        ?>
            <div class="card">
                <img src="uploads/<?php echo $row['foto']; ?>" alt="<?php echo htmlspecialchars($row['nama_barang']); ?>" onerror="this.src='https://via.placeholder.com/250x160?text=No+Image'">
                <div class="price">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></div>
                <b style="font-size:18px;"><?php echo htmlspecialchars($row['nama_barang']); ?></b><br>
                <small style="color:#aaa;"><?php echo htmlspecialchars($row['seri']); ?></small>
                <p style="font-size:13px; color:#ccc; height: 60px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;"><?php echo htmlspecialchars($row['deskripsi']); ?></p>
                
                <!-- QTY -->
                <div class="qty-box">
                    <button type="button" onclick="kurang(<?php echo $row['id_barang']; ?>)">-</button>
                    <input type="number" id="qty_<?php echo $row['id_barang']; ?>" value="1" min="1" onchange="setQty(<?php echo $row['id_barang']; ?>)" onkeyup="setQty(<?php echo $row['id_barang']; ?>)">
                    <button type="button" onclick="tambah(<?php echo $row['id_barang']; ?>)">+</button>
                </div>

                <!-- BUTTON -->
                <div style="display:flex; justify-content:center; gap:10px; margin-top:15px;">
                    <form action="beli.php" method="get" style="flex:1;">
                        <input type="hidden" name="id_barang" value="<?php echo $row['id_barang']; ?>">
                        <input type="hidden" name="jumlah" id="buy_qty_<?php echo $row['id_barang']; ?>" value="1">
                        <button class="buy-btn" type="submit">Beli Sekarang</button>
                    </form>
                </div>
            </div>
        <?php 
            }
        } else {
            echo "<p style='color:#888;'>Belum ada stok barang.</p>";
        }
        ?>
    </div>
</body>
</html>