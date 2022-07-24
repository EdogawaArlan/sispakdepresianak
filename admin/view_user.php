<?php
	include 'header.php';
	include '../class/class_user.php';
?>
<script>
	document.getElementById("pengguna").setAttribute("class", "active");
</script>
<!--  ---------------------------------------  -->

<div id="content">
	<div class='container-fix'>
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
		<table>
			<tr><td><a href='add_user.php'  class="btn btn-besar btn-hijau"><img class="ico" src="../images/plus.png" height='13'/>	Tambah</a></td></tr>
		</table>
		<table class="tbl_view">
			<thead>
				<th width="5%">No</th>
				<th width="30%">Nama</th>
				<th width="30%">Username</th>
				<th width="25%">Hak</th>
				<th width="13%"></th>
			</thead>
			<tbody>
			<?php
				$obj = new cl_user($cn);
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
