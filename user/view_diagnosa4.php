<?php
include 'header.php';
include '../class/class_diagnosa.php';
$obj	= new diagnosa($cn);
$user	= $_SESSION['pass'];
$log 	= $_SESSION['log'];
$peny 	= isset($_GET['id']) ? $_GET['id'] : null;
// echo json_encode(['$log' => $log, 'peny' => $peny]);
// die;
?>
<script>
	document.getElementById("diagnosa").setAttribute("class", "active");
</script>
<!--  ---------------------------------------  -->
<center>
	<div id="content">
		<div class='container-fix'>
			<table class='w-100p' border='0'>
				<tr class='h-40'>
					<td colspan='2' class="fn24 wh fnb w3-orange"> >> Hasil Diagnosa</td>
				</tr>
				<tr class='h-20'>
					<td></td>
					<td></td>
				</tr>
				<?php $obj->view_temp_diagnosa($log, $peny) ?>
				<?php $obj->del_unused_diagnosa($log) ?>

				<tr class='h-30'>
					<td colspan='2' class="fn16 gr2 btn-biru"></td>
				</tr>
				<tr class='h-50'>
					<td></td>
					<td class='w-200'>
						<a href='view_data_diagnosa.php' class="btn btn-besar btn-biru"><img class="ico" src="../images/plus.png" height='13' /> Selesai</a>
						<a href='print_diagnosa.php?id=<?php echo $peny ?>&log=<?php echo $log ?>' target='_blank' class="btn btn-besar btn-merah"><img class="ico" src="../images/plus.png" height='13' /> Print</a>
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