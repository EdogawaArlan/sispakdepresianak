<?php
	class relasi
	{
		protected $db;

		public function __construct($cn)
		{
			$this->db =$cn;
		}

		public function tampil_relasi()
		{
			$link = $this->db->db_conn();

			$qr			= mysqli_query($link,"SELECT * FROM tbl_penyakit");
			$num 		= mysqli_num_rows($qr);
			$arr_gjl	= array();
			$arr_sls	= array();
			$no = 1;
			if($num > 0)
			{
				while ($rw = mysqli_fetch_array($qr))
				{
					$nog	= 1;
					$nos	= 1;
					$qrGjl	= mysqli_query($link,"SELECT * FROM tbl_penyakit_gejala WHERE kode_penyakit='".$rw['kode_penyakit']."' ");
					$qrSls	= mysqli_query($link,"SELECT * FROM tbl_penyakit_solusi WHERE kode_penyakit='".$rw['kode_penyakit']."' ");					
					echo "<tr align='left'>
									
									<td>".$no."</td>
									<td>".$rw['nama_penyakit']."</td>
									<td align='left'>";
										while ($gjl	= mysqli_fetch_array($qrGjl))
										{
											$qrnGjl = mysqli_query($link,"SELECT * FROM tbl_gejala WHERE kode_gejala='".$gjl['kode_gejala']."'");
											$rwnGjl = mysqli_fetch_array($qrnGjl);
											echo  $nog .". ".$rwnGjl['nama_gejala']."<br>";
											$nog++;
										}
									echo "</td>									
									<td>";
										while ($sls	= mysqli_fetch_array($qrSls))
										{
											$qrnSls = mysqli_query($link,"SELECT * FROM tbl_solusi WHERE kode_solusi='".$sls['kode_solusi']."'");
											$rwnSls = mysqli_fetch_array($qrnSls);
											echo $nos .". ".$rwnSls['nama_solusi']."<br>";
											$nos++;
										}
									echo "</td>
												<td align='center'>
												<a href='relasi_gejala.php?id=".$rw['id']."' class='btn btn-besar btn-biru'>Gejala</a>
												<a href='relasi_solusi.php?id=".$rw['id']."' class='btn btn-besar btn-hijau'>Solusi</a>
											</td>
									";
						$no++;
				}
			}
		}
		
		//Insert data  ============================================
		public function add_relasi_gejala($a,$b)
		{
			$link = $this->db->db_conn();
			$qr	= mysqli_query($link,"INSERT INTO tbl_penyakit_gejala(kode_penyakit,kode_gejala) 
							  VALUES('$a','$b')")or die (mysqli_error());
		}	
		
		//Delete data  ============================================
		public function del_relasi_gejala($id)
		{
			$link = $this->db->db_conn();
			$qr	= mysqli_query($link,"DELETE FROM tbl_penyakit_gejala WHERE kode_penyakit='".$id."' ");
		}	
		
		//Page Location  ============================================
		public function page_location($txt)
		{
			$link = $this->db->db_conn();
			?>
				<script language="javascript">
					alert ('Data berhasil disimpan.');
					window.location ="<?php echo $txt.".php" ?>";
				</script> 
				<?php
		}	
		
		//Insert data  ============================================
		public function add_relasi_solusi($a,$b)
		{
			$link = $this->db->db_conn();
			$qr	= mysqli_query($link,"INSERT INTO tbl_penyakit_solusi(kode_penyakit,kode_solusi) 
							  VALUES('$a','$b')")or die (mysqli_error());
		}	
		
		//Delete data  ============================================
		public function del_relasi_solusi($id)
		{
			$link = $this->db->db_conn();
			$qr	= mysqli_query($link,"DELETE FROM tbl_penyakit_solusi WHERE kode_penyakit='".$id."' ");
		}	
		
	}
?>