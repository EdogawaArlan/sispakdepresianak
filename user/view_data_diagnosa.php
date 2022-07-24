<?php
	include 'header.php';
	include '../class/class_diagnosa.php';
	include '../class/class_hapus.php';
	$obj	= new diagnosa($cn);
	$hps	= new hapus($cn);
	$user	= $_SESSION['pass'];
	$lok 	= "view_data_diagnosa";
?>
<script>
	document.getElementById("data").setAttribute("class", "active");
</script>
<!--  ---------------------------------------  -->

<div id="content">
	<div class='container-fix'>
	<br>
		<form method='post'>
		<br>
		<br>
			<table class="tbl_view w-100p fn12">
				<tr>
					<th>Tanggal</th>
					<th>Nama</th>
					<th>Kode Diagnosa</th>
					<th>Penyakit Anak</th>
					<th>Action</th>
				</tr>
				<?php $obj->tampil_diagnosa_user($user,$lok) ?>
			</table>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
		</form>
	</div>
</div>
<!-- Footer--------------------------------->

<?php
	include 'footer.php';
?>
