<?php include 'inc/header.php'; 
$customer_id = Session::get('customer_id');
if(isset($_GET['wishlistId']))
{
	$wishlistId = $_GET['wishlistId']; 
	$delcart = $product->del_wlist($wishlistId,$customer_id);
	echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
}
   
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	// LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
    // var_dump($_POST);
	$customerArray = $_POST['customerId'];
	$proIdArray = $_POST['productId'];
	$quantityArray = $_POST['quantity'];
	$wistlistIdArray = $_POST['wishlistId'];

	for ($i = 0; $i < count($proIdArray); $i++) {
        $productId = $proIdArray[$i];
        var_dump($productId);
		$customer_id = $customerArray[$i];
        $quantity = $quantityArray[$i];
        $wishlistId =$wistlistIdArray[$i];

		$update_quantity_Cart = $ct->add_to_cart($productId, $quantity,$customer_id); // hàm check catName khi submit lên
		if ($quantity <= 0) {
            
			$delcart = $product->del_wlist($wishlistId,$customer_id);
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
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								 $customer_id = Session::get('customer_id');
								$get_wishlist = $product->get_wishlist($customer_id);
								$subtotal = 0;
									$qty = 0;
								if ($get_wishlist) {
									
									while ($result = $get_wishlist->fetch_assoc()) {
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
													<input type="text" name="quantity[]" value="1">
												</div>
											</td>
											<td class="cart__close" style="text-align: center;">
												<a style="color:#444444; padding:7px" href="?wishlistId=<?= $result['id'] ?>">Xóa</a>
												
											</td>
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
						<a href="index.php">Tiếp tục mua hàng</a>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="cart__btn update__btn">
						<span class="icon_loading"></span> <input name="submit" style=" border: transparent; background-color:#F5F5F5;color:#111111;font-weight:600; height:45px" type="submit" value="Thêm giỏ hàng">
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