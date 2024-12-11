<?php
include "config.php";
$foto = $_FILES['foto']['name'];
$lokasi = $_FILES['foto']['tmp_name'];
$tipefile = $_FILES['foto']['type'];
$ukuranfile = $_FILES['foto']['size'];
$error = "";
if ($foto == "") { //update jika foto tidak diubah
    $query = mysqli_query($conn, "UPDATE wisata SET
nama_wisata = '$_POST[nama_wisata]',
deskripsi = '$_POST[deskripsi]'
WHERE id_wisata='$_POST[id_wisata]'");
} else {
    if (
        $tipefile != "image/jpeg" and $tipefile != "image/jpg" and
        $tipefile != "image/png"
    ) {
        $error = "Tipe file tidak didukung";
    } elseif ($ukuranfile >= 1000000) {
        $error = "Ukuran file lebih dari 1 MB";
    } else { //update jika foto diubah
        $query = mysqli_query($conn, "SELECT * FROM wisata
WHERE id_wisata='$_POST[id_wisata]'");
        $data = mysqli_fetch_array($query);
        if (file_exists("assets/$data[foto]")) unlink("assets/$data[foto]");
        $ext = strrchr($foto, '.');
        $foto = basename($foto, $ext) . time() . $ext;
        move_uploaded_file($lokasi, "assets/" . $foto);
        $query = mysqli_query($conn, "UPDATE wisata SET
foto = '$foto',
nama_wisata = '$_POST[nama_wisata]',
deskripsi = '$_POST[deskripsi]'
WHERE id_wisata='$_POST[id_wisata]'");
    }
}
if ($error != "") {
    echo "<script>alert('$error')</script>";
    echo "<meta http-equiv='refresh' content='0; url=tabel-objekwisata.php'>";
} elseif ($query) {
    echo "<script>alert('Data berhasil diubah')</script>";
    echo "<meta http-equiv='refresh' content='0; url=tabel-objekwisata.php'>";
} else {
    echo "<script>alert('Tidak dapat menyimpan data')</script>";
    echo mysqli_error($conn);
}
