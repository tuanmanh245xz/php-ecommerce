<?php require "includes\header.php"; ?>
        <!-- Center Content-->
                <?php 
          $idcha = $_REQUEST["id"];
          $selectmenucha = "select * from menucha where id=$idcha";
          $resultmenucha = mysqli_query($conn,$selectmenucha);
          while($row_menucha = mysqli_fetch_array($resultmenucha)){
          ?>    
               <div class="center_tittle_bar">
                <b><?php echo $row_menucha['tenmenucha'] ?></b>      
                </div>
          <?php } ?>
    <div class="row" style="margin-left:25px; padding-right:35px">      
        <?php
                  $display = 3;
               if(isset($_GET['page']) && (int)$_GET['page'] )
               {
                   $page = $_GET['page'];
               }
               else
               {
                   $tenmenucon = "";
                   $query = "select count(IdProduct) from product,menucon,menucha where product.IdMenuCon = menucon.id and menucha.id = menucon.idcha and menucha.id = $idcha and menucon.id like '%$tenmenucon%'  ";
                   $res = mysqli_query($conn,$query);
                   $rows = mysqli_fetch_array($res);
                   $record = $rows[0];
                   if($record>$display)
                       $page =  ceil($record/$display);
                   else
                       $page = 1 ;
               }
               $start = (isset($_GET['start']) && (int)$_GET['start']) ? $_GET['start']:0;
                echo "<div id='valuehangsx'></div>";
                $sql = "select menucha.tenmenucha,product.IdProduct,product.NameProduct,product.ImageProduct,product.Price,menucha.id from product,menucon,menucha where product.IdMenuCon = menucon.id and menucha.id = menucon.idcha and menucha.id = $idcha  LIMIT ".$start.",".$display;
                $result = mysqli_query($conn,$sql);
                while($row_sp = mysqli_fetch_array($result))
                {    
            ?>   

            <div class="col-xs-4" style="">
                 <div class="product_box">
                    <div class="product_tittle"><a href="chitietsanpham.php?id=<?php echo $row_sp["IdProduct"] ?>"><?php echo $row_sp["NameProduct"] ?></a></div>
                    <div class="product_image"><a href="chitietsanpham.php?id=<?php echo $row_sp["IdProduct"] ?>"><img height="100px"  src="<?php echo 'images/Product/'.$row_sp["ImageProduct"] ?>" alt="" /></a></div>
                    <div class="product_price">
                        <span class="giamoi">  <?php echo number_format($row_sp["Price"],"0","",".");  ?>đ</span>
                    </div>      
                </div>
            </div>
           <?php } ?>
          </div>
           <div class="row" align="center" >
           <ul class="pagination" >
                <?php
            if($page>1)    
            {
                $next = $start + $display;
                $prev = $start - $display;
                $current = ($start/$display)+1;
                if($current!=1)
                    echo "<li><a href='nhomsanpham.php?id=$idcha&start=$prev'>&#60;</a></li>";    
                for($i=1;$i<=$page;$i++)
                {
                    if($current!=$i)
                        echo "<li class='active' ><a href='nhomsanpham.php?id=$idcha&start=".($display*($i-1))."'>$i</a> </li>";  
                    else
                        echo "<li class='disabled'><a href='#'>$i</a></li>";
                    
                }
                if($current!=$page)
                    echo "<li><a href='nhomsanpham.php?id=$idcha&start=$next'>&#62;</a></li>";    
                
            }   
           
            
        ?> 
        </ul>   
        </div>
<?php require "includes\\footer.php";?>
 