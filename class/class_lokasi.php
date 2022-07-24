<?php
class lokasi
{
	function lokasi_file($lok)
	{
		?>
			<script language="javascript">
				//alert ('Data Berhasil Disimpan');
				window.location ="<?php echo $lok.".php" ?>";
			</script> 
		<?php
	}


}
?>