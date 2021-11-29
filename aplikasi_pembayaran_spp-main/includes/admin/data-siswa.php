<h2>Data Siswa</h2>
<a href="?p=tambah-siswa">Tambah Data</a>
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
        <th>NISN</th>
        <th>NIS</th>
        <th>Nama Lengkap</th>
        <th>Kelas</th>
        <th>Tahun</th>
        <th>Aksi</th>
    </tr>

        <!-- tampilkan data siswa -->
        <?php
        $no = 1;
        $siswa = $admin->getDataSiswa();
        while($dt_siswa = mysqli_fetch_assoc($siswa)) {
        ?>

            <tr>
                <td><?= $no++; ?></td>
                <td><?= $dt_siswa['nisn']; ?></td>
                <td><?= $dt_siswa['nis']; ?></td>
                <td><?= $dt_siswa['nama_lengkap']; ?></td>
                <td><?= $dt_siswa['kelas']; ?></td>
                <td><?= $dt_siswa['tahun']; ?></td>
                <td><a href="?p=ubah-siswa&nisn=<?= $dt_siswa['nisn']; ?>">Ubah</a>|<a href="?p=hapus-siswa&nisn=<?= $dt_siswa['nisn']; ?>" onclick="return confirm('Yakin data ini akan dihapus?')">Hapus</a></td>
            </tr>

        <?php
        }
        ?>

</table>