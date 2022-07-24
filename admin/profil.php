<?php
	include 'header.php';
	include '../class/class_user.php';
	$obj 		= new cl_user($cn);
	$id			= $_SESSION['pass'];
	//$id			= "1";
	if(isset($_POST['simpan']))
	{
		$a	 	= trim($_POST['t1']);
		$b		= trim($_POST['t2']);
		$obj->simpan_profil($a,$b,$id);
	}		
?>
<script>
	document.getElementById("profil").setAttribute("class", "active");
</script>
<!-- Judul Form -->
<br>
<div class="w3-card-4" style="width:50%; margin-left:25%">
		<div class="w3-container btn-biru">
			<h2>Profil User </h2>
		</div>
		<form name="form" action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" class="w3-container">
			<p>      
				<label class="w3-text-blue"><b>Nama</b></label>
				<input type='text' name='t1'  class="w3-input w3-border w3-sand" value="<?php echo $obj->tampil_profil("nama", $id ) ?>"/>
			</p>
			
			<p>      
				<label class="w3-text-blue"><b>Password</b></label>
				<input type='password' name='t2'  class="w3-input w3-border w3-sand" value="<?php echo $obj->tampil_profil("pass", $id ) ?>"/>
			</p>
			<p>      
				<label class="w3-text-blue"><b>Username            : </b></label>
				<label class="w3-text-red"><b><?php echo $obj->tampil_profil("user", $id ) ?></b></label>
			</p>
			<p>      
				<label class="w3-text-blue"><b>Hak Akses : </b></label>
				<label class="w3-text-red"><b><?php echo $obj->tampil_profil("hak", $id ) ?></b></label>
			</p>
			<center>
			<p>
				<input type="submit" name="simpan" value="Simpan" class="btn btn-besar btn-biru" />
			</p>
			</center>
		</form>
			<div class="w3-container btn-biru">
			<p>Note: anda bisa mengganti nama dan password di halaman ini.</p>
		</div>
	</div>

<div class="clear"></div><br>

<?php
	include 'footer.php';
?>
