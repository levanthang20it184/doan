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
require_once('database.php');
$ten=$_GET["ten"];
$sql="SELECT * FROM shop WHERE ten LIKE '$ten%'";
$result=mysqli_query($config,$sql);
$sum=0;
while($row=mysqli_fetch_array($result,1)){
  $data[]=$row;
}

 
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
</tbody>
 </table> 

  