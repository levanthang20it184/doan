<?php 
require_once('database.php'); 
$name=$email=$password1=$password2='';
if (isset($_POST['name'])) {
	$name=$_POST['name'];
}
if (isset($_POST['email'])) {
	$email=$_POST['email'];
}
if (isset($_POST['password1'])) {
	$password1=$_POST['password1'];
}
if (isset($_POST['password2'])) {
	$password2=$_POST['password2'];
}
if (isset($_POST['submit1'])) {
	if ($password1==$password2) {
		$sql="INSERT INTO dangnhap(name,email,password) VALUES('$name','$email','$password1')";
	$result=mysqli_query($config,$sql);

         header('location:login.php');
                                }
         else{
         	echo'Đăng kí không thành công !';
         }

                               }
	
