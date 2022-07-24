	<?php
	include 'header.php';
	include '../class/class_diagnosa.php';
	$obj	= new diagnosa($cn);
	$user	= $_SESSION['pass'];
	$log 	= $_GET['log'];	
  $peny 	= isset($_GET['peny'])?$_GET['peny']:null;	
?>
<script>
	document.getElementById("laporan").setAttribute("class", "active");
</script>
<!--  ---------------------------------------  -->
<center>
<div id="content">
	<div class='container-fix'>
		<table class='w-100p' border='0>
			<tr class='h-40'><td colspan='2' class="fn14 wh fnb w3-orange"> >> Hasil Diagnosa</td></tr>
			<tr class='h-20'><td></td><td></td></tr>
			<?php $obj->view_detail_diagnosa($log,$peny)?>
			
			<tr class='h-30'><td colspan='2' class="fn12 gr2 btn-biru"></td></tr>
			<tr class='h-50'>
				<td colspan='2' >
					<a href='view_laporan.php'  class="btn btn-besar btn-biru"><img class="ico" src="../images/plus.png" height='13'/>	Tutup</a>
					<a href='print_diagnosa.php?peny=<?php echo $peny ?>&log=<?php echo $log ?>' target='_blank' class="btn btn-besar btn-merah"><img class="ico" src="../images/plus.png" height='13'/>	Print</a>
				</td>
			</tr>
		</table>
	</div>
</div>
</center>
<!-- Footer--------------------------------->

<?php
	include 'footer.php';
?>
