<?php
	class penyakit
	{
		protected $db;

		public function __construct($cn)
		{
			$this->db =$cn;
		}
		//Tampil barang penyakit
		public function tampil_penyakit()
		{
			$link = $this->db->db_conn();

			$qr		= mysqli_query($link,"SELECT * FROM tbl_penyakit");
			$num 	= mysqli_num_rows($qr);
			if($num > 0)
			{
				$no =1;
				while ($rw = mysqli_fetch_array($qr))
				{
					echo "<tr '>
									<td>".$no."</td>
									<td>".$rw['kode_penyakit']."</td>
									<td>".$rw['nama_penyakit']."</td>
									<td align='center'>
										<a href='edit_penyakit.php?id=".$rw['id']."' class='btn btn-kecil btn-biru'>
										<img class='ico' src='../images/edit.png' height='13'/> Edit</a>
										
										<a href='hapus_data.php?id=".$rw['kode_penyakit']."&kol=kode_penyakit&tbl=tbl_penyakit&lok=view_penyakit' class='btn btn-kecil btn-merah'>
										<img class='ico' src='../images/delete.png' height='13'/>Hapus</a>
										
									</td>
							";
					$no++;
				}
			}
		}
		
		public function tampil_penyakit_home()
		{
			$link = $this->db->db_conn();

			$qr		= mysqli_query($link,"SELECT * FROM tbl_penyakit ");
			$num 	= mysqli_num_rows($qr);
			if($num > 0)
			{
				
				for ($no =0; $no<$num; $no++)
				{
					$rw = mysqli_fetch_array($qr);
					$output = "<div class='gallery'>
												<img src='../images/".$rw['gambar']."' width='100' height='100'/>'
											<div class='desc'>".$rw['nama_penyakit']."</div>
										</div>";
					if ($num < 4)
					{
						echo $output;
					}
					else if ($num < 8)
					{
						echo $output;
					}
					else if ($num < 12)
					{
						echo $output;
					}
					else if ($num < 16)
					{
						echo $output;
					}
				}
				
				
			}
		}
		
		//Insert data  ============================================
		public function add_penyakit( $a,$b,$namafl)
		{		
			$link = $this->db->db_conn();

			if ((empty($a)) || (empty($b)))
			{
				{?>
					<script language="javascript">
						alert ('Kode penyakit dan nama penyakit harus diisi.');
					</script>
				<?php }
			} 
			else
			{
				$qr		= mysqli_query($link,"SELECT * FROM tbl_penyakit WHERE kode_penyakit='".$a."'");
				$count	= mysqli_num_rows($qr);
				if ($count > 0) 
				{?>
					<script language="javascript">
						alert ('Kode penyakit yang anda masukan sudah terdaftar. Masukan kode penyakit yang belum terdaftar.');
						window.location ="view_penyakit.php";
					</script> <?php
				} else {
					$qr	= mysqli_query($link,"INSERT INTO tbl_penyakit(kode_penyakit,nama_penyakit,gambar) 
								  VALUES('$a','$b','".$namafl."')")or die (mysqli_error());
					if ($qr)
					{
						?>
						<script language="javascript">
							alert ('Data berhasil disimpan.');
							window.location ="view_penyakit.php";
						</script> 
						<?php
					}
					else
					{?>
						<script language="javascript">
							alert ('Data gagal disimpan. Pastikan file gambar benar.');
						</script>
					<?php }
				}
			}
			
		}		
		
		//memanggil data satu persatu========================================================
		public function penyakit_pilih($var,$id)
		{
			$link = $this->db->db_conn();

			$qr = mysqli_query($link,"SELECT * FROM tbl_penyakit WHERE id = '$id'");
			$hasil = mysqli_fetch_array($qr);
			if ($var == '1')
				return $hasil['kode_penyakit'];
			else if ($var == '2')
				return $hasil['nama_penyakit'];
			else if ($var == '3')
				return $hasil['kategori'];
			else if ($var == 'id')
				return $hasil['id'];
		}
		
		public function penyakit_update($a,$b,$namafl,$id)
		{
			$link = $this->db->db_conn();
			//simpan ke dalam database		
			if($namafl != "" || $namafl != NULL)
			{
				$txfl = ", gambar='$namafl'";
			}
			else{
			if ((empty($a)) || (empty($b)))
			{
				{?>
					<script language="javascript">
						alert ('Kode penyakit dan nama penyakit harus diisi.');
					</script>
				<?php }
			} else {
			{
				$txfl = "";
			}
			$qr	= mysqli_query($link,"UPDATE tbl_penyakit SET kode_penyakit='$a',nama_penyakit='$b'".$txfl." WHERE id='$id' ")or die (mysqli_error());
			if ($qr)
			{
				?>
				<script language="javascript">
					alert ('Data berhasil disimpan.');
					window.location ="view_penyakit.php";
				</script> 
				<?php
			}
			else
			{?>
				<script language="javascript">
					alert ('Data gagal disimpan. Pastikan file gambar benar.');
				</script>
			<?php }
		}
	} 
}		
			
		
		public function no_penyakit($txt,$col,$tbl)
		{
			$link = $this->db->db_conn();
			$qr		= mysqli_query($link,"SELECT ".$col." FROM ".$tbl." ORDER BY ".$col." DESC LIMIT 1")or die (mysqli_error());
			$rw 	= mysqli_fetch_array($qr);
			$cn 	= $rw[$col];
			$idf	= substr($cn,1,2);
			$idf1	= intval($idf) + 1;
			$ars 	= sprintf("%02d", $idf1);
			return $no_fa = $txt.$ars ;
		}	
		
		function list_penyakit($gjl=null,$tbl=null,$col=null)
		{
			$link = $this->db->db_conn();
			if($col !=null)
			{
				$coln	= ",".$col;
			}
			else
			{
				$coln	= "";
			}
			$i 		= 1;
			$qr 	= mysqli_query($link,"SELECT * FROM tbl_penyakit ORDER BY kode_penyakit");
			$row 	= mysqli_num_rows($qr);
			if ($row > 0)
			{
				while($data = mysqli_fetch_array($qr))
				{ 
					$kd_p	= $data['kode_penyakit'];
					if ($tbl !=null)
					{
						$qr1	= mysqli_fetch_array(mysqli_query($link,"SELECT kode_penyakit ".$coln." FROM ".$tbl." WHERE kode_penyakit='$kd_p' AND ".$col."='$gjl'"));
						$kd_r	= $qr1['kode_penyakit'];
						if ($kd_r == $kd_p)
						{
							$chk	= "checked";
						}
						else
						{
							$chk	= "";
						}
					}
					else
					{
						$chk	= "";
					}
					
					echo "
						<p><input ".$chk." name='txt_gjl[]' value='".$data['kode_penyakit']."' type='checkbox'/>".$data['penyakit']."</p>
					";
					$i++;
				}
			}
		}
		
		
	
	
	}
?>