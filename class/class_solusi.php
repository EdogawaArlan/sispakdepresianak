<?php
	class solusi
	{
		protected $db;

		public function __construct($cn)
		{
			$this->db =$cn;
		}
		//Tampil barang solusi
		public function tampil_solusi()
		{
			$link = $this->db->db_conn();

			$qr		= mysqli_query($link,"SELECT * FROM tbl_solusi");
			$num 	= mysqli_num_rows($qr);
			if($num > 0)
			{
				$no =1;
				while ($rw = mysqli_fetch_array($qr))
				{
					echo "<tr '>
									<td>".$no."</td>
									<td>".$rw['kode_solusi']."</td>
									<td>".$rw['nama_solusi']."</td>
									<td align='center'>
										<a href='edit_solusi.php?id=".$rw['id']."' class='btn btn-kecil btn-biru'>
										<img class='ico' src='../images/edit.png' height='13'/> Edit</a>
										<a href='hapus_data.php?id=".$rw['kode_solusi']."&kol=kode_solusi&tbl=tbl_solusi&lok=view_solusi' class='btn btn-kecil btn-merah'>
										<img class='ico' src='../images/delete.png' height='13'/>Hapus</a>
									</td>
							";
					$no++;
				}
			}
		}
		
		
		
		//Insert data  ============================================
		public function add_solusi( $a,$b)
		{
			$link = $this->db->db_conn();
			if ((empty($a)) || (empty($b)))
			{
				{?>
					<script language="javascript">
						alert ('Kode solusi dan nama solusi harus diisi.');
					</script>
				<?php }
			}
			else
			{
				$qr		= mysqli_query($link,"SELECT * FROM tbl_solusi WHERE kode_solusi='".$a."'");
				$count	= mysqli_num_rows($qr);
				if ($count > 0) 
				{?>
					<script language="javascript">
						alert ('Kode solusi yang anda masukan sudah terdaftar. Masukan kode solusi yang belum terdaftar.');
						window.location ="view_solusi.php";
					</script> <?php
				}else{
						$qr	= mysqli_query($link,"INSERT INTO tbl_solusi(kode_solusi,nama_solusi) 
							  VALUES('$a','$b')")or die (mysqli_error());
			if ($qr)
			{
					?>
					<script language="javascript">
						alert ('Data berhasil disimpan.');
						window.location ="view_solusi.php";
					</script> 
					<?php
					}
				}
			
			}
		}		
		
		//memanggil data satu persatu========================================================
		public function solusi_pilih($var,$id)
		{
			$link = $this->db->db_conn();

			$qr = mysqli_query($link,"SELECT * FROM tbl_solusi WHERE id = '$id'");
			$hasil = mysqli_fetch_array($qr);
			if ($var == '1')
				return $hasil['kode_solusi'];
			else if ($var == '2')
				return $hasil['nama_solusi'];
			else if ($var == 'id')
				return $hasil['id'];
		}
		
		public function solusi_update($a,$b,$id)
		{
			$link = $this->db->db_conn();

			$qr	= mysqli_query($link,"UPDATE tbl_solusi SET kode_solusi='$a',nama_solusi='$b' WHERE id='$id' ")or die (mysqli_error());
			if ($qr)
			{
				?>
				<script language="javascript">
					alert ('Data berhasil disimpan.');
					window.location ="view_solusi.php";
				</script> 
				<?php
			}
			
		}		
			
			
		function list_solusi($kd_pen)
		{
			$link = $this->db->db_conn();

			$i 		= 1;
			$qr 	= mysqli_query($link,"SELECT * FROM tbl_solusi ORDER BY id");
			$row 	= mysqli_num_rows($qr);
			if ($row > 0)
			{
				while($data = mysqli_fetch_array($qr))
				{ 
					$kd_sol			= $data['kode_solusi'];
					$qr1				= mysqli_fetch_array(mysqli_query($link,"SELECT kode_penyakit, kode_solusi FROM tbl_penyakit_solusi WHERE kode_penyakit='$kd_pen' AND kode_solusi='$kd_sol'"));
					$kd_sol_rel	= isset ($qr1['kode_solusi']);
					
					if ($kd_sol == $kd_sol_rel)
					{
						$chk	= "checked";
					}
					else
					{
						$chk	= "";
					}
				
					echo "
						<tr><td colspan='2'><input ".$chk." name='txt_gjl[]' value='".$data['kode_solusi']."' type='checkbox'/>".$data['kode_solusi']." - ".$data['nama_solusi']."</td></tr>
					";
					$i++;
				}
			}
		}
		
		
	
	
	}
?>