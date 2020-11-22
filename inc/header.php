<?php include_once 'lib/session.php';
include_once 'lib/database.php';
session_set_cookie_params(0);
    Session::init();
    if(isset($_GET['customer_id'])){
      $customer_id = $_GET['customer_id'];
      // $delCart = $ct->del_all_data_cart();
      // $delCompare = $ct->del_compare($customer_id);
      Session::destroy();
}
/**
 * detroy session after 5s not activity
 */
// if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5)) {
//   // request 5 s ago

//   session_destroy();
//   session_unset();
// }
// $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time
  
?>
<!-- detroy session if click logout -->

<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Ashion Template">
  <meta name="keywords" content="Ashion, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ashion | Template</title>
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <!-- Css Styles -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/elegant-icons.css" type="text/css">
  <link rel="stylesheet" href="assets/css/jquery-ui.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/magnific-popup.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/slicknav.min.css" type="text/css">
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="assets/css/customer.css" type="text/css">
</head>

<body>
  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>
  <!-- Offcanvas Menu Begin -->
  <div class="offcanvas-menu-overlay"></div>
  <div class="offcanvas-menu-wrapper">
    <div class="offcanvas__close">+</div>
    <ul class="offcanvas__widget">
      <li><span class="icon_search search-switch"></span></li>
      <?php 
               /**
               * check cart to show quantity
               */
              include_once 'helpers/format.php';

              spl_autoload_register(function($class){
                include_once "classes/".$class.".php";
              });
              $ct = new cart();
              $customer_id = Session::get('customer_id');
								$check_cart = $ct->showQuantity($customer_id);
                if ($check_cart !=0) 
                {								
								 $quantityCart = $check_cart;                  
                 }
                 /**
                  * show quantity wishlist
                  */
                  $product = new product();
                  $quantityWishList= $product->showQuantityWL($customer_id);
                if ($quantityWishList !=0) 
                {								
                 $quantityWishListShow = $quantityWishList ;   
                                
                 }
                
            
            ?>
      <li><a href="#"><span class="icon_heart_alt"></span>
          <div class="tip"><?=$quantityWishListShow??0 ?></div>
        </a></li>
      <li><a href="#"><span class="icon_bag_alt"></span>
          <div class="tip"><?= $quantityCart??0 ?></div>
        </a></li>
    </ul>
    <div class="offcanvas__logo">
      <a href="./index.php"><img src="data:image/webp;base64,UklGRngDAABXRUJQVlA4TGsDAAAvYYAHEL8gEEhS2F93iImYCMVtI6mpxR/vYQJaIXAIevi42BgkDAgEgcBgCCTItlW10jHiJ6DIVbh7/mOVmFS/HkBE/ydA/+ys/+b8q2DFhv/DsJf8m1Chpf/D3jinX4wOkP8L6YL2/sUO7PiTxTz9jVABth+ECmd8tBj438hYg/yDBHgkP8j8lfVqqYD/wID8nf2FwbGX/yRUIG5sDxLY8hdSu1Y51PDVYnCt1t4PRvOkPzg4pluZv4pAmes5PfirqV3rd2t8v6QdqO/m+uuDY+pc64fkF81HZcAPNmmOay9kGx+8krlvYy9kH29rnL9K7Vp7xF4yuAzr1XNSKlz7IClUiL1xc28APt5ShSgN+0VJXwyOSVJ+sBicaTGX38hKBrS3FCqfRgeubTOwQUpGZ2/AOT1LraVvHFpSqFunlHk6uUcpA7bcRqddmJSgbZID7a10AZT50eDU8MVcwF9SUIc8ONcHB87plsEgS9MJ/poLcE7TyfXdu7HrU75FwHUfb+e0tbLaE5Ok9eKK4JIMytyx4cDTg7QruXvlyl0H/PVsyAB5Lpbm8iTdDGqEK0kZiBEgpXZO8VOoh5yvyyxpveBapcmb3w523a5V0wntLSlU8FDB9iUB3m7Rr6RbDZI2Nh2dVkpxdweyJEUAH9Np++24fNRiUGbNBcosKTVwJQOsAM0LsLOr45JCLbPGGAvne55nSflTpgFuNelmZZYicE6dc5IGB7KUvNFN8818lPKH1EySNjD1P82lJgM8qMOmnksRcEmpAS5peMe0Q5k716pelga/VkmhQnrkkjKbUoMa9Lr5+IPRrw/3A2roHHqyNZOkDc7pm8VqGA0gaS5AlqQdODR4b8MK2NJ5ORyKAPHmQNJ0XqukUMH0xehsQ8Ycci/dMpC1tc5cbHFg66TGtXZs+RSHg0PScADbpw04px0ft1bD9iA+SHbdRidrA2qQNDoc6pT5wd7KLCk1sOVTBMyaLaGyK9Heijxz4wCq46NCBTzF5FCDtH9xtLZJkgOuZ9B2zYUjVnz4Cjxyt0VSMj7WICl/AcfwwdKD0YFrHxQqgI/SdEJ731IBfBwdKEn3VDtnDpK0GZzTbb+g2aj7mPdFT8eU8ypJwdzSKElTzPtw07zlbZTGlPdZ/RBz3uOk/pLypu665zSoCwA=" alt=""></a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__auth">
    <?php 
                $login_check = Session::get('customer_name');
                if ($login_check== null) {
                  echo '<a href="login.php">Login</a>
                    <a href="register.php">Register</a>';
                }else 
                {
                  echo '<a>'.$login_check.'</a>';
                  echo '<a href="?customer_id='.Session::get('customer_id').'">Đăng xuất</a>';
                }
              ?>
    </div>
  </div>
  <!-- Offcanvas Menu End -->
  <!-- Header Section Begin -->
  <header class="header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-3 col-lg-2">
          <div class="header__logo">
            <a href="./index.php"><img src="data:image/webp;base64,UklGRngDAABXRUJQVlA4TGsDAAAvYYAHEL8gEEhS2F93iImYCMVtI6mpxR/vYQJaIXAIevi42BgkDAgEgcBgCCTItlW10jHiJ6DIVbh7/mOVmFS/HkBE/ydA/+ys/+b8q2DFhv/DsJf8m1Chpf/D3jinX4wOkP8L6YL2/sUO7PiTxTz9jVABth+ECmd8tBj438hYg/yDBHgkP8j8lfVqqYD/wID8nf2FwbGX/yRUIG5sDxLY8hdSu1Y51PDVYnCt1t4PRvOkPzg4pluZv4pAmes5PfirqV3rd2t8v6QdqO/m+uuDY+pc64fkF81HZcAPNmmOay9kGx+8krlvYy9kH29rnL9K7Vp7xF4yuAzr1XNSKlz7IClUiL1xc28APt5ShSgN+0VJXwyOSVJ+sBicaTGX38hKBrS3FCqfRgeubTOwQUpGZ2/AOT1LraVvHFpSqFunlHk6uUcpA7bcRqddmJSgbZID7a10AZT50eDU8MVcwF9SUIc8ONcHB87plsEgS9MJ/poLcE7TyfXdu7HrU75FwHUfb+e0tbLaE5Ok9eKK4JIMytyx4cDTg7QruXvlyl0H/PVsyAB5Lpbm8iTdDGqEK0kZiBEgpXZO8VOoh5yvyyxpveBapcmb3w523a5V0wntLSlU8FDB9iUB3m7Rr6RbDZI2Nh2dVkpxdweyJEUAH9Np++24fNRiUGbNBcosKTVwJQOsAM0LsLOr45JCLbPGGAvne55nSflTpgFuNelmZZYicE6dc5IGB7KUvNFN8818lPKH1EySNjD1P82lJgM8qMOmnksRcEmpAS5peMe0Q5k716pelga/VkmhQnrkkjKbUoMa9Lr5+IPRrw/3A2roHHqyNZOkDc7pm8VqGA0gaS5AlqQdODR4b8MK2NJ5ORyKAPHmQNJ0XqukUMH0xehsQ8Ycci/dMpC1tc5cbHFg66TGtXZs+RSHg0PScADbpw04px0ft1bD9iA+SHbdRidrA2qQNDoc6pT5wd7KLCk1sOVTBMyaLaGyK9Heijxz4wCq46NCBTzF5FCDtH9xtLZJkgOuZ9B2zYUjVnz4Cjxyt0VSMj7WICl/AcfwwdKD0YFrHxQqgI/SdEJ731IBfBwdKEn3VDtnDpK0GZzTbb+g2aj7mPdFT8eU8ypJwdzSKElTzPtw07zlbZTGlPdZ/RBz3uOk/pLypu665zSoCwA=" alt=""></a>
          </div>
        </div>
        <div class="col-xl-6 col-lg-7">
          <nav class="header__menu">
            <ul>
              <li class="active"><a href="./index.php">Home</a></li>
              <li><a href="./shop.php">Women’s</a></li>
              <li><a href="./shop.php">Men’s</a></li>
              <li><a href="./shop.php">Shop</a></li>
              <li><a href="#">Pages</a>
                <ul class="dropdown">
                  <li><a href="./wishlist.php">Wish List</a></li>
                  <li><a href="./cart.php">Shop Cart</a></li>
                  <li><a href="./checkout.php">Checkout</a></li>
                  <li><a href="./blog-details.php">Blog Details</a></li>
                </ul>
              </li>
              <li><a href="./blog.php">Blog</a></li>
              <li><a href="./contact.php">Contact</a></li>
            </ul>
          </nav>
        </div>
        <div class="col-lg-3">
          <div class="header__right">
            <div class="header__right__auth">
              <!-- print user if login -->
              <?php 
                $login_check = Session::get('customer_name');
                if ($login_check== null) {
                  echo '<a href="login.php">Login</a>
                    <a href="register.php">Register</a>';
                }else 
                {
                  echo '<a>'.$login_check.'</a>';
                  echo '<a href="?customer_id='.Session::get('customer_id').'">Đăng xuất</a>';
                }
              ?>
              
            </div>
            <ul class="header__right__widget">
          
              <li><span class="icon_search search-switch"></span></li>
              
              <li><a href="wishlist.php"><span class="icon_heart_alt"></span>
                  <div class="tip"><?= $quantityWishListShow??0?></div>
                </a></li>
              <li><a href="cart.php"><span class="icon_bag_alt"></span>
                  <div class="tip"><?=$quantityCart??0 ?></div>
                </a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="canvas__open">
        <i class="fa fa-bars"></i>
      </div>
    </div>
  </header>
  <?php
	
    

	
	
 
		

	$db = new Database();
	$fm = new Format();

	$us = new user();
	$cs = new customer();
	$cat = new category();
  


             
             
  
?>