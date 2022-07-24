<?php
	include 'header.php';
	include '../class/class_user.php';
	$obj 		= new cl_user($cn);
	$id	        = $_GET['id'];
	if(isset($_POST['simpan']))
	{
		$a 	= trim(($_POST['t1']));
		$b 	= trim($_POST['t2']);
		$c 	= trim($_POST['t3']);
		$d 	= trim($_POST['t4']);
		$obj->user_update($a,$b,$c,$d,$id);
	}		
?>
<script>
	document.getElementById("pengguna").setAttribute("class", "active");
</script>
<!-- Judul Form -->
<br>
<div id="content">
	<div class="input-form" >
		<div class="w3-container btn-biru">
			<h2>Edit User </h2>
		</div>
		<form name="form" action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" class="w3-container">
			<p>      
				<label class="w3-text-blue"><b>Nama</b></label>
				<input type='text' name='t1'  class="w3-input w3-border w3-sand" value="<?php echo $obj->tampil_profil("nama", $id ) ?>"/>
			</p>
			<p>      
				<label class="w3-text-blue"><b>Username</b></label>
				<input type='text' name='t2'  class="w3-input w3-border w3-sand" value="<?php echo $obj->tampil_profil("user", $id ) ?>"/>
			</p>
			<p>      
				<label class="w3-text-blue"><b>Password</b></label>
				<input type='text' name='t3'  value="<?php echo $obj->tampil_profil("pass", $id ) ?>" class="w3-input w3-border w3-sand"/>
			</p>
			<p>      
				<label class="w3-text-blue"><b>Hak Akses</b></label>
				<select name='t4' class="w3-input w3-border w3-sand">
						<option value='<?php echo $obj->tampil_profil("hak", $id ) ?>' selected><?php echo $obj->tampil_profil("hak", $id ) ?></option>
						<option value='USER'> USER</option>
						<option value='ADMINISTRATOR'> ADMINISTRATOR</option>
				</select>
			</p>
			<center>
			<p>
				<input type="submit" name="simpan" value="Simpan" class="btn btn-besar btn-biru" />
				<a href='view_pengguna.php' class="btn btn-besar btn-merah">Batal</a>
			</p>
			</center>
		</form>
		<div class="w3-container btn-biru">
			<p>Note: halaman edit user.</p>
		</div>
	</div>
</div>
<div class="clear"></div><br>

<?php
	include 'footer.php';
?>
