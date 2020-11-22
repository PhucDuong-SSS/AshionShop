
<?php
  
     include_once './classes/customer.php';
     $cs = new customer();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) &&isset($_POST['agree_term'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $insertCustomer = $cs -> insert_customer($_POST); // hàm thêm cusotomer vào co so du liêu
        
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
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="phone" id="phone" placeholder="Your Phone"/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                        <select  class="form-input" id="gender" name="gender">
							<option selected >Giới tính</option>
							<option value="1">Nam</option>
							<option value="0">Nữ</option>
		                </select>
                            
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="city" id="city" placeholder="Your city"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="address" id="adress" placeholder="Your Address"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Repeat your password"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree_term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                        <!-- alert to user -->
                        <div style="text-align: center; color:red">
                        <?php 
                        if (isset($insertCustomer)) 
                        {
    			            echo $insertCustomer;
    		             }
    		             ?>

                        </div>
                        
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="./login.php" class="loginhere-link">Login here</a>
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