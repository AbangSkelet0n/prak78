<table id="food-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Objek Wisata</th>
            <th>Gambar</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "config.php";
        $query = mysqli_query($conn, "SELECT * FROM wisata ORDER BY id_wisata DESC");
        $no = 0;
        while ($data = mysqli_fetch_array($query)) {
            $no++;
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $data['nama_wisata'] ?></td>
                <td><img src="assets/<?= $data['foto'] ?>" width=" 100"></td>
                <td><?= $data['deskripsi'] ?></td>
                <td>
                    <a class="tombol edit" href="wisata_edit.php?id=<?= $data['id_wisata'] ?>">Edit</a>
                    <a class="tombol hapus" onclick="return confirm('Yakin ingin menghapus?')"
                        href="wisata_hapus.php?id=<?= $data['id_wisata'] ?>&foto=<?= $data['foto'] ?>">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>