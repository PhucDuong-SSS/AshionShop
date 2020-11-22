<?php
include 'inc/header.php';
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
        echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
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
        echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
    }
}
?>
<!-- Header Section End -->
<!-- Categories Section Begin -->
<section class="categories">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="categories__item categories__large__item set-bg" data-setbg="img/categories/category-1.jpg">
                    <div class="categories__text">
                        <h1>Women’s fashion</h1>
                        <p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore
                            edolore magna aliquapendisse ultrices gravida.</p>
                        <a href="#">Shop now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="img/categories/category-2.jpg">
                            <div class="categories__text">
                                <h4>Men’s fashion</h4>
                                <p>358 items</p>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="img/categories/category-3.jpg">
                            <div class="categories__text">
                                <h4>Kid’s fashion</h4>
                                <p>273 items</p>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="img/categories/category-4.jpg">
                            <div class="categories__text">
                                <h4>Cosmetics</h4>
                                <p>159 items</p>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="img/categories/category-5.jpg">
                            <div class="categories__text">
                                <h4>Accessories</h4>
                                <p>792 items</p>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->
<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>New product</h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                    <li id="all" data-all="all" class="active" data-filter="*">All</li>
                    <li id="women" data-women="women" iddata-filter=".women">Women’s</li>
                    <li id="men" data-men="men" data-filter=".men">Men’s</li>
                    <li id="kid" data-kid="kid" data-filter=".kid">Kid’s</li>
                    <li id="acc" data-acc="acc" data-filter=".accessories">Accessories</li>
                    <li id="cos" data-cos="cos" data-filter=".cosmetic">Cosmetics</li>
                </ul>
            </div>
        </div>
        <div class="row property__gallery">
            <?php
            /**
             * Show new 8 newest product of men and woment
             */
            $product_new = $product->getproduct_new();
            if ($product_new) {
                while ($result_new = $product_new->fetch_assoc()) {
            ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" id="product__item__pic">
                                <div class="home-product-item">
                                    <a href="details.php?proid=<?=$result_new['productId']?>">
                                        <div class="home-product-item__img" style="background-image: url('admin/uploads/<?=$result_new['image']?>');">
                                        </div>
                                    </a>
                                    <div class="label new">New</div>
                                    <ul class="product__hover">
                                        <li><a href="admin/uploads/<?= $result_new['image'] ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="?proIdWishLish=<?= $result_new['productId'] ?>"><span class="icon_heart_alt"></span></a></li>
                                        <li><a href="?proId=<?= $result_new['productId'] ?>&quantity=1"><span class="icon_bag_alt"></span></a></li>
                                    </ul>

                                </div>

                            </div>
                            <div class="product__item__text">
                                <h6><a href="details.php?proid=<?=$result_new['productId']?>"><?= $result_new['productName'] ?></a></h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price">$ <?= $fm->format_currency($result_new['price']) ?> </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

        </div>
    </div>
</section>
<!-- Product Section End -->
<!-- Banner Section Begin -->
<section class="banner set-bg" data-setbg="img/banner/banner-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 m-auto">
                <div class="banner__slider owl-carousel">
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Chloe Collection</span>
                            <h1>The Project Jacket</h1>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Chloe Collection</span>
                            <h1>The Project Jacket</h1>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Chloe Collection</span>
                            <h1>The Project Jacket</h1>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->
<!-- Trend Section Begin -->
<section class="trend spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Hot Trend</h4>
                    </div>
                    <?php
                    $product_trend = $product->getproduct_trend();
                    if ($product_trend) {
                        while ($result_product_trend = $product_trend->fetch_assoc()) {

                    ?>
                            <div class="trend__item">
                                <div class="trend__item__pic">
                                    <img width="90" height="90" src="admin/uploads/<?= $result_product_trend['image'] ?>" alt="">
                                </div>
                                <div class="trend__item__text">
                                    <h6><?= $result_product_trend['productName'] ?></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price">$ <?= $fm->format_currency($result_product_trend['price']) ?></div>
                                </div>
                            </div>
                    <?php

                        }
                    } ?>


                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Best seller</h4>
                    </div>
                    <?php
                    $product_best_sell = $product->getproduct_bestsell();
                    if ($product_best_sell) {
                        while ($result_best_sell = $product_best_sell->fetch_assoc()) {

                    ?>
                            <div class="trend__item">
                                <div class="trend__item__pic">
                                    <img width="90" height="90" src="admin/uploads/<?= $result_best_sell['image'] ?>" alt="">
                                </div>
                                <div class="trend__item__text">
                                    <h6><?= $result_best_sell['productName'] ?></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price">$ <?= $fm->format_currency($result_best_sell['price']) ?></div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>


                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Feature</h4>
                    </div>
                    <?php
                    $product_feature = $product->getproduct_feature();
                    if ($product_feature) {
                        while ($result_feature = $product_feature->fetch_assoc()) {

                    ?>
                            <div class="trend__item">
                                <div class="trend__item__pic">
                                    <img width="90" height="90" src="admin/uploads/<?= $result_feature['image'] ?>" alt="">
                                </div>
                                <div class="trend__item__text">
                                    <h6><?= $result_feature['productName'] ?></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price">$ <?= $fm->format_currency($result_feature['price']) ?></div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Trend Section End -->
<!-- Discount Section Begin -->
<section class="discount">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="discount__pic">
                    <img src="img/xdiscount.jpg.pagespeed.ic._v9FuG3AaK.webp" alt="">
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="discount__text">
                    <div class="discount__text__title">
                        <span>Discount</span>
                        <h2>Summer 2019</h2>
                        <h5><span>Sale</span> 50%</h5>
                    </div>
                    <div class="discount__countdown" id="countdown-time">
                        <div class="countdown__item">
                            <span>22</span>
                            <p>Days</p>
                        </div>
                        <div class="countdown__item">
                            <span>18</span>
                            <p>Hour</p>
                        </div>
                        <div class="countdown__item">
                            <span>46</span>
                            <p>Min</p>
                        </div>
                        <div class="countdown__item">
                            <span>05</span>
                            <p>Sec</p>
                        </div>
                    </div>
                    <a href="#">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Discount Section End -->
<!-- Services Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-car"></i>
                    <h6>Free Shipping</h6>
                    <p>For all oder over $99</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-money"></i>
                    <h6>Money Back Guarantee</h6>
                    <p>If good have Problems</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-support"></i>
                    <h6>Online Support 24/7</h6>
                    <p>Dedicated support</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-headphones"></i>
                    <h6>Payment Secure</h6>
                    <p>100% secure payment</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->
<!-- Instagram Begin -->
<div class="instagram">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-1.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-2.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-3.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-4.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-5.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-6.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Instagram End -->
<!-- Footer Section Begin -->
<?php include 'inc/footer.php'; ?>