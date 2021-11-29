<?php
if(isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $uname = $_POST['username'];
    $pass = sha1($_POST['password']);
    $level = $_POST['level'];
    $id = $_GET['id'];

    if($admin->ubahDataPetugas($nama, $uname, $pass, $level, $id)) {
        $_SESSION['pesan'] = "Ubah Data Petugas Berhasil";
        header('Location: ?p=petugas');
    } else {
        $_SESSION['pesan'] = "Ubah Data Petugas Gagal";
        header('Location: ?p=petugas');
    }
}

$data = $admin->getDataPetugas($_GET['id']);

foreach ($data as $row) :
?>

<h2>Ubah Data Petugas</h2>
<form method="POST">
    <label>Nama Lengkap</label><br>
    <input type="text" name="nama" required value="<?= $row['nama_petugas']; ?>"><br>
    <label>Username</label><br>
    <input type="text" name="username" required value="<?= $row['username']; ?>"><br>
    <label>Password</label><br>
    <input type="password" name="password" required value="<?= $row['password']; ?>"><br>
    <label>Level</label><br>
    <select name="level">
        <option value="Admin">Admin</option>
        <option value="Petugas">Petugas</option>
    </select>&nbsp;
    <button type="submit" name="submit">Ubah</button>
</form>

<?php
endforeach;
?>