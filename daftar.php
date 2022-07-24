<?php
	include 'class/class_user.php';
    include 'class/class_koneksi.php';
	$cn 	= new cl_conn();
	$obj = new cl_user($cn);
	if(isset($_POST['simpan']))
	{
		$a	 	= trim($_POST['t1']);
		$b		= trim($_POST['t2']);
		$c		= trim($_POST['t3']);
		//$d		= trim($_POST['t4']);
		$obj->add_user($a,$b,$c,"USER");
	}		
?>

<!--  ---------------------------------------  -->
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
		<form method='post'>

			<!-- Tabel Awal 2-->
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<table width="500" border="0" align="center" bgcolor="" >
					<tr>
						<td colspan="4" align="center" bgcolor=" #B0C4DE" style="padding:10px;"><p class="fn16 wh fnb">Daftar Akun</p></td>
					</tr>

					<tr>
						<td width="20">&nbsp;</td>
						<td width="110">&nbsp;</td>
						<td width="3">&nbsp;</td>
						<td width="130">&nbsp;</td>
					</tr>
			
				<tr>
					<td>Nama</td>
					<td><input type='text' name='t1'  style="width:500px;"/></td>
				</tr>
				<tr>
					<td>Id</td>
					<td><input type='text' name='t2'  class="w3-input w3-border w3-sand w-100p"/></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type='text' name='t3'  class="w3-input w3-border w3-sand w-100p"/></td>
				</tr>				
				<tr height='50'>
					<td></td>
					<td colspan=''><input type="submit" name="simpan" value="Daftar" class="btn btn-besar btn-biru" />
					<a href='daftar.php' class="btn btn-besar btn-merah">Reset<br/></a>
					<a href='index.php' class="btn btn-besar btn-hijau">Kembali</a></td>

				<tr>

						<td colspan="4">&nbsp;</td>
					</tr>
				</table>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
			</form>

<!-- Footer--------------------------------->
<div id="footer" align="center">
		<span class='wh'>
		<br />
		Copyright &copy; UNSIKA 2022 by Arlan Maulana
	</div>
</div>
</body>
</html>
