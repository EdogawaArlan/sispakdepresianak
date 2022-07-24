<script>
    window.print();
</script>
<link rel="stylesheet" href="../css/style.css" type="text/css" />
<link rel="stylesheet" href="../css/menu.css" type="text/css" />
<link rel="stylesheet" href="../css/cus.css" type="text/css" />
<?php
	session_start(); 
	include "../class/class_koneksi.php";
	$cn = new cl_conn();
	include '../class/class_diagnosa.php';
	$obj	= new diagnosa($cn);
	$user	= $_SESSION['pass'];
	$log 	= $_GET['log'];	
  $peny 	= isset($_GET['peny'])?$_GET['peny']:null;	
?>
<!--  ---------------------------------------  -->
<center>
<div id="content">

	<table width='100%' style='border:1'>
		<tr height='40'  class='fn24 wh fnb w3-grey'><td colspan='2' style='background-color:#FFFF00'> >> Hasil Diagnosa</td></tr>
		<hr>
		<tr height='20'><td></td><td></td></tr>
		<?php $obj->view_detail_diagnosa($log,$peny)?>
		
		<tr height='20'><td colspan='2' class="fn16 gr2 btn-biru"></td></tr>
	</table>

</div>
</center>

