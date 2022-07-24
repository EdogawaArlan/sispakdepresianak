<?php
	include 'header.php';
	include '../class/class_solusi.php';
	$obj			= new solusi($cn);
	if(isset($_POST['simpan']))
	{
		$a	 	= trim(strtoupper($_POST['t1']));
		$b		= trim(strtoupper($_POST['t2']));
		$obj->add_solusi($a,$b);
	}		
?>
<script>
	document.getElementById("solusi").setAttribute("class", "active");
</script>
<!-- Judul Form -->
<br>

<!-- Form Input Data-->
<div id="content">
	<div class="input-form" >
		<div class="w3-container w3-orange" >
			<h2>Input Master Solusi</h2>
		</div>
		<form name="form" action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" class="w3-container">
		<table class='tbl2'>
			<tr>
				<td width='100'><label class="w3-text-blue">Kode solusi</label></td>
				<td width='250'><input type='text' name='t1' value=''class="w3-input w3-border w3-sand"/></td>
			</tr>
			<tr>
				<td>	<label class="w3-text-blue">Nama solusi	</label></td>
				<td><textarea rows='3' name='t2' class='w3-input w3-border w3-sand'></textarea></td>
			</tr>
			<tr height='30'></tr>
			<tr>
				<td colspan='2'><center>
				<input type="submit" name="simpan" value="Simpan" class="btn btn-besar btn-biru" />
				<a href='view_solusi.php' class="btn btn-besar btn-hijau">Batal</a>
				</center></td>
			</tr>
		</table>
		</form>
		<div class="w3-container w3-orange">
			<p>Note: masukan data solusi dengan benar</p>
		</div>
	</div>
</div>

<?php
	include 'footer.php';
?>

