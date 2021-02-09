
  ////
  // show  search product 
	
  
  
    // click pagination accsessories
    if(isset($_POST['page'])){
      $page =isset($_POST['page'])?$_POST['page']:1;
       
       
      $product_new = $product->getproduct_search($page,$search);
      if ($product_new) {
        $output ='<div class="row property__gallery">';
        while ($result_new = $product_new->fetch_assoc()) {
      
       
        $output .='
        <div class="col-lg-4 col-md-6 col-sm-6 ">
        <div class="product__item">
            <div class="product__item__pic" id="product__item__pic">
                <div class="home-product-item">
                    <a href="details.php?proid='.$result_new['productId'].'">
                        <!-- <div class="home-product-item__img" style="background-image: url(\'admin/uploads/'.$result_new['image'].'\');"> -->
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
        $total_pages =$product->getPaginationCategory($search);
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
  
  
  
  
  
  