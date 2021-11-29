<?php
require_once '../config/Koneksi.php';

class Petugas extends Koneksi {
    public function getDataSiswaByNIS($nis) {
        $stmt = mysqli_query($this->konek, "SELECT * FROM tb_siswa WHERE nis = '$nis'");

        return $stmt;
    }

    public function getPembayaranByNISN($nisn) {
        $stmt = mysqli_query($this->konek, "SELECT p.id_pembayaran, p.bulan_dibayar, s.tahun, s.nominal, p.tgl_bayar, p.keterangan, 
        pt.nama_petugas FROM tb_pembayaran AS p INNER JOIN tb_spp AS s ON p.id_spp = s.id_spp LEFT JOIN tb_petugas 
        AS pt ON p.id_petugas = pt.id_petugas WHERE p.nisn = '$nisn' ORDER BY p.id_pembayaran ASC");

        return $stmt;
    }

    public function prosesBayar($tgl_bayar, $id_petugas, $id_pembayaran) {
        $stmt = mysqli_query($this->konek, "UPDATE tb_pembayaran SET tgl_bayar = '$tgl_bayar', keterangan 
            = 'Lunas', id_petugas = '$id_petugas' WHERE id_pembayaran = $id_pembayaran");

            return $stmt;
    }

    public function batalBayar($id_pembayaran) {
        $stmt = mysqli_query($this->konek, "UPDATE tb_pembayaran SET tgl_bayar = NULL, keterangan = NULL, 
        id_petugas = NULL WHERE id_pembayaran = '$id_pembayaran'");

        return $stmt;
    }

    public function getPembayaranById($id) {
        $stmt = mysqli_query($this->konek, "SELECT p.id_pembayaran, p.bulan_dibayar, s.tahun, s.nominal, p.tgl_bayar, p.keterangan, 
        pt.nama_petugas FROM tb_pembayaran AS p INNER JOIN tb_spp AS s ON p.id_spp = s.id_spp LEFT JOIN tb_petugas 
        AS pt ON p.id_petugas = pt.id_petugas WHERE p.id_pembayaran = '$id' ORDER BY p.id_pembayaran ASC");

        return $stmt;
    }
}