<?php
	class diagnosa
	{
		protected $db;

		public function __construct($cn)
		{
			$this->db =$cn;
		}
		/* 
		public function tampil_diagnosa($user=null,$lok=null)
		{
			$link = $this->db->db_conn();

			if($user !=null)
			{
				$qrtxt	= "WHERE a.id_user ='$user'";
			}
			else
			{
				$qrtxt	= "";
			}
			
			$qr		= mysqli_query($link,"SELECT   *
											 FROM tbl_diagnosa  as a 
											 INNER JOIN tbl_penyakit as b 
											 ON a.kode_penyakit = b.kode_penyakit
											 INNER JOIN tbl_admin as c
											 ON a.id_user = c.id ".$qrtxt);
									
			$num 	= mysqli_num_rows($qr);
			if($num > 0)
			{
				while ($rw = mysqli_fetch_array($qr))
				{
					$usr	= $rw['id_user'];
					
					echo "<tr align='left'>
									<td>".$rw['tanggal']."</td>
									<td>".$rw['nama']."</td>
									<td>".$rw['id_log']."</td>
									<td>".$rw['nama_penyakit']."</td>
									<td align='center'>
									<a href='view_detail_diagnosa.php?log=".$rw['id_log']."&peny=".$rw['kode_penyakit']."' class='btn btn-kecil btn-biru'><img class='ico' src='../images/edit.png' height='13'/> Detail</a>
									<a href='hapus_data.php?id=".$rw['id_log']."&tbl=tbl_diagnosa&lok=".$lok."&log=".$rw['id_log']."&kol=id_log' class='btn btn-kecil btn-merah'>
									<img class='ico' src='../images/delete.png' height='13'/>Hapus</a>
									</td>
						";
				}
			}
		}
		*/
		// revisi
		/*
		public function tampil_diagnosa_user($user=null,$lok=null)
		{
			$link = $this->db->db_conn();			
			$qr		= mysqli_query($link,"SELECT DISTINCT id_log,kode_penyakit,tanggal  FROM tbl_diagnosa WHERE id_user ='$user'");									
			$num 	= mysqli_num_rows($qr);
			if($num > 0)
			{
				while ($rw = mysqli_fetch_array($qr))
				{
					$qr_dia	= mysqli_query($link,"SELECT * FROM tbl_penyakit WHERE kode_penyakit ='".$rw['kode_penyakit']."' ");	
					$rw_dia = mysqli_fetch_array($qr_dia);
					$qr_use	= mysqli_query($link,"SELECT * FROM tbl_admin WHERE id ='$user' ");	
					$rw_use = mysqli_fetch_array($qr_use);
					echo "<tr align='left'>
									<td>".$rw['tanggal']."</td>
									<td>".$rw_use['nama']."</td>
									<td>".$rw['id_log']."</td>
									<td>".$rw_dia['nama_penyakit']."</td>
									<td align='center'>
									<a href='view_detail_diagnosa.php?log=".$rw['id_log']."&peny=".$rw['kode_penyakit']."' class='btn btn-kecil btn-biru'><img class='ico' src='../images/edit.png' height='13'/> Detail</a>
									<a href='hapus_data.php?id=".$rw['id_log']."&tbl=tbl_diagnosa&lok=".$lok."&log=".$rw['id_log']."&kol=id_log' class='btn btn-kecil btn-merah'>
									<img class='ico' src='../images/delete.png' height='13'/>Hapus</a>
									</td>
						";
				}
			}
		}
		*/
		public function tampil_diagnosa_user($user=null,$lok=null)
		{
			$link = $this->db->db_conn();
			/* "SELECT DISTINCT a.id_log, a.kode_penyakit, a.tanggal, b.nama_penyakit, c.nama FROM tbl_diagnosa a LEFT OUTER JOIN tbl_penyakit b ON a.kode_penyakit = b.kode_penyakit LEFT OUTER JOIN tbl_admin c ON a.id_user = c.id WHERE a.id_user =$user ORDER BY a.id_log DESC";	*/
						
			$qr	= mysqli_query($link,"SELECT DISTINCT a.id_log, a.kode_penyakit, a.tanggal, b.nama_penyakit, c.nama FROM tbl_diagnosa a LEFT OUTER JOIN tbl_penyakit b ON a.kode_penyakit = b.kode_penyakit LEFT OUTER JOIN tbl_admin c ON a.id_user = c.id WHERE a.id_user =$user ORDER BY a.id_log DESC");	

			$num 	= mysqli_num_rows($qr);
			if($num > 0)
			{
				while ($rw = mysqli_fetch_array($qr))
				{
					echo "<tr align='left'>
									<td>".$rw['tanggal']."</td>
									<td>".$rw['nama']."</td>
									<td>".$rw['id_log']."</td>
									<td>".$rw['nama_penyakit']."</td>
									<td align='center'>
									<a href='view_detail_diagnosa.php?log=".$rw['id_log']."&peny=".$rw['kode_penyakit']."' class='btn btn-kecil btn-biru'><img class='ico' src='../images/edit.png' height='13'/> Detail</a>
									<a href='hapus_data.php?id=".$rw['id_log']."&tbl=tbl_diagnosa&lok=".$lok."&log=".$rw['id_log']."&kol=id_log' class='btn btn-kecil btn-merah'>
									<img class='ico' src='../images/delete.png' height='13'/>Hapus</a>
									</td>
						";
				}
			}
		}
		
		// baru
		public function tampil_diagnosa($user=null,$lok=null)
		{
			$link = $this->db->db_conn();

			/*$qr		= mysqli_query($link,"SELECT DISTINCT id_log,kode_penyakit,tanggal  FROM tbl_diagnosa");*/						
			$qr		= mysqli_query($link,"SELECT DISTINCT a.id_log,a.kode_penyakit,a.tanggal,b.nama FROM tbl_diagnosa a LEFT OUTER JOIN tbl_admin b ON a.id_user = b.id");								

			$num 	= mysqli_num_rows($qr);
			if($num > 0)
			{
				while ($rw = mysqli_fetch_array($qr))
				{
					$qr_dia	= mysqli_query($link,"SELECT * FROM tbl_penyakit WHERE kode_penyakit ='".$rw['kode_penyakit']."' ");	
					$rw_dia = mysqli_fetch_array($qr_dia);
					$qr_use	= mysqli_query($link,"SELECT * FROM tbl_admin WHERE id ='$user' ");	
					$rw_use = mysqli_fetch_array($qr_use);
					echo "<tr align='left'>
									<td>".$rw['tanggal']."</td>
									<td>".$rw['nama']."</td>
									<td>".$rw['id_log']."</td>
									<td>".$rw_dia['nama_penyakit']."</td>
									<td align='center'>
									<a href='view_detail_diagnosa.php?log=".$rw['id_log']."&peny=".$rw['kode_penyakit']."' class='btn btn-kecil btn-biru'><img class='ico' src='../images/edit.png' height='13'/> Detail</a>
									
									<a href='hapus_data.php?id=".$rw['id_log']."&tbl=tbl_diagnosa&lok=".$lok."&log=".$rw['id_log']."&kol=id_log' class='btn btn-kecil btn-merah'>
									<img class='ico' src='../images/delete.png' height='13'/>Hapus</a>
									</td>
						";
				}
			}
		}
		
		public function hapus_diagnosa($id)
		{
			$link = $this->db->db_conn();

			$qr	= mysqli_query($link,"DELETE FROM diagnosa WHERE id='$id' ")or die (mysqli_error());
			if($qr)
			{ 
				?>
				<script language="javascript">
					alert ('Data Berhasil Dihapus');
					window.location ="view_diagnosa.php";
				</script> <?php
			}else{
				echo "Error!. Data tidak berhasil disimpan.";
			}
		}	
		
		public function tampil_tmp_diagnosa($cat,$log)
		{
			$link = $this->db->db_conn();

			$q	 	= mysqli_query($link,"SELECT * FROM tbl_diagnosa WHERE id_log='$log'");
			$row 	= mysqli_num_rows($q);
			$i		=1;
			if ($row > 0)
			{
				while($r = mysqli_fetch_array($q))
				{
					$q1		= mysqli_query($link,"SELECT * FROM tbl_gejala WHERE kode_gejala='".$r['kode_gejala']."' AND kategori='$cat'");
					$n 	= mysqli_num_rows($q1);
					if ($n > 0)
					{
						while ($r1 = mysqli_fetch_array($q1))
						{
							echo "
								<tr class='h-40'>
									<td colspan='3'  class='fn12 gr2 w3-grey'>".$i." - ".$r1['nama_gejala']."</td>
								</tr>
							";
							$i++;
						}
					}						
				}
			}
		}
		
		function view_temp_diagnosa_old($log,$id)
		{
			$link = $this->db->db_conn();

			if ($id !=null)			
			{
				$txt = "AND kode_penyakit='$id'";
			}
			else
			{
				$txt = "";
			}
			$q1 	= mysqli_query($link,"SELECT DISTINCT a.kode_gejala,a.kode_penyakit, a.id_log, a.tanggal,b.gambar,b.nama_penyakit FROM tbl_diagnosa as a 
													INNER JOIN tbl_penyakit as b 
													ON a.kode_penyakit = b.kode_penyakit WHERE a.id_log ='$log' ".$txt);
			$row 	= mysqli_num_rows($q1);
			if ($row > 0)
			{
				while($data = mysqli_fetch_array($q1))
				{ 
					
					echo "
						<tr class='h-40'><td colspan='2' class='fn14 blu fnb w-green'>Kode diagnosa: ".$data['id_log']." # Tanggal: ".$data['tanggal']."</td></tr>
						<tr class='h-40'><td colspan='2' class='fn14 blu fnb w3-red'>Jenis Penyakit Ayam Broiler tersebut Anda Adalah:</td></tr>
						<tr class='h-100'>
							<td width='50%' class='fn14 gr2 w-grey-h fnb'>
								".$data['nama_penyakit']."<br>
							</td>
						</tr>
						<tr class='h-40'><td colspan='2' class='fn12 blu fnb w3-grey'>Gejala:</td></tr>
						";
						//Pemanggilan gejala
						$q2		= mysqli_query($link,"SELECT * FROM tbl_gejala WHERE kode_gejala= '".trim($data['kode_gejala'])."' ");
						while ($rw2	= mysqli_fetch_array($q2))
						{
							echo "<tr class='h-40'><td colspan='2' class='fn12 gr2'> * ".trim($rw2['nama_gejala'])."</td></tr>";	
						}
						 //Pemanggilan Solusi
						echo"<tr class='h-40'><td colspan='2' class='fn12 blu fnb w3-grey'>Solusi:</td></tr>";
						$q3		= mysqli_query($link,"SELECT * FROM tbl_diagnosa as a INNER JOIN tbl_solusi as b 
																ON a.kode_solusi=b.kode_solusi 
																WHERE a.kode_penyakit='".$data['kode_penyakit']."'");
						while($rw3= mysqli_fetch_array($q3))
						{
							echo "<tr class='h-40'><td colspan='2' class='fn12 gr2 '> * ".$rw3['nama_solusi']."</td></tr>";					
						}
				}
			}
		}
		
		function view_temp_diagnosa($log,$id=null)
		{
			$link = $this->db->db_conn();

			if ($id !=null)			
			{
				$txt = "AND kode_penyakit='$id'";
			}
			
			{
				$txt = "";
			}
						
			$qryDiag = "SELECT d.id_log, d.kode_penyakit, d.nama_penyakit, d.tanggal, d.id_user, d.total_gejala_1, e.total_gejala_2 FROM (SELECT c.id_log, c.kode_penyakit, c.nama_penyakit, c.tanggal, c.id_user, COUNT(c.kode_gejala) AS total_gejala_1 FROM (Select DISTINCT a.id_log, a.kode_gejala, a.kode_penyakit, b.nama_penyakit, a.tanggal, id_user FROM tbl_diagnosa a LEFT OUTER JOIN tbl_penyakit b on a.kode_penyakit = b.kode_penyakit WHERE a.id_log ='$log' ) c GROUP BY c.id_log, c.kode_penyakit, c.nama_penyakit, c.tanggal, c.id_user ) d INNER JOIN (SELECT kode_penyakit, COUNT(kode_gejala) AS total_gejala_2 FROM tbl_penyakit_gejala GROUP BY kode_penyakit ) e ON d.kode_penyakit = e.kode_penyakit AND d.total_gejala_1 = e.total_gejala_2";
			$qryDiag;

			//$qryDiag	= "SELECT id_log, kode_penyakit, nama_penyakit, tanggal, count(kode_gejala) AS Jml_Gejala FROM ( Select DISTINCT a.id_log, a.kode_gejala, a.kode_penyakit, b.nama_penyakit, a.tanggal FROM tbl_diagnosa a LEFT OUTER JOIN tbl_penyakit b on a.kode_penyakit = b.kode_penyakit WHERE a.id_log ='$log') c GROUP BY id_log, kode_penyakit, nama_penyakit, tanggal ORDER BY count(kode_gejala) DESC LIMIT 1";

			$qr_dia	= mysqli_query($link, $qryDiag);

			$row	= mysqli_num_rows($qr_dia);
			if ($row > 0)
			{
				while($rw_dia = mysqli_fetch_array($qr_dia))
				{ 
					echo "
						<tr class='h-40'><td colspan='2' class='fn14 blu fnb w-green'>Kode diagnosa: ".$rw_dia['id_log']." # Tanggal: ".$rw_dia['tanggal']."</td></tr>
					";
	
					$qr_pen = mysqli_query($link,"SELECT * FROM tbl_penyakit WHERE kode_penyakit ='". trim($rw_dia['kode_penyakit']) ."' ");
					$rw_pen	= mysqli_fetch_array($qr_pen);	
					echo "
						<tr class='h-40'><td colspan='2' class='fn14 blu fnb w3-red'>Jenis Penyakit pada Anak Tersebut Adalah:</td></tr>
						<tr class='h-100'>
							<td width='50%' class='fn14 gr2 w-grey-h fnb'>
								".$rw_dia['nama_penyakit']."<br>
							</td>
						</tr>						
						<tr class='h-40'><td colspan='2' class='fn12 blu fnb w3-grey'>Gejala:</td></tr>
						";

						//Pemanggilan gejala
						$qr_gej		= mysqli_query($link,"SELECT DISTINCT kode_gejala FROM tbl_diagnosa WHERE kode_penyakit = '".trim($rw_dia['kode_penyakit'])."' AND id_log ='".$log."' ");

						while ($rw_gej	= mysqli_fetch_array($qr_gej))
						{
							$qr_gej_det		= mysqli_query($link,"SELECT * FROM tbl_gejala WHERE kode_gejala = '".trim($rw_gej['kode_gejala'])."' ");
							while ($rw_gej_det	= mysqli_fetch_array($qr_gej_det))
							{
								echo "<tr class='h-40'><td colspan='2' class='fn12 gr2'> * ".trim($rw_gej_det['nama_gejala'])."</td></tr>";	
							}
						}
						
						 //Pemanggilan Solusi
						echo "<tr class='h-40'><td colspan='2' class='fn12 blu fnb w3-grey'>Solusi: </td></tr>";
						$qr_sol		= mysqli_query($link,"SELECT  * FROM tbl_penyakit_solusi WHERE kode_penyakit = '".trim($rw_dia['kode_penyakit'])."' ");
						
						$no = 1;
						while ($rw_sol	= mysqli_fetch_array($qr_sol))
						{
							$qr_sol_det		= mysqli_query($link,"SELECT * FROM tbl_solusi WHERE kode_solusi = '".trim($rw_sol['kode_solusi'])."' ");
							while ($rw_sol_det	= mysqli_fetch_array($qr_sol_det))
							{
								echo "<tr class='h-40'><td colspan='2' class='fn12 gr2'> * ".trim($rw_sol_det['nama_solusi'])."</td></tr>";	
							}
						}
				}				
			} 
			else {
				$qrDel	= mysqli_query($link, "DELETE FROM tbl_diagnosa WHERE id_log = '".$log."'")or die (mysql_error());
				echo "<h1> Maaf, penyakit yang anda diagnosis belum tersedia. </h1>";
			}
		}
		
		function del_unused_diagnosa($log)
		{
			$link = $this->db->db_conn();

			$qr_del	= mysqli_query($link,"SELECT id_log, kode_penyakit, nama_penyakit, tanggal, id_user FROM ( Select DISTINCT a.id_log, a.kode_gejala, a.kode_penyakit, b.nama_penyakit, a.tanggal, id_user FROM tbl_diagnosa a LEFT OUTER JOIN tbl_penyakit b on a.kode_penyakit = b.kode_penyakit WHERE a.id_log ='$log') d GROUP BY id_log, kode_penyakit, nama_penyakit, tanggal, id_user ORDER BY count(kode_gejala) DESC LIMIT 1");
			
			while ($row	= mysqli_fetch_array($qr_del))
			{
				$kdPDel = $row['kode_penyakit'];
				$qrDel	= mysqli_query($link, "DELETE FROM tbl_diagnosa WHERE (id_log = '".$log."' AND id_user = ".$row['id_user'].") and kode_penyakit <> '".$kdPDel."' ")or die (mysql_error());
			}
		}
		

		/*
		function view_detail_diagnosa($log,$id)
		{
			$link = $this->db->db_conn();
			
			
			$q1 	= mysqli_query($link,"SELECT * FROM tbl_diagnosa as a 
													INNER JOIN tbl_penyakit as b 
													ON a.kode_penyakit = b.kode_penyakit WHERE a.id_log ='$log' AND a.kode_penyakit='$id'");
			$row 	= mysqli_num_rows($q1);
			if ($row > 0)
			{
				while($data = mysqli_fetch_array($q1))
				{ 
					
					echo "
						<tr class='h-40'><td colspan='2' class='fn14 blu fnb w-green'>Kode diagnosa: ".$data['id_log']." # Tanggal: ".$data['tanggal']."</td></tr>
						<tr class='h-40'><td colspan='2' class='fn14 blu fnb w3-red'>Jenis Penyakit Anak Anda Adalah:</td></tr>
						<tr class='h-100'>
							<td width='10%' class='w-grey'><img src='../images/".$data['gambar']."' width='80' /></td>
							<td width='50%' class='fn14 gr2 w-grey-h fnb'>
								".$data['nama_penyakit']."<br>
							</td>
						</tr>
						<tr class='h-40'><td colspan='2' class='fn12 blu fnb w3-grey'>Gejala:</td></tr>
						";
						//Pemanggilan gejala
						$q2		= mysqli_query($link,"SELECT * FROM tbl_diagnosa as a INNER JOIN  tbl_gejala as b ON a.kode_gejala= b.kode_gejala 
																WHERE a.kode_penyakit='".$data['kode_penyakit']."' AND a.id_log='$log'");
						while($rw2= mysqli_fetch_array($q2))
						{
							echo "<tr class='h-40'><td colspan='2' class='fn12 gr2'> * ".$rw2['nama_gejala']."</td></tr>";							
						}
					echo"<tr class='h-40'><td colspan='2' class='fn12 blu fnb w3-grey'>Solusi:</td></tr>";
						 //Pemanggilan Solusi
						$q3		= mysqli_query($link,"SELECT * FROM tbl_diagnosa as a INNER JOIN tbl_solusi as b 
																ON a.kode_solusi=b.kode_solusi 
																WHERE a.kode_penyakit='".$data['kode_penyakit']."'");
						while($rw3= mysqli_fetch_array($q3))
						{
							echo "<tr class='h-40'><td colspan='2' class='fn12 gr2 '> * ".$rw3['nama_solusi']."</td></tr>";					
						}
				}
			}
		}
		*/
		
		function view_detail_diagnosa($log,$id)
		{
			$link = $this->db->db_conn();

			if ($id !=null)			
			{
				$txt = "AND kode_penyakit='$id'";
			}
			else
			{
				$txt = "";
			}

			$qr_dia	= mysqli_query($link,"SELECT DISTINCT kode_penyakit,id_log,tanggal FROM tbl_diagnosa WHERE id_log ='$log' ".$txt);
			$row	= mysqli_num_rows($qr_dia);
			if ($row > 0)
			{
				while($rw_dia = mysqli_fetch_array($qr_dia))
				{ 
					echo "
						<tr class='h-40'><td colspan='2' class='fn14 blu fnb w-green'>Kode diagnosa: ".$rw_dia['id_log']." # Tanggal: ".$rw_dia['tanggal']."</td></tr>
					";
					
					$qr_pen = mysqli_query($link,"SELECT * FROM tbl_penyakit WHERE kode_penyakit ='". trim($rw_dia['kode_penyakit']) ."' ");
					$rw_pen	= mysqli_fetch_array($qr_pen);					
					echo "
						<tr class='h-40'><td colspan='2' class='fn14 blu fnb w3-red'>Jenis Penyakit Pada Anak Tersebut Adalah:</td></tr>
						<tr class='h-100'>
							<td width='50%' class='fn14 gr2 w-grey-h fnb'>
								".$rw_pen['nama_penyakit']."<br>
							</td>
						</tr>						
						<tr class='h-40'><td colspan='2' class='fn12 blu fnb w3-grey'>Gejala:</td></tr>
						";
					
						//Pemanggilan gejala
						$qr_gej		= mysqli_query($link,"SELECT DISTINCT kode_gejala FROM tbl_diagnosa WHERE kode_penyakit = '".trim($rw_dia['kode_penyakit'])."' AND id_log ='".$log."' ");
						while ($rw_gej	= mysqli_fetch_array($qr_gej))
						{
							$qr_gej_det		= mysqli_query($link,"SELECT * FROM tbl_gejala WHERE kode_gejala = '".trim($rw_gej['kode_gejala'])."' ");
							while ($rw_gej_det	= mysqli_fetch_array($qr_gej_det))
							{
								echo "<tr class='h-40'><td colspan='2' class='fn12 gr2'> * ".trim($rw_gej_det['nama_gejala'])."</td></tr>";	
							}
						}
						
						 //Pemanggilan Solusi
						echo "<tr class='h-40'><td colspan='2' class='fn12 blu fnb w3-grey'>Solusi: </td></tr>";
						$qr_sol		= mysqli_query($link,"SELECT  * FROM tbl_penyakit_solusi WHERE kode_penyakit = '".trim($rw_dia['kode_penyakit'])."' ");
						$no = 1;
						while ($rw_sol	= mysqli_fetch_array($qr_sol))
						{
							$qr_sol_det		= mysqli_query($link,"SELECT * FROM tbl_solusi WHERE kode_solusi = '".trim($rw_sol['kode_solusi'])."' ");
							while ($rw_sol_det	= mysqli_fetch_array($qr_sol_det))
							{
								echo "<tr class='h-40'><td colspan='2' class='fn12 gr2'> * ".trim($rw_sol_det['nama_solusi'])."</td></tr>";	
							}
						}
				}
			}
		}
		
		
	}
?>