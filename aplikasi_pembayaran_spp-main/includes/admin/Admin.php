<?php

require_once '../../config/Koneksi.php';

class Admin extends Koneksi {
    public function getDataPetugas($id) {
        $stmt = mysqli_query($this->konek, "SELECT * FROM tb_petugas WHERE id_petugas = '" . $id . "'");
        
        return $stmt;
    }

    public function getAllDataPetugas() {
        $stmt = mysqli_query($this->konek, "SELECT * FROM tb_petugas");

        return $stmt;
    }

    public function tambahDataPetugas($nama, $username, $password, $level) {
        $stmt = mysqli_query($this->konek, "INSERT INTO tb_petugas VALUES ('', '$username', '$password', '$nama', '$level')");

        if($stmt) {
            return true;
        } else {
            return false;
        }
    }

    public function ubahDataPetugas($nama, $username, $password, $level, $id) {
        $stmt = mysqli_query($this->konek, "UPDATE tb_petugas SET nama_petugas = '$nama', username = '$username', password = '$password', level = '$level' WHERE id_petugas = '$id'");

        if($stmt) {
            return true;
        } else {
            return false;
        }
    }

    public function hapusDataPetugas($id) {
        $stmt = mysqli_query($this->konek, "DELETE FROM tb_petugas WHERE id_petugas = '$id'");

        if($stmt) {
            return true;
        } else {
            return false;
        }
    }

    public function getDataSPP() {
        $stmt = mysqli_query($this->konek, "SELECT * FROM tb_spp ORDER BY tahun ASC");

        return $stmt;
    }

    public function tambahDataSPP($tahun, $nominal) {
        $stmt = mysqli_query($this->konek, "INSERT INTO tb_spp VALUES ('', '" . $tahun . "', '" . $nominal . "')");

        if($stmt) {
            return true;
        } else {
            return false;
        }
    }

    public function getDataSPPbyId($id) {
        $stmt = mysqli_query($this->konek, "SELECT * FROM tb_spp WHERE id_spp = '".$id."'");

        return $stmt;
    }

    public function ubahDataSPP($tahun, $nominal, $id) {
        $stmt = mysqli_query($this->konek, "UPDATE tb_spp SET tahun = '".$tahun."', nominal = '".$nominal."' WHERE id_spp = ".$id);

        if($stmt) {
            return true;
        } else {
            return false;
        }
    }

    public function hapusDataSPP($id) {
        $stmt = mysqli_query($this->konek, "DELETE FROM tb_spp WHERE id_spp = ".$id);

        if($stmt) {
            return true;
        } else {
            return false;
        }
    }

    public function getDataSiswa() {
        $stmt = mysqli_query($this->konek, "SELECT * FROM tb_siswa INNER JOIN tb_spp ON tb_siswa.id_spp = tb_spp.id_spp ORDER BY NISN ASC");
    
        return $stmt;
    }

    public function cekDataSiswa($nisn, $nis) {
        $stmt = mysqli_query($this->konek, "SELECT * FROM tb_siswa WHERE nisn = '$nisn' OR nis = '$nis'");

        if($stmt) {
            return true;
        } else {
            return false;
        }
    }

    public function tambahDataSiswa($nisn, $nis, $nama, $kelas, $tahun) {
        $stmt = mysqli_query($this->konek, "INSERT INTO tb_siswa VALUES ('$nisn', '$nis', '$nama', '$kelas', '$tahun')");

        if($stmt) {
            return true;
        } else {
            return false;
        }
    }

    public function getDataSiswaByNisn($nisn) {
        $stmt = mysqli_query($this->konek, "SELECT * FROM tb_siswa WHERE nisn = '$nisn'");

        return $stmt;
    }

    public function ubahDataSiswa($nis, $nama, $kelas, $tahun, $nisn) {
        $stmt = mysqli_query($this->konek, "UPDATE tb_siswa SET nis = '$nis', nama_lengkap = '$nama', kelas = '$kelas', id_spp = '$tahun' WHERE nisn ='$nisn'");

        if($stmt) {
            return true;
        } else {
            return false;
        }
    }

    public function hapusDataSiswa($nisn) {
        $stmt = mysqli_query($this->konek, "DELETE FROM tb_siswa WHERE nisn = '$nisn'");

        if($stmt) {
            return true;
        } else {
            return false;
        }
    }

    public function tambahDataPembayaran($nisn, $bulan, $id_spp) {
        $stmt = mysqli_query($this->konek, "INSERT INTO tb_pembayaran (nisn, bulan_dibayar, id_spp) VALUES ('$nisn', '$bulan', '$id_spp')");

        if($stmt) {
            return true;
        } else {
            return false;
        }
    }

    public function hapusDataPembayaran($nisn) {
        $stmt = mysqli_query($this->konek, "DELETE FROM tb_pembayaran WHERE nisn = '$nisn'");

        if($stmt) {
            return true;
        } else {
            return false;
        }
    }

    public function getDataPembayaranPerPeriode($date1, $date2) {
        $stmt = mysqli_query($this->konek, "SELECT s.nisn, p.tgl_bayar, spp.tahun, spp.nominal FORM tb_siswa AS s INNER JOIN tb_pembayaran AS p ON s.nisn = p.nisn INNER JOIN tb_spp AS spp ON p.id_spp = spp.id_spp WHERE p.tgl_bayar BETWEEN '$date1 and' '$date2'");

        return $stmt;
   }

   public function cekTahunAjaran() {
       $stmt = mysqli_query($this->konek, "SELECT MAX(spp.tahun) AS MaxTahun FROM tb_siswa AS s INNER JOIN tb_spp AS spp WHERE s.id_spp WHERE s.id_spp = spp.id_spp");

       return $stmt;
   }

   public function getMaxTahunSPP() {
       $stmt = mysqli_query($this->konek, "SELECT MAX(tahun) FROM tb_spp");

       return $stmt;
   }
}