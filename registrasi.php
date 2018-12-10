<?php
    require 'E:/Xampp/htdocs/TubesFIX/web/fungsi.php';

    if(isset($_POST['register']))
    {
        if(registrasi($_POST)>0)
        {
            echo "
                <style>
                    alert('user berhasil ditambahkan')
                </style>
            ";
        }

        else{
            echo mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <title>HALAMAN REGISTRASI</title>

    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class=""></div>
                <div class="card-body">
                    <h2 class="title">=== HALAMAN REGISTRASI ===</h2>
                    
                    <form method="POST">
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Input Username" name="username" id="username">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Input Password" name="password" id="password">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Confirm Password" name="password2" id="password2">
                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" name="register" type="submit">Register Account</button>
                        </div>
                        <div class="p-t-10">
                            <a button class="btn btn--pill btn--green" name="back" type="submit" href="/TubesFIX/web/login.php">Back to Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
    <script src="js/global.js"></script>
</body>
</html>