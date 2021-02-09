<?php include 'inc/header.php'; 
$customer_id = Session::get('customer_id');
if(isset($_GET['cartid']))
{
	$cartid = $_GET['cartid']; 
	$delcart = $ct->del_product_cart($cartid,$customer_id);
	echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
}
   
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	// LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST

	$cartIdArray = $_POST['cartId'];
	$proIdArray = $_POST['proId'];
	$quantityArray = $_POST['quantity'];

	for ($i = 0; $i < count($cartIdArray); $i++) {
		$proId = $proIdArray[$i];
		$cartId = $cartIdArray[$i];
		$quantity = $quantityArray[$i];

		$update_quantity_Cart = $ct->update_quantity_Cart($proId, $cartId, $quantity,$customer_id); // hàm check catName khi submit lên
		if ($quantity <= 0) {
			$delcart = $ct->del_product_cart($cartId,$customer_id);
		}
	}
	echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
}

/**
 * 
 */
// if(!isset($_GET['id'])){
// 	echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
// }


?>
<!-- Header Section End -->
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
					<a href="./index.php"><i class="fa fa-home"></i> Home</a>
					<span>Shopping cart</span>
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
					<div class="shop__cart__table">
						<table>
							<thead>
								<tr>
									<th>Sản phẩm</th>
									<th>Giá</th>
									<th>Số lượng</th>
									<th>Tổng tiền</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								 $customer_id = Session::get('customer_id');
								$get_product_cart = $ct->get_product_cart($customer_id);
								$subtotal = 0;
									$qty = 0;
								if ($get_product_cart) {
									
									while ($result = $get_product_cart->fetch_assoc()) {
								?>
										<tr>
											<td class="cart__product__item">
												<img width="90" height="90" src="admin/uploads/<?= $result['image'] ?>" alt="" data-pagespeed-url-hash="4207875790" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
												<div class="cart__product__item__title">
													<h6>Chain bucket bag</h6>
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
											<td class="cart__quantity">
												<div class="pro-qty">
													<input type="text" name="quantity[]" value="<?= $result['quantity']; ?>">
												</div>
											</td>
											<td class="cart__total">$ <?= $fm->format_currency($total = $result['price'] * $result['quantity']) ?></td>
											<td class="cart__close">
												<a style="color:#444444; padding:7px" href="?cartid=<?= $result['cartId'] ?>">X</a>
												<!-- <span class="icon_close"></span> -->
											</td>
										</tr>
										<!-- get cart id , productId, quantity each product to update -->
										<input type="hidden" name="cartId[]" min="0" value="<?php echo $result['cartId'] ?>" />
										<input type="hidden" name="proId[]" min="0" value="<?php echo $result['productId'] ?>" />

								<?php
										
										$subtotal += $total;
										$qty = $qty + $result['quantity'];
									}
								}
								?>
								<?php
								/**
								 * get quantity cart
								 * 
								 */
								Session::set('sum',$subtotal);
								Session::set('qty',$qty);
								
								
								?>


							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="cart__btn">
						<a href="shop.php">Tiếp tục mua hàng</a>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="cart__btn update__btn">
						<span class="icon_loading"></span> <input name="submit" style=" border: transparent; background-color:#F5F5F5;color:#111111;font-weight:600; height:45px" type="submit" value="Cập nhật">
					</div>
				</div>
			</div>
		</form>
		<div class="row">
			<div class="col-lg-6">
				<!-- <div class="discount__content">
					<h6>Discount codes</h6>
					<form action="#">
						<input type="text" placeholder="Enter your coupon code">
						<button type="submit" class="site-btn">Apply</button>
					</form>
				</div> -->
			</div>
			<div class="col-lg-4 offset-lg-2">
				<div class="cart__total__procced">
					<h6>Tổng tiền giỏ hàng</h6>
					<ul>
						<li>Tổng tiền <span>$ <?= $fm->format_currency($subtotal)??0 ?></span></li>

					</ul>
					<a href="checkout.php" class="primary-btn">TIến hành thanh toán</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Shop Cart Section End -->
<!-- Instagram Begin -->
<?php include 'inc/instagram.php'; ?>
<!-- Instagram End -->
<!-- Footer Section Begin -->
<?php include 'inc/footer.php'; ?>