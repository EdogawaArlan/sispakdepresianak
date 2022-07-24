<?php
	class hapus
	{
		protected $db;

		public function __construct($cn)
		{
			$this->db =$cn;
		}

		public function hapus_data($id,$tbl)
		{
			$link = $this->db->db_conn();

			if($id !=null && $tbl!=null)
			{
				$qr	= mysqli_query($link,"DELETE FROM ".$tbl." WHERE id='$id' ")or die (mysqli_error());
			}
			else
			{
				echo "Gagal menghapus data.";
			}
		}	
		
		
	}
?>