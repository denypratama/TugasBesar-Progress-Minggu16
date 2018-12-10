<?php
session_start();
if(isset($_SESSION["login"]))
{
    echo $_SESSION["login"];
    header("Location:login.php");
    exit;
}
    //buat koneksi
    $conn=mysqli_connect("localhost","root","","itcompany_tubesweb");

    //cek apakah button submit sudah ditekan atau belum
    if(isset($_POST['submit']))
    {
        //ambil data dari tiap elemen dalam form yang disimpan di variable baru
        $nama                           =($_POST["Nama"]);
        $umur                           =($_POST["Umur"]);
        $pendidikan_terakhir            =($_POST["Pendidikan_Terakhir"]);
        $pengalaman_kerja               =($_POST["Pengalaman_Kerja"]);
        $alamat                         =($_POST["Alamat"]);
        $pekerjaan_yang_diinginkan      =($_POST["Pekerjaan_yang_Diinginkan"]);

        //query inserrt data
        $query="INSERT INTO pekerja
                VALUES
                ('','$nama','$umur','$pendidikan_terakhir','$pengalaman_kerja','$alamat','$pekerjaan_yang_diinginkan')";
        mysqli_query($conn,$query);

        //cek sukses data ditambah menggunakan mysqli_affected_rows
        //jika kita var_dump maka akan muncul int(1) jika gagal maka akan muncul int(-1)
        //var_dump(mysqli_affected_rows($conn));

        if(mysqli_affected_rows($conn)>0)
        {
            echo "data berhasil disimpan";
        }
        else
        {
            echo "data gagal disimpan!";
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
    <!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
    <title>TAMBAH DATA</title>
</head>
<body>
    <!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>

    	<div class="container-contact100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="POST">
				<span class="contact100-form-title">
					=== PENDAFTARAN PEKERJA BARU ===
				</span>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Nama harus diisi">
					<span class="label-input100">Nama</span>
					<input class="input100" type="text" name="Nama" placeholder="Input Nama">
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Umur harus diisi">
					<span class="label-input100">Umur</span>
					<input class="input100" type="text" name="Umur" placeholder="Input Umur">
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Pendidikan harus diisi">
					<span class="label-input100">Pendidikan Terakhir</span>
					<input class="input100" type="text" name="Pendidikan_Terakhir" placeholder="Input Pendidikan">
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Pengalaman Kerja harus diisi">
					<span class="label-input100">Pengalaman Kerja</span>
					<input class="input100" name="Pengalaman_Kerja" placeholder="Input Pengalaman Kerja">
                </div>
                
                <div class="wrap-input100 validate-input" data-validate = "Alamat harus diisi">
					<span class="label-input100">Alamat</span>
					<input class="input100" name="Alamat" placeholder="Input Alamat">
                </div>
                
                <div class="wrap-input100 validate-input" data-validate = "Pekerjaan harus diisi">
					<span class="label-input100">Pekerjaan yang Diinginkan</span>
					<input class="input100" type="text" name="Pekerjaan_yang_Diinginkan" placeholder="Input Pekerjaan">
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn" type="submit" name="submit">
							Daftar
                        </button>
					</div>
                </div>
                <div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
                        <button class="contact100-form-btn" type="submit" name="submit">
							<a href="/TubesFix/web/Index/index.php">Back to Home</a>
                        </button>
                    </div>
                </div>
			</form>
		</div>

		<span class="contact100-more">
				IT Company on Jl. Polinema JTI no.10
		</span>
	</div>
	<div id="dropDownSelect1"></div>
</body>
</html>