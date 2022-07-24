<?php
	session_start(); 
	//periksa apakah user telah login atau memiliki session 
	if(!isset($_SESSION['user']) || !isset($_SESSION['pass'])) 
	{ 
	?>
		<script language="javascript">
			alert("Anda belum login. Silahkan login dulu !"); 
			document.location='../index.php';
        </script>
  	<?php
	}
	else
	{ 
		if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) 
		{
			$uri = 'https://';
		} 
		else 
		{
			$uri = 'http://';
		}
		$uri .= $_SERVER['HTTP_HOST'];
		header("Location: home.php");
		exit;
	}
 ?>