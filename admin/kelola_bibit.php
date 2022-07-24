<!DOCTYPE html>
<?php
	include 'header.php';
?>
<html>
<head>
	<title>DAFTAR BIBIT</title>
	<title>Sistem Pakar Rekomendasi Bibit Padi</title>
	<link rel="stylesheet" href="../css/style.css">
	<style type="text/css">
  
    </style>
</head>
<body>
    <main>
      <div class='container-fix'>
        <form method="post" action="aksi_tambah_bibit.php">
		<div align= "center" class="w3-container w3-orange" >
			<h2>Tambah Data Padi</h2>
		</div>
          <table class='tbl2'>
            <tbody>
              <tr>
                <td>Nama Bibit</td><td>:</td>
                <td><input type="text" name="nama_bibit"></td>
              </tr>
              <tr>
                <td>Deskrpisi</td><td>:</td>
                <td><textarea name="deskripsi"></textarea></td>
              </tr>
            </tbody>
          </table>
		  <br/>
		  <center><tr><td><a class="btn btn-besar btn-hijau" type="submit"><img class="ico" src="../images/ok.png" height='13'/>TAMBAH</a></td></tr>
        </form>

      </br>

        <form>
          <table class="tbl_view w-100p">
            <div class="w3-container w3-orange" >
			<h2>Data Bibit Padi</h2>
		</div>
            <tr align="center" bgcolor="#228B22">
              <th>ID</th>
              <th>Nama Bibit</th>
              <th>Deskripsi Bibit</th>
              <th>Aksi</th>
            </tr>
            <tbody>
              <?php 
                include '../admin/koneksi.php';
                $sql = "select * from bibit";
                $rs=mysql_query($sql);
                while ($hasil=mysql_fetch_array($rs)) { ?>

                <tr bgcolor="">
                  <td>
                     <div align="center"><p><?php echo $hasil['id_bibit']; ?></p></div>
                  </td>
                  <td>
                     <div align="center"><p><?php echo $hasil['nama_bibit']; ?></p></div>
                  </td>
                  <td>
                     <div><p ><?php echo $hasil['deskripsi']; ?></p></div>
                  </td>
                  <td>
                  <div align="center">
				  <a href="updatebibit.php?id=<?php echo $hasil['id_bibit']; ?>" class='btn btn-kecil btn-biru'> <img class='ico' src='../images/edit.png' height='13'/>Update</a><p></p>
                  <a href="aksi_hapus_bibit.php?id=<?php echo $hasil['id_bibit']; ?>"class='btn btn-kecil btn-merah'><img class='ico' src='../images/delete.png' height='13'/>Hapus</a>
                  </div>
                  </td>
                  
                </tr>
                
             <?php }
             ?>
            </tbody>
          </table>
        </form>
      </div>
    </main>

    <aside>
        
    </aside>

        <?php
	include 'footer.php';
?>
  </div>
</body>
</html>