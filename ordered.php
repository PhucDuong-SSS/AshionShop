<?php include 'inc/header.php';


	$login_check = Session::get('customer_login');
	  if ($login_check==false) {
        echo "<script> window.location = 'login.php' </script>";

	  }

 
	if(isset($_GET['confirmid'])){
     	$id = $_GET['confirmid'];
     	$time = $_GET['time'];
     	$price = $_GET['price'];
     	$shifted_confirm = $ct->shifted_confirm($id,$time,$price);
    }




?>
<!-- Header Section End -->
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
					<a href="./index.php"><i class="fa fa-home"></i> Home</a>
					<span>Ordered</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb End -->
<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
	<div class="container">
		<form action="" method="POST">
			<div class="row">
				<div class="col-lg-12">
					<div class="shop__cart__table" style="text-align: center;">
						<table>
							<thead>
								<tr>
									<th>No</th>
									<th>Product</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$customer_id = Session::get('customer_id');
								$get_cart_ordered = $ct->get_cart_ordered($customer_id);
								if ($get_cart_ordered) {
									$i = 0;
									$qty = 0;
									while ($result = $get_cart_ordered->fetch_assoc()) {
										$i++;
								?>
										<tr>
											<td><?= $i ?></td>
											<td class="cart__product__item">
												<img width="90" height="90" src="admin/uploads/<?= $result['image'] ?>" alt="" data-pagespeed-url-hash="4207875790" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
												<div class="cart__product__item__title">
													<h6><?= $result['productName']; ?></h6>
												<?php var_dump($result['productId']);?>	
													<div class="rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
												</div>
											</td>
											<td class="cart__price">$ <?= $fm->format_currency($result['price']); ?></td>
											<td class="cart__price">

												<?= $result['quantity'] ?>

											</td>
											<td>
												<?php
												if ($result['status'] == '0') {
													echo "Đang chờ xử lý";
												} elseif ($result['status'] == 1) {
												?>
													<span>Đã gửi hàng</span>

												<?php

												} elseif ($result['status'] == 2) {
													echo 'Đã nhận';
												}
												?>

                                            </td>  
                                            <?php 
								if ($result['status'] == '0') {
								 ?>

								<td><?php echo 'N/A'; ?></td>

								 <?php 
								 }elseif($result['status']==1) {
								 ?>	
								 <td>
								 	<a href="?confirmid=<?php echo $customer_id ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Xác nhận</a>
								 </td>
								 <?php 
								}else{
								  ?>
								  
								<td><?php echo 'Đã nhận'; ?></td>
								<?php 
								}
								 ?>
											<!-- <td class="cart__close" style="text-align: center;">
												<a style="color:#444444; padding:7px" href="?wishlistId=<?= $result['id'] ?>">Xoa</a>

											</td> -->
										</tr>
										<!-- get cart id , productId, quantity each product to update -->
										<input type="hidden" name="customerId[]" min="0" value="<?php echo $result['customerId'] ?>" />
										<input type="hidden" name="productId[]" min="0" value="<?php echo $result['productId'] ?>" />
										<input type="hidden" name="wishlistId[]" min="0" value="<?php echo $result['id'] ?>" />

								<?php

									}
								}
								?>



							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="cart__btn">
						<a href="index.php">Continue Shopping</a>
					</div>
				</div>
				
			</div>
		</form>

	</div>
</section>
<!-- Shop Cart Section End -->
<!-- Instagram Begin -->
<?php include 'inc/instagram.php'; ?>
<!-- Instagram End -->
<!-- Footer Section Begin -->
<?php include 'inc/footer.php'; ?>