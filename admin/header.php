<?php
	session_start(); 
	if(!isset($_SESSION['user']) || !isset($_SESSION['pass'])) 
	{ 
	?>
	<script language="javascript">
			alert("Anda belum login. Silahkan login dulu !"); 
			document.location='../index.php';
        </script>
  	<?php
	}
	include "../class/class_koneksi.php";
	ob_start();
	$cn = new cl_conn();
?>

<html>
<head>
	<title>Sistem Pakar Diagnosis Penyakit Ayam Broiler</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css" />
	<link rel="stylesheet" href="../css/menu.css" type="text/css" />
	<link rel="stylesheet" href="../css/cus.css" type="text/css" />
	<script src="../koneksi/jquery.js"></script>
</head>

<body>
	<div id="wrapper">
		<div id="header"></div>
		<!-- Menu -->
		<div class='w-container w-birumuda'>
			<div class="navbar">
				<a id="home" href="index.php"><img class="ico" src="../images/home.png" height='20' />Home</a>
				<a id="infopenyakit" href="jenispenyakitutama.php"><img class="ico" src="../images/file.png" height='20' />Info Penyakit</a>
				<a id="penyakit" href="view_penyakit.php"><img class="ico" src="../images/test.png" height='20' />Penyakit</a>
				<a id="gejala" href="view_gejala.php"><img class="ico" src="../images/stethoscope.png" height='20'/>Gejala</a>
				<a id="solusi" href="view_solusi.php"><img class="ico" src="../images/ambulance.png" height='20'/>Solusi</a>
				<a id="relasi" href="view_relasi.php"><img class="ico" src="../images/arsip.png" height='20'/>Relasi</a>
				<a id="pengguna" href="view_pengguna.php"><img class="ico" src="../images/account.png" height='20'/>Kelola User</a>
				<a id="laporan" href="view_laporan.php"><img class="ico" src="../images/help1.png" height='20'/>Laporan</a>
				<div style="float:right;">
					<a id="profil" href="profil.php"><img class="ico" src="../images/profil.png" height='20'/>Profil</a>
					<a href="../logout.php"><img class="ico" src="../images/logout.png" height='20' />LogOut</a>
				</div>
		  </div>
		</div>

		<!-- Batas Menu -->

	
