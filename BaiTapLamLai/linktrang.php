<style>
	.seb-pagination__pages-link {
    display: inline-block;
    font-size: 14px;
    color: #666;
    min-width: 30px;
    height: 26px;
    line-height: 26px;
    padding: 20 10px;
    border: 1px solid #dae2ed;
    border-radius: 5px;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    margin-left: 20px;
}
a:hover{
	color: red;
}
</style>
<?php 

if (isset($_GET['category_id'])) {
    $category_id=$_GET['category_id'];
    
      if ($current_page>1) {
            ?>
    <a class="seb-pagination__pages-link" href="?per_page=<?=$item_page?>&page=<?=$current_page-1?>&category_id=<?=$category_id?>" title=""><span>Last</span></a>
        <?php
      }
    

   for ($i=1; $i <=$tutopage ; $i++) { ?>
    <a class="seb-pagination__pages-link" href="?per_page=<?=$item_page?>&page=<?=$i?>&category_id=<?=$category_id?>" title=""><span><?=$i?></span></a>
        <?php  }
}
     if ($current_page<$tutopage) {
            ?>
    <a class="seb-pagination__pages-link" href="?per_page=<?=$item_page?>&page=<?=$current_page+1?>&category_id=<?=$category_id?>" title=""><span>Next</span></a>
        <?php
      }
   



 ?>