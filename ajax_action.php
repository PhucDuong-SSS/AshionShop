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
		 * Show new 8 newest product of men and woment
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
			 * Show new 8 newest product of men and woment
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
	 * Show new 8 newest product of men and woment
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
	 * show accessories
	 */
	if(isset($_POST['acc'])){
		/**
		 * Show new 8 newest product of men and woment
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
			 * Show new 8 newest product of men and woment
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


/**
 * ajax for shop page
 */

if(isset($_POST['women_show_all'])){
	
	 
	 
	$product_new = $product->getproduct_all_pagination($page=1,13);
	if ($product_new) {
		$output ='<div class="row property__gallery">';
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
		$total_pages =$product->getPaginationCategory(13);
		for($i=1; $i<=$total_pages; $i++)  
		{  
				 $output .= '<a class="pagination_link" id="'.$i.'">'.$i.'</a>';  
		} 

		$output .='	</div>
		</div>';



		$output .='</div>';
	}
	echo $output;
	

	
	}		

	// click pagination women page
	if(isset($_POST['page'])){
		$page =isset($_POST['page'])?$_POST['page']:1;
		 
		 
		$product_new = $product->getproduct_all_pagination($page,13);
		if ($product_new) {
			$output ='<div class="row property__gallery">';
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
			$total_pages =$product->getPaginationCategory(13);
			for($i=1; $i<=$total_pages; $i++)  
			{  
					 $output .= '<a class="pagination_link" id="'.$i.'">'.$i.'</a>';  
			} 
	
			$output .='	</div>
			</div>';
	
	
	
			$output .='</div>';
		}
		echo $output;
		
	
		
		}		
	// show  men
	
if(isset($_POST['men_show_all'])){
	
	 
	 
	$product_new = $product->getproduct_all_pagination($page=1,14);
	if ($product_new) {
		$output ='<div class="row property__gallery">';
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
		$total_pages =$product->getPaginationCategory(14);
		for($i=1; $i<=$total_pages; $i++)  
		{  
				 $output .= '<a class="pagination_link" id="'.$i.'">'.$i.'</a>';  
		} 

		$output .='	</div>
		</div>';



		$output .='</div>';
	}
	echo $output;
	

	
	}		

	// click pagination men page
	if(isset($_POST['page'])){
		$page =isset($_POST['page'])?$_POST['page']:1;
		 
		 
		$product_new = $product->getproduct_all_pagination($page,14);
		if ($product_new) {
			$output ='<div class="row property__gallery">';
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
			$total_pages =$product->getPaginationCategory(14);
			for($i=1; $i<=$total_pages; $i++)  
			{  
					 $output .= '<a class="pagination_link" id="'.$i.'">'.$i.'</a>';  
			} 
	
			$output .='	</div>
			</div>';
	
	
	
			$output .='</div>';
		}
		echo $output;
		
	
		
		}	
	
// show  kid
	
if(isset($_POST['kid_show_all'])){
	
	 
	 
	$product_new = $product->getproduct_all_pagination($page=1,15);
	if ($product_new) {
		$output ='<div class="row property__gallery">';
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
		$total_pages =$product->getPaginationCategory(15);
		for($i=1; $i<=$total_pages; $i++)  
		{  
				 $output .= '<a class="pagination_link" id="'.$i.'">'.$i.'</a>';  
		} 

		$output .='	</div>
		</div>';



		$output .='</div>';
	}
	echo $output;
	

	
	}		

	// click pagination kid page
	if(isset($_POST['page'])){
		$page =isset($_POST['page'])?$_POST['page']:1;
		 
		 
		$product_new = $product->getproduct_all_pagination($page,15);
		if ($product_new) {
			$output ='<div class="row property__gallery">';
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
			$total_pages =$product->getPaginationCategory(14);
			for($i=1; $i<=$total_pages; $i++)  
			{  
					 $output .= '<a class="pagination_link" id="'.$i.'">'.$i.'</a>';  
			} 
	
			$output .='	</div>
			</div>';
	
	
	
			$output .='</div>';
		}
		echo $output;
		
	
		
		}	

// show  cosmetic
	
if(isset($_POST['cos_show_all'])){
	
	 
	 
	$product_new = $product->getproduct_all_pagination($page=1,16);
	if ($product_new) {
		$output ='<div class="row property__gallery">';
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
		$total_pages =$product->getPaginationCategory(16);
		for($i=1; $i<=$total_pages; $i++)  
		{  
				 $output .= '<a class="pagination_link" id="'.$i.'">'.$i.'</a>';  
		} 

		$output .='	</div>
		</div>';



		$output .='</div>';
	}
	echo $output;
	

	
	}		

	// click pagination kid page
	if(isset($_POST['page'])){
		$page =isset($_POST['page'])?$_POST['page']:1;
		 
		 
		$product_new = $product->getproduct_all_pagination($page,16);
		if ($product_new) {
			$output ='<div class="row property__gallery">';
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
			$total_pages =$product->getPaginationCategory(14);
			for($i=1; $i<=$total_pages; $i++)  
			{  
					 $output .= '<a class="pagination_link" id="'.$i.'">'.$i.'</a>';  
			} 
	
			$output .='	</div>
			</div>';
	
	
	
			$output .='</div>';
		}
		echo $output;
		
	
		
		}	

		// show  accessories
	
if(isset($_POST['acc_show_all'])){
	
	 
	 
	$product_new = $product->getproduct_all_pagination($page=1,17);
	if ($product_new) {
		$output ='<div class="row property__gallery">';
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
		$total_pages =$product->getPaginationCategory(17);
		for($i=1; $i<=$total_pages; $i++)  
		{  
				 $output .= '<a class="pagination_link" id="'.$i.'">'.$i.'</a>';  
		} 

		$output .='	</div>
		</div>';



		$output .='</div>';
	}
	echo $output;
	

	
	}		

	// click pagination accsessories
	if(isset($_POST['page'])){
		$page =isset($_POST['page'])?$_POST['page']:1;
		 
		 
		$product_new = $product->getproduct_all_pagination($page,17);
		if ($product_new) {
			$output ='<div class="row property__gallery">';
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
			$total_pages =$product->getPaginationCategory(14);
			for($i=1; $i<=$total_pages; $i++)  
			{  
					 $output .= '<a class="pagination_link" id="'.$i.'">'.$i.'</a>';  
			} 
	
			$output .='	</div>
			</div>';
	
	
	
			$output .='</div>';
		}
		echo $output;
		
	
		
		}	


		// show search product
		if(isset($_POST['search']))
  {
    
    echo "123456";
    
  
    
}		
















?> 