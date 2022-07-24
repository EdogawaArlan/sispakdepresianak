<?php
include "../class/class_koneksi.php";
ob_start();
$cn = new cl_conn();
$id 	= ($_GET['id'])?$_GET['id']:'';
$col 	= ($_GET['kol'])?$_GET['kol']:'';
$tbl 	= ($_GET['tbl'])?$_GET['tbl']:'';
$lok 	= ($_GET['lok'])?$_GET['lok']:'';
	if($id !=null && $tbl!=null)
	{
		$qr	= mysqli_query($cn->db_conn(),"DELETE FROM ".$tbl." WHERE ".$col." ='$id' ")or die (mysql_error());
		?><script language="javascript">
		alert("Data berhasil dihapus.");
		window.location="<?php echo $lok ?>.php";
		</script> <?php
	}
	else
	{
		?><script language="javascript">
		alert("Gagal menghapus data.");
		</script> <?php
	}	
?>