<?php include_once 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/adminlogin.php';?>


<?php
    $admin = new adminlogin();
    if($_SERVER['REQUEST_METHOD'] == 'POST' &&isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $oldPassword = $_POST['oldpassword'];
        $newPassword = $_POST['newpassword'];
        $reNewPassword = $_POST['renewpassword'];
        $adminId= Session::get('adminId');
       
        $changePassword = $admin -> changePassword($adminId,$oldPassword,$newPassword,$reNewPassword); // hàm check User and Pass khi submit lên

    }    
    
    
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Thay đổi mật khẩu</h2>
        <?=isset($changePassword)?$changePassword:"" ?>
        <div class="block">               
         <form action="" method="POST">
            <table class="form">					
                <tr>
                    <td>
                        <label>Mật khẩu cũ</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Nhập mật khẩu cũ..."  name="oldpassword" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Mật khẩu mới</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Nhập mật khẩu mới..." name="newpassword" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Nhập lại mật khẩu mới</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Nhập lại mật khẩu mới..." name="renewpassword" class="medium" />
                    </td>
                </tr>
				 
				
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>