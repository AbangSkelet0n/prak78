<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Objek Wisata Sulawesi Selatan</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <header>
        Objek Wisata
    </header>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <nav>
                <ul>
                    <li><a href=#>Dashboard</a></li>
                    <li><a href="tabel-makanan.php">Makanan Khas</a></li>
                    <li><a href="tabel-objekwisata.php">Objek Wisata</a></li>
                    <li><a href=#>Keluar</a></li>
                </ul>
            </nav>
        </aside>
        <!-- Konten Utama -->
        <section class="content">
            <h1>Daftar Objek Wisata Sulawesi Selatan</h1>
            <!-- Formulir Tambah Makanan -->
            <form id="food-form" action="wisata_insert.php" method="post"
                enctype="multipart/form-data">
                <h2>Tambah Objek Wisata</h2>
                <label for="food-name">Nama Objek Wisata:</label>
                <input type="text" id="nama_wisata" name="nama_wisata" placeholder="Masukkan nama Objek Wisata..."
                    required oninvalid="this.setCustomValidity('Ups! Kolom ini tidak boleh kosong')"
                    oninput="setCustomValidity('')">
                <label for="food-desc">Deskripsi Objek Wisata:</label>
                <input type="text" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi Objek Wisata..."
                    required oninvalid="this.setCustomValidity('Ups! Kolom ini tidak boleh kosong')"
                    oninput="setCustomValidity('')">
                <label for="food-image">Gambar Objek Wisata:</label>
                <input type="file" id="foto" name="foto">
                <div class="add-button">
                    <button type="submit" id="submit-btn">Simpan</button>
                    <button type="reset">Batal</button>
                </div>
            </form>
            <!-- Tabel Data Objek Wisata -->
            <?php
            include "wisata_tampil.php";
            ?>
        </section>
    </div>
</body>
</html>