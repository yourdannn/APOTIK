<?php
include "koneksi.php";

$id = $_GET['id_barang'] ?? 0;
$jumlah = $_GET['jumlah'] ?? 1;

// ambil data barang
$id = mysqli_real_escape_string($koneksi, $id);
$data = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$id'");
$row = mysqli_fetch_assoc($data);

if (!$row) {
    die("<h2 style='color:white; text-align:center;'>Barang tidak ditemukan. <a href='stok_barang.php' style='color:gold;'>Kembali</a></h2>");
}

$harga = $row['harga'];
$total = $harga * $jumlah;

// WAJIB: buat kode verifikasi
$kode = rand(100000, 999999);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Pembelian</title>
    <style>
        body { background:#0f0f0f; color:white; font-family:'Segoe UI', sans-serif; padding:20px; margin: 0; }
        h1 { text-align:center; color:gold;}
        .container { display:flex; gap:40px; margin-top:20px; justify-content:center; flex-wrap: wrap;}
        .box { flex:1; min-width: 300px; max-width: 400px; background:#1a1a1a; padding:25px; border-radius:10px; border: 1px solid #333;}
        label { display:block; margin-top: 10px; font-size:14px; color:#ccc;}
        input, select { width:100%; padding:10px; margin:5px 0 10px; border-radius:6px; border:1px solid #444; box-sizing:border-box; background:#222; color:white;}
        input[readonly] { background: #333; color:#aaa; outline: none; border-color: transparent;}
        .total { color:gold; font-weight:bold; font-size:18px; }
        button { width:100%; padding:12px; background:linear-gradient(45deg,gold,orange); border:none; border-radius:8px; font-weight:bold; cursor:pointer; color:black; font-size:16px; margin-top: 15px;}
        button:disabled { background: #444; color: #888; cursor: not-allowed; }
        .payment-box { display:none; background:#222; padding:15px; border-radius:8px; margin-bottom:15px; border: 1px solid #444;}
    </style>
</head>
<body>
    <a href="stok_barang.php" style="color:gold; text-decoration:none; display:inline-block; margin-bottom: 20px;">&laquo; Kembali</a>
    
    <h1>Form Pembelian HERBAL</h1>
    <form action="proses_beli.php" method="post">
        <div class="container">
            <!-- KIRI -->
            <div class="box">
                <h3 style="color:gold; margin-top:0;">VARIAN HERBAL</h3>
                
                <label>Nama:</label>
                <input value="<?php echo htmlspecialchars($row['nama_barang']); ?>" readonly>
                
                <label>Jenis/Seri:</label>
                <input value="<?php echo htmlspecialchars($row['seri']); ?>" readonly>
                
                <label>Harga:</label>
                <input value="Rp <?php echo number_format($harga,0,',','.'); ?>" readonly>
                
                <label>Jumlah:</label>
                <input value="<?php echo htmlspecialchars($jumlah); ?>" readonly>
                
                <label>Total:</label>
                <input class="total" value="Rp <?php echo number_format($total,0,',','.'); ?>" readonly>
            </div>

            <!-- KANAN -->
            <div class="box">
                <h3 style="color:gold; margin-top:0;">Data Pembeli</h3>
                
                <input type="hidden" name="id_barang" value="<?php echo $id; ?>">
                <input type="hidden" name="jumlah" value="<?php echo htmlspecialchars($jumlah); ?>">
                <input type="hidden" name="total" value="<?php echo $total; ?>">
                
                <label>No Faktur:</label>
                <input type="text" name="no_faktur" value="INV-<?php echo time(); ?>" required readonly>
                
                <label>Tanggal:</label>
                <input type="date" name="tanggal" value="<?php echo date('Y-m-d'); ?>" required>
                
                <label>Nama Pembeli:</label>
                <input type="text" name="nama_pembeli" required>
                
                <label>Alamat:</label>
                <input type="text" name="alamat" required>
                
                <label>No KTP:</label>
                <input type="text" name="ktp" required>
                
                <!-- METODE -->
                <label>Metode Pembayaran:</label>
                <select id="metode" name="metode" onchange="showPayment()" required>
                    <option value="">-- Pilih --</option>
                    <option value="transfer">Transfer Bank</option>
                    <option value="ewallet">E-Wallet</option>
                    <option value="qris">QRIS</option>
                    <option value="cod">Cash on Delivery (COD)</option>
                </select>

                <!-- TRANSFER -->
                <div id="transferBox" class="payment-box">
                    <label>Bank Tujuan:</label>
                    <select>
                        <option>BCA - 123456789 a/n Jaya Abadi</option>
                        <option>BRI - 987654321 a/n Jaya Abadi</option>
                        <option>BNI - 112233445 a/n Jaya Abadi</option>
                    </select>
                </div>

                <!-- EWALLET -->
                <div id="ewalletBox" class="payment-box">
                    <label>E-Wallet Tujuan:</label>
                    <select>
                        <option>DANA - 08123456789</option>
                        <option>OVO - 08123456789</option>
                        <option>GoPay - 08123456789</option>
                    </select>
                </div>

                <!-- QRIS -->
                <div id="qrisBox" class="payment-box" style="text-align:center;">
                    <h4 style="margin:5px; color:gold;">Scan QRIS</h4>
                    <div style="width:180px; height:180px; background:white; margin:10px auto; display:flex; align-items:center; justify-content:center; color:black; font-weight:bold; border-radius:10px;">
                        [GAMBAR QRIS]
                    </div>
                </div>

                <!-- VERIFIKASI -->
                <div id="verifikasiBox" class="payment-box" style="text-align:center;">
                    <p style="margin:5px 0; color:#ccc;">Total Pembayaran:</p>
                    <b class="total">Rp <?php echo number_format($total,0,',','.'); ?></b>
                    
                    <p style="margin:15px 0 5px; color:#ccc;">Kode Verifikasi:</p>
                    <b style="color:lightgreen; font-size:24px; letter-spacing: 2px;"><?php echo $kode; ?></b>
                    
                    <p style="margin-top:15px; color:#ccc;">Masukkan Kode Verifikasi:</p>
                    <input type="text" id="inputKode" onkeyup="cekKode()" style="text-align:center; font-size:20px; letter-spacing:4px; font-weight:bold; width: 80%; margin: 0 auto; display:block;">
                    <p id="statusBayar" style="font-weight:bold; margin-top:10px; min-height: 20px;"></p>
                </div>

                <button type="submit" id="btnSubmit" disabled>Proses Pembelian</button>
            </div>
        </div>
    </form>

    <script>
        let kodeAsli = "<?php echo $kode; ?>";

        function showPayment() {
            let metode = document.getElementById("metode").value;
            
            // reset semua
            document.getElementById("transferBox").style.display = "none";
            document.getElementById("ewalletBox").style.display = "none";
            document.getElementById("qrisBox").style.display = "none";
            document.getElementById("verifikasiBox").style.display = "none";
            document.getElementById("btnSubmit").disabled = true;
            document.getElementById("inputKode").value = "";
            document.getElementById("statusBayar").innerHTML = "";

            if (metode === "transfer") {
                document.getElementById("transferBox").style.display = "block";
                document.getElementById("verifikasiBox").style.display = "block";
            }
            else if (metode === "ewallet") {
                document.getElementById("ewalletBox").style.display = "block";
                document.getElementById("verifikasiBox").style.display = "block";
            }
            else if (metode === "qris") {
                document.getElementById("qrisBox").style.display = "block";
                document.getElementById("verifikasiBox").style.display = "block";
            }
            else if (metode === "cod") {
                // COD langsung aktif
                document.getElementById("btnSubmit").disabled = false;
            }
        }

        function cekKode() {
            let input = document.getElementById("inputKode").value;
            let status = document.getElementById("statusBayar");
            let btn = document.getElementById("btnSubmit");

            if (input === kodeAsli) {
                status.innerHTML = "✅ Pembayaran Tervalidasi";
                status.style.color = "lightgreen";
                btn.disabled = false;
            } else if (input.length >= kodeAsli.length) {
                status.innerHTML = "❌ Kode Salah";
                status.style.color = "red";
                btn.disabled = true;
            } else {
                status.innerHTML = "";
                btn.disabled = true;
            }
        }
    </script>
</body>
</html>