<?php

require_once 'config/Koneksi.php';

class Proses extends Koneksi {
    public function loginPetugas($username, $password) {
        $stmt = mysqli_query($this->konek, "SELECT * FROM tb_petugas WHERE username = '" .
            $username . "' AND password = '" . $password . "'");
            
        return $stmt;
    }
}

// $proses = new Proses;
// var_dump($proses->loginPetugas('admin', sha1('admin')));
?>