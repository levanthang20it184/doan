<?php
require_once('database.php'); 
$name=$password="";
if (isset($_POST['name'])) {
	$name=$_POST['name'];
}
if (isset($_POST['password'])) {
	$password=$_POST['password'];
}	
if (isset($_POST['submit'])) {
	$sql="SELECT *FROM dangnhap WHERE name='$name'and password='$password'";
    $result=mysqli_query($config,$sql);
    $row=mysqli_fetch_array($result);
    if ($row>0) {
header('location:shop.php');            
                }else{
        echo'Đăng Nhập Thất bại';
    }
}