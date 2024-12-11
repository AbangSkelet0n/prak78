<?php
include "config.php";
$query = mysqli_query($conn, "SELECT * FROM makanan WHERE
id_makanan='$_GET[id]'");
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Makanan Khas Sulawesi Selatan</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <header>
        Makanan Khas
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
            <h1>Daftar Makanan Khas Sulawesi Selatan</h1>
            <!-- Formulir Tambah Makanan -->
            <form id="food-form" action="makanan_update.php" method="post"
                enctype="multipart/form-data">
                <h2>Tambah Makanan Khas</h2>
                <input type="hidden" name="id_makanan" value="<?= $data['id_makanan'] ?>">
                <label for="food-name">Nama Makanan:</label>
                <input type="text" id="nama_makanan" name="nama_makanan"
                    placeholder="Masukkan nama makanan..."
                    value="<?= $data['nama_makanan'] ?>" required
                    oninvalid="this.setCustomValidity('Ups! Kolom ini tidak boleh kosong')"
                    oninput="setCustomValidity('')">
                <label for="food-desc">Deskripsi Makanan:</label>
                <input type="text" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi makanan..."
                    required value="<?= $data['deskripsi'] ?>"
                    oninvalid="this.setCustomValidity('Ups! Kolom ini tidak boleh kosong')"
                    oninput="setCustomValidity('')">
                <label for="food-image">Gambar Makanan:</label>
                <img src="assets/<?= $data['foto'] ?>" width="150">
                <input type="file" id="foto" name="foto">
                <div class="add-button">
                    <button type="submit" id="submit-btn">Simpan</button>
                    <button type="reset" onclick="location.href='tabel-makanan.php';">Batal</button>
                </div>
            </form>
            <!-- Tabel Data Makanan -->
            <?php
            include "makanan_tampil.php";
            ?>
        </section>
    </div>
</body>

</html>