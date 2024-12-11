<?php
include "config.php";
if (file_exists("assets/$_GET[foto]")) unlink("assets/$_GET[foto]");
$query = mysqli_query($conn, "DELETE FROM wisata
WHERE id_wisata='$_GET[id]'");
if ($query) {
    echo "<script>alert('Data berhasil dihapus')</script>";
    echo "<meta http-equiv='refresh' content='0; url=tabel-objekwisata.php'>";
} else {
    echo "<script>alert('Tidak dapat menghapus data')</script>";
    echo mysqli_error($conn);
}
