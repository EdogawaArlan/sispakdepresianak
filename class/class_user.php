<?php
	class cl_user
	{
		private $email;
		private $username;
		private $password;
		private $akses;
		private $nama;
		protected $db;

		public function __construct($cn)
		{
			$this->db =$cn;
		}

		//Profil ========================================================
		public function tampil_profil($k,$session)
		{
			$link = $this->db->db_conn();

			$qr = mysqli_query($link,"SELECT * FROM tbl_admin WHERE id = '$session' ");
			$hasil = mysqli_fetch_array($qr);
			if ($k == 'nama')
				return $hasil['nama'];
			else if ($k == 'user')
				return $hasil['username'];
			else if ($k == 'id')
				return $hasil['id_user'];
			else if ($k == 'hak')
				return $hasil['hak_akses'];	
			else if ($k == 'pass')
				return $hasil['password'];			
		}
		
		//Register user ============================================
		public function add_user($nm,$user,$pwd,$hak)
		{
			if (empty($nm))
			{?>
				<script language="javascript">
					alert ('Nama tidak boleh kosong.');
					window.location ="daftar.php";
				</script> <?php					
			} else if (empty($user)) 
			{?>
				<script language="javascript">
					alert ('Username tidak boleh kosong.');
					window.location ="daftar.php";
				</script> <?php
			} else if (empty($pwd))
			{?>
				<script language="javascript">
					alert ('Password tidak boleh kosong.');
					window.location ="daftar.php";
				</script> <?php	
			} else {
				$link = $this->db->db_conn();
				
				$qr		= mysqli_query($link,"SELECT * FROM tbl_admin WHERE username='".$user."'");
				$count	= mysqli_num_rows($qr);
				if ($count > 0) 
				{?>
					<script language="javascript">
						alert ('Username yang anda masukan sudah terdaftar. Masukan user yang belum terdaftar.');
						window.location ="daftar.php";
					</script> <?php
				} else {						
					$qr	= mysqli_query($link,"INSERT INTO tbl_admin(nama,username,password,hak_akses) VALUES('$nm','$user','$pwd','$hak')");
					if($qr)
					{ ?>
						<script language="javascript">
							alert ('Daftar berhasil dilakukan.');
							//window.location ="view_pengguna.php";
							window.location ="index.php";
						</script> <?php
						
					}else{
						echo "Error!. Data tidak tersimpan.";
					}
				}
			}
		}
		
		//Tambah User
		public function add_user2($nm,$user,$pwd,$hak)		
		{
			if (empty($nm))
			{?>
				<script language="javascript">
					alert ('Nama tidak boleh kosong.');
					window.location ="view_pengguna.php";
				</script> <?php					
			} else if (empty($user)) 
			{?>
				<script language="javascript">
					alert ('Username tidak boleh kosong.');
					window.location ="view_pengguna.php";
				</script> <?php
			} else if (empty($pwd))
			{?>
				<script language="javascript">
					alert ('Password tidak boleh kosong.');
					window.location ="view_pengguna.php";
				</script> <?php	
			} else {
				$link = $this->db->db_conn();
				
				$qr		= mysqli_query($link,"SELECT * FROM tbl_admin WHERE username='".$user."'");
				$count	= mysqli_num_rows($qr);
				if ($count > 0) 
				{?>
					<script language="javascript">
						alert ('Username yang anda masukan sudah terdaftar. Masukan user yang belum terdaftar.');
						window.location ="view_pengguna.php";
					</script> <?php
				} else {							
					$qr	= mysqli_query($link,"INSERT INTO tbl_admin(nama,username,password,hak_akses) VALUES('$nm','$user','$pwd','$hak')");
					if($qr)
					{ ?>
						<script language="javascript">
							alert ('Daftar berhasil dilakukan.');
							//window.location ="view_pengguna.php";
							window.location ="view_pengguna.php";
						</script> <?php
						
					}else{
						echo "Error!. Data tidak tersimpan.";
					}
				}
			}
		}
		
		//Update User ============================================
		public function simpan_profil($nm,$pas,$id)
		{ if (empty($nm))
			{?>
				<script language="javascript">
					alert ('Nama tidak boleh kosong.');
					window.location ="profil.php";
				</script> <?php					
			} else if (empty($pas)) 
			{?>
				<script language="javascript">
					alert ('Username tidak boleh kosong.');
					window.location ="profil.php";
				</script> <?php
			}else{
			$link = $this->db->db_conn();

			$qr	= mysqli_query($link,"UPDATE tbl_admin SET nama='$nm',password='$pas' WHERE id='$id'"); 										
			if($qr)
			{ ?>
				<script language="javascript">
					alert ('Data Berhasil Disimpan');
					window.location ="profil.php";
				</script> <?php
			}else{
				echo "Error!. Data tidak tersimpan.";
			}
		}
	}
		
		public function validasi($username, $password)
		{
			$link = $this->db->db_conn();

			$qr		= mysqli_query($link,"SELECT * FROM tbl_admin WHERE username='".$username."' AND password='".$password."' ");
			$count	= mysqli_num_rows($qr);
			if ($count > 0) 
			{
				while ($rw	= mysqli_fetch_array($qr))
				{
					$hak_akses = $rw['hak_akses'];
					$_SESSION['user'] = $username; 
					$_SESSION['pass'] = $rw['id'];
						if($hak_akses=="administrator" || $hak_akses=="ADMINISTRATOR")
						{
							?><script language="JavaScript">document.location='admin/index.php'</script><?php				   
						}
						else if($hak_akses=="user" || $hak_akses=="USER")
						{
							?><script language="JavaScript">document.location='user/index.php'</script><?php 
						}
				}
			}
			else
			{?>
				<script language="javascript">
					alert ('Username atau password salah..');
					window.location ="index.php";
				</script> <?php
			}
		}
		
		
		//Tampil User ===========================================
		public function tampil_user()
		{
			$link = $this->db->db_conn();

			$qr	= mysqli_query($link,"SELECT * FROM tbl_admin");
			$qrnum = mysqli_num_rows($qr);
			if($qrnum > 0)
			{
				$no =1;
				while ($rw = mysqli_fetch_array($qr))
				{
					echo "<tr>
									<td>".$no."</td>
									<td>".$rw['nama']."</td>
									<td>".$rw['username']."</td>
									<td>".$rw['password']."</td>
									<td>".$rw['hak_akses']."</td>
									<td align='center'><a href='edit_user.php?id=".$rw['id']."' class='btn btn-kecil btn-biru'><img class='ico' src='../images/edit.png' height='13'/> Edit</a>
									
									<a href='hapus_data.php?id=".$rw['id']."&kol=id&tbl=tbl_admin&lok=view_pengguna' class='btn btn-kecil btn-merah'>
									<img class='ico' src='../images/delete.png' height='13'/>Hapus</a>
							";
					$no++;
				}
			}
			else
			{
				echo "<tr><td colspan='5' class='fn11 gr1'>Data kosong...</td></tr>";
			}
		}
		
		//Tampil User Untuk Delete===========================================
		public function d_user($id)
		{
			$link = $this->db->db_conn();

			$qr	= mysqli_query($link,"SELECT * FROM tbl_user WHERE id_user='$id'");
			$qrnum = mysqli_num_rows($qr);
			if($qrnum > 0)
			{
				while ($rw = mysqli_fetch_array($qr))
				{
					echo "<tr>
									<td>".$rw['nama']."</td>
									<td>".$rw['username']."</td>
									<td>".$rw['hak_akses']."</td>
							";
				}
			}
		}
		
		//Delete User===========================================
		public function delete_user($id)
		{
			$link = $this->db->db_conn();

			$qr	= mysqli_query($link,"DELETE FROM tbl_user WHERE id='$id'");
			if($qr)
			{ ?>
				<script language="javascript">
					alert ('Data telah Dihapus.');
					window.location ="view_pengguna.php";
				</script>
			<?php }
		}
		
		public function user_update( $a,$b,$c,$d,$id)
		{
			if (empty($a))
			{?>
				<script language="javascript">
					alert ('Nama tidak boleh kosong.');
					window.location ="view_pengguna.php";
				</script> <?php					
			} else if (empty($b)) 
			{?>
				<script language="javascript">
					alert ('Username tidak boleh kosong.');
					window.location ="view_pengguna.php";
				</script> <?php
			} else if (empty($c))
			{?>
				<script language="javascript">
					alert ('Password tidak boleh kosong.');
					window.location ="view_pengguna.php";
				</script> <?php	
			} else {
			$link = $this->db->db_conn();
			
			
			$qr	= mysqli_query($link,"UPDATE tbl_admin SET nama='$a' ,username='$b' , password='$c',
												hak_akses='$d'  WHERE id='$id' ")or die (mysqli_error());
			if($qr)
			{ 
				?>
				<script language="javascript">
					alert ('Data Berhasil Disimpan');
					window.location ="view_pengguna.php";
				</script> <?php
				
			}else{
				echo "Error!. Data tidak berhasil disimpan.";
			}
			}
		}	
		
	}
?>