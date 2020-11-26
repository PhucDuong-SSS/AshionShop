<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


 
<?php 
	/**
	* 
	*/
	class customer
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
		public function insert_customer($data)
		{
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$city = mysqli_real_escape_string($this->db->link, $data['city']);
			$gender = mysqli_real_escape_string($this->db->link, $data['gender']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);		
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			$password = mysqli_real_escape_string($this->db->link, md5($data['password']));
			$re_password = mysqli_real_escape_string($this->db->link, md5($data['re_password']));
			

			if($name == "" || $city == "" || $gender == "" || $email == "" || $address == "" || $phone == "" || $password == ""||$re_password == "" ){
				$alert = "Fiedls, term must be not empty ";
				return $alert;
			}else{
				$check_email = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if ($result_check) {
					$alert = "<span class='error'>The Email Already Exists??? Please Enter Another Email </span>";
					return $alert;
				}else {
					if($password != $re_password)
					{
						$alert = "<span class='error'> Password and repassword are not match</span>";
					return $alert;
					}
					else
					{
					$query = "INSERT INTO tbl_customer(name,city,gender,email,address,phone,password) VALUES('$name','$city','$gender','$email','$address','$phone','$password') ";
					$result = $this->db->insert($query);
					if($result)
					{
						$alert = "<span >Register Account Successfully</span>";
						return $alert;
					}else 
					{
						$alert = "<span>Insert Customer NOT Success</span>";
						return $alert;
					}
					}
					
				}
			}
		}
		/**
		 * login page
		 */
		public function login_customer($data)
		{
			$email =  $data['email'];
			$password = md5($data['password']);
			if($email == '' || $password == ''){
				$alert = "<span >Email And Password must be not empty</span>";
				return $alert;
			}else{
				$check_login = "SELECT * FROM tbl_customer WHERE email='$email' AND password='$password' ";
				$result_check = $this->db->select($check_login);
				if ($result_check) {
					$value = $result_check->fetch_assoc();
					Session::set('customer_login', true);
					Session::set('customer_id', $value['id']);
					Session::set('customer_name', $value['name']);
					header('Location:index.php');
				}else {
					$alert = "<span class='error'>Email or Password doesn't match</span>";
					return $alert;
				}
			}
		}
		public function show_customers($id)
		{
			$query = "SELECT * FROM tbl_customer WHERE id='$id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_all_customers()
		{
			$query = "SELECT * FROM tbl_customer ";
			$result = $this->db->select($query);
			return $result;
		}
		//detele customer
		public function del_product($id)
		{
			$query = "DELETE FROM tbl_customer WHERE id = '$id' ";
			$result = $this->db->delete($query);
			return $result;
		}
		public function update_customers($data, $id)
		{
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$city = mysqli_real_escape_string($this->db->link, $data['city']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			
			if($name=="" || $city=="" || $email=="" || $address=="" || $phone ==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_customer SET name='$name',city='$city',email='$email',address='$address',phone='$phone' WHERE id ='$id'";
				$result = $this->db->insert($query);
				
				
			}
		}

	}
 ?>