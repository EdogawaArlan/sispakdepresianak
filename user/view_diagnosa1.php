<?php

	include 'header.php';
	include '../class/class_gejala.php';
	include '../class/class_lokasi.php';
	$obj	= new gejala($cn);
	$lok	= new lokasi();
	$user	= $_SESSION['pass'];
	$log 	= date("YmdHis");
	
 	unset($_SESSION['$log']);

 	if(isset($_POST['next']))
	{
		$_SESSION['log'] = $log;
		if (!empty($_POST['txt_gjl'])){
			$i=0;
			$x= count($_POST['txt_gjl']);
			while($i<$x)
			{
				$a	 = $_POST['txt_gjl'][$i];
				$obj->add_gejala_tmp($a,$user,$log);
				$i++;
			}
		}
		$obj->copy_gejala_tmp($user,$log);
		$obj->hapus_gejala_tmp($user);
		$lok->lokasi_file('view_diagnosa4');			
			
	}
?>
<script>
	document.getElementById("diagnosa").setAttribute("class", "active");
</script>
<!--  ---------------------------------------  -->
<form method='post'>
<div id="content">
	<div class='container-fix'>
		<table class='w-100p' border='0'>
			<tr class='h-40'><td class='w-10'></td><td class="fn24 fnb w3-orange"> Pilih beberapa gejala yang tampak dilihat pada Anak </td></tr>
			<tr class='h-20'><td></td><td></td></tr>
			<?php 
				$obj->view_gejala();	
			?>
			<tr class='h-20'><td></td><td class="fn16 gr2"></td></tr>
			<tr class='h-40'><td></td><td>
				<button type='submit'  class="btn btn-besar btn-biru" name='next'>Teruskan >></button>
			</td></tr>
		</table>
	</div>
</div>
</form>


<!-- Footer--------------------------------->

<?php
	include 'footer.php';
?>
