<?php
    include '../koneksi.php';
    session_start();

    if (!isset($_SESSION["username"])) {
        echo "<h1>Anda harus login dulu </h1><br><a href='../index.php'>Klik disini</a>";
        exit;
    }

    $level=$_SESSION["level"];

    if ($level != 2) {
        echo "<h1>Anda Tidak Punya Akses pada Halaman Pegawai!</h1>";
        exit;
    }

    $id_user = $_SESSION["id_user"];
    $username = $_SESSION["username"];
    $nama = $_SESSION["nama"];
    $email = $_SESSION["email"];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Pegawai</title>
</head>
<body>
    <div class="main">
        <div class="navbar" style="">
            <a href="pegawai.php">
                Hai pegawai, <?php echo $nama; ?>!
            </a>
            <a href="../logout.php">
                <i aria-hidden="true" class="fa fa-arrow-circle-right"></i>
                Log Out
            </a>
        </div>
        <div class="content">
            <div class="container-fluid mt-2">
                <label>
                    <h3>DAFTAR MAHASISWA</h3>
                </label>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center thead-dark">
                            <th>No.</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        $query = mysqli_query($kon, "SELECT * FROM mahasiswa ORDER BY nim");
                        while($data = mysqli_fetch_array($query)){
                            echo"
                            <tr>
                                <td class='text-center'>".$no++."</td>
                                <td>".$data['nama']."</td>
                                <td>".$data['nim']."</td>
                                <td>".$data['alamat']."</td>
                                <td class='text-center'>
                                    <a class='btn btn-success' href='edit_data.php?id=".$data['id']."'>
                                        <i class='fa fa-pencil' aria-hidden='true'></i>
                                    </a>
                                </td>
                            </tr>
                            ";
                        }
                        ?>
                    </tbody>
                </table>
                    <a href="tambah_data.php" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>
    </div>
</body>
</html>