<?php

if(isset($_POST['submit'])) {
    if($admin->ubahDataSPP($_POST['tahun'], $_POST['nominal'], $_GET['id'])) {
        header('Location: ?p=spp');
        $_SESSION['pesan'] = "Data SPP berhasil diubah";
    } else {
        header('Location: ?p=spp');
        $_SESSION['pesan'] = "Data SPP gagal diubah";
    }
}

if(isset($_GET['id'])) {
    $dt_spp = $admin->getDataSPPbyId($_GET['id']);

    foreach ($dt_spp as $row) :
?>

<h2>Tambah Data SPP</h2>
<form method="post">
    <label for="tahun">Tahun</label><br>
    <input type="text" name="tahun" id="tahun" placeholder="Masukan Tahun Ajaran" required value="<?= $row['tahun']; ?>"><br>
    <label for="nominal">Nominal</label><br>
    <input type="text" name="nominal" id="nominal" placeholder="Masukan Nominal" required value="<?= $row['nominal']; ?>"><br>
    <input type="submit" name="submit" value="Simpan">
</form>

<?php
    endforeach;
}
?>
