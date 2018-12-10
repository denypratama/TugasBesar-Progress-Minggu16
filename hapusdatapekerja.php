<?php
session_start();
if(!isset($_SESSION["login"]))
{
    echo $_SESSION["login"];
    header("Location:login.php");
    exit;
}
require 'E:\Xampp\htdocs\TubesFIX\web\fungsi.php';

//Menggunakan method get untuk mengambil id yang telah terseleksi oleh user dan dimasukkan
//kedalam variabel baru yaitu $id
$id=$_GET["id"];

if(hapus ($id)>0)
{
    echo "
    <script>
        alert ('data berhasil dihapus');
        document.location.href='Index/index.php';
    </script>";
}
else
{
    echo "
    <script>
        alert ('data gagal dihapus');
        document.location.href='Index/index.php';
    </script>";    
    echo "<br>";
    echo mysqli_error($conn);
}
?>