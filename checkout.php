<?php
include 'inc/header.php';
$customer_id = Session::get('customer_id');
// $check_product_cart = $ct->get_product_cart($customer_id);


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ){
    
    $note = $_POST['note'];

	$update_customer  = $cs->update_customers($_POST,$customer_id);
	$insertOrder = $ct->insertOrder($customer_id,$note);
	$delCart = $ct->del_all_data_cart($customer_id);
	echo "<script> window.location = 'ordered.php' </script>";


}


?>
<!-- Header Section End -->
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
					<a href="./index.html"><i class="fa fa-home"></i> Home</a>
					<span>Shopping cart</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb End -->
<!-- Checkout Section Begin -->
<section class="checkout spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<span ></span>
			</div>
			<!-- <div class="col-lg-12">
				<h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click
					here to enter your code.</h6>
			</div> -->
		</div>
		<form action="" method="POST" class="checkout__form">
			<div class="row">
				<div class="col-lg-6">
					<h5>Thông tin khách hàng</h5>
					<div class="row">
						<?php
						$customer_id = Session::get('customer_id');
						$get_customers = $cs->show_customers($customer_id);
						if ($get_customers) {
							while ($result = $get_customers->fetch_assoc()) {

						?>
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="checkout__form__input">
										<p>Tên <span>*</span></p>
										<input name="name" type="text" value="<?= $result['name'] ?>">
									</div>
								</div>

								<div class="col-lg-12">

									<div class="checkout__form__input">
										<p>Địa chỉ <span>*</span></p>
										<input name="address" type="text" value="<?= $result['address'] ?>">

									</div>
									<div class="checkout__form__input">
										<p>Thành phố <span>*</span></p>
										<input name="city" type="text" value="<?= $result['city'] ?>">
									</div>


								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<div class="checkout__form__input">
										<p>Điện thoại <span>*</span></p>
										<input name="phone" type="text" value="<?= $result['phone'] ?>">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<div class="checkout__form__input">
										<p>Email <span>*</span></p>
										<input name="email" type="text" value="<?= $result['email'] ?>">
									</div>
								</div>
								<div class="col-lg-12">

									<div class="checkout__form__input">
										<p>Ghi chú <span>*</span></p>
										<input name="note" type="text" placeholder="Note about your order, e.g, special noe for delivery">
									</div>
								</div>
						<?php
							}
						}
						?>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="checkout__order">
						<h5>Đặt hàng của bạn</h5>
						<div class="checkout__order__product">
							<ul>
							<li>
											<span class="top__text">Sản phẩm</span>
											<span class="top__text__right">Tổng cộng</span>
										</li>
								<?php
								/**
								 * show cart
								 */
								
								$get_product_cart = $ct->get_product_cart($customer_id);
								$total = 0;
								$subtotal = 0;
								if ($get_product_cart) {
									$total = 0;
									$i = 0;
									while ($result = $get_product_cart->fetch_assoc()) {
										$i++;

								?>
										
										<li><?= $i ?>. <?= $result['productName'] ?> <span>$ <?= $total = $result['quantity'] * $result['price'] ?></span></li>
								<?php
										$subtotal += $total;
									}
									
								}
								?>
							</ul>
						</div>
						<div class="checkout__order__total">
							<ul>
								<li>Tổng tiền <span>$ <?= $subtotal??0?></span></li>
								<!-- <li>Total <span>$ 750.0</span></li> -->
							</ul>
						</div>
					
						<input type="submit" name="submit" class="site-btn" value="Đặt hàng"></input>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>
<!-- Checkout Section End -->
<!-- Instagram Begin -->
<?php include 'inc/instagram.php'; ?>
<!-- Instagram End -->
<!-- Footer Section Begin -->
<?php include 'inc/footer.php'; ?>