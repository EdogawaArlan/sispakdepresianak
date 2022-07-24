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
	include '../class/class_koneksi.php';
	$cn 	= new cl_conn();
?>

<html>
<head>
	<title>Sistem Pakar Diagnosis Depresi Anak</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css" />
	<link rel="stylesheet" href="../css/menu.css" type="text/css" />
	<link rel="stylesheet" href="../css/cus.css" type="text/css" />
	<script src="../koneksi/jquery.js"></script>
	<script src="../js/autoNumeric.js"></script>
</head>

<body>
	<div id="wrapper">
		<div id="header"></div>
			<div class='w-container w-birumuda'>
			<!-- Menu -->
			<div class="navbar">
				<a id="home" href="index.php"><img class="ico" src="../images/home.png" height='20' />Home</a>
				<a id="infopenyakit" href="jenispenyakitutama.php"><img class="ico" src="../images/file.png" height='20' />Info Penyakit</a>
				<a id="diagnosa" href="view_diagnosa.php"><img class="ico" src="../images/stethoscope.png" height='20' />Diagnosa</a>
				<a id="data" href="view_data_diagnosa.php"><img class="ico" src="../images/result1.png" height='20'/>Data Diagnosa</a>
				<a id="infopengembang" href="view_pengembang.php"><img class="ico" src="../images/info.png" height='20'/>Info Pengembang</a>
				<a id="bantuan" href="view_bantuan.php"><img class="ico" src="../images/help.png" height='20'/>Bantuan</a>
				<div style="float:right;">
					<a id="profil" href="profil.php"><img class="ico" src="../images/profil.png" height='20'/>Profil</a>
					<a href="../logout.php"><img class="ico" src="../images/logout.png" height='20' />LogOut</a>
				</div>
			</div>
		</div>

		<!-- Batas Menu -->

	
