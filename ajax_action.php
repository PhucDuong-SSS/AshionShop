 <?php

include 'lib/session.php';
Session::init();


include 'lib/database.php';
include 'helpers/format.php';

spl_autoload_register(function ($class) {
	include_once "classes/" . $class . ".php";
});


$db = new Database();
$fm = new Format();
$ct = new cart();
$us = new user();
$cs = new customer();
$cat = new category();
$product = new product();


if(isset($_POST['index']) || isset($_POST['all'])){
	
/**
 * Show new 8 newest product of men and woment
 */
$product_new = $product->getproduct_new();
if ($product_new) {
	$output ='<div class="row property__gallery">';
	while ($result_new = $product_new->fetch_assoc()) {

 
	$output .='
	<div class="col-lg-3 col-md-4 col-sm-6 mix women">
	<div class="product__item">
			<div class="product__item__pic" id="product__item__pic">
					<div class="home-product-item">
							<a href="details.php?proid='.$result_new['productId'].'">
									<div class="home-product-item__img" style="background-image: url(\'admin/uploads/'.$result_new['image'].'\');">
									</div>
							</a>
							<div class="label new">New</div>
							<ul class="product__hover">
							<li><a href="admin/uploads/'.$result_new['image'].'" class="image-popup"><span class="arrow_expand"></span></a></li>

									<li><a href="?proIdWishLish='. $result_new['productId'].'"><span class="icon_heart_alt"></span></a></li>
									<li><a href="?proId='. $result_new['productId'].'&quantity=1"><span class="icon_bag_alt"></span></a></li>
							</ul>

					</div>

			</div>
			<div class="product__item__text">
					<h6><a href="details.php?proid='.$result_new['productId'].'">'. $result_new['productName'].'</a></h6>
					<div class="rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
					</div>
					<div class="product__price">$ '. $fm->format_currency($result_new['price']).' </div>
			</div>
	</div>
</div>
		
		';
		 

	}
	$output .='</div>';
}
echo $output;

}
// 


	//
	if(isset($_POST['women'])){
		/**
		 * Show new 8 newest product  woment
		 */
		$output='';
		$product_new = $product->getproduct_women();
		if ($product_new) {
			$output ='<div class="row property__gallery">';
			while ($result_new = $product_new->fetch_assoc()) {
		
		 
			$output .='
			<div class="col-lg-3 col-md-4 col-sm-6 mix women">
			<div class="product__item">
					<div class="product__item__pic" id="product__item__pic">
							<div class="home-product-item">
									<a href="details.php?proid='.$result_new['productId'].'">
											<div class="home-product-item__img" style="background-image: url(\'admin/uploads/'.$result_new['image'].'\');">
											</div>
									</a>
									<div class="label new">New</div>
									<ul class="product__hover">
											<li><a href="admin/uploads/'.$result_new['image'].'" class="image-popup"><span class="arrow_expand"></span></a></li>
											<li><a href="?proIdWishLish='. $result_new['productId'].'"><span class="icon_heart_alt"></span></a></li>
											<li><a href="?proId='. $result_new['productId'].'&quantity=1"><span class="icon_bag_alt"></span></a></li>
									</ul>
		
							</div>
		
					</div>
					<div class="product__item__text">
							<h6><a href="details.php?proid='.$result_new['productId'].'">'. $result_new['productName'].'</a></h6>
							<div class="rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
							</div>
							<div class="product__price">$ '. $fm->format_currency($result_new['price']).' </div>
					</div>
			</div>
		</div>
				
				';
				 
		
			}
			$output .='</div>';
		}
		echo $output;
	
		
		}

		if(isset($_POST['men'])){
			/**
			 * Show new 8 newest product of MEN
			 */
			$product_new = $product->getproduct_men();
			if ($product_new) {
				$output ='<div class="row property__gallery">';
				while ($result_new = $product_new->fetch_assoc()) {
			
			 
				$output .='
				<div class="col-lg-3 col-md-4 col-sm-6 mix women">
				<div class="product__item">
						<div class="product__item__pic" id="product__item__pic">
								<div class="home-product-item">
										<a href="details.php?proid='.$result_new['productId'].'">
												<div class="home-product-item__img" style="background-image: url(\'admin/uploads/'.$result_new['image'].'\');">
												</div>
										</a>
										<div class="label new">New</div>
										<ul class="product__hover">
												<li><a href="admin/uploads/'.$result_new['image'].'" class="image-popup"><span class="arrow_expand"></span></a></li>
												<li><a href="?proIdWishLish='. $result_new['productId'].'"><span class="icon_heart_alt"></span></a></li>
												<li><a href="?proId='. $result_new['productId'].'&quantity=1"><span class="icon_bag_alt"></span></a></li>
										</ul>
			
								</div>
			
						</div>
						<div class="product__item__text">
								<h6><a href="details.php?proid='.$result_new['productId'].'">'. $result_new['productName'].'</a></h6>
								<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
								</div>
								<div class="product__price">$ '. $fm->format_currency($result_new['price']).' </div>
						</div>
				</div>
			</div>
					
					';
					 
			
				}
				$output .='</div>';
			}
			echo $output;
		
			
			}
/**
 * show kid product
 */
if(isset($_POST['kid'])){
	/**
	 * Show new 8 newest product of KID
	 */
	$product_new = $product->getproduct_kid();
	if ($product_new) {
		$output ='<div class="row property__gallery">';
		while ($result_new = $product_new->fetch_assoc()) {
	
	 
		$output .='
		<div class="col-lg-3 col-md-4 col-sm-6 mix women">
		<div class="product__item">
				<div class="product__item__pic" id="product__item__pic">
						<div class="home-product-item">
								<a href="details.php?proid='.$result_new['productId'].'">
										<div class="home-product-item__img" style="background-image: url(\'admin/uploads/'.$result_new['image'].'\');">
										</div>
								</a>
								<div class="label new">New</div>
								<ul class="product__hover">
										<li><a href="admin/uploads/'.$result_new['image'].'" class="image-popup"><span class="arrow_expand"></span></a></li>
										<li><a href="?proIdWishLish='. $result_new['productId'].'"><span class="icon_heart_alt"></span></a></li>
										<li><a href="?proId='. $result_new['productId'].'&quantity=1"><span class="icon_bag_alt"></span></a></li>
								</ul>
	
						</div>
	
				</div>
				<div class="product__item__text">
						<h6><a href="details.php?proid='.$result_new['productId'].'">'. $result_new['productName'].'</a></h6>
						<div class="rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
						</div>
						<div class="product__price">$ '. $fm->format_currency($result_new['price']).' </div>
				</div>
		</div>
	</div>
			
			';
			 
	
		}
		$output .='</div>';
	}
	echo $output;

	
	}
	/**
	 * show ACCESSORIES
	 */
	if(isset($_POST['acc'])){
		/**
		 * Show new 8 newest product of acc
		 */
		$product_new = $product->getproduct_acc();
		if ($product_new) {
			$output ='<div class="row property__gallery">';
			while ($result_new = $product_new->fetch_assoc()) {
		
		 
			$output .='
			<div class="col-lg-3 col-md-4 col-sm-6 mix women">
			<div class="product__item">
					<div class="product__item__pic" id="product__item__pic">
							<div class="home-product-item">
									<a href="details.php?proid='.$result_new['productId'].'">
											<div class="home-product-item__img" style="background-image: url(\'admin/uploads/'.$result_new['image'].'\');">
											</div>
									</a>
									<div class="label new">New</div>
									<ul class="product__hover">
											<li><a href="admin/uploads/'.$result_new['image'].'" class="image-popup"><span class="arrow_expand"></span></a></li>
											<li><a href="?proIdWishLish='. $result_new['productId'].'"><span class="icon_heart_alt"></span></a></li>
											<li><a href="?proId='. $result_new['productId'].'&quantity=1"><span class="icon_bag_alt"></span></a></li>
									</ul>
		
							</div>
		
					</div>
					<div class="product__item__text">
							<h6><a href="details.php?proid='.$result_new['productId'].'">'. $result_new['productName'].'</a></h6>
							<div class="rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
							</div>
							<div class="product__price">$ '. $fm->format_currency($result_new['price']).' </div>
					</div>
			</div>
		</div>
				
				';
				 
		
			}
			$output .='</div>';
		}
		echo $output;
	
		
		}
		/**
		 * show cosmetics
		 */
		if(isset($_POST['cos'])){
			/**
			 * Show new 8 newest product COMESRIC
			 */
			$product_new = $product->getproduct_cos();
			if ($product_new) {
				$output ='<div class="row property__gallery">';
				while ($result_new = $product_new->fetch_assoc()) {
			
			 
				$output .='
				<div class="col-lg-3 col-md-4 col-sm-6 mix women">
				<div class="product__item">
						<div class="product__item__pic" id="product__item__pic">
								<div class="home-product-item">
										<a href="details.php?proid='.$result_new['productId'].'">
												<div class="home-product-item__img" style="background-image: url(\'admin/uploads/'.$result_new['image'].'\');">
												</div>
										</a>
										<div class="label new">New</div>
										<ul class="product__hover">
												<li><a href="admin/uploads/'.$result_new['image'].'" class="image-popup"><span class="arrow_expand"></span></a></li>
												<li><a href="?proIdWishLish='. $result_new['productId'].'"><span class="icon_heart_alt"></span></a></li>
												<li><a href="?proId='. $result_new['productId'].'&quantity=1"><span class="icon_bag_alt"></span></a></li>
										</ul>
			
								</div>
			
						</div>
						<div class="product__item__text">
								<h6><a href="details.php?proid='.$result_new['productId'].'">'. $result_new['productName'].'</a></h6>
								<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
								</div>
								<div class="product__price">$ '. $fm->format_currency($result_new['price']).' </div>
						</div>
				</div>
			</div>
					
					';
					 
			
				}
				$output .='</div>';
			}
			echo $output;
		
			
			}

















///////////////////////////////////////////////////////////////

/**
 * ajax for shop page
 */

if(isset($_POST['women_show_all']) || isset($_POST['pageshop'])){
	
	 $brand = $_POST['women_show_all'];
	 $output ='<div class="row property__gallery">
			
			<span id="brandId'.$brand.'" data-brand=\''.$brand.'\'></span>			
			';
	$product_new = $product->getproduct_all_pagination($page=1,$brand);
	if ($product_new) {
		
		while ($result_new = $product_new->fetch_assoc()) {
	
	 
		$output .='
		<div class="col-lg-4 col-md-6 col-sm-6 ">
		<div class="product__item">
				<div class="product__item__pic" id="product__item__pic">
						<div class="home-product-item">
								<a href="details.php?proid='.$result_new['productId'].'">
										<div class="home-product-item__img" style="background-image: url(\'admin/uploads/'.$result_new['image'].'\');">
										</div>
								</a>
								<div class="label new">New</div>
								<ul class="product__hover">
										<li><a href="admin/uploads/'.$result_new['image'].'" class="image-popup"><span class="arrow_expand"></span></a></li>
										<li><a href="?proIdWishLish='. $result_new['productId'].'"><span class="icon_heart_alt"></span></a></li>
										<li><a href="?proId='. $result_new['productId'].'&quantity=1"><span class="icon_bag_alt"></span></a></li>
								</ul>
	
						</div>
	
				</div>
				<div class="product__item__text">
						<h6><a href="details.php?proid='.$result_new['productId'].'">'. $result_new['productName'].'</a></h6>
						<div class="rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
						</div>
						<div class="product__price">$ '. $fm->format_currency($result_new['price']).' </div>
				</div>
		</div>
	</div>
	<span id="brandId'.$result_new['brandId'].'" data-brand=\''.$result_new['brandId'].'\'></span>

			';			 
	
		}
		$output .= '<div class="col-lg-12 text-center">
							<div class="pagination__option">	
		';
		$total_pages =$product->getPaginationCategory($brand);
		for($i=1; $i<=$total_pages; $i++)  
		{  
				 $output .= '<a class="pagination_link'.$brand.'" id="'.$i.'">'.$i.'</a>';  
		} 

		$output .='	</div>
		</div>';



		$output .='</div>';
	}
	echo $output;
	
	
	}		

	// click pagination women page
	if(isset($_POST['pagewomen'])){
		$page =isset($_POST['pagewomen'])?$_POST['pagewomen']:1;
		$brand = $_POST['brand13'];
		$output ='<div class="row property__gallery">
			
		<span id="brandId'.$brand.'" data-brand=\''.$brand.'\'></span>			
		';
		$product_new = $product->getproduct_all_pagination($page,$brand);
		if ($product_new) {
			
			while ($result_new = $product_new->fetch_assoc()) {
		
		 
			$output .='
			<div class="col-lg-4 col-md-6 col-sm-6 ">
			<div class="product__item">
					<div class="product__item__pic" id="product__item__pic">
							<div class="home-product-item">
									<a href="details.php?proid='.$result_new['productId'].'">
											<div class="home-product-item__img" style="background-image: url(\'admin/uploads/'.$result_new['image'].'\');">
											</div>
									</a>
									<div class="label new">New</div>
									<ul class="product__hover">
											<li><a href="admin/uploads/'.$result_new['image'].'" class="image-popup"><span class="arrow_expand"></span></a></li>
											<li><a href="?proIdWishLish='. $result_new['productId'].'"><span class="icon_heart_alt"></span></a></li>
											<li><a href="?proId='. $result_new['productId'].'&quantity=1"><span class="icon_bag_alt"></span></a></li>
									</ul>
		
							</div>
		
					</div>
					<div class="product__item__text">
							<h6><a href="details.php?proid='.$result_new['productId'].'">'. $result_new['productName'].'</a></h6>
							<div class="rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
							</div>
							<div class="product__price">$ '. $fm->format_currency($result_new['price']).' </div>
					</div>
			</div>
		</div>
		<span id="brandId'.$result_new['brandId'].'" data-brand=\''.$result_new['brandId'].'\'></span>

				
				';			 
		
			}
			$output .= '<div class="col-lg-12 text-center">
								<div class="pagination__option">	
			';
			$total_pages =$product->getPaginationCategory($brand);
			for($i=1; $i<=$total_pages; $i++)  
			{  
					$output .= '<a class="pagination_link'.$brand.'" id="'.$i.'">'.$i.'</a>';  
			} 
	
			$output .='	</div>
			</div>';
	
	
	
			$output .='</div>';
		}
		echo $output;
		
	
		
		}		
	// show  men
	
if(isset($_POST['men_show_all'])){
	$brand = $_POST['men_show_all'];

	$output ='<div class="row property__gallery">
			
	<span id="brandId'.$brand.'" data-brand=\''.$brand.'\'></span>			
	';
	 
	$product_new = $product->getproduct_all_pagination($page=1,$brand);
	if ($product_new) {
	
		while ($result_new = $product_new->fetch_assoc()) {
	
	 
		$output .='
		<div class="col-lg-4 col-md-6 col-sm-6 ">
		<div class="product__item">
				<div class="product__item__pic" id="product__item__pic">
						<div class="home-product-item">
								<a href="details.php?proid='.$result_new['productId'].'">
										<div class="home-product-item__img" style="background-image: url(\'admin/uploads/'.$result_new['image'].'\');">
										</div>
								</a>
								<div class="label new">New</div>
								<ul class="product__hover">
										<li><a href="admin/uploads/'.$result_new['image'].'" class="image-popup"><span class="arrow_expand"></span></a></li>
										<li><a href="?proIdWishLish='. $result_new['productId'].'"><span class="icon_heart_alt"></span></a></li>
										<li><a href="?proId='. $result_new['productId'].'&quantity=1"><span class="icon_bag_alt"></span></a></li>
								</ul>
	
						</div>
	
				</div>
				<div class="product__item__text">
						<h6><a href="details.php?proid='.$result_new['productId'].'">'. $result_new['productName'].'</a></h6>
						<div class="rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
						</div>
						<div class="product__price">$ '. $fm->format_currency($result_new['price']).' </div>
				</div>
		</div>
	</div>
	<span id="brandId'.$result_new['brandId'].'" data-brand=\''.$result_new['brandId'].'\'></span>

			';			 
	
		}
		$output .= '<div class="col-lg-12 text-center">
							<div class="pagination__option">	
		';
		$total_pages =$product->getPaginationCategory($brand);
		for($i=1; $i<=$total_pages; $i++)  
		{  
				 $output .= '<a class="pagination_link'.$brand.'" id="'.$i.'">'.$i.'</a>';  
		} 

		$output .='	</div>
		</div>';



		$output .='</div>';
	}
	echo $output;
	

	
	}		

	// click pagination men page
	if(isset($_POST['pagemen'])){
		$page =isset($_POST['pagemen'])?$_POST['pagemen']:1;
		 $brand = $_POST['brand14'];
		 $output ='<div class="row property__gallery">
			
			<span id="brandId'.$brand.'" data-brand=\''.$brand.'\'></span>			
			';
		$product_new = $product->getproduct_all_pagination($page,$brand);
		if ($product_new) {
		
			while ($result_new = $product_new->fetch_assoc()) {
		
		 
			$output .='
			<div class="col-lg-4 col-md-6 col-sm-6 ">
			<div class="product__item">
					<div class="product__item__pic" id="product__item__pic">
							<div class="home-product-item">
									<a href="details.php?proid='.$result_new['productId'].'">
											<div class="home-product-item__img" style="background-image: url(\'admin/uploads/'.$result_new['image'].'\');">
											</div>
									</a>
									<div class="label new">New</div>
									<ul class="product__hover">
											<li><a href="admin/uploads/'.$result_new['image'].'" class="image-popup"><span class="arrow_expand"></span></a></li>
											<li><a href="?proIdWishLish='. $result_new['productId'].'"><span class="icon_heart_alt"></span></a></li>
											<li><a href="?proId='. $result_new['productId'].'&quantity=1"><span class="icon_bag_alt"></span></a></li>
									</ul>
		
							</div>
		
					</div>
					<div class="product__item__text">
							<h6><a href="details.php?proid='.$result_new['productId'].'">'. $result_new['productName'].'</a></h6>
							<div class="rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
							</div>
							<div class="product__price">$ '. $fm->format_currency($result_new['price']).' </div>
					</div>
			</div>
		</div>
		<span id="brandId'.$result_new['brandId'].'" data-brand=\''.$result_new['brandId'].'\'></span>

				';			 
		
			}
			$output .= '<div class="col-lg-12 text-center">
								<div class="pagination__option">	
			';
			$total_pages =$product->getPaginationCategory($brand);
			for($i=1; $i<=$total_pages; $i++)  
			{  
					$output .= '<a class="pagination_link'.$brand.'" id="'.$i.'">'.$i.'</a>';  
			} 
	
			$output .='	</div>
			</div>';
	
	
	
			$output .='</div>';
		}
		echo $output;
		
	
		
		}	
	
// show  kid
	
if(isset($_POST['kid_show_all'])){
	$brand = $_POST['kid_show_all'];
	$output ='<div class="row property__gallery">
			
	<span id="brandId'.$brand.'" data-brand=\''.$brand.'\'></span>			
	';
	 
	$product_new = $product->getproduct_all_pagination($page=1,$brand);
	if ($product_new) {
		
		while ($result_new = $product_new->fetch_assoc()) {
	
	 
		$output .='
		<div class="col-lg-4 col-md-6 col-sm-6 ">
		<div class="product__item">
				<div class="product__item__pic" id="product__item__pic">
						<div class="home-product-item">
								<a href="details.php?proid='.$result_new['productId'].'">
										<div class="home-product-item__img" style="background-image: url(\'admin/uploads/'.$result_new['image'].'\');">
										</div>
								</a>
								<div class="label new">New</div>
								<ul class="product__hover">
										<li><a href="admin/uploads/'.$result_new['image'].'" class="image-popup"><span class="arrow_expand"></span></a></li>
										<li><a href="?proIdWishLish='. $result_new['productId'].'"><span class="icon_heart_alt"></span></a></li>
										<li><a href="?proId='. $result_new['productId'].'&quantity=1"><span class="icon_bag_alt"></span></a></li>
								</ul>
	
						</div>
	
				</div>
				<div class="product__item__text">
						<h6><a href="details.php?proid='.$result_new['productId'].'">'. $result_new['productName'].'</a></h6>
						<div class="rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
						</div>
						<div class="product__price">$ '. $fm->format_currency($result_new['price']).' </div>
				</div>
		</div>
	</div>
	<span id="brandId'.$result_new['brandId'].'" data-brand=\''.$result_new['brandId'].'\'></span>

			';			 
	
		}
		$output .= '<div class="col-lg-12 text-center">
							<div class="pagination__option">	
		';
		$total_pages =$product->getPaginationCategory($brand);
		for($i=1; $i<=$total_pages; $i++)  
		{  
				$output .= '<a class="pagination_link'.$brand.'" id="'.$i.'">'.$i.'</a>';  
		} 

		$output .='	</div>
		</div>';



		$output .='</div>';
	}
	echo $output;
	

	
	}		

	// click pagination kid page
	if(isset($_POST['pagekid'])){
		$page =isset($_POST['pagekid'])?$_POST['pagekid']:1;
		 $brand = $_POST['brand15'];
		 $output ='<div class="row property__gallery">
			
			<span id="brandId'.$brand.'" data-brand=\''.$brand.'\'></span>			
			';
		$product_new = $product->getproduct_all_pagination($page,15);
		if ($product_new) {
		
			while ($result_new = $product_new->fetch_assoc()) {
		
		 
			$output .='
			<div class="col-lg-4 col-md-6 col-sm-6 ">
			<div class="product__item">
					<div class="product__item__pic" id="product__item__pic">
							<div class="home-product-item">
									<a href="details.php?proid='.$result_new['productId'].'">
											<div class="home-product-item__img" style="background-image: url(\'admin/uploads/'.$result_new['image'].'\');">
											</div>
									</a>
									<div class="label new">New</div>
									<ul class="product__hover">
											<li><a href="admin/uploads/'.$result_new['image'].'" class="image-popup"><span class="arrow_expand"></span></a></li>
											<li><a href="?proIdWishLish='. $result_new['productId'].'"><span class="icon_heart_alt"></span></a></li>
											<li><a href="?proId='. $result_new['productId'].'&quantity=1"><span class="icon_bag_alt"></span></a></li>
									</ul>
		
							</div>
		
					</div>
					<div class="product__item__text">
							<h6><a href="details.php?proid='.$result_new['productId'].'">'. $result_new['productName'].'</a></h6>
							<div class="rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
							</div>
							<div class="product__price">$ '. $fm->format_currency($result_new['price']).' </div>
					</div>
			</div>
		</div>
		<span id="brandId'.$result_new['brandId'].'" data-brand=\''.$result_new['brandId'].'\'></span>

				';			 
		
			}
			$output .= '<div class="col-lg-12 text-center">
								<div class="pagination__option">	
			';
			$total_pages =$product->getPaginationCategory($brand);
			for($i=1; $i<=$total_pages; $i++)  
			{  
					$output .= '<a class="pagination_link'.$brand.'" id="'.$i.'">'.$i.'</a>';  
			} 
	
			$output .='	</div>
			</div>';
	
	
	
			$output .='</div>';
		}
		echo $output;
		
	
		
		}	

// show  cosmetic
	
if(isset($_POST['cos_show_all'])){
	$brand = $_POST['cos_show_all'];
	$output ='<div class="row property__gallery">
			
	<span id="brandId'.$brand.'" data-brand=\''.$brand.'\'></span>			
	';
	 
	$product_new = $product->getproduct_all_pagination($page=1,16);
	if ($product_new) {
	
		while ($result_new = $product_new->fetch_assoc()) {
	
	 
		$output .='
		<div class="col-lg-4 col-md-6 col-sm-6 ">
		<div class="product__item">
				<div class="product__item__pic" id="product__item__pic">
						<div class="home-product-item">
								<a href="details.php?proid='.$result_new['productId'].'">
										<div class="home-product-item__img" style="background-image: url(\'admin/uploads/'.$result_new['image'].'\');">
										</div>
								</a>
								<div class="label new">New</div>
								<ul class="product__hover">
										<li><a href="admin/uploads/'.$result_new['image'].'" class="image-popup"><span class="arrow_expand"></span></a></li>
										<li><a href="?proIdWishLish='. $result_new['productId'].'"><span class="icon_heart_alt"></span></a></li>
										<li><a href="?proId='. $result_new['productId'].'&quantity=1"><span class="icon_bag_alt"></span></a></li>
								</ul>
	
						</div>
	
				</div>
				<div class="product__item__text">
						<h6><a href="details.php?proid='.$result_new['productId'].'">'. $result_new['productName'].'</a></h6>
						<div class="rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
						</div>
						<div class="product__price">$ '. $fm->format_currency($result_new['price']).' </div>
				</div>
		</div>
	</div>
	<span id="brandId'.$result_new['brandId'].'" data-brand=\''.$result_new['brandId'].'\'></span>

			';			 
	
		}
		$output .= '<div class="col-lg-12 text-center">
							<div class="pagination__option">	
		';
		$total_pages =$product->getPaginationCategory($brand);
		for($i=1; $i<=$total_pages; $i++)  
		{  
				$output .= '<a class="pagination_link'.$brand.'" id="'.$i.'">'.$i.'</a>';  
		} 

		$output .='	</div>
		</div>';



		$output .='</div>';
	}
	echo $output;
	

	
	}		

	// click pagination cos
	if(isset($_POST['pagecos'])){
		$page =isset($_POST['pagecos'])?$_POST['pagecos']:1;
		$brand = $_POST['brand16'];
		$output ='<div class="row property__gallery">
			
		<span id="brandId'.$brand.'" data-brand=\''.$brand.'\'></span>			
		';
		 
		$product_new = $product->getproduct_all_pagination($page,16);
		if ($product_new) {
			
			while ($result_new = $product_new->fetch_assoc()) {
		
		 
			$output .='
			<div class="col-lg-4 col-md-6 col-sm-6 ">
			<div class="product__item">
					<div class="product__item__pic" id="product__item__pic">
							<div class="home-product-item">
									<a href="details.php?proid='.$result_new['productId'].'">
											<div class="home-product-item__img" style="background-image: url(\'admin/uploads/'.$result_new['image'].'\');">
											</div>
									</a>
									<div class="label new">New</div>
									<ul class="product__hover">
											<li><a href="admin/uploads/'.$result_new['image'].'" class="image-popup"><span class="arrow_expand"></span></a></li>
											<li><a href="?proIdWishLish='. $result_new['productId'].'"><span class="icon_heart_alt"></span></a></li>
											<li><a href="?proId='. $result_new['productId'].'&quantity=1"><span class="icon_bag_alt"></span></a></li>
									</ul>
		
							</div>
		
					</div>
					<div class="product__item__text">
							<h6><a href="details.php?proid='.$result_new['productId'].'">'. $result_new['productName'].'</a></h6>
							<div class="rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
							</div>
							<div class="product__price">$ '. $fm->format_currency($result_new['price']).' </div>
					</div>
			</div>
		</div>
		<span id="brandId'.$result_new['brandId'].'" data-brand=\''.$result_new['brandId'].'\'></span>

				';			 
		
			}
			$output .= '<div class="col-lg-12 text-center">
								<div class="pagination__option">	
			';
			$total_pages =$product->getPaginationCategory($brand);
			for($i=1; $i<=$total_pages; $i++)  
			{  
					$output .= '<a class="pagination_link'.$brand.'" id="'.$i.'">'.$i.'</a>';  
			} 
	
			$output .='	</div>
			</div>';
	
	
	
			$output .='</div>';
		}
		echo $output;
		
	
		
		}	

		// show  accessories
	
if(isset($_POST['acc_show_all'])){
	
	 $brand = $_POST['acc_show_all'];
	 $output ='<div class="row property__gallery">
			
			<span id="brandId'.$brand.'" data-brand=\''.$brand.'\'></span>			
			';
	$product_new = $product->getproduct_all_pagination($page=1,$brand);
	if ($product_new) {
		
		while ($result_new = $product_new->fetch_assoc()) {
	
	 
		$output .='
		<div class="col-lg-4 col-md-6 col-sm-6 ">
		<div class="product__item">
				<div class="product__item__pic" id="product__item__pic">
						<div class="home-product-item">
								<a href="details.php?proid='.$result_new['productId'].'">
										<div class="home-product-item__img" style="background-image: url(\'admin/uploads/'.$result_new['image'].'\');">
										</div>
								</a>
								<div class="label new">New</div>
								<ul class="product__hover">
										<li><a href="admin/uploads/'.$result_new['image'].'" class="image-popup"><span class="arrow_expand"></span></a></li>
										<li><a href="?proIdWishLish='. $result_new['productId'].'"><span class="icon_heart_alt"></span></a></li>
										<li><a href="?proId='. $result_new['productId'].'&quantity=1"><span class="icon_bag_alt"></span></a></li>
								</ul>
	
						</div>
	
				</div>
				<div class="product__item__text">
						<h6><a href="details.php?proid='.$result_new['productId'].'">'. $result_new['productName'].'</a></h6>
						<div class="rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
						</div>
						<div class="product__price">$ '. $fm->format_currency($result_new['price']).' </div>
				</div>
		</div>
	</div>
	<span id="brandId'.$result_new['brandId'].'" data-brand=\''.$result_new['brandId'].'\'></span>

			';			 
	
		}
		$output .= '<div class="col-lg-12 text-center">
							<div class="pagination__option">	
		';
		$total_pages =$product->getPaginationCategory($brand);
		for($i=1; $i<=$total_pages; $i++)  
		{  
				$output .= '<a class="pagination_link'.$brand.'" id="'.$i.'">'.$i.'</a>';  
		} 

		$output .='	</div>
		</div>';



		$output .='</div>';
	}
	echo $output;
	

	
	}		

	// click pagination accsessories
	if(isset($_POST['pageacc'])){
		$page =isset($_POST['pageacc'])?$_POST['pageacc']:1;
		$brand = $_POST['brand17'];
		$output ='<div class="row property__gallery">
			
		<span id="brandId'.$brand.'" data-brand=\''.$brand.'\'></span>			
		';
		$product_new = $product->getproduct_all_pagination($page,$brand);
		if ($product_new) {
			
			while ($result_new = $product_new->fetch_assoc()) {
		
		 
			$output .='
			<div class="col-lg-4 col-md-6 col-sm-6 ">
			<div class="product__item">
					<div class="product__item__pic" id="product__item__pic">
							<div class="home-product-item">
									<a href="details.php?proid='.$result_new['productId'].'">
											<div class="home-product-item__img" style="background-image: url(\'admin/uploads/'.$result_new['image'].'\');">
											</div>
									</a>
									<div class="label new">New</div>
									<ul class="product__hover">
											<li><a href="admin/uploads/'.$result_new['image'].'" class="image-popup"><span class="arrow_expand"></span></a></li>
											<li><a href="?proIdWishLish='. $result_new['productId'].'"><span class="icon_heart_alt"></span></a></li>
											<li><a href="?proId='. $result_new['productId'].'&quantity=1"><span class="icon_bag_alt"></span></a></li>
									</ul>
		
							</div>
		
					</div>
					<div class="product__item__text">
							<h6><a href="details.php?proid='.$result_new['productId'].'">'. $result_new['productName'].'</a></h6>
							<div class="rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
							</div>
							<div class="product__price">$ '. $fm->format_currency($result_new['price']).' </div>
					</div>
			</div>
		</div>
		<span id="brandId'.$result_new['brandId'].'" data-brand=\''.$result_new['brandId'].'\'></span>

				';			 
		
			}
			$output .= '<div class="col-lg-12 text-center">
								<div class="pagination__option">	
			';
			$total_pages =$product->getPaginationCategory($brand);
			for($i=1; $i<=$total_pages; $i++)  
			{  
					$output .= '<a class="pagination_link'.$brand.'" id="'.$i.'">'.$i.'</a>';  
			} 
	
			$output .='	</div>
			</div>';
	
	
	
			$output .='</div>';
		}
		echo $output;
		
	
		
		}	


	/**
	 * filter product by price women
	 */
		if(isset($_POST['minAmount']) &&isset($_POST['maxAmount']) && isset($_POST['brand13'])  ){
			$minAmount = $_POST['minAmount'];
			$maxAmount = $_POST['maxAmount'];
			$brand = $_POST['brand13'];

			$output ='<div class="row property__gallery">
			
			<span id="brandId'.$brand.'" data-brand=\''.$brand.'\'></span>			
			';
			
			$product_new = $product->getproduct_by_price($page=1,$brand,$minAmount,$maxAmount);
			if ($product_new) {
				
				while ($result_new = $product_new->fetch_assoc()) {
			
			 
				$output .='
				<div class="col-lg-4 col-md-6 col-sm-6 ">
				<div class="product__item">
						<div class="product__item__pic" id="product__item__pic">
								<div class="home-product-item">
										<a href="details.php?proid='.$result_new['productId'].'">
												<div class="home-product-item__img" style="background-image: url(\'admin/uploads/'.$result_new['image'].'\');">
												</div>
										</a>
										<div class="label new">New</div>
										<ul class="product__hover">
												<li><a href="admin/uploads/'.$result_new['image'].'" class="image-popup"><span class="arrow_expand"></span></a></li>
												<li><a href="?proIdWishLish='. $result_new['productId'].'"><span class="icon_heart_alt"></span></a></li>
												<li><a href="?proId='. $result_new['productId'].'&quantity=1"><span class="icon_bag_alt"></span></a></li>
										</ul>
			
								</div>
			
						</div>
						<div class="product__item__text">
								<h6><a href="details.php?proid='.$result_new['productId'].'">'. $result_new['productName'].'</a></h6>
								<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
								</div>
								<div class="product__price">$ '. $fm->format_currency($result_new['price']).' </div>
						</div>
				</div>
			</div>

					';			 
			
				}
				$output .= '<div class="col-lg-12 text-center">
									<div class="pagination__option">	
				';
				$total_pages =$product->getPaginationCategoryFilter($brand,$minAmount,$maxAmount);
				for($i=1; $i<=$total_pages; $i++)  
				{  
						$output .= '<a class="pagination_link_filter'.$brand.'" id="'.$i.'">'.$i.'</a>';  
				} 
		
				$output .='	</div>
				</div>';
		
		
		
				$output .='</div>';
			}
			echo $output;
			
		
			
			}	
			
			if(isset($_POST['minAmount']) &&isset($_POST['maxAmount']) && isset($_POST['pageFilterWomen'])  ){
				$minAmount = $_POST['minAmount'];
				$maxAmount = $_POST['maxAmount'];
				$brand = $_POST['brand13_pag'];
				$page = $_POST['pageFilterWomen'];
	
				$output ='<div class="row property__gallery">
				
				<span id="brandId'.$brand.'" data-brand=\''.$brand.'\'></span>			
				';
				
				$product_new = $product->getproduct_by_price($page,$brand,$minAmount,$maxAmount);
				if ($product_new) {
					
					while ($result_new = $product_new->fetch_assoc()) {
				
				 
					$output .='
					<div class="col-lg-4 col-md-6 col-sm-6 ">
					<div class="product__item">
							<div class="product__item__pic" id="product__item__pic">
									<div class="home-product-item">
											<a href="details.php?proid='.$result_new['productId'].'">
													<div class="home-product-item__img" style="background-image: url(\'admin/uploads/'.$result_new['image'].'\');">
													</div>
											</a>
											<div class="label new">New</div>
											<ul class="product__hover">
													<li><a href="admin/uploads/'.$result_new['image'].'" class="image-popup"><span class="arrow_expand"></span></a></li>
													<li><a href="?proIdWishLish='. $result_new['productId'].'"><span class="icon_heart_alt"></span></a></li>
													<li><a href="?proId='. $result_new['productId'].'&quantity=1"><span class="icon_bag_alt"></span></a></li>
											</ul>
				
									</div>
				
							</div>
							<div class="product__item__text">
									<h6><a href="details.php?proid='.$result_new['productId'].'">'. $result_new['productName'].'</a></h6>
									<div class="rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
									</div>
									<div class="product__price">$ '. $fm->format_currency($result_new['price']).' </div>
							</div>
					</div>
				</div>
	
						';			 
				
					}
					$output .= '<div class="col-lg-12 text-center">
										<div class="pagination__option">	
					';
					$total_pages =$product->getPaginationCategoryFilter($brand,$minAmount,$maxAmount);
					for($i=1; $i<=$total_pages; $i++)  
					{  
							$output .= '<a class="pagination_link_filter'.$brand.'" id="'.$i.'">'.$i.'</a>';  
					} 
			
					$output .='	</div>
					</div>';
			
			
			
					$output .='</div>';
				}
				echo $output;
				
			
				
				}		
		
			

	
	















?> 