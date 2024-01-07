<?php require "includes\header.php"; ?>
        <!-- Center Content-->
           <div class="center_tittle_bar">
    <strong>Kết Quả Tìm Kiếm</strong> 
</div>

    <div class="row">      
            <?php
    $input = $_GET['search'];
    $sql = "select * from product,menucon,menucha where product.IdMenuCon = menucon.id and menucon.idcha = menucha.id and concat(NameProduct,Price,InfoProduct,tenmenucha) like '%$input%' and product.Visible='True'  order by IdProduct desc LIMIT 0,15  " ;
    $res = mysqli_query($conn,$sql);  
     if(mysqli_num_rows($res)>15)
          echo "<div ><p style='text-align:center; color:red;'>Kết quả tìm kiếm quá nhiều sản phẩm, vui lòng nhập chính xác từ khóa!</p></div>";
     else if(mysqli_num_rows($res)<=15 && mysqli_num_rows($res)>0)
    while($row = mysqli_fetch_array($res))
    {
       ?>

            <div class="col-xs-4" style="">
                <div class="product_box" >
                        <div class="product_tittle">
                           <a href="chitietsanpham.php?id=<?php echo $row["IdProduct"] ?>"><?php echo $row['NameProduct']; ?></a>
                        </div>
                        <div class="product_image">
                            <a href="chitietsanpham.php?id=<?php echo $row["IdProduct"] ?>"><img height="100px" src="<?php echo 'images/Product/'.$row['ImageProduct']; ?>" alt=""></a>
                        </div>
                        <div class="product_price">
                            <span class="giamoi">
                             <?php echo number_format($row['Price'],0,'','.');?>đ
                           </span>
                        </div>      
                 </div>
            </div>
           <?php 
    }
          else 
                      echo "<div ><p style='text-align:center; color:red;'>Rất tiếc, chúng tôi không tìm thấy sản phẩm nào thỏa mãn điều kiện tìm kiếm của bạn.</p></div>";      
        ?>
        </div>
<?php require "includes\\footer.php";?>
 