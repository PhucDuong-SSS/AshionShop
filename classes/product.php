<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
/**
 * 
 */
class product
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function insert_product($data, $files)
	{

		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$product_code = mysqli_real_escape_string($this->db->link, $data['product_code']);
		$productQuantity = mysqli_real_escape_string($this->db->link, $data['productQuantity']);
		$category = mysqli_real_escape_string($this->db->link, $data['category']);
		$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
		$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
		$price = mysqli_real_escape_string($this->db->link, $data['price']);
		$type = mysqli_real_escape_string($this->db->link, $data['type']);
		$trend = mysqli_real_escape_string($this->db->link, $data['istrend']);
		$gender = mysqli_real_escape_string($this->db->link, $data['gender']);
		$show = mysqli_real_escape_string($this->db->link, $data['show']);
		//mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db


		// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
		$permited = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_temp = $_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
		// $unique_image = $this->fm->validation($unique_image);
		$uploaded_image = "uploads/" . $unique_image;

		if ($product_code == '' || $productName == "" || $productQuantity == "" || $category == "" || $brand == "" || $product_desc == "" || $price == "" || $type == "" || $file_name == "" || $trend == "" || $gender == "" || $show == "") {
			$alert = "<span class='error'>Fiedls must be not empty</span>";
			return $alert;
		} else {
			move_uploaded_file($file_temp, $uploaded_image);
			$query = "INSERT INTO tbl_product(productName,product_code,product_remain,productQuantity,catId,brandId,product_desc,price,type,image,istrend,product_gender, product_show) VALUES('$productName','$product_code','$productQuantity','$productQuantity','$category','$brand','$product_desc','$price','$type','$unique_image','$trend','$gender', $show) ";

			$result = $this->db->insert($query);
			if ($result) {
				$alert = "<span class='success'>Insert Product Successfully</span>";
				return $alert;
			} else {
				$alert = "<span class='error'>Insert Prodcut NOT Success</span>";
				return $alert;
			}
		}
	}
	public function insert_slider($date, $files)
	{
		$sliderName = mysqli_real_escape_string($this->db->link, $date['sliderName']);
		$type = mysqli_real_escape_string($this->db->link, $date['type']);
		//mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db

		// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
		$permited  = array('jpg', 'jpeg', 'png', 'gif');

		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_temp = $_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		// $file_current = strtolower(current($div));
		$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
		$uploaded_image = "uploads/" . $unique_image;


		if ($sliderName == "" || $type == "") {
			$alert = "<span class='error'>Fields must be not empty</span>";
			return $alert;
		} else {
			if (!empty($file_name)) {
				//Nếu người dùng chọn ảnh
				if ($file_size > 2048000) {

					$alert = "<span class='success'>Image Size should be less then 2MB!</span>";
					return $alert;
				} elseif (in_array($file_ext, $permited) === false) {
					// echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
					$alert = "<span class='success'>You can upload only:-" . implode(', ', $permited) . "</span>";
					return $alert;
				}
				move_uploaded_file($file_temp, $uploaded_image);

				$query = "INSERT INTO tbl_slider(sliderName,type,slider_image) VALUES('$sliderName','$type','$unique_image') ";
				$result = $this->db->insert($query);
				if ($result) {
					$alert = "<span class='success'>Slider Added Successfully</span>";
					return $alert;
				} else {
					$alert = "<span class='error'>Slider Added NOT Success</span>";
					return $alert;
				}
			}
		}
	}
	public function show_slider()
	{
		$query = "SELECT * FROM tbl_slider where type='1' order by sliderId desc";
		$result = $this->db->select($query);
		return $result;
	}
	public function show_slider_list()
	{
		$query = "SELECT * FROM tbl_slider order by sliderId desc";
		$result = $this->db->select($query);
		return $result;
	}
	/**
	 * show product warehouse
	 */
	public function show_product_warehouse()
	{
		$query =
			"SELECT tbl_product.*, tbl_warehouse.*

			 FROM tbl_product INNER JOIN tbl_warehouse ON tbl_product.productId = tbl_warehouse.id_sanpham
								
			 order by tbl_warehouse.sl_ngaynhap desc ";


		$result = $this->db->select($query);
		return $result;
	}
	public function show_product()
	{
		$query =
			"SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName

			 FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
								INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
			 order by tbl_product.productId desc ";

		// $query = "SELECT * FROM tbl_product order by productId desc ";
		$result = $this->db->select($query);
		return $result;
	}
	public function update_type_slider($id, $type)
	{

		$type = mysqli_real_escape_string($this->db->link, $type);
		$query = "UPDATE tbl_slider SET type = '$type' where sliderId='$id'";
		$result = $this->db->update($query);
		return $result;
	}
	public function del_slider($id)
	{
		$query = "DELETE FROM tbl_slider where sliderId = '$id' ";
		$result = $this->db->delete($query);
		if ($result) {
			$alert = "<span class='success'>Slider Deleted Successfully</span>";
			return $alert;
		} else {
			$alert = "<span class='success'>Slider Deleted Not Success</span>";
			return $alert;
		}
	}
	public function update_quantity_product($data, $files, $id)
	{
		$product_more_quantity = mysqli_real_escape_string($this->db->link, $data['product_more_quantity']);
		$product_remain = mysqli_real_escape_string($this->db->link, $data['product_remain']);

		if ($product_more_quantity == "") {

			$alert = "<span class='error'>Fields must be not empty</span>";
			return $alert;
		} else {
			$qty_total = $product_more_quantity + $product_remain;
			//Nếu người dùng không chọn ảnh
			$query = "UPDATE tbl_product SET
					
					product_remain = '$qty_total'

					WHERE productId = '$id'";
		}
		$query_warehouse = "INSERT INTO tbl_warehouse(id_sanpham,sl_nhap) VALUES('$id','$product_more_quantity') ";
		$result_insert = $this->db->insert($query_warehouse);
		$result = $this->db->update($query);

		if ($result) {
			$alert = "<span class='success'>Thêm số lượng thành công</span>";
			return $alert;
		} else {
			$alert = "<span class='error'>Thêm số lượng không thành công</span>";
			return $alert;
		}
	}
	public function update_product($data, $files, $id)
	{

		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$product_code = mysqli_real_escape_string($this->db->link, $data['product_code']);
		$productQuantity = mysqli_real_escape_string($this->db->link, $data['productQuantity']);
		$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
		$category = mysqli_real_escape_string($this->db->link, $data['category']);
		$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
		$price = mysqli_real_escape_string($this->db->link, $data['price']);
		$type = mysqli_real_escape_string($this->db->link, $data['type']);
		$trend = mysqli_real_escape_string($this->db->link, $data['istrend']);
		$gender = mysqli_real_escape_string($this->db->link, $data['gender']);
		$show = mysqli_real_escape_string($this->db->link, $data['show']);
		//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
		$permited  = array('jpg', 'jpeg', 'png', 'gif');

		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_temp = $_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		// $file_current = strtolower(current($div));
		$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
		$uploaded_image = "uploads/" . $unique_image;


		if ($product_code == "" || $productName == "" || $productQuantity == "" || $brand == "" || $category == "" || $product_desc == "" || $price == "" || $type == "" || $trend == "" || $gender == "" || $show == "") {
			$alert = "<span class='error'>Fields must be not empty</span>";
			return $alert;
		} else {
			if (!empty($file_name)) {
				//Nếu người dùng chọn ảnh
				if ($file_size > 20480) {

					$alert = "<span class='success'>Image Size should be less then 2MB!</span>";
					return $alert;
				} elseif (in_array($file_ext, $permited) === false) {
					// echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";	
					$alert = "<span class='success'>You can upload only:-" . implode(', ', $permited) . "</span>";
					return $alert;
				}
				move_uploaded_file($file_temp, $uploaded_image);
				$query = "UPDATE tbl_product SET
					productName = '$productName',
					product_code = '$product_code',
					productQuantity = '$productQuantity',
					brandId = '$brand',
					catId = '$category', 
					type = '$type', 
					price = '$price', 
					image = '$unique_image',
					product_desc = '$product_desc',
					istrend = '$trend',
					product_gender = '$gender',
					product_show = '$show'
					WHERE productId = '$id'";
			} else {
				//Nếu người dùng không chọn ảnh
				$query = "UPDATE tbl_product SET

					productName = '$productName',
					product_code = '$product_code',
					productQuantity = '$productQuantity',
					brandId = '$brand',
					catId = '$category', 
					type = '$type', 
					price = '$price', 
					
					product_desc = '$product_desc',
					istrend = '$trend',
					product_gender = '$gender',
					product_show = '$show'
					WHERE productId = '$id'";
			}
			$result = $this->db->update($query);
			if ($result) {
				$alert = "<span class='success'>Sản phẩm Updated thành công</span>";
				return $alert;
			} else {
				$alert = "<span class='error'>Sản phẩm Updated không thành công</span>";
				return $alert;
			}
		}
	}
	public function del_product($id)
	{
		$query = "DELETE FROM tbl_product where productId = '$id' ";
		$result = $this->db->delete($query);
		if ($result) {
			$alert = "<span class='success'>Product Deleted Successfully</span>";
			return $alert;
		} else {
			$alert = "<span class='success'>Product Deleted Not Success</span>";
			return $alert;
		}
	}

	public function getproductbyId($id)
	{
		$query = "SELECT * FROM tbl_product where productId = '$id' ";
		$result = $this->db->select($query);
		return $result;
	}
	public function count_view($productId)
	{
		$query = "SELECT * FROM tbl_product where productId = '$productId' ";
		$result = $this->db->select($query)->fetch_assoc();
		$quantity =$result['product_view'];
		$quantity++;
		$query_update = "UPDATE tbl_product SET

					product_view = '$quantity'					
					
					WHERE productId = '$productId'";
					$result = $this->db->insert($query_update);
					return $result;
	}
	//Kết thúc Backend

	public function getproduct_featheread()
	{
		$query = "SELECT * FROM tbl_product where type = '0' order by productId desc LIMIT 4 ";
		$result = $this->db->select($query);
		return $result;
	}
	/**
	 * get new product for index page
	 */
	public function getproduct_new()
	{
		$query = "SELECT * FROM tbl_product 
			WHERE brandId = '13' or brandId ='14'
			order by productId desc LIMIT 8 ";
		$result = $this->db->select($query);
		return $result;
	}
	/**
	 * get new product woment limit = 8
	 */
	public function getproduct_women()
	{
		$query = "SELECT * FROM tbl_product 
			WHERE brandId = '13' 
			order by productId desc LIMIT 8 ";
		$result = $this->db->select($query);
		return $result;
	}
	/**
	 * get new product men limit = 8
	 */
	public function getproduct_men()
	{
		$query = "SELECT * FROM tbl_product 
			WHERE brandId = '14' 
			order by productId desc LIMIT 8 ";
		$result = $this->db->select($query);
		return $result;
	}
	/**
	 * get new product men limit = 8
	 */
	public function getproduct_kid()
	{
		$query = "SELECT * FROM tbl_product 
			WHERE brandId = '15' 
			order by productId desc LIMIT 8 ";
		$result = $this->db->select($query);
		return $result;
	}
	/**
	 * get new product acccessories limit = 8
	 */
	public function getproduct_acc()
	{
		$query = "SELECT * FROM tbl_product 
			WHERE brandId = '17' 
			order by productId desc LIMIT 8 ";
		$result = $this->db->select($query);
		return $result;
	}
	/**
	 * get new product cosmetics limit = 8
	 */
	public function getproduct_cos()
	{
		$query = "SELECT * FROM tbl_product 
			WHERE brandId = '16' 
			order by productId desc LIMIT 8 ";
		$result = $this->db->select($query);
		return $result;
	}

	/////////////////////////////////////////////////////////
	public function getproduct_all_pagination($page,$brandId)
	{
		$record_per_page = 9;

		
		$start_from = ($page - 1) * $record_per_page;


		$query = "SELECT * FROM tbl_product 
			WHERE brandId = '$brandId' 
			order by productId desc LIMIT $start_from, $record_per_page ";
		$result = $this->db->select($query);
		return $result;
	}
	public function getPaginationCategory($id)
	{
		$page_query = "SELECT * FROM tbl_product WHERE brandId = '$id' ORDER BY productId DESC"; 
		$record_per_page = 9;
		
		
		$result = $this->db->select($page_query);
		$total_records = mysqli_num_rows($result); 
		$total_pages = ceil($total_records/$record_per_page);
		return $total_pages;
	}

// filter product by price
public function getproduct_by_price($page,$brandId,$minAmount, $maxAmount)
{
	$record_per_page = 9;

	
	$start_from = ($page - 1) * $record_per_page;


	$query = "SELECT * FROM tbl_product 
		WHERE brandId = '$brandId'
		and price < $maxAmount and price > $minAmount
		
		order by productId desc LIMIT $start_from, $record_per_page ";
	$result = $this->db->select($query);
	return $result;
}
public function getPaginationCategoryFilter($id,$minAmount,$maxAmount)
{
	$page_query = "SELECT * FROM tbl_product WHERE brandId = '$id' 
	and price < $maxAmount and price > $minAmount
	ORDER BY productId DESC"; 
	$record_per_page = 9;
	
	
	$result = $this->db->select($page_query);
	$total_pages=1;
	if($result){
		$total_records = mysqli_num_rows($result); 
	$total_pages = ceil($total_records/$record_per_page);
	}
	
	return $total_pages;
}



	
	//search product
	public function getproduct_search($page,$search)
	{
		$record_per_page = 9;

		
		$start_from = ($page - 1) * $record_per_page;


		$query = "SELECT * FROM tbl_product 
			WHERE productName LIKE '%".$search."%'
			order by productId desc LIMIT $start_from, $record_per_page ";
		$result = $this->db->select($query);
		return $result;
	}
	public function getPaginationSearch($search)
	{
		$page_query = "SELECT * FROM tbl_product WHERE productName LIKE '%".$search."%'
		ORDER BY productId DESC"; 
		$record_per_page = 9;
		
		
		$result = $this->db->select($page_query);
		$total_records = mysqli_num_rows($result); 
		$total_pages = ceil($total_records/$record_per_page);
		return $total_pages;
  }

	/**
	 * get trend product for index page
	 * @return mixed
	 */
	public function getproduct_trend()
	{
		$query = "SELECT * FROM tbl_product 
			WHERE istrend = '1'
			order by created_ad desc LIMIT 3 ";
		$result = $this->db->select($query);
		return $result;
	}
	/**
	 * get best seller product for index page
	 * @return mixed
	 */
	public function getproduct_bestsell()
	{
		$query = "SELECT * FROM tbl_product 
			
			order by product_soldout desc LIMIT 3 ";
		$result = $this->db->select($query);
		return $result;
	}

	/**
	 * get feature product for index page
	 * @return mixed
	 */
	public function getproduct_feature()
	{
		$query = "SELECT * FROM tbl_product 
			WHERE type = '1'
			order by created_ad desc LIMIT 3 ";
		$result = $this->db->select($query);
		return $result;
	}
	/**
	 * get details product by Id 
	 */
	public function get_details($id)
	{
		$query =
			"SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName

			 FROM tbl_product
			 	INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
				INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
			 	WHERE tbl_product.productId = '$id'
			 ";

		$result = $this->db->select($query);
		return $result;
	}
	/**
	 * get related product by idCat details product
	 */
	public function getproduct_related($catId)
	{
		$query = "SELECT * FROM tbl_product
			WHERE catId = '$catId' order by productId desc limit 4";
		$result = $this->db->select($query);
		return $result;
	}


	public function getLastestSamsum()
	{
		$query = "SELECT * FROM tbl_product where brandId = '6' order by productId desc limit 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function get_compare($customer_id)
	{
		$query = "SELECT * FROM tbl_compare where customer_id = '$customer_id' order by id desc";
		$result = $this->db->select($query);
		return $result;
	}
	/**
	 * get wish list to show
	 */
	public function get_wishlist($customer_id)
	{
		$sId = session_id();
		$query = "SELECT * FROM tbl_wishlist WHERE sId = '$sId' AND customerId='$customer_id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function insertCompare($productid, $customer_id)
	{
		$productid = mysqli_real_escape_string($this->db->link, $productid);
		$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);

		$check_compare = "SELECT * FROM tbl_compare WHERE productId = '$productid' AND customer_id ='$customer_id'";
		$result_check_compare = $this->db->select($check_compare);

		if ($result_check_compare) {
			$msg = "<span class='error'>Sản phẩm đã được thêm vào so sánh</span>";
			return $msg;
		} else {

			$query = "SELECT * FROM tbl_product WHERE productId = '$productid'";
			$result = $this->db->select($query)->fetch_assoc();

			$productName = $result["productName"];
			$price = $result["price"];
			$image = $result["image"];



			$query_insert = "INSERT INTO tbl_compare(productId,price,image,customer_id,productName) VALUES('$productid','$price','$image','$customer_id','$productName')";
			$insert_compare = $this->db->insert($query_insert);

			if ($insert_compare) {
				$alert = "<span class='success'>Thêm sản phẩm vào so sánh thành công</span>";
				return $alert;
			} else {
				$alert = "<span class='error'>Thêm sản phẩm vào so sánh thất bại</span>";
				return $alert;
			}
		}
	}
	/**
	 * insert wishlist
	 */
	public function insertWishlist($productId, $customerId)
	{
		$productId = mysqli_real_escape_string($this->db->link, $productId);
		$customerId = mysqli_real_escape_string($this->db->link, $customerId);
		$sId = session_id();



		$check_wlist = "SELECT * FROM tbl_wishlist WHERE productId = '$productId' AND customerId ='$customerId'";
		$result_check_wlist = $this->db->select($check_wlist);

		if ($result_check_wlist) {
			return false;
		} else {

			$query = "SELECT * FROM tbl_product WHERE productId = '$productId'";
			$result = $this->db->select($query)->fetch_assoc();

			$productName = $result["productName"];
			$price = $result["price"];
			$image = $result["image"];



			$query_insert = "INSERT INTO tbl_wishlist(productId,sId,price,image,customerId,productName) VALUES('$productId','$sId','$price','$image','$customerId','$productName')";
			$insert_wlist = $this->db->insert($query_insert);
			return $insert_wlist;
		}
	}
	public function del_wlist($wishlistId, $customer_id)
	{
		$wishlistId = mysqli_real_escape_string($this->db->link, $wishlistId);
		$query = "DELETE FROM tbl_wishlist WHERE id = '$wishlistId' AND customerId ='$customer_id'";
		$result = $this->db->delete($query);
		return $result;
	}
	/**
	 * show quantity wist list
	 * 
	 */
	public function showQuantityWL($customerId)
	{
		$quantity = 0;
		$sId = session_id();
		$query = "SELECT COUNT(id) AS quantity FROM tbl_wishlist WHERE sId = '$sId' AND customerId='$customerId'";
		$result = $this->db->select($query);
		if ($result) {
			while ($row = $result->fetch_assoc()) {

				$quantity += $row['quantity'];
			}
		}
		return $quantity;
	}
// count product 
public function countProudct($brandId)
{
	$query = "SELECT COUNT(productId) AS quantityProduct FROM tbl_product WHERE brandId = '$brandId'";
	$result = $this->db->select($query);
		if ($result) {
			while ($row = $result->fetch_assoc()) {

				$quantity = $row['quantityProduct'];
			}
		}
		return $quantity;

}



}





?>