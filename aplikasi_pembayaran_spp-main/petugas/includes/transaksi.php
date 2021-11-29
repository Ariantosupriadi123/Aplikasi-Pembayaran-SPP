<h2>Transaksi Pembayaran</h2>

<form method="GET" action="">
    <label>Masukan NIS</label>
    <input type="text" name="nis">
    <button type="submit">Cari</button>
</form><br>

<?php

if(isset($_GET['nis']) && $_GET['nis'] != '') {
    $rows = $petugas->getDataSiswaByNIS($_GET['nis']);

    if ($rows->num_rows > 0) {
        foreach ($rows as $row) :
?>

<table>
    <tr>
        <td>NIS</td>
        <td>:</td>
        <td><?= $row['nis']; ?></td>
    </tr>
    <tr>
        <td>Nama Siswa</td>
        <td>:</td>
        <td><?= $row['nama_lengkap']; ?></td>
    </tr>
    <tr>
        <td>Kelas</td>
        <td>:</td>
        <td><?= $row['kelas']; ?></td>
    </tr>
</table><br>

<?php
$nisn = $row['nisn'];
endforeach;

if(isset($_SESSION['pesan'])) {
    echo $_SESSION['pesan'];
    unset ($_SESSION['pesan']);
}

?>

<table border="1">
    <tr>
        <th>No.</th>
        <th>Bulan</th>
        <th>Tahun</th>
        <th>Nominal</th>
        <th>Tgl. Bayar</th>
        <th>Keterangan</th>
        <th>Petugas</th>
        <th>Aksi</th>
    </tr>

    <?php
    $no = 1;
    $dt_pembayaran = $petugas->getPembayaranByNISN($row['nisn']);

    while ($dt = mysqli_fetch_assoc($dt_pembayaran)) :
    ?>

    <tr>
        <td><?= $no++; ?></td>
        <td><?= $dt['bulan_dibayar']; ?></td>
        <td><?= $dt['tahun']; ?></td>
        <td><?= $dt['nominal']; ?></td>
        <td><?= $dt['tgl_bayar']; ?></td>
        <td><?= $dt['keterangan']; ?></td>
        <td><?= $dt['nama_petugas']; ?></td>
        <td>

            <?php
            if($dt['keterangan'] == 'Lunas') {
                echo '<a href="proses-transaksi.php?act=batal&id='.$dt['id_pembayaran'].'"><button>Batal</button></a> 
                    | <a href="cetak-transaksi-perbulan.php?nis='.$_GET['nis'].'&id='.$dt['id_pembayaran'].'"><button>Cetak</button></a>';
            } else {
                echo '<a href="proses-transaksi.php?act=bayar&id='.$dt['id_pembayaran'].'"><button>Bayar</button></a>';
            }
            ?>

        </td>
    </tr>

<?php
    endwhile;
    } else {
        echo "NIS tidak terdaftar";
    }
}
?>
</table>