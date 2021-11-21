<?php require'database.php'; ?>
<?php 
if (isset($_GET['category_id'])) {
  $category_id=$_GET['category_id'];
}
if (isset($_GET['id'])) {
  $id=$_GET['id'];
  echo $id;

 } ?>
 <?php 
$sql="DELETE FROM shop WHERE Id=$id";
$rq=mysqli_query($config,$sql);
header('location:shop.php?category_id='.$category_id.''); 
  ?>