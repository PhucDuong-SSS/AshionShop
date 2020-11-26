<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/cart.php');
include_once($filepath . '/../classes/customer.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php
$customer = new customer();
$fm = new Format(); 
if(!isset($_GET['customerId']) || $_GET['customerId'] == NULL){
	// echo "<script> window.location = 'user.php' </script>";
	
}else {
	$id = $_GET['customerId']; // Lấy catid trên host
	$deleteCustomer = $customer -> del_product($id); // hàm check delete Name khi submit lên
}


?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Danh sách người dùng</h2>
		<div class="block">

			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>No.</th>
						<th>Tên</th>
						<th>Địa chỉ</th>
						<th>Thành phố</th>
						<th>Giới tính</th>
						<th>Email</th>
						<th>Điện thoại</th>
						<th>Xử lý</th>
					</tr>
				</thead>
				<tbody>
					<?php
					
					$get_info_customer = $customer->show_all_customers();
					if ($get_info_customer) {
						$i = 0;
						while ($result = $get_info_customer->fetch_assoc()) {
							$i++;

					?>
							<tr class="odd gradeX">
								<td><?= $i; ?></td>
								<td><?= $result['name']; ?></td>
								<td><?= $result['address'] ?> </td>
								<td><?= $result['city'] ?></td>
								<td><?= $result['gender']==1?'Nam':'Nữ' ?></td>
								<td><?= $result['email'] ?></td>
								<td><?= $result['phone'] ?></td>
								<td><a href="?customerId=<?= $result['id'] ?>">Xóa</a> </a></td>
								
								
								
							</tr>
					<?php
						}
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		setupLeftMenu();

		$('.datatable').dataTable();
		setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php'; ?>