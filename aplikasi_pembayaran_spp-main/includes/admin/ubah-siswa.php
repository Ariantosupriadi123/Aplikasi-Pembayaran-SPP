<?php
if(isset($_POST['submit'])) {
    if($admin->ubahDataSiswa($_POST['nis'], $_POST['nama'], $_POST['kelas'], $_POST['id_spp'], $_POST['nisn'])) {
        header('Location: ?p=siswa');
        $_SESSION['pesan'] = "Data Siswa berhasil diubah";
    } else {
        header('Location: ?p=siswa');
        $_SESSION['pesan'] = "Data Siswa gagal diubah";
    }
}

if(isset($_GET['nisn'])) {
    $dt_siswa = $admin->getDataSiswaByNisn($_GET['nisn']);
    foreach ($dt_siswa as $row) :
?>

<h2>Ubah Data Siswa</h2>
<form method="post">
    <input type="hidden" name="nisn" id="nisn" required value="<?= $row['nisn']; ?>"><br>
    <label for="nis">NIS</label><br>
    <input type="text" name="nis" id="nis" required value="<?= $row['nis']; ?>"><br>
    <label for="nama">Nama Lengkap</label><br>
    <input type="text" name="nama" id="nama" required value="<?= $row['nama_lengkap']; ?>"><br>
    <label for="kelas">Kelas</label><br>
    <select name="kelas">
        <option value="X">X</option>
        <option value="XI">XI</option>
        <option value="XII">XII</option>
    </select><br>
    <label for="tahun">Tahun</label><br>
    <select name="id_spp">

        <?php
        $dt_spp = $admin->getDataSPP();
        foreach ($dt_spp as $row) :
        ?>

        <option value="<?= $row['id_spp']; ?>"><?= $row['tahun']; ?></option>

        <?php
        endforeach;
        ?>

    </select><br>
    <button type="submit" name="submit">Simpan</button>
</form>

<?php
    endforeach;
}
?>