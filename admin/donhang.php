<?php require "includes/header.php";
 
?>
<SCRIPT LANGUAGE="JavaScript">
    function confirmAction() {
      return confirm("Bạn có chắc muốn xóa?")
    }
</SCRIPT>
<div class="group-box">
	<div align="center">
	<div class="title">Quản lý đơn hàng</div>
       
         <div class="search_admin">
                 	<div class="row"   >
        <div class="search" >
        <form action="donhang.php" id="frm_search" method="post">
            <input type="text" name="valuesearch" id="valuesearch" class="form-control input-sm" maxlength="64" placeholder="Nhập từ khóa" />
             <button type="submit" class="btn  btn-primary btn-sm">Search</button>            
             <button  style="margin-right:-44px" class=" btn btn-default btn-sm"><a href="donhang.php">Hủy</a></button>
             
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
               <table border="1px" style="font-size:15px;margin-top:20px"> 
        <tr>
            <th>Id</th>
            <th>Họ Tên</th>
            <th>Ngày Lập</th>
            <th>Tổng Tiền</th>
            <th>Thanh Toán</th>
            <th>Xóa</th>
        </tr>
        <?php
                $display = 5;
                $start = (isset($_GET['start']) && (int)$_GET['start']) ? $_GET['start']:0; 
                   if(isset($_POST['valuesearch']))
               {
                    $valuesearch= $_POST['valuesearch'];
                    $query = "select count(id) from donhang where concat(id,hoten,diachi,email,phone,ngaylap,tongtien) like '%$valuesearch%'";
                    $sql = "select * from donhang where concat(id,hoten,diachi,email,phone,ngaylap,tongtien) like '%$valuesearch%' LIMIT ".$start.",".$display;        
               }
               else
               {
                   $query = "select count(id) from menucon ";  
                   $sql = "select * from donhang LIMIT ".$start.",".$display;
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
                   $tbl_dh = mysqli_query($conn,$sql);
                   if(mysqli_num_rows($tbl_dh)>0) while($row_dh=mysqli_fetch_array($tbl_dh)) { ?>
        <tr>
            <td><a href="chitietdonhang.php?id=<?php echo $row_dh['id']; ?>">#<?php echo $row_dh['id']; ?></a></td>
            <td><?php echo $row_dh['hoten']; ?></td>
            <td><?php echo $row_dh['ngaylap']; ?></td>
            <td><?php echo number_format($row_dh['tongtien'],"0","",".") ; ?>đ</td>
            <td><?php if($row_dh['thanhtoan']==0) echo 'Chưa thanh toán'; else echo 'Đã thanh toán'; ?></td>
            <td><a onclick="return confirmAction()" href="deletedonhang.php?id=<?php echo $row_dh['id']; ?>">
            <center><img src="../images/Layout/delete.png" alt=""></center></a></td>
        </tr>    
        <?php } ?>
    </table>    
        <div class="row">
           <ul class="pagination">
                <?php
            if($page>1)    
            {
                $next = $start + $display;
                $prev = $start - $display;
                $current = ($start/$display)+1;
                if($current!=1)
                    echo "<li><a href='donhang.php?start=$prev'>&#60;</a></li>";    
                for($i=1;$i<=$page;$i++)
                {
                    if($current!=$i)
                        echo "<li class='active' ><a href='donhang.php?start=".($display*($i-1))."'>$i</a> </li>";  
                    else
                        echo "<li class='disabled'><a href='#'>$i</a></li>";
                    
                }
                if($current!=$page)
                    echo "<li><a href='donhang.php?start=$next'>&#62;</a></li>";    
                
            }   
           
            
        ?> 
        </ul>   
        </div>  
        <br>  
        
	 </div>
</div>    
<?php require "includes/footer.php";