<?php
include "config.php";
$query = mysqli_query($conn, "SELECT * FROM wisata WHERE
id_wisata='$_GET[id]'");
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
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
            <form id="food-form" action="wisata_update.php" method="post"
                enctype="multipart/form-data">
                <h2>Tambah Objek Wisata</h2>
                <input type="hidden" name="id_wisata" value="<?= $data['id_wisata'] ?>">
                <label for="food-name">Nama wisata:</label>
                <input type="text" id="nama_wisata" name="nama_wisata"
                    placeholder="Masukkan nama wisata..."
                    value="<?= $data['nama_wisata'] ?>" required
                    oninvalid="this.setCustomValidity('Ups! Kolom ini tidak boleh kosong')"
                    oninput="setCustomValidity('')">
                <label for="food-desc">Deskripsi wisata:</label>
                <input type="text" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi wisata..."
                    required value="<?= $data['deskripsi'] ?>"
                    oninvalid="this.setCustomValidity('Ups! Kolom ini tidak boleh kosong')"
                    oninput="setCustomValidity('')">
                <label for="food-image">Gambar wisata:</label>
                <img src="assets/<?= $data['foto'] ?>" width="150">
                <input type="file" id="foto" name="foto">
                <div class="add-button">
                    <button type="submit" id="submit-btn">Simpan</button>
                    <button type="reset" onclick="location.href='tabel-objekwisata.php';">Batal</button>
                </div>
            </form>
            <!-- Tabel Data wisata -->
            <?php
            include "wisata_tampil.php";
            ?>
        </section>
    </div>
</body>

</html>