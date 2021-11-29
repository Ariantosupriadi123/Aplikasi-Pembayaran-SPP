<?php
if (!session_id()) session_start();
require_once 'Proses.php';

// buat object
$proses = new Proses;

// cek session, apabila sudah ada maka akan diarahkan ke halaman beranda
if (isset($_SESSION['id'])) {
    if ($_SESSION['level'] == "Admin") {
        header('Location: includes/admin/');
    } else {
        // kita belum buat
        header('Location: petugas/');
    }
}

// ketika tombol masuk diklik maka jalankan kode berikut
if (isset($_POST['masuk'])) {
    // menghindari sql injection
    $username = $proses->konek->real_escape_string($_POST['username']);
    $password = $proses->konek->real_escape_string(sha1($_POST['password']));

    $masuk = $proses->loginPetugas($username, $password);

    if ($masuk->num_rows > 0) {
        $data = mysqli_fetch_assoc($masuk);

        if ($data['level'] == "Admin") {
            header('Location: includes/admin');
            $_SESSION['id'] = $data['id_petugas'];
            $_SESSION['level'] = $data['level'];
        } else {
            header('Location: petugas');
            $_SESSION['id'] = $data['id_petugas'];
            $_SESSION['level'] = $data['level'];
        }
    } else {
        $_SESSION['error'] = "Username atau password tidak valid";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pembayaran SPP</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#273036" fill-opacity="1" d="M0,96L34.3,112C68.6,128,137,160,206,149.3C274.3,139,343,85,411,80C480,75,549,117,617,144C685.7,171,754,181,823,181.3C891.4,181,960,171,1029,154.7C1097.1,139,1166,117,1234,122.7C1302.9,128,1371,160,1406,176L1440,192L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"></path>
</svg>

<body>

    <div class="row">
        <div class="col-8">
            <div class="row py-5 px-5">
                <div class="col-4 ">
                    <h1 class="text-end">Aplikasi Pembayaran SPP</h1>
                </div>
                <div class="col-4 ">
                    <img src="assets/IMG.svg" alt="" class="" style="width:400px;  ">
                </div>
            </div>
        </div>
        <div class="col-4 py-5 px-5">
            <h2>Silahkan Masuk</h2>
            <?php
            if (isset($_SESSION['error'])) {
                echo '<span style="color:red;">' . $_SESSION['error'] . '</span>';
            }
            ?>
            <form method="post" action="" 5complete="off">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" placeholder="Username" class="form-control" style="width : 200px; border-radius : 100px;"> 
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" class="form-control" style="width: 200px; border-radius : 100px;">
                <input type="submit" name="masuk" value="Masuk" class="btn btn-primary" style="width: 200px; border-radius : 100px;">
            </form>
        </div>
    </div>

</body>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#0099ff" fill-opacity="1" d="M0,32L40,69.3C80,107,160,181,240,197.3C320,213,400,171,480,154.7C560,139,640,149,720,176C800,203,880,245,960,240C1040,235,1120,181,1200,181.3C1280,181,1360,235,1400,261.3L1440,288L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
</svg>
<!-- link js bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>