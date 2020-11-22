<?php
include 'inc/header.php';
?>

<?php 
/**
 * add to cart (page index)
 */

$customer_id = Session::get('customer_id');

if (isset($_GET['proId']) && isset($_GET['quantity'])) {

    // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC get
    $id = $_GET['proId'];

    $quantity = $_GET['quantity'];

    if ($customer_id === false) {
        echo "<meta http-equiv='refresh' content='0;URL=login.php'>";
    } else {

        $insertCart = $ct->add_to_cart($id, $quantity, $customer_id);
        echo "<meta http-equiv='refresh' content='0;URL=shop.php'>";
    }
}
/**
 * login to add wishlist
 */
if (isset($_GET['proIdWishLish'])) {

	// LẤY DỮ LIỆU TỪ PHƯƠNG THỨC get
	$productId = $_GET['proIdWishLish'];

	if ($customer_id === false) {
			echo "<meta http-equiv='refresh' content='0;URL=login.php'>";
	} else {

			$insertWishlist = $product->insertWishlist($productId, $customer_id);
			echo "<meta http-equiv='refresh' content='0;URL=shop.php'>";
	}
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
					<span>Shop</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb End -->
<!-- Shop Section Begin -->
<section class="shop spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3">
				<div class="shop__sidebar">
					<div class="sidebar__categories">
						<div class="section-title">
							<h4>Categories</h4>
						</div>
						<div class="categories__accordion">
							<div class="accordion" id="accordionExample">
								<div class="card">
									<div class="card-heading active">
										<a id="show_women" data-women="13" data-toggle="collapse" data-target="#collapseOne">Women</a>
									</div>
									<div id="collapseOne" class="collapse show" data-parent="#accordionExample">
										<div class="card-body">
											<ul>
												<li><a href="#">Coats</a></li>
												<li><a href="#">Jackets</a></li>
												<li><a href="#">Dresses</a></li>
												<li><a href="#">Shirts</a></li>
												<li><a href="#">T-shirts</a></li>
												<li><a href="#">Jeans</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-heading">
										<a id="show_men" data-men="14" data-toggle="collapse" data-target="#collapseTwo">Men</a>
									</div>
									<div id="collapseTwo" class="collapse" data-parent="#accordionExample">
										<div class="card-body">
											<ul>
												<li><a href="#">Coats</a></li>
												<li><a href="#">Jackets</a></li>
												<li><a href="#">Dresses</a></li>
												<li><a href="#">Shirts</a></li>
												<li><a href="#">T-shirts</a></li>
												<li><a href="#">Jeans</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-heading">
										<a id="show_kid" data-kid="15" data-toggle="collapse" data-target="#collapseThree">Kids</a>
									</div>
									<div id="collapseThree" class="collapse" data-parent="#accordionExample">
										<div class="card-body">
											<ul>
												<li><a href="#">Coats</a></li>
												<li><a href="#">Jackets</a></li>
												<li><a href="#">Dresses</a></li>
												<li><a href="#">Shirts</a></li>
												<li><a href="#">T-shirts</a></li>
												<li><a href="#">Jeans</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-heading">
										<a id="show_acc" data-acc="17" data-toggle="collapse" data-target="#collapseFour">Accessories</a>
									</div>
									<div id="collapseFour" class="collapse" data-parent="#accordionExample">
										<div class="card-body">
											<ul>
												<li><a href="#">Coats</a></li>
												<li><a href="#">Jackets</a></li>
												<li><a href="#">Dresses</a></li>
												<li><a href="#">Shirts</a></li>
												<li><a href="#">T-shirts</a></li>
												<li><a href="#">Jeans</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-heading">
										<a id="show_cos" data-cos="16" data-toggle="collapse" data-target="#collapseFive">Cosmetic</a>
									</div>
									<div id="collapseFive" class="collapse" data-parent="#accordionExample">
										<div class="card-body">
											<ul>
												<li><a href="#">Coats</a></li>
												<li><a href="#">Jackets</a></li>
												<li><a href="#">Dresses</a></li>
												<li><a href="#">Shirts</a></li>
												<li><a href="#">T-shirts</a></li>
												<li><a href="#">Jeans</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="sidebar__filter">
						<div class="section-title">
							<h4>Shop by price</h4>
						</div>
						<div class="filter-range-wrap">
							<div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="5" data-max="300"></div>
							<div class="range-slider">
								<div class="price-input">
									<p>Price:</p>
									<input type="text" id="minamount">
									<input type="text" id="maxamount">
								</div>
							</div>
						</div>
						<a id="filter_btn" >Filter</a>
					</div>
					<div class="sidebar__sizes">
						<div class="section-title">
							<h4>Shop by size</h4>
						</div>
						<div class="size__list">
							<label for="xxs">
								xxs
								<input type="checkbox" id="xxs">
								<span class="checkmark"></span>
							</label>
							<label for="xs">
								xs
								<input type="checkbox" id="xs">
								<span class="checkmark"></span>
							</label>
							<label for="xss">
								xs-s
								<input type="checkbox" id="xss">
								<span class="checkmark"></span>
							</label>
							<label for="s">
								s
								<input type="checkbox" id="s">
								<span class="checkmark"></span>
							</label>
							<label for="m">
								m
								<input type="checkbox" id="m">
								<span class="checkmark"></span>
							</label>
							<label for="ml">
								m-l
								<input type="checkbox" id="ml">
								<span class="checkmark"></span>
							</label>
							<label for="l">
								l
								<input type="checkbox" id="l">
								<span class="checkmark"></span>
							</label>
							<label for="xl">
								xl
								<input type="checkbox" id="xl">
								<span class="checkmark"></span>
							</label>
						</div>
					</div>
					<div class="sidebar__color">
						<div class="section-title">
							<h4>Shop by size</h4>
						</div>
						<div class="size__list color__list">
							<label for="black">
								Blacks
								<input type="checkbox" id="black">
								<span class="checkmark"></span>
							</label>
							<label for="whites">
								Whites
								<input type="checkbox" id="whites">
								<span class="checkmark"></span>
							</label>
							<label for="reds">
								Reds
								<input type="checkbox" id="reds">
								<span class="checkmark"></span>
							</label>
							<label for="greys">
								Greys
								<input type="checkbox" id="greys">
								<span class="checkmark"></span>
							</label>
							<label for="blues">
								Blues
								<input type="checkbox" id="blues">
								<span class="checkmark"></span>
							</label>
							<label for="beige">
								Beige Tones
								<input type="checkbox" id="beige">
								<span class="checkmark"></span>
							</label>
							<label for="greens">
								Greens
								<input type="checkbox" id="greens">
								<span class="checkmark"></span>
							</label>
							<label for="yellows">
								Yellows
								<input type="checkbox" id="yellows">
								<span class="checkmark"></span>
							</label>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-9">
				<span id="pagination_data"></span>

				



				
			</div>
		</div>
	</div>
</section>
<!-- Shop Section End -->
<!-- Instagram Begin -->
<?php include 'inc/instagram.php'; ?>
<!-- Instagram End -->
<!-- Footer Section Begin -->
<?php include 'inc/footer.php'; ?>