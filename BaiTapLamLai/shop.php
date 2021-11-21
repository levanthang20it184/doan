
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>okok</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


<style>
  html{
    font-family: 'Roboto', sans-serif;
    background: rgba(232, 232, 232, 0.5);
      }
      #nabar1{

      }
      .btn{
        display: inline-block;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: center;
    text-decoration: none;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    margin-right: 50px;
        } 
        .btn1{
        display: inline-block;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: center;
    text-decoration: none;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    border-radius: 4rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    
        } 
      .btn-outline-success{
color: #198754;
    border-color: #198754;
      }
     
     
      
</style>


<body>
  <!-- Navbar -->

<div style="margin-bottom: 20px;padding: 0px 10px 0px;background: rgba(232, 232, 232, 0.5);">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
<i class="bi bi-house"></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" id="n">
        <button class="btn btn-outline-success" type="button" id="search">Search</button>
        <button class="btn1 btn-outline-success"  ><i class="bi bi-person-circle"></i></button>
      </form>
    </div>
  </div>
</nav>
</div>


<h2 class="text-center">Giỏ hàng</h2>
<div class="container"> 
  <div class="row">
      <div class="col-1">
        <h4 style="font-weight: 800;margin-left: -50px;">Categories</h4>
        <?php 
           require_once('database.php');
           $sql="SELECT *FROM categories";
           $result=mysqli_query($config,$sql);
           while ($row=mysqli_fetch_array($result)) {
               $data[]=$row;
           }
           for ($i=0; $i <count($data) ; $i++) { 
             echo'
                  <ul>
                  <li style="margin-left: -50px;"><a href="?category_id='.$data[$i]['id'].'"style="text-decoration: none;color: #8A0829;">'.$data[$i]['name'].'</a></li>
                  </ul>
             ';
           }
         ?>
         
        
      </div>
      <div class="col-11">
        <form method="post">
          <div id="timkiem"></div>
    <table id="cart" class="table table-hover table-condensed"> 
  <thead> 
   <tr> 
    <th style="width:55%">Tên sản phẩm</th> 
    <th style="width:10%">Giá</th> 
    <th style="width:8%">Số lượng</th> 
    <th style="width:22%" class="text-center">Thành tiền</th> 
    <th style="width:10%"> </th> 
   </tr> 
  </thead> 
  <tbody>
    <?php
include 'database.php';
$item_page=!empty($_GET['per_page'])?$_GET['per_page']:2;
$current_page=!empty($_GET['page'])?$_GET['page']:1;

$categories=!empty($_GET['category_id'])?$_GET['category_id']:1;
$offset=($current_page-1)*$item_page;
$sql = 'SELECT *FROM shop WHERE categoriesid='.$categories.' ORDER BY Id ASC LIMIT '.$item_page.' OFFSET '.$offset.'';
$result=mysqli_query($config,$sql);
$data=array();

$tutorecord=mysqli_query($config,'SELECT *FROM shop WHERE categoriesid='.$categories.'');
$tutorecord=$tutorecord->num_rows;
$tutopage=ceil($tutorecord/$item_page);
$sum=0;
while($row=mysqli_fetch_array($result,1)){
  $data[]=$row;
}$config->close();
for ($i=0; $i <count($data) ; $i++) { 

  echo'
  <tr> 
   <td data-th="Product"> 
    <div class="row"> 
     <div class="col-sm-2 hidden-xs"><img src="'.$data[$i]['Name'].'" alt="Sản phẩm 1" class="img-responsive" width="100">
     </div> 
     <div class="col-sm-10"> 
      <h4 class="nomargin">Sản phẩm 1</h4> 
      <p>Mô tả của sản phẩm 1</p> 
     </div> 
    </div> 
   </td> 
   <td data-th="Price">'.$data[$i]['Price'].'</td> 
   <td data-th="Quantity"><input class="form-control text-center"value="'.$data[$i]['SoLuong'].'" type="number">
   </td> 
   <td data-th="Subtotal" class="text-center">'.$data[$i]['ThanhTien'].'</td> 
    
   <td class="actions" data-th="">
    
    <a href="update.php?id='.$data[$i]['Id'].'&category_id='.$data[$i]['categoriesid'].'" title=""><i style="font-size:25px;" class="bi bi-pencil-square"></i></a>
    <br>
    <br>
    <a href="xoashop.php?id='.$data[$i]['Id'].'&category_id='.$data[$i]['categoriesid'].'"title=""><i style="font-size:25px;" class="bi bi-trash"></i></a>
    
   </td> 
  </tr> 
  <tr> 
  ';
  $sum=$sum+$data[$i]['ThanhTien'];
}
?>

  </tbody><tfoot> 
   <tr class="visible-xs"> 
    
    </td> 
    <td><center><?php 
include'Linktrang.php'; ?></center></td>
   </tr> 
   <tr> 
    <td><a href="http://hocwebgiare.com/" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
    </td> 
    <td colspan="2" class="hidden-xs"> </td> 
    <td class="hidden-xs text-center"><strong>Tổng tiền :<?php echo $sum ; ?></strong>
    </td> 
    <td><a href="http://hocwebgiare.com/" class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></a>

    </td> 
   </tr> 
  </tfoot> 
 </table>
 </form>
      </div>
  </div>
</div>
 <script src="jquery-3.6.0.min.js"></script>

<script>
$(function(){
    
    $('#search').click(function(){
        $('table').hide();
        
    });
});
</script>
<script>
   
   
  $(document).ready(function(){

    $("#search").click(function(){
      var thang=document.getElementById("n").value;
      $.get("search.php",{ten:thang},function(data){
         $("#timkiem").append(data);
         
      });

    });

  });
</script>
</body>
</html>