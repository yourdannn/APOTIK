<!DOCTYPE html>
<html>
<head>
    <title>Apotik ZRDN STR WSN</title>
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
        .left-text, .right-text {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }
        .menu a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background 0.3s;
            margin: 0 5px;
        }
        .menu a:hover, .menu a.active {
            background-color: #27ae60;
            color: white;
        }
        .row-cards {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }
        .card {
            background: white;
            width: 280px;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .card img {
            width: 100%;
            height: 150px;
            object-fit: contain;
            background: #eaeaea;
            border-radius: 5px;
        }
        .card h2 { color: #27ae60; font-size: 20px; margin: 10px 0; }
        .card h3 { font-size: 18px; margin: 5px 0; }
        .card p { font-size: 14px; color: #666; min-height: 40px; }
        .btn-beli {
            margin-top: 10px;
            padding: 8px 15px;
            border: 1px solid #27ae60;
            background: #27ae60;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
        }
        .btn-beli:hover { background: #219653; }
    </style>
</head>
<body>

<table>
    <!-- Baris 1: Header / Top Bar -->
    <tr class="baris1">
        <th>
            <div class="cell-flex">
                <div class="left-text">
                    <span style="font-weight: bold; font-size: 16px;">APOTIK ZRDN STR WSN</span>
                </div>
                <div class="right-text">
                    <span>Tlp: +62 812-3456-7890 | Mail: support@zrdnstrwsn.com</span>
                </div>
            </div>
        </th>
    </tr>

    <!-- Baris 2: Navigasi Menu -->
    <tr class="baris2">
        <td>
            <div class="cell-flex">
                <div class="left-text">
                    <span style="font-weight: bold; font-size: 20px;">ZRDN Pharma</span>
                </div>
                <div class="menu">
                    <a href="home.php" class="active">Home</a>
                    <a href="profil.php">Profil</a>
                    <a href="kontak.php">Kontak</a>
                </div>
                <div class="search">
                    <input type="text" placeholder="Cari obat...">
                    <input type="submit" value="Cari">
                </div>
            </div>
        </td>
    </tr>

    <!-- Baris 3: Konten Utama (Katalog Obat) -->
    <tr class="baris3">
        <td style="vertical-align: top; background: #f9f9f9;">
            <h2 style="margin-top: 20px;">Katalog Obat-Obatan Resmi</h2>
            <div class="row-cards">
                
                <!-- Card 1: Kapsul Kosong / Obat Kapsul -->
                <div class="card">
                    <img src="kapsul.jpg" alt="Obat Kapsul">
                    <h2>Rp 15.000 / Strip</h2>
                    <h3>Kapsul Racikan Racik</h3>
                    <p>Kapsul obat untuk meredakan gejala flu dan batuk sesuai dengan resep dokter terpercaya.</p>
                    <button class="btn-beli">Beli Sekarang</button>
                </div>

                <!-- Card 2: Bodrex -->
                <div class="card">
                    <img src="bodrex.jpg" alt="Bodrex">
                    <h2>Rp 5.000 / Strip</h2>
                    <h3>Bodrex Tablet</h3>
                    <p>Obat pilihan utama untuk meredakan sakit kepala, sakit gigi, dan menurunkan demam dengan cepat.</p>
                    <button class="btn-beli">Beli Sekarang</button>
                </div>

                <!-- Card 3: Amoxicillin -->
                <div class="card">
                    <img src="amoxicillin.jpg" alt="Amoxicillin">
                    <h2>Rp 25.000 / Strip</h2>
                    <h3>Amoxicillin 500mg</h3>
                    <p>Antibiotik untuk mengobati berbagai jenis infeksi bakteri. *Harus menggunakan resep dokter.</p>
                    <button class="btn-beli">Beli Sekarang</button>
                </div>

            </div>
        </td>
    </tr>
</table>

</body>
</html>