<?php 
	session_start();
	//include "koneksi/koneksi.php";
	//$obj_db	= new cl_conn();
	//$obj_db->db_conn();..
	include 'class/class_koneksi.php';
	include 'class/class_user.php';
	$cn 	= new cl_conn();
	$obj		= new cl_user($cn);
	if (isset($_REQUEST['masuk']))
		{
			$user=trim($_POST['username']);
			$pass=trim($_POST['pass']);
			$obj->validasi($user,$pass);
		}
?>
<!---------------->
<html>
<head>
	<title>Sistem Pakar Diagnosa Tingkat Depresi Anak</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body>
	<div id="wrapper">
		<div id="header"></div>
		<div id="bwheader"></div>
		<div id="content" align="center">
			<form method="post" action="index.php">

				<!-- Tabel Awal 2-->
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<table width="350" border="0" align="center" bgcolor="" >
					<tr>
						<td colspan="4" align="center" bgcolor="#B0C4DE" style="padding:7px;"><p class="fn16 wh fnb">Masuk Sebagai Pengguna</p></td>
					</tr>
					<tr>
						<td width="20">&nbsp;</td>
						<td width="110">&nbsp;</td>
						<td width="3">&nbsp;</td>
						<td width="130">&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td align="left" valign="middle"><p class="fn12 gr1">Id</p></td>
						<td align="left" valign="middle">:</td>
						<td><input class='w-200' type="text" name="username" id="username" /></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td align="left" valign="middle"><p class="fn12 gr1">Kata Sandi </p></td>
						<td align="left" valign="middle">:</td>
						<td><input class='w-200' type="password" name="pass" id="pass" /></td>
					</tr>
					<tr>
						<td colspan="4">&nbsp;</td>	
					</tr>
					
					
				</table>
				<table width="350" border="0" align="center" bgcolor="" >				
					<tr>
					  <td width="13%" align="center"><div align="center"></div></td>
					  <td width="29%" align="center"><input type="submit" name="masuk" style="content:close-quote" value="Masuk" class="w-100 btn btn-besar btn-hijau"></td>
					  <td width="58%" align="center"><input type="reset" name="reset" class="w-100 btn btn-besar btn-merah"></td>

			    <center>
				      <a class="link" href="daftar.php">Belum punya akun?</a>
			    </center>
			    
					<tr>
						<td colspan="4">&nbsp;</td>
					</tr>
				</table>
			<br/>
			<br/>
			<br/>
			<br/>
			</form>
<section id="hero" class="d-flex flex-column justify-content-end align-items-center">
		</div>
	<svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>
  </section><!-- End Hero -->
  
  <main id="main">

  </main><!-- End #main -->
  <?php include "footer.php"; ?>
</body>
</html>
