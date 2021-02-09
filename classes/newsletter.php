<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

 
<?php 
	/**
	* 
	*/
	class newsletter
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		/**
		 * insert new cutomer into database
		 */
		public function insert_newsletter($email)
		{
		
			$date = date('Y-m-d H:i:s');
			$query = "INSERT INTO `tbl_newsletter`(`newsletter_email`,`newsletter_date`) VALUES('$email','$date')";
			$result = $this->db->insert($query);	
			return $result;
	
		}

		public function show_newsletter()
		{
			$query = "SELECT * FROM tbl_newsletter order by newsletter_date desc ";
			$result = $this->db->select($query);
			return $result;
		}

		public function del_newletter($id)
		{
			$query = "DELETE FROM tbl_newsletter where id = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Newsletter Deleted Successfully</span>";
				return $alert;
			}else {
				$alert = "<span class='success'>Newsletter Deleted Not Success</span>";
				return $alert;
			}
		}
	}

 ?>