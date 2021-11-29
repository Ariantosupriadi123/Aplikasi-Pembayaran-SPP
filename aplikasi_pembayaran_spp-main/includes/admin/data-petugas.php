<h2>Data Petugas</h2>
<a href="?p=tambah-petugas">Tambah Data</a>
<br><br>

<?php
if(isset($_SESSION['pesan'])) {
    echo $_SESSION['pesan'];
    unset($_SESSION['pesan']);
    echo '<br/>';
}
?>

<table border="1">
    <tr>
        <th>NO.</th>
        <th>Nama Petugas</th>
        <th>Username</th>
        <th>Password</th>
        <th>Level</th>
        <th>Aksi</th>
    </tr>

    <?php
    $no = 1;
    $rows = $admin->getAllDataPetugas();

    foreach ($rows as $row) :
    ?>

    <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama_petugas']; ?></td>
        <td><?= $row['username']; ?></td>
        <td><?= $row['password']; ?></td>
        <td><?= $row['level']; ?></td>
        <td><a href="?p=ubah-petugas&id=<?= $row['id_petugas']; ?>">Ubah</a> | <a href="?p=hapus-petugas&id=<?= $row['id_petugas']; ?>" onclick="return confirm('Yakin data ini akan dihapus?')">Hapus</a></td>
    </tr>

    <?php
    endforeach;
    ?>
</table>