<h2>Data SPP</h2>
<a href="?p=tambah-spp">Tambah Data</a>
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
        <th>No</th>
        <th>Tahun</th>
        <th>Nominal</th>
        <th>Aksi</th>
    </tr>

        <!-- tampilkan data spp -->
        <?php
        $no = 1;
        $spp = $admin->getDataSPP();
        while($dt_spp = mysqli_fetch_assoc($spp)) {
        ?>

            <tr>
                <td><?= $no++; ?></td>
                <td><?= $dt_spp['tahun']; ?></td>
                <td><?= $dt_spp['nominal']; ?></td>
                <td><a href="?p=ubah-spp&id=<?= $dt_spp['id_spp']; ?>">Ubah</a>|<a href="?p=hapus-spp&id=<?= $dt_spp['id_spp']; ?>" onclick="return confirm('Yakin data ini akan dihapus?')">Hapus</a></td>
            </tr>

        <?php
        }
        ?>

</table>