<?php 
$file_path =  realpath(dirname(__FILE__));


include_once ($file_path.'/../lib/database.php');
include_once ($file_path.'/../helpers/format.php');
?>



<?php 
	/**
	* 
	*/
	class adminlogin
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function longin_admin($adminUser,$adminPass)
		{
			$adminUser = $this->fm->validation($adminUser); //gọi ham validation từ file Format để ktra
			$adminPass = $this->fm->validation($adminPass);

			$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
			$adminPass = mysqli_real_escape_string($this->db->link, $adminPass); //mysqli gọi 2 biến. (adminUser and link) biến link -> gọi conect db từ file db
			
			if(empty($adminUser) || empty($adminPass)){
				$alert = "User and Pass không nhập rỗng";
				return $alert;
			}else{
				$query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass' LIMIT 1 ";
				$result = $this->db->select($query);

				if($result != false){
					//session_start();
					// $_SESSION['login'] = 1;
					//$_SESSION['user'] = $user;
					$value = $result->fetch_assoc();
					Session::set('adminlogin', true); // set adminlogin đã tồn tại
					// gọi function Checklogin để kiểm tra true.
					Session::set('adminId', $value['adminId']);
					Session::set('adminUser', $value['adminUser']);
					Session::set('adminName', $value['adminName']);
					header("Location:index.php");
				}else {
					$alert = "User and Pass not match";
					return $alert;
				}
			}


		}
		public function changePassword($adminId,$oldPassword,$newPassword,$reNewPassword)

		{
			$new_password = mysqli_real_escape_string($this->db->link, $newPassword);
			$re_new_password = mysqli_real_escape_string($this->db->link, $reNewPassword);
			$old_password = mysqli_real_escape_string($this->db->link, $oldPassword);
			$admin_id = mysqli_real_escape_string($this->db->link, $adminId);
			if($new_password !== $re_new_password){
				$alert = "Mật khẩu mới không trùng khớp";
				return $alert;
			}
			else
			{
				$query = "SELECT * FROM tbl_admin WHERE adminId = '$admin_id'  LIMIT 1 ";

				$result = $this->db->select($query);
				while($row = $result->fetch_assoc())
				{
					if(md5($old_password) === $row['adminPass'])
					{
						$new_password_md5 = md5($new_password);
						
						$updatePass = "UPDATE tbl_admin SET adminPass = '$new_password_md5' WHERE adminId ='$adminId'";
						
						$result = $this->db->update($updatePass);
						if($result){
							$msg = "Cập nhật thàn công";
						}
						return $msg;
					}
					else
					{
						$alert = "Mật khẩu không đúng";
						return $alert;
					}
				}
			}

	


		}
	}
 ?>