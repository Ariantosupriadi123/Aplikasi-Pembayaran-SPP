<?php
if(isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $uname = $_POST['username'];
    $pass = sha1($_POST['password']);
    $level = $_POST['level'];

    if($admin->tambahDataPetugas($nama, $uname, $pass, $level)) {
        $_SESSION['pesan'] = "Tambah Data Petugas Berhasil";
        header('Location: ?p=petugas');
    } else {
        $_SESSION['pesan'] = "Tambah Data Petugas Gagal";
        header('Location: ?p=petugas');
    }
}
?>

<h2>Form Tambah Petugas</h2>

<form method="POST">
    <label>Nama Lengkap</label><br>
    <input type="text" name="nama" required><br>
    <label>Username</label><br>
    <input type="text" name="username" required><br>
    <label>Password</label><br>
    <input type="password" name="password" required><br>
    <label>Level</label><br>
    <select name="level">
        <option value="Admin">Admin</option>
        <option value="Petugas">Petugas</option>
    </select>&nbsp;
    <button type="submit" name="submit">Simpan</button>
</form>