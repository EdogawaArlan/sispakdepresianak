<?php 
class gambar
{
	function upload($namafile,$tipe,$ukuran,$file_sementara)
	{
		// Info file
		
	
			// Cek jenis file
			//if (!preg_match("image",$tipe)
		    if(!preg_match("/image\/*/",$tipe))
			{ ?>
				<div class="alert alert-danger" role="alert">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					<span class="sr-only">Error:</span>
					File tidak sesuai, hanya file gambar yang bisa di upload. <?php echo $tipe; ?>
				</div>
			<?php }
			else
			{
				// Cek ukuran file gambar
				if ($ukuran > 2000 * 1024)
				{?>
					<div class="alert alert-danger" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span>
						Ukuran file tidak boleh lebih dari 2MB.
					</div>
				<?php }
				else
				{
					$date					= date("Ymdhis");
					$namafl	 				= $namafile;
					$lokasi					= "/new/percobaan/images/";
					// Salin ke lokasi
					if ($res = copy($file_sementara, $_SERVER['DOCUMENT_ROOT'] . "$lokasi$namafl"))
					{
						
						if ($res)
						{
							unlink($file_sementara);
						}
					}
				}
			}
		
		
	}
	
	
	public function delete_gambar($file)
	{
		$fl	="/new/percobaan/images/".$file;
		//$fl	.= substr($file,2);
		$delete =unlink($_SERVER['DOCUMENT_ROOT'] . "$fl");
	}

		
}
?>




