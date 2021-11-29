<?php
if(isset($_POST['submit'])) {
    $simpan = $admin->tambahDataSPP($_POST['tahun'], $_POST['nominal']);

    if($simpan) {
        header('Location: ?p=spp');
        $_SESSION['pesan'] = "Data SPP berhasil ditambah";
    } else {
        header('Location: ?p=spp');
        $_SESSION['pesan'] = "Data SPP gagal ditambah";
    }
}
?>

<h2>Tambah Data SPP</h2>
<form method="post">
    <label for="tahun">Tahun</label><br>
    <input type="text" name="tahun" id="tahun" placeholder="Masukan Tahun Ajaran" required><br>
    <label for="nominal">Nominal</label><br>
    <input type="text" name="nominal" id="nominal" placeholder="Masukan Nominal" required><br>
    <input type="submit" name="submit" value="Simpan">
</form>