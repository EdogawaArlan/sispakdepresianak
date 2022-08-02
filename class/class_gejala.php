<?php
class gejala
{
	protected $db;

	public function __construct($cn)
	{
		$this->db = $cn;
	}
	//Tampil barang gejala
	public function tampil_gejala()
	{
		$link = $this->db->db_conn();

		$qr		= mysqli_query($link, "SELECT * FROM tbl_gejala");
		$num 	= mysqli_num_rows($qr);
		if ($num > 0) {
			$no = 1;
			while ($rw = mysqli_fetch_array($qr)) {
				echo "<tr '>
									<td>" . $no . "</td>
									<td>" . $rw['kode_gejala'] . "</td>
									<td>" . $rw['nama_gejala'] . "</td>
									<td align='center'>
										<a href='edit_gejala.php?id=" . $rw['id'] . "' class='btn btn-kecil btn-biru'>
										<img class='ico' src='../images/edit.png' height='13'/> Edit</a>
										<a href='hapus_data.php?id=" . $rw['kode_gejala'] . "&kol=kode_gejala&tbl=tbl_gejala&lok=view_gejala' class='btn btn-kecil btn-merah'>
										<img class='ico' src='../images/delete.png' height='13'/>Hapus</a>
									</td>
							";
				$no++;
			}
		}
	}

	public function tampil_gejala_home()
	{
		$link = $this->db->db_conn();

		$qr		= mysqli_query($link, "SELECT * FROM tbl_gejala ");
		$num 	= mysqli_num_rows($qr);
		if ($num > 0) {

			for ($no = 0; $no < $num; $no++) {
				$rw = mysqli_fetch_array($qr);
				$output = "<div class='col-4'>";
				$output .= "<header class='w3-container w3-orange'>";
				$output .= "<h5></h5>";
				$output .= "</header>";
				$output .= "<div class='w3-container w3-grey'><img src='" . $rw['gambar'] . "' width='100%' height='20%'/></div>";
				$output .= "<footer class='w3-container w3-orange fn20 fnb'>";
				$output .= $rw['gejala'];
				$output .= "</footer>";
				$output .= "</div>";
				if ($num < 4) {
					echo $output;
				} else if ($num < 8) {
					echo $output;
				} else if ($num < 12) {
					echo $output;
				} else if ($num < 16) {
					echo $output;
				}
			}
		}
	}

	//Insert data  ============================================
	public function add_gejala($a, $b, $namafl)
	{
		$link = $this->db->db_conn();
		if ((empty($a)) || (empty($b))) { { ?>
				<script language="javascript">
					alert('Kode gejala dan nama gejala harus diisi.');
				</script>
			<?php }
		} else {
			$qr		= mysqli_query($link, "SELECT * FROM tbl_gejala WHERE kode_gejala='" . $a . "'");
			$count	= mysqli_num_rows($qr);
			if ($count > 0) { ?>
				<script language="javascript">
					alert('Kode gejala yang anda masukan sudah terdaftar. Masukan kode gejala yang belum terdaftar.');
					window.location = "view_gejala.php";
				</script> <?php
						} else {
							$qr	= mysqli_query($link, "INSERT INTO tbl_gejala(kode_gejala,nama_gejala,gambar) 
							  VALUES('$a','$b','" . $namafl . "')") or die(mysqli_error());
							if ($qr) {
							?>
					<script language="javascript">
						alert('Data berhasil disimpan.');
						window.location = "view_gejala.php";
					</script>
				<?php
							} else { ?>
					<script language="javascript">
						alert('Data gagal disimpan. Pastikan file gambar benar.');
					</script>
			<?php }
						}
					}
				}

				//memanggil data satu persatu========================================================
				public function gejala_pilih($var, $id)
				{
					$link = $this->db->db_conn();

					$qr = mysqli_query($link, "SELECT * FROM tbl_gejala WHERE id = '$id'");
					$hasil = mysqli_fetch_array($qr);
					if ($var == '1')
						return $hasil['kode_gejala'];
					else if ($var == '2')
						return $hasil['nama_gejala'];
					else if ($var == '3')
						return $hasil['kategori'];
					else if ($var == '4')
						return $hasil['gambar'];
					else if ($var == 'id')
						return $hasil['id'];
				}

				public function gejala_update($a, $b, $namafl, $id)
				{
					$link = $this->db->db_conn();

					//simpan ke dalam database		
					if ($namafl != "" || $namafl != NULL) {
						$txfl = ", gambar='$namafl'";
					} else {
						$txfl = "";
					}
					$qr	= mysqli_query($link, "UPDATE tbl_gejala SET kode_gejala='$a',nama_gejala='$b'" . $txfl . " WHERE id='$id' ") or die(mysqli_error());
					if ($qr) {
			?>
			<script language="javascript">
				alert('Data berhasil disimpan.');
				window.location = "view_gejala.php";
			</script>
		<?php
					} else { ?>
			<script language="javascript">
				alert('Data gagal disimpan. Pastikan file gambar benar.');
			</script>
<?php }
				}


				public function no_gejala($txt, $col, $tbl)
				{
					$link = $this->db->db_conn();

					$qr		= mysqli_query($link, "SELECT " . $col . " FROM " . $tbl . " ORDER BY " . $col . " DESC LIMIT 1") or die(mysqli_error());
					$rw 	= mysqli_fetch_array($qr);
					$cn 	= $rw[$col];
					$idf	= substr($cn, 1, 2);
					$idf1	= intval($idf) + 1;
					$ars 	= sprintf("%02d", $idf1);
					return $no_fa = $txt . $ars;
				}

				function list_gejala($kd_pen)
				{
					$link = $this->db->db_conn();

					$i 		= 1;
					$qr 	= mysqli_query($link, "SELECT * FROM tbl_gejala ORDER BY id");
					$row 	= mysqli_num_rows($qr);
					if ($row > 0) {
						while ($data = mysqli_fetch_array($qr)) {
							$kd_gej			= $data['kode_gejala'];
							$qr1				= mysqli_fetch_array(mysqli_query($link, "SELECT kode_penyakit, kode_gejala FROM tbl_penyakit_gejala WHERE kode_penyakit='$kd_pen' AND kode_gejala='$kd_gej'"));
							$kd_gej_rel	= isset($qr1['kode_gejala']);

							if ($kd_gej == $kd_gej_rel) {
								$chk	= "checked";
							} else {
								$chk	= "";
							}

							echo "
						<tr><td colspan='2'><input " . $chk . " name='txt_gjl[]' value='" . $data['kode_gejala'] . "' type='checkbox'/>" . $data['kode_gejala'] . " - " . $data['nama_gejala'] . "</td></tr>
					";
							$i++;
						}
					}
				}

				function view_gejala()
				{
					$link = $this->db->db_conn();

					$kode_gejala = [
						// 'G001',
						// 'G002',
						// 'G003',
						// 'G004',
						// 'G005',
						// 'G006',
						// 'G007',
						// 'G008',
						// 'G009',
						// 'G010',
						// 'G011',
						// 'G012',
						// 'G013',
						// 'G014',
						// 'G015',
						// 'G016',
						// 'G017',
						// 'G018',
						// 'G019',
						// 'G020',
						// 'G021',
						// 'G022',
						// 'G023'
					];
					$qr 	= mysqli_query($link, "SELECT * FROM tbl_gejala  ORDER BY nama_gejala ");
					while ($data = mysqli_fetch_array($qr)) {
						$checked = in_array($data['kode_gejala'], $kode_gejala) ? "checked" : "";
						echo "
					<tr><td colspan='2'><input name='txt_gjl[]' " . $checked . " value='" . $data['kode_gejala'] . "' type='checkbox'/>" . $data['nama_gejala'] . "</td></tr>
				";
					}
				}

				//Insert data  ============================================
				public function add_gejala_tmp($a, $b, $log)
				{
					$link = $this->db->db_conn();

					$dt = date('d/m/Y');
					$qr	= mysqli_query($link, "INSERT INTO tbl_gejala_tmp(kode_gejala,kode_user,log) VALUES('$a','$b','$log')") or die(mysqli_error());
				}

				//Copy gejala tmp  ============================================
				public function copy_gejala_tmp($user, $log)
				{
					$link = $this->db->db_conn();

					$date	= date('d/m/Y');
					//query gejala
					$qr1	= mysqli_query($link, "SELECT * FROM tbl_gejala_tmp WHERE kode_user='$user' AND log='$log' ");
					while ($data = mysqli_fetch_array($qr1)) {
						$gejala 	= $data['kode_gejala'];
						//query penyakit 
						$qr_pen 	= mysqli_query($link, "SELECT * FROM tbl_penyakit_gejala WHERE kode_gejala ='$gejala'");
						while ($rw_pen = mysqli_fetch_array($qr_pen)) {
							$penyakit	= $rw_pen['kode_penyakit'];
							//query solusi 
							$query = mysqli_query($link, "SELECT * FROM tbl_penyakit_gejala WHERE kode_penyakit='$penyakit'");
							if (mysqli_num_rows($query) == mysqli_num_rows($qr1)) {
								$qr_sol  	= mysqli_query($link, "SELECT * FROM tbl_penyakit_solusi WHERE kode_penyakit ='$penyakit'");
								while ($rw_sol = mysqli_fetch_array($qr_sol)) {
									$solusi		= $rw_sol['kode_solusi'];
									mysqli_query($link, "INSERT INTO tbl_diagnosa(id_log,id_user,kode_penyakit,kode_gejala,kode_solusi,tanggal) VALUES('$log','$user','$penyakit','$gejala','$solusi','$date')") or die(mysqli_error());
								}
							}
						}
					}
				}

				//Hapus gejala tmp  ============================================
				public function hapus_gejala_tmp($user)
				{
					$link = $this->db->db_conn();

					$qr	= mysqli_query($link, "DELETE FROM tbl_gejala_tmp WHERE kode_user='$user' ") or die(mysqli_error());
				}
			}
?>