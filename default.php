<?php require "includes\header.php"; ?>
        <!-- Center Content-->
            <div class="center_tittle_bar">
    <strong>Sản Phẩm Hot</strong> 
</div>

    <div class="row" style="margin-left:25px; padding-right:35px">      
            <?php
    $q_sphot = "select * from product where SPHot = 'True'  order by IdProduct desc  LIMIT 0,9 " ;
    $res_sphot = mysqli_query($conn,$q_sphot);  
    if(mysqli_num_rows($res_sphot)>0)
    while($row_sphot = mysqli_fetch_array($res_sphot))
    {
       ?>

            <div class="col-xs-4" style="padding-left:-10px">
                <div class="product_box" >
                        <div class="product_tittle">
                           <a href="chitietsanpham.php?id=<?php echo $row_sphot["IdProduct"] ?>"><?php echo $row_sphot['NameProduct']; ?></a>
                        </div>
                        <div class="product_image">
                           <a href="chitietsanpham.php?id=<?php echo $row_sphot["IdProduct"] ?>">
                                <img height="100px" src="<?php echo 'images/Product/'.$row_sphot['ImageProduct']; ?>" alt="">   
                           </a>
                        </div>
                        <div class="product_price">
                            <span class="giamoi">
                             <?php echo number_format($row_sphot['Price'],0,"",'.'); ?>đ
                           </span>
                        </div>      
                 </div>
            </div>
           <?php } ?>

    </div>
           <div class="center_tittle_bar">
    <strong>Sản Phẩm Mới</strong> 
</div>

    <div class="row" style="margin-left:25px; padding-right:35px">      
            <?php
    $q_spkm = "select * from product where SPHot = 'False' and Visible='True'  order by IdProduct desc LIMIT 0,6  " ;
    $res_spkm = mysqli_query($conn,$q_spkm);  
    if(mysqli_num_rows($res_spkm)>0)
    while($row_spkm = mysqli_fetch_array($res_spkm))
    {
       ?>

            <div class="col-xs-4" >
                <div class="product_box" >
                        <div class="product_tittle">
                           <a href="chitietsanpham.php?id=<?php echo $row_spkm["IdProduct"] ?>"><?php echo $row_spkm['NameProduct']; ?></a>
                        </div>
                        <div class="product_image">
                            <a href="chitietsanpham.php?id=<?php echo $row_spkm["IdProduct"] ?>"><img height="100px" src="<?php echo 'images/Product/'.$row_spkm['ImageProduct']; ?>" alt=""></a>
                        </div>
                        <div class="product_price">
                            <span class="giamoi">
                             <?php echo number_format($row_spkm['Price'],0,'','.');?>đ
                           </span>
                        </div>      
                 </div>
            </div>
           <?php } ?>
        </div>
<?php require "includes\\footer.php";?>
 