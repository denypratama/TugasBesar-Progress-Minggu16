<?php
session_start();
if(!isset($_SESSION["login"]))
{
    echo $_SESSION["login"];
    header("Location:login.php");
    exit;
}
require 'E:\Xampp\htdocs\TubesFIX\web\fungsi.php';
// cek apakah button submit sudah di tekan atau belum
// menggunakan mehtod get untuk mengambil id yg telah
// terseleksi oleh user dan dimasukkan ke dalam variabel 
// baru yaitu $id
$id=$_GET["id"];
// var_dump($id);

// query berdasar id
$queryid=query("SELECT * FROM pekerja WHERE id=$id")[0];
//var_dump($queryid);
//var_dump($queryid[0]["Nama"]);

// cek apakah button submit sudah ditekan atau belum
if(isset($_POST["submit"]))
{
    // cek sukses data dirubah menggunakan function edit pada fungsi.php
    if(Edit($_POST)>0)
    {
        echo "
        <script>
        alert('data berhasil diperbarui');
        document.location.href='index.php';
        </script>
        ";
    }
    else
    {
        echo "
        <script>
        alert('data gagal diperbaruhi');
        document.location.href='editdatapekerja.php';
        </script>";
        echo "<br>";
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <title>Update Data</title>
</head>
<body>
    <h1> Update Data Mahasiswa</h1>
    <!-- menambahkan atribut enctype -->
    <form action="" method="post" enctype="multipart/form-data">
    <li>
        <input type="hidden" name="id" value="<?= $mhs["id"]?>">
    </li>
    <ul>
        <li>
            <!--for pada tabel terhubung dengan id jika label nama diklik maka textfield nama akan aktif juga -->
            <label for="Nama">Nama :</label>
            <!-- untuk pengisian name besar kecil harus sesuai dengan fieldnya -->
            <input type="text" name="Nama" id="Nama" value="<?= $queryid["Nama"]; ?>">
        </li>
        <li>
            <label for="NIM">Umur :</label>
            <input type="text" name="Umur" id="Umur" required value="<?= $queryid["Umur"]; ?>">
        </li>
        <li>
            <label for="Email">Pendidikan_Terakhir :</label>
            <input type="text" name="Pendidikan_Terakhir" id="Pendidikan_Terakhir" required value="<?= $queryid["Pendidikan_Terakhir"]; ?>">
        </li>
        <li>
            <label for="Jurusan">Pengalaman_Kerja :</label>
            <input type="text" name="Pengalaman_Kerja" id="Pengalaman_Kerja" required value="<?= $queryid["Pengalaman_Kerja"]; ?>">
        </li>
        <li>
            <label for="Jurusan">Alamat :</label>
            <input type="text" name="Alamat" id="Alamat" required value="<?= $queryid["Alamat"]; ?>">
        </li>
        <li>
            <label for="Jurusan">Pekerjaan_yang_Diinginkan :</label>
            <input type="text" name="Pekerjaan_yang_Diinginkan" id="Pekerjaan_yang_Diinginkan" required value="<?= $queryid["Pekerjaan_yang_Diinginkan"]; ?>">
        </li>
        <li>
            <button type="submit" name="submit">Update Data</button>
        </li>
    </ul>
    </form>

</body>
</html>