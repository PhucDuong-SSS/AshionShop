<?php
include 'inc/header.php';
?>
<?php
$customer_id = Session::get('customer_id');
/**
 * get product id of product that want to show details
 */
if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
	echo "<script> window.location = 'index.php' </script>";
} else {
	$id = $_GET['proid']; // Get product id
	$viewProduct = $product ->count_view($id);

}

/**
 * 
 */
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    
	$quantity = $_POST['quantity'];
	$productId = $_POST['productId'];

	if ($customer_id === false) {
		echo "<meta http-equiv='refresh' content='0;URL=login.php'>";
} else {

		$insertCart = $ct->add_to_cart($productId, $quantity, $customer_id);
		echo "<meta http-equiv='refresh' content='0;URL=details.php?proid=$productId'>";
	
	}


}
/**
 * get details product from database
 */
$get_product_details = $product->get_details($id);
if ($get_product_details) 
{
 $result_details = $get_product_details->fetch_assoc();

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
					<a href="#"><?=$result_details['brandName'] ?></a>
					<span><?= $result_details['productName']?></span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb End -->
<!-- Product Details Section Begin -->
<section class="product-details spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="product__details__pic">
					<div class="product__details__pic__left product__thumb nice-scroll">
						<a class="pt active" href="#product-1">
                            <img src="admin/uploads/<?= $result_details['image'] ?>" alt="">
						</a>
						<a class="pt" href="#product-2">
                          <img src="admin/uploads/<?= $result_details['image'] ?>" alt="">
						</a>
						<a class="pt" href="#product-3">
                             <img src="admin/uploads/<?= $result_details['image'] ?>" alt="">
						</a>
						<a class="pt" href="#product-4">
                          <img src="admin/uploads/<?= $result_details['image'] ?>" alt="">
						</a>
					</div>
					<div class="product__details__slider__content">
						<div class="product__details__pic__slider owl-carousel">
							<img data-hash="product-1" class="product__big__img" src="admin/uploads/<?= $result_details['image'] ?>" alt="">
							<img data-hash="product-2" class="product__big__img" src="admin/uploads/<?= $result_details['image'] ?>" alt="">
							<img data-hash="product-3" class="product__big__img" src="admin/uploads/<?= $result_details['image'] ?>" alt="">
							<img data-hash="product-4" class="product__big__img" src="admin/uploads/<?= $result_details['image'] ?>" alt="">
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="product__details__text">
                    
					<h3><?= $result_details['productName'];?> <span>Category: <?= $result_details['catName']?></span></h3>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<span>( <?= $result_details['product_view'];?> )</span>
					</div>
					<div class="product__details__price">$ <?= $fm->format_currency($result_details['price']) ?> <span></span></div>
					<p> <?= $result_details['product_desc'] ?>						                                        </p>
				<form action="" method="post">
					<div class="product__details__button">
						<div class="quantity">
							<span>Quantity:</span>
							<div class="pro-qty">
								<input name="quantity" type="text" value="1">
							</div>
						</div>
						<input name="productId" type="hidden" value=" <?= $result_details['productId'];?>">
						<input type="submit" name="submit" value="Add to cart" class="cart-btn" style="border: transparent;" > </input>
						<ul>
							<li><a href="#"><span class="icon_heart_alt"></span></a></li>
							<li><a href="#"><span class="icon_adjust-horiz"></span></a></li>
						</ul>
					</div>
					</form>
					<div class="product__details__widget">
						<ul>
							<li>
								<span>Availability:</span>
								<div class="stock__checkbox">
									<label for="stockin">
										In Stock
										<input type="checkbox" id="stockin">
										<span class="checkmark"></span>
									</label>
								</div>
							</li>
							<li>
								<span>Available color:</span>
								<div class="color__checkbox">
									<label for="red">
										<input type="radio" name="color__radio" id="red" checked>
										<span class="checkmark"></span>
									</label>
									<label for="black">
										<input type="radio" name="color__radio" id="black">
										<span class="checkmark black-bg"></span>
									</label>
									<label for="grey">
										<input type="radio" name="color__radio" id="grey">
										<span class="checkmark grey-bg"></span>
									</label>
								</div>
							</li>
							<li>
								<span>Available size:</span>
								<div class="size__btn">
									<label for="xs-btn" class="active">
										<input type="radio" id="xs-btn">
										xs
									</label>
									<label for="s-btn">
										<input type="radio" id="s-btn">
										s
									</label>
									<label for="m-btn">
										<input type="radio" id="m-btn">
										m
									</label>
									<label for="l-btn">
										<input type="radio" id="l-btn">
										l
									</label>
								</div>
							</li>
							<li>
								<span>Promotions:</span>
								<p>Free shipping</p>
							</li>
						</ul>
					</div>
                </div>
                
			</div>
			<div class="col-lg-12">
				<div class="product__details__tab">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Specification</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews ( 2 )</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tabs-1" role="tabpanel">
							<h6>Description</h6>
							<p> <?= $result_details['product_desc']?>.</p>
							<p></p>
						</div>
						<div class="tab-pane" id="tabs-2" role="tabpanel">
							<h6>Specification</h6>
							<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
								quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
								Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
								voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
								consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
								consequat massa quis enim.</p>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
								dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
								nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
								quis, sem.</p>
						</div>
						<div class="tab-pane" id="tabs-3" role="tabpanel">
							<h6>Reviews ( 2 )</h6>
							<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
								quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
								Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
								voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
								consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
								consequat massa quis enim.</p>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
								dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
								nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
								quis, sem.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="related__title">
					<h5>RELATED PRODUCTS</h5>
				</div>
            </div>
            <?php
            /**
             * Show raetated product by catId
             */
			$idCat = $result_details['catId'];
			
            $product_related = $product->getproduct_related($idCat);
            if ($product_related) {
                while ($result_related = $product_related->fetch_assoc()) {

            ?>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="product__item">
					<div class="product__item__pic set-bg" data-setbg="admin/uploads/<?= $result_related['image'] ?>">
						<div class="label new">New</div>
						<ul class="product__hover">
							<li><a href="admin/uploads/<?= $result_related['image'] ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
							<li><a href="#"><span class="icon_heart_alt"></span></a></li>
							<li><a href="#"><span class="icon_bag_alt"></span></a></li>
						</ul>
					</div>
					<div class="product__item__text">
					<h6><a href="details.php?proid=<?php echo $result_related['productId']?>"><?= $result_related['productName'] ?></a></h6>
						<div class="rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<div class="product__price">$ <?= $fm->format_currency($result_related['price']) ?></div>
					</div>
				</div>
            </div>
            <?php 
                }}
            ?>
			
		
		</div>
	</div>
</section>
<!-- Product Details Section End -->
<!-- Instagram Begin -->
<?php include 'inc/instagram.php'; ?>
<!-- Instagram End -->
<!-- Footer Section Begin -->
<?php include 'inc/footer.php'; ?>