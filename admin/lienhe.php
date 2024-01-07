<?php require "includes/header.php";
 
?>
<SCRIPT LANGUAGE="JavaScript">
    function confirmAction() {
      return confirm("Bạn có chắc muốn xóa?")
    }
</SCRIPT>
<div class="group-box">
	<div align="center">
	<div class="title">Quản lý khách hàng liên hệ</div>
        <div class="search_admin">
                 	<div class="row"   >
        <div class="search" >
        <form action="lienhe.php" id="frm_search" method="post">
            <input type="text" name="valuesearch" id="valuesearch" class="form-control input-sm" maxlength="64" placeholder="Nhập từ khóa" />
             <button type="submit" class="btn  btn-primary btn-sm">Search</button>            
             <button  style="margin-right:-44px" class=" btn btn-default btn-sm"><a href="lienhe.php">Hủy</a></button>
             
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
            <th>Phone</th>
            <th>Email</th>
            <th>Ngày Gửi</th>
            <th>Xóa</th>
        </tr>
        <?php
               $display = 5;
                $start = (isset($_GET['start']) && (int)$_GET['start']) ? $_GET['start']:0; 
                    if(isset($_POST['valuesearch']))
               {
                     $valuesearch= $_POST['valuesearch'];
                     $query = "select count(id) from lienhe where  concat(hoten,phone,email,ngaygui) like '%$valuesearch%'";
                     $sql = "select * from lienhe where  concat(hoten,phone,email,ngaygui) like '%$valuesearch%' LIMIT ".$start.",".$display;    
                        
               }
               else
               {
                   $query = "select count(id) from lienhe";
                   $sql = "select * from lienhe LIMIT ".$start.",".$display;    
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
                   $tbl_lh = mysqli_query($conn,$sql);  
                   if(mysqli_num_rows($tbl_lh)>0) while($row_lh=mysqli_fetch_array($tbl_lh)) { ?>
        <tr>
            <td><a href="ctlienhe.php?id=<?php echo $row_lh['id']; ?>">#<?php echo $row_lh['id']; ?></a></td>
            <td><?php echo $row_lh['hoten']; ?></td>
            <td><?php echo $row_lh['phone']; ?></td>
            <td><?php echo $row_lh['email']; ?></td>
            <td><?php echo $row_lh['ngaygui']; ?></td>
            <td><a onclick="return confirmAction()" href="deletelienhe.php?id=<?php echo $row_lh    ['id']; ?>">
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
                    echo "<li><a href='lienhe.php?start=$prev'>&#60;</a></li>";    
                for($i=1;$i<=$page;$i++)
                {
                    if($current!=$i)
                        echo "<li class='active' ><a href='lienhe.php?start=".($display*($i-1))."'>$i</a> </li>";  
                    else
                        echo "<li class='disabled'><a href='#'>$i</a></li>";
                    
                }
                if($current!=$page)
                    echo "<li><a href='lienhe.php?start=$next'>&#62;</a></li>";    
                
            }   
           
            
        ?> 
        </ul>   
        </div>    
        <br>  
        
	 </div>
</div>    
<?php require "includes/footer.php";