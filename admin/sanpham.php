<?php require "includes/header.php";

?>
<SCRIPT LANGUAGE="JavaScript">
    function confirmAction() {
      return confirm("Bạn có chắc muốn xóa không?")
    }
</SCRIPT>
<div class="group-box">
	<div align="center">
	<div class="title">Quản lý sản phẩm</div>
      <div class="search_admin">
                 	<div class="row"   >
        <div class="search" >
        <form action="sanpham.php" id="frm_search" method="post">
            <input type="text" name="valuesearch" id="valuesearch" class="form-control input-sm" maxlength="64" placeholder="Nhập từ khóa" />
             <button type="submit" class="btn  btn-primary btn-sm">Search</button>            
             <button  style="margin-right:-44px" class=" btn btn-default btn-sm"><a href="sanpham.php">Hủy</a></button>
             
        </form>
        <script type="text/javascript">
               $(document).ready(function() {
$("#frm_search").submit(function (e) {
if ($("#valuesearch").val() == "" ) {
alert('Vui lòng nhập từ khóa để tìm kiếm');
e.preventDefault(); 
} 
});
});
             </script>
</div>
          </div>
      </div>

           <table border="1px" style="font-size:15px"> 
        <tr>
            <th>Id</th>
            <th>Ảnh Sản Phẩm</th>
            <th>Tên Sản Phẩm</th>
            <th>Giá</th>
            <th>Visible</th>
            <td style="text-align: center" colspan="2" align="center"><a href="insertsanpham.php"><img  src="../images/Layout/add.png" alt=""></a></td>
            
        </tr>
        <img  alt="">
        <?php
               function filterTable($sql)
               {
                    $dbhost="localhost";
                    $dbname="congtylap";
                    $dbuser="root";
                    $dbpass='';
                    $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
                    mysqli_set_charset($conn,'utf8');  
                   $filter_res = mysqli_query($conn,$sql);
                   return $filter_res;
               }
               
               $display = 10;
                if(isset($_POST['valuesearch']))
               {
                    $valuesearch= $_POST['valuesearch'];
                   $query = "select count(IdProduct) from product,menucon,menucha where product.IdMenuCon = menucon.id and menucon.idcha = menucha.id and concat(NameProduct,Price,InfoProduct,tenmenucha) like '%$valuesearch%'";
               }
               else
               {
                   $query = "select count(IdProduct) from product";
               }
               if(isset($_GET['page']) && (int)$_GET['page'] )
               {
                   $page = $_GET['page'];
               }
               else
               {
                   
                   $res = mysqli_query($conn,$query);
                   $rows = mysqli_fetch_array($res);
                   $record = $rows[0];
                   if($record>$display)
                       $page =  ceil($record/$display);
                   else
                       $page = 1 ;
               }
               $start = (isset($_GET['start']) && (int)$_GET['start']) ? $_GET['start']:0;
                if(isset($_POST['valuesearch']))
               {
                    $valuesearch= $_POST['valuesearch'];
                    $sql = "select * from product,menucon,menucha where product.IdMenuCon = menucon.id and menucon.idcha = menucha.id and concat(NameProduct,Price,InfoProduct,tenmenucha) like '%$valuesearch%' order by IdProduct LIMIT ".$start.",".$display;        
               }
               else
               {
                    $sql = "select * from product order by IdProduct LIMIT ".$start.",".$display;    
               }
               $tbl_sp = filterTable($sql);
               //if(mysqli_num_rows($tbl_sp)>0)
                   while($row_sp=mysqli_fetch_array($tbl_sp,MYSQLI_ASSOC)) { ?>
        <tr>
            <td><?php echo $row_sp['IdProduct'] ;?></td>
            <td> <img src="<?php echo '../images/Product/'.$row_sp['ImageProduct']; ?>"  height="45" alt=""></td>
            <td><?php echo $row_sp['NameProduct']; ?></td>
            <td><?php echo $row_sp['Price']; ?></td>
            <td><?php echo $row_sp['Visible']; ?></td>
            <td><a href="editsanpham.php?id=<?php echo $row_sp['IdProduct'];?>"><center><img src="../images/Layout/edit.png" alt=""></center></a></td>
            <td><a onclick="return confirmAction()" href="deletesanpham.php?id=<?php echo $row_sp['IdProduct'] ?>">
            <center><img src="../images/Layout/delete.png" alt=""></center></a></td>
        </tr>   
        <?php  } ?> 
    </table> 
        <div class="row">
           <ul class="pagination">
                <?php
            if($page>1)    
            {
                $next = $start + $display;
                $prev = $start - $display;
                $current = ($start/$display     )+1;
                if($current!=1)
                    echo "<li><a href='sanpham.php?start=$prev'>&#60;</a></li>";    
                for($i=1;$i<=$page;$i++)
                {
                    if($current!=$i)
                        echo "<li class='active' ><a href='sanpham.php?start=".($display*($i-1))."'>$i</a> </li>";  
                    else
                        echo "<li class='disabled'><a href='#'>$i</a></li>";
                    
                }
                if($current!=$page)
                    echo "<li><a href='sanpham.php?start=$next'>&#62;</a></li>";    
                
            }   
           
            
        ?> 
        </ul>   
        </div>
        
        
        
        <br>  
    
	 </div>
</div>    
<?php  require "includes/footer.php";
