<?php
session_start();

//cek cookie
if(isset($_COOKIE['id']) && isset($_COOKIE['username']))
{
    $id=$_COOKIE['id'];
    $key=$_COOKIE['key'];

    //ambil username berdasarkan id
    $result=mysqli_query($conn, "SELECT username FROM admin WHERE id=$id");
    $row=mysqli_fetch_assoc($result);

    //cek cookie dan username
    if($key===hash('sha256',$row['username']))
    {
        $_SESSION['login']=true;
    }
}
if(isset($_SESSION["login"]))
{
    echo $_SESSION["login"];
    header("Location:login.php");
    exit;
}
require 'E:\Xampp\htdocs\TubesFIX\web\fungsi.php';

if(isset($_POST["login"]))
{
    $username=$_POST["username"];
    $password=$_POST["password"];

    $result=mysqli_query($conn,"SELECT * FROM admin WHERE username='$username'");
    
    //cek username
    //mysqli_num_rows=untuk menghitung ada berapa baris yg akan dikembalikan parameter
    //kalau ada yg dikembalikan nilainya adalah 1 jika tidak ada nilainya 0

    if(mysqli_num_rows($result)===1)
    {
        //var_dump($result);
        //cek password
        $row=mysqli_fetch_assoc($result);
        //var_dump($row);

        //digunakan untuk mengecek sebuah string apakah sama dengan hashnya
        //terdapat 2 parameter (password yg blm diacak, password yg sudah diacak)
        if(password_verify($password,$row["password"]))
        {
            //set session
            $_SESSION["login"]=true;

            //cek remember me
            if(isset($_POST['remember']))
            {
                //enkripsi cookie mwnggunkan hash tipe sha256
                setcookie('id',$row['id'], time()+60);
                setcookie('key', hash(sha256,$row['username']),time()+60);
            }

            //redirect ke halaman index.php
            header("Location:indexadmin.php");
            exit;
        }
    }
    $error=true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in Admin
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Input Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Input Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							<a href="/TubesFIX/web/Index/indexadmin.php">Login Admin</a>
						</button>
                    </div>
                    <br>
                    <div class="container-login100-form-btn">
						<button class="login100-form-btn">
							<b><a href="/TubesFIX/web/login.php">Back to Login as User</a></b>
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>