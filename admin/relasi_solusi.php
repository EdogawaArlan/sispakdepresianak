<?php
	include 'header.php';
	include '../class/class_penyakit.php';
	include '../class/class_solusi.php';
	include '../class/class_relasi.php';
	$obj			= new penyakit($cn);
	$obj_gj 	= new solusi($cn); 
	$obj_rel 	= new relasi($cn); 
	$id 			= $_GET['id'];
	$kd_gj	 	= $obj->penyakit_pilih('1',$id);
	if(isset($_POST['simpan']))
	{
		$obj_rel->del_relasi_solusi($kd_gj);
		
		if (!empty($_POST['txt_gjl'])){
			$i=0;
			$x= count($_POST['txt_gjl']);
			while($i<$x)
			{
				$txtgjl = $_POST['txt_gjl'][$i];
				$obj_rel->add_relasi_solusi($kd_gj,$txtgjl);
				$i++;
			} 
		}
		$obj_rel->page_location("view_relasi");		
	}		
?>
<script>
	document.getElementById("relasi").setAttribute("class", "active");
</script>
<!-- Judul Form -->
<br>

<!-- Form Input Data-->
<div id="content">
	<div class="input-form" >
		<div class="w3-container w3-orange" >
			<h1>Input Relasi Penyakit Dengan Solusi</h1>
		</div>
		<form name="form" action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" class="w3-container">
		<table class='tbl2'>
			<tr>
				<td width='100'><label class="w3-text-blue">Kode penyakit</label></td>
				<td width='250'><input type='text' name='t1'value='<?php echo $obj->penyakit_pilih('1',$id) ?>'class="w3-input w3-border w3-sand" disabled/></td>
			</tr>
			<tr>
				<td>	<label class="w3-text-blue">Nama penyakit</label></td>
				<td><input type='text' name='t2' class="w3-input w3-border w3-sand" value='<?php echo $obj->penyakit_pilih('2',$id) ?>' disabled/></td>
			</tr>
		</table>
		<br />
<!-- Tampil Data ================================================================================================-->	
		<table class='tbl2'>
			<tr>
				<td colspan='2'><label class="w3-text-blue"><h2>Pilih <span class='red'>Solusi </span>Sesuai Dengan Penyakit!</h2></label></td>
			</tr>
			<?php echo $obj_gj->list_solusi($kd_gj) ?>
			<tr height='30'></tr>
			<tr>
				<td colspan='2'><center>
				<input type="submit" name="simpan" value="Simpan" class="btn btn-besar btn-biru" />
				<a href='view_relasi.php' class="btn btn-besar btn-hijau">Batal</a>
				</center></td>
			</tr>
		</table>
		</form>
	</div>
</div>

<?php
	include 'footer.php';
?>

