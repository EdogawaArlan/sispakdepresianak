<?php
	include 'header.php';
	include '../class/class_user.php';
	$obj 			= new cl_user($cn);
	if(isset($_POST['simpan']))
	{
		$a	 	= trim($_POST['t1']);
		$b		= trim($_POST['t2']);
		$c		= trim($_POST['t3']);
		$d		= trim($_POST['t4']);
		$obj->add_user($a,$b,$c,$d);
	}		
?>
<script>
	document.getElementById("pengguna").setAttribute("class", "active");
</script>
<!-- Judul Form -->
<br>
<div class="w3-card-4" style="width:50%; margin-left:25%">
		<div class="w3-container btn-kuning">
			<h2>Input User </h2>
		</div>
		<form name="form" action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" class="w3-container">
		<table class='tbl2'>
			<tr>
				<td>Nama</td>
				<td><input type='text' name='t1'  class="w3-input w3-border w3-sand w-300"/></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type='text' name='t2'  class="w3-input w3-border w3-sand w-300"/></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type='text' name='t3'  class="w3-input w3-border w3-sand w-300"/></td>
			</tr>
			<tr>
				<td>Hak Akses</td>
				<td><select name='t4' class="w3-input w3-border w3-sand w-300">
						<option value='USER'> User </option>
						<option value='ADMINISTRATOR'> Administrator </option>
				</select></td>
			</tr>
			<tr>
				<td colspan='2'><input type="submit" name="simpan" value="Simpan" class="btn btn-besar btn-biru" />
				<a href='view_pengguna.php' class="btn btn-besar btn-hijau">Batal</a></td>
			</tr>
		</table>
	
			
			<center>
			<p>
				
			</p>
			</center>
		</form>
		<div class="w3-container btn-kuning">
			<p>Note: halaman input user.</p>
		</div>
	</div>
<div class="clear"></div><br>

<?php
	include 'footer.php';
?>
