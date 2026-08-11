<!DOCTYPE html>
<html>
<head>
    <title>Kontak - Apotik ZRDN STR WSN</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            background-color: #f4f6f9;
            color: #333;
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            height: 100%;
            border-collapse: collapse;
        }
        tr.baris1 { height: 8%; background-color: #2c3e50; color: white; }
        tr.baris2 { height: 10%; background-color: #34495e; color: white; }
        tr.baris3 { height: 82%; }
        td, th { padding: 10px; text-align: center; }
        
        .cell-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        .menu a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            margin: 0 5px;
        }
        .menu a:hover, .menu a.active {
            background-color: #27ae60;
        }
        .content-container {
            max-width: 800px;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            text-align: left;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            display: flex;
            gap: 20px;
        }
        .box-kontak { flex: 1; }
        .form-kontak { flex: 1; }
        .form-kontak input, .form-kontak textarea {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .btn-kirim {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
        }
        .btn-kirim:hover { background-color: #219653; }
    </style>
</head>
<body>

<table>
    <tr class="baris1">
        <th>
            <div class="cell-flex">
                <span>APOTIK ZRDN STR WSN</span>
                <span>Tlp: +62 812-3456-7890</span>
            </div>
        </th>
    </tr>
    <tr class="baris2">
        <td>
            <div class="cell-flex">
                <span style="font-weight: bold; font-size: 20px;">ZRDN Pharma</span>
                <div class="menu">
                    <a href="home.php">Home</a>
                    <a href="profil.php">Profil</a>
                    <a href="kontak.php" class="active">Kontak</a>
                </div>
            </div>
        </td>
    </tr>
    <tr class="baris3">
        <td style="vertical-align: top; background: #f9f9f9;">
            <div class="content-container">
                
                <!-- Bagian Informasi Kontak -->
                <div class="box-kontak">
                    <h3 style="color: #27ae60;">Hubungi Kami</h3>
                    <p>Silakan hubungi kami untuk menanyakan ketersediaan obat Kapsul, Bodrex, Amoxicillin, atau layanan kesehatan lainnya.</p>
                    <p><strong>Alamat:</strong> Jl. Kesehatan Raya No. 123, Kota Sehat</p>
                    <p><strong>WhatsApp:</strong> +62 812-3456-7890</p>
                    <p><strong>Jam Operasional:</strong> 24 Jam (Setiap Hari)</p>
                </div>
                
                <!-- Bagian Form Pesan -->
                <div class="form-kontak">
                    <h3 style="color: #27ae60;">Formulir Pertanyaan</h3>
                    <form action="#" method="POST">
                        <label>Nama Lengkap</label>
                        <input type="text" placeholder="Masukkan nama Anda" required>
                        
                        <label>Email</label>
                        <input type="email" placeholder="Masukkan email Anda" required>
                        
                        <label>Pesan / Pertanyaan Stok Obat</label>
                        <textarea rows="4" placeholder="Tuliskan obat yang ingin ditanyakan..." required></textarea>
                        
                        <button type="submit" class="btn-kirim">Kirim Pesan</button>
                    </form>
                </div>

            </div>
        </td>
    </tr>
</table>

</body>
</html>