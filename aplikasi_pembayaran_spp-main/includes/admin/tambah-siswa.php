<?php
if(isset($_POST['submit'])) {
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $id_spp = $_POST['id_spp'];

    $cek = $admin->cekDataSiswa($nisn, $nis);

    if($cek->num_rows > 0) {
        header('Location: ?p=siswa');
        $_SESSION['pesan'] = "NISN atau NIS sudah terdaftar";
    } else {
        if($admin->tambahDataSiswa($nisn, $nis, $nama, $kelas, $id_spp)) {
            $bulan[] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

            for ($i=0; $i < 12; $i++) {
                $admin->tambahDataPembayaran($nisn, $bulan[0][$i], $id_spp);
            }
            header('Location: ?p=siswa');
            $_SESSION['pesan'] = "Data Siswa berhasil ditambah";
        } else {
            header('Location: ?p=siswa');
            $_SESSION['pesan'] = "Data Siswa gagal ditambah";
        }
    }
}
?>

<h2>Tambah Data SPP</h2>
<form method="post">
    <label for="nisn">NISN</label><br>
    <input type="text" name="nisn" id="nisn" required><br>
    <label for="nis">NIS</label><br>
    <input type="text" name="nis" id="nis" required><br>
    <label for="nama">Nama Lengkap</label><br>
    <input type="text" name="nama" id="nama" required><br>
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