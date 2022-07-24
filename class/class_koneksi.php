<?php
	class cl_conn
	{
		private $host	="localhost";
		private $user	="root";
		private $pass	="";
		private $db		="db_pakar_anak";

		
		public function db_conn()
		{
			$link = mysqli_connect($this->host,$this->user,$this->pass,$this->db);
			return $link;
		}
		
		public function db_close()
		{
			mysqli_close($this->host,$this->user,$this->pass) or die(mysql_error());
		} 
	}
?>