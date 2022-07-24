<?php
	include 'header.php';
	include '../class/class_user.php';
	$obj = new cl_user($cn);
	if(isset($_POST['simpan']))
	{
		$a 	= trim(($_POST['t1']));
		$b 	= trim($_POST['t2']);
		$c 	= trim($_POST['t3']);
		$d 	= trim($_POST['t4']);
		$obj->add_user2($a,$b,$c,$d);
	}
?>
<script>
	document.getElementById("pengguna").setAttribute("class", "active");
</script>
<!--  ---------------------------------------  -->

<div id="content">
	<div class='container-fix'>
		<form method='post'>
			<table class='tbl2'>
				<tr>
					<td colspan='2' class='fn14 btn-hijau'>Input User</td>
				</tr>
				<tr>
					<td>Nama</td>
					<td><input type='text' name='t1'  class="w3-input w3-border w3-sand w-100p"/></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type='text' name='t2'  class="w3-input w3-border w3-sand w-100p"/></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type='text' name='t3'  class="w3-input w3-border w3-sand w-100p"/></td>
				</tr>
				<tr>
					<td>Hak Akses</td>
					<td><select name='t4' class="w3-input w3-border w3-sand w-100p">
							<option value='USER'> User </option>
							<option value='ADMINISTRATOR'> Administrator </option>
					</select></td>
				</tr>
				
				<tr height='40'>
					<td></td>
					<td colspan=''><input type="submit" name="simpan" value="Tambah" class="btn btn-besar btn-biru" />
					<a href='view_pengguna.php' class="btn btn-besar btn-hijau">Reset</a></td>
				</tr>
			</table>
		</form>
		<br /><br />
		<table class="tbl_view w-100p">
			<thead>
				<th width="10">No</th>
				<th width="100">Nama</th>
				<th width="100">Username</th>
				<th width="100">Password</th>
				<th width="100">Hak Akses</th>
				<th width="80">Action</th>
			</thead>
			<tbody>
			<?php
				
				$obj->tampil_user();
			?>
			</tbody>
		</table>
	</div>
</div>

<!-- Footer--------------------------------->
<?php
	include 'footer.php';
?>
