<?php
	include 'header.php';
	include '../class/class_relasi.php';
?>
<script>
	document.getElementById("relasi").setAttribute("class", "active");
</script>
<!--  ---------------------------------------  -->

<div id="content">
	<div class='container-fix'>
		<br>
		<table class="tbl_view w-100p">
			<thead>
				<th width="20">No</th>
				<th width="80">Nama Penyakit</th>
				<th width="140">Nama Gejala</th>
				<th width="180">Solusi</th>
				<th width="120">Action</th>
			</thead>
			<tbody>
			<?php
				$obj = new relasi($cn);
				$obj->tampil_relasi();
			?>
			</tbody>
		</table>
	</div>
</div>

<!-- Footer--------------------------------->

<?php
	include 'footer.php';
?>
