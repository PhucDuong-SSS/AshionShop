
<?php
  
     include_once './classes/customer.php';
         
    include './lib/session.php';
    Session::init();
     $cs = new customer();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $loginCustomer = $cs -> login_customer($_POST); // hàm đăng nhập người dùng
        
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="img/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" action="" class="signup-form">
                        <h2 class="form-title">Login account</h2>
                        
                        
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Your Email"/>
                        </div>
                      
                      
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                      
                       
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Log in"/>
                        </div>
                        <!-- alert to user -->
                        <div style="text-align: center; color:red">
                        <?php 
                        if (isset($loginCustomer)) 
                        {
    			            echo $loginCustomer;
    		             }
    		             ?>

                        </div>
                        
                    </form>
                    <p class="loginhere">
                        I do'nt have an account ? <a href="register.php" class="loginhere-link">Register here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/login.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>