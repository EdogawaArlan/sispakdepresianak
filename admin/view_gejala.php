<?php
	include 'header.php';
	include '../class/class_gejala.php';
?>
<script>
	document.getElementById("gejala").setAttribute("class", "active");
</script>
<!--  ---------------------------------------  -->

<div id="content">
	<div class='container-fix'>
	<br>
		<table>
			<tr><td><a href='add_gejala.php'  class="btn btn-besar btn-hijau"><img class="ico" src="../images/plus.png" height='13'/>	Tambah</a></td></tr>
		</table>
		<br>
		<table class="tbl_view w-100p">
			<thead>
				<th width="20">No</th>
				<th width="80">Kode Gejala</th>
				<th width="140">Nama Gejala</th>
				<th width="100">Action</th>
			</thead>
			<tbody>
			<?php
				$obj = new gejala($cn);
				$obj->tampil_gejala();
			?>
			</tbody>
		</table>
	</div>
</div>

<!-- Footer--------------------------------->

<?php
	include 'footer.php';
?>
