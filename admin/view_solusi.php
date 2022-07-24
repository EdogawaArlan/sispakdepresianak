<?php
	include 'header.php';
	include '../class/class_solusi.php';
?>
<script>
	document.getElementById("solusi").setAttribute("class", "active");
</script>
<!--  ---------------------------------------  -->

<div id="content">
	<div class='container-fix'>
		<br><table>
		<br/>
		<br/>
			<tr><td><a href='add_solusi.php'  class="btn btn-besar btn-hijau"><img class="ico" src="../images/plus.png" height='13'/>	Tambah</a></td></tr>
		</table><br>
		<br/>
		<table class="tbl_view w-100p">
			<thead>
				<th width="20">No</th>
				<th width="80">Kode solusi</th>
				<th width="140">Nama solusi</th>
				<th width="120">Action</th>
			</thead>
			<tbody>
			<?php
				$obj = new solusi($cn);
				$obj->tampil_solusi();
			?>
			</tbody>
		</table>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
	</div>
</div>

<!-- Footer--------------------------------->

<?php
	include 'footer.php';
?>
