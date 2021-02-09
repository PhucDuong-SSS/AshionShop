 <?php

include 'lib/session.php';
Session::init();


include 'lib/database.php';
include 'helpers/format.php';

spl_autoload_register(function ($class) {
	include_once "classes/" . $class . ".php";
});


$db = new Database();
$us = new user();
$cs = new customer();
$newsletter = new newsletter();


if(isset($_POST['email']))
{
	$email = $_POST['email'];
	$newEmail = $newsletter->insert_newsletter($email);
	if($newEmail)
	{
		echo "Đăng ký email thành công";
	}
	else
	{
		echo "Email đã tồn tại";
	}

}


?> 