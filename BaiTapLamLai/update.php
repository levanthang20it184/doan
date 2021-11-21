<style type="text/css">.table&amp;amp;gt;tbody&amp;amp;gt;tr&amp;amp;gt;td, .table&amp;amp;gt;tfoot&amp;amp;gt;tr&amp;amp;gt;td {  
vertical-align: middle;
}
 
@media screen and (max-width: 600px) { 
table#cart tbody td .form-control { 
width:20%; 
display: inline !important;
} 
 
.actions .btn { 
width:36%; 
margin:1.5em 0;
} 
 
.actions .btn-info { 
float:left;
} 
 
.actions .btn-danger { 
float:right;
} 
 
table#cart thead {
display: none;
} 
 
table#cart tbody td {
display: block;
padding: .6rem;
min-width:320px;
} 
 
table#cart tbody tr td:first-child {
background: #333;
color: #fff;
} 
 
table#cart tbody td:before { 
content: attr(data-th);
font-weight: bold; 
display: inline-block;
width: 8rem;
} 
 
table#cart tfoot td {
display:block;
} 
table#cart tfoot td .btn {
display:block;
}
}</style>
<?php require 'database.php'; ?>
<?php 
if (isset($_GET['id'])) {
	$id=$_GET['id'];
}
if (isset($_GET['category_id'])) {
  $category_id=$_GET['category_id'];
}
 ?>
 <?php 

if (isset($_POST['sub'])) {
	$SoLuong=$_POST['SoLuong'];
	$ThanhTien=$_POST['ThanhTien'];
	$Price=$_POST['Price'];
	$To=$SoLuong*$Price;
	
		$sql="UPDATE shop SET SoLuong='$SoLuong',ThanhTien='$To' WHERE Id='$id'";
		$result=mysqli_query($config,$sql);
		header('location:shop.php?category_id='.$category_id.'');

}
  ?>
  
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title></title>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 	<script src="js/jquery-1.11.1.min.js"></script>
 </head>
 <body>
 	<?php 
$sql="SELECT *FROM shop WHERE Id=$id";
$rq=mysqli_query($config,$sql);
$row=mysqli_fetch_array($rq);
 ?>
 <form method="POST">
<h2 class="text-center">Update</h2>
<div class="container"> 
 <table id="cart" class="table table-hover table-condensed"> 
  <thead> 
   <tr> 
    <th style="width:50%">Tên sản phẩm</th> 
    <th style="width:10%">Giá</th> 
    <th style="width:8%">Số lượng</th> 
    <th style="width:22%" class="text-center">Thành tiền</th> 
    <th style="width:10%"> </th> 
   </tr> 
  </thead> 
  <tbody><tr> 
   <td data-th="Product"> 
    <div class="row"> 
     <div class="col-sm-2 hidden-xs"><img src="<?php echo $row['Name'] ?>" alt="Sản phẩm 1" class="img-responsive" width="100">
     </div> 
     <div class="col-sm-10"> 
      <h4 class="nomargin">Sản phẩm 1</h4> 
      <p>Mô tả của sản phẩm 1</p> 
     </div> 
    </div> 
   </td> 
   <td data-th="Price"><input type="text" name="Price" value="<?php echo $row['Price'] ?>"></td> 
   <td data-th="Quantity"><input class="form-control text-center"name="SoLuong" value="<?php echo $row['SoLuong'] ?>" type="number">
   </td> 
   <td data-th="Subtotal" class="text-center name="ThanhTien"><?php echo $row['ThanhTien'] ?></td> 
   <td class="actions" data-th="">
    
    <button class="btn btn-danger btn-sm" name="sub" value="Sua">Sua
    </button>
   </td> 
  </tr> 
  
  </tfoot> 
 </table>
</div> </form>
 </body>
 </html>
