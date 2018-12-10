<?php

session_start();
if(isset($_SESSION["login"]))
{
    echo $_SESSION["login"];
    header("Location:/TubesFIX/web/login.php");
    exit;
}
    require 'E:/Xampp/htdocs/TubesFIX/web/fungsi.php';
    $pekerja = query("SELECT * FROM pekerja");

    //tombol cari ditekan
    // cari pada line 7 adalah name dari button
if (isset($_POST["cari"]))
{
    //cari adalah function cari dari keyword adalah name dari inputan text
    $pekerja = Cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>HALAMAN INDEX ADMIN</title>
	<meta charset="UTF-8">
	<meta name="description" content="HALO photography portfolio template">
	<meta name="keywords" content="photography, portfolio, onepage, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>

	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style>
		
	</style>
</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section start -->
	<header class="header-section sp-pad">
        <center><h1 class="site-logo">Selamat Datang di Website Resmi Den's IT Company</h1></center>
        <br>
        <br>
		<div class="nav-switch">
			<i class="fa fa-bars"></i>
		</div>
		<nav class="main-menu">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="tentangkami.php">Tentang Kami</a></li>
				<li><a href="/TubesFIX/web/Tambahdata/tambahdatapekerja.php">Pendaftaran Pekerja Baru</a></li>
				<li><a href="/TubesFIX/web/logout.php">Log Out</a></li>
				<li><a href="#">Hubungi Perusahaan Kami</a></li>
			</ul>
		</nav>
	</header>
	<!-- Header section end -->


    <!-- Hero section start -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
            <div class="hs-item set-bg sp-pad" data-setbg="img/hero-slider/1.jpg">
				<div class="hs-text">
					<p class="hs-des"><br><br><br>Den's IT Company<br>Talk Less, Ngoding More :)</p>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->


	<!-- Intro section start -->
	<section class="intro-section sp-pad spad">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-4 intro-text">
					<span class="sp-sub-title">Sedikit Tentang Kami</span>
					<h3 class="sp-title">Den's IT Company</h3>
					<p>Merupakan Salah Satu Perusahaan IT Terbesar di Malang Raya
						Terdapat bermacam karyawan, pekerja dan profesi yang ada di sana
						Letaknya pun cukup strategis dan mudah dijangkau karena berada di jalan besar</p>
					<a href="tentangkami.php" class="site-btn">Klik untuk lebih lanjut</a>
				</div>
				<div class="col-xl-7 offset-xl-1">
					<figure class="intro-img mt-5 mt-xl-0">
						<img src="img/it.jpeg" alt="">
					</figure>
				</div>
			</div>
		</div>
	</section>
	<!-- Intro section end -->

	<form action="" method="post">
		<input type="text" name="keyword" size="40" class="form-control"
		placeholder="Cari Daftar Pekerja" autocomplete="off">
        <button type="submit" name="cari"> Cari</button>
	</form>
	<br><br>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Umur</th>
					<th>Pendidikan Terakhir</th>
					<th>Pengalaman Kerja</th>
					<th>Alamat</th>
					<th>Pekerjaan yang Diinginkan</th>
					<th>Opsi Aksi</th>
				</tr>
			</thead>
			<?php $i=1 ?>
			<?php foreach($pekerja as $row):?>
			<tbody>
				<tr>
					<td><?= $i; ?></td>
					<td><?= $row["Nama"]; ?></td>
					<td><?= $row["Umur"]; ?></td>
					<td><?= $row["Pendidikan_Terakhir"]; ?></td>
					<td><?= $row["Pengalaman_Kerja"]; ?></td>
					<td><?= $row["Alamat"]; ?></td>
					<td><?= $row["Pekerjaan_yang_Diinginkan"]; ?></td>
					<td>
						<div class="p-t-10">
							<a button class="btn btn--pill btn--green" 
							name="back" type="submit" href="/TubesFIX/web/editdatapekerja.php ?id=<?php echo $row["id"];?>">Edit</button></a>
							<a button class="btn btn--pill btn--green" 
							name="back" type="submit" href="/TubesFIX/web/hapusdatapekerja.php ?id=<?php echo $row["id"];?>"onclick="return confirm('Apakah data ini akan dihapus')">Hapus</button></a>
						</div>
					</td>
				</tr>
				<?php $i++ ?>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
	<br><br>
	<br><br>
	<br><br>
	<!-- Portfolio section start -->
	<section class="portfolio-section">
		<div class="portfolio-warp">
			<!-- single item -->
			<div class="single-portfolio set-bg" data-setbg="img/itm.png">
				<a href="itmanager.php" class="portfolio-info">
					<div class="pfbg set-bg" data-setbg="img/itm.png"></div>
					<h5>IT MANAGER</h5>
					<p>KLIK untuk melihat Deskripsi</p>
				</a>
			</div>
			<!-- single item -->
			<div class="single-portfolio set-bg" data-setbg="img/systemanalys.jpg">
				<a href="systemanalys.php" class="portfolio-info">
					<div class="pfbg set-bg" data-setbg="img/systemanalys.jpg"></div>
					<h5>SYSTEM ANALYS</h5>
					<p>KLIK untuk melihat Deskripsi</p>
				</a>
			</div>
			<!-- single item -->
			<div class="single-portfolio set-bg" data-setbg="img/programmer.jpg">
				<a href="programmer.php" class="portfolio-info">
					<div class="pfbg set-bg" data-setbg="img/programmer.jpg"></div>
					<h5>PROGRAMMER</h5>
					<p>KLIK untuk melihat Deskripsi</p>
				</a>
			</div>
			<!-- single item -->
			<div class="single-portfolio  set-bg" data-setbg="img/wd.jpg">
				<a href="webdesigner.php" class="portfolio-info">
					<div class="pfbg set-bg" data-setbg="img/wd.jpg"></div>
					<h5>WEB DESIGNER</h5>
					<p>KLIK untuk melihat Deskripsi</p>
				</a>
			</div>
			<!-- single item -->
			<div class="single-portfolio set-bg " data-setbg="img/ne.jpg">
				<a href="networkengineer.php" class="portfolio-info">
					<div class="pfbg set-bg" data-setbg="img/ne.jpg"></div>
					<h5>NETWORK ENGINEER</h5>
					<p>KLIK untuk melihat Deskripsi</p>
				</a>
			</div>
			<!-- single item -->
			<div class="single-portfolio set-bg " data-setbg="img/erp.jpg">
				<a href="erpconsultant.php" class="portfolio-info">
					<div class="pfbg set-bg" data-setbg="img/erp.jpg"></div>
					<h5>ERP CONSULTANT</h5>
					<p>KLIK untuk melihat Deskripsi</p>
				</a>
			</div>
		</div>
		<div class="clearfix"></div>
	</section>
	<!-- Portfolio section end -->

		<div class="service-more-link">
			<a href="#" class="arrow-btn">
				<i class="fa fa-angle-right"></i>
				<i class="fa fa-angle-right"></i>
				<i class="fa fa-angle-right"></i>
			</a>
		</div>

	<!-- Footer section start -->
	<footer class="footer-section spad">
		<div class="container text-center">
			<h2>Let’s work together!</h2>
			<p>www.den'sitcompany@gmail.com</p>
			<div class="social">
				<a href="#"><i class="fa fa-pinterest"></i></a>
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-dribbble"></i></a> </br>
			</div>
		</div>
	</footer>
	<!-- Footer section end -->
	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/mixitup.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>