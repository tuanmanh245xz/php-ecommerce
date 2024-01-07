<?php require "includes/header.php";

?>
<SCRIPT LANGUAGE="JavaScript">
    function confirmAction() {
      return confirm("Bạn có chắc muốn xóa không?")
    }
</SCRIPT>
<div class="group-box">
	<div align="center">
	<div class="title">Quản lý menu con</div>
       <div class="search_admin">
                 	<div class="row"   >
        <div class="search" >
        <form action="menucon.php" id="frm_search" method="post">
            <input type="text" name="valuesearch" id="valuesearch" class="form-control input-sm" maxlength="64" placeholder="Nhập từ khóa" />
             <button type="submit" class="btn  btn-primary btn-sm">Search</button>            
             <button  style="margin-right:-44px" class=" btn btn-default btn-sm"><a href="menucon.php">Hủy</a></button>
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
            <th>Tên Menu Con</th>
            <th>Visible</th>
            <th>Menu Cha</th>
            <td style="text-align: center" colspan="2" align="center"><a href="insertmenucon.php"><img  src="../images/Layout/add.png" alt=""></a></td>
            
        </tr>
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
               $display=5;
               $start = (isset($_GET['start']) && (int)$_GET['start']) ? $_GET['start']:0;  
                 if(isset($_POST['valuesearch']))
               {
                    $valuesearch= $_POST['valuesearch'];
                   $query = "select count(id) from menucon where concat(id,tenmenucon,visible) like '%$valuesearch%'";
                     $sql = "select menucon.id,menucon.tenmenucon,menucon.visible,idcha,tenmenucha from menucon,menucha where menucha.id = menucon.idcha and  concat(menucon.id,tenmenucon,menucon.visible) like '%$valuesearch%'  LIMIT ".$start.",".$display;  
               }
               else
               {
                   $query = "select count(id) from menucon";
                   $sql = "select menucon.id,menucon.tenmenucon,menucon.visible,idcha,tenmenucha from menucon,menucha where menucha.id = menucon.idcha LIMIT ".$start.",".$display;    
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
               $tbl_menucon = filterTable($sql);    
               if(mysqli_num_rows($tbl_menucon)>0) while($row_menucon=mysqli_fetch_array($tbl_menucon)) { ?>
        <tr>
            <td><?php echo $row_menucon['id'] ;?></td>
            <td><?php echo $row_menucon['tenmenucon']; ?></td>
            <td><?php echo $row_menucon['visible']; ?></td>
            <td><?php echo $row_menucon['tenmenucha']; ?></td>
            <td><a href="editmenucon.php?id=<?php echo $row_menucon['id'] ?>"><center><img src="../images/Layout/edit.png" alt=""></center></a></td>
            <td><a onclick="return confirmAction()" href="deletemenucon.php?id=<?php echo $row_menucon['id'] ?>">
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
                $current = ($start/$display)+1;
                if($current!=1)
                    echo "<li><a href='menucon.php?start=$prev'>&#60;</a></li>";    
                for($i=1;$i<=$page;$i++)
                {
                    if($current!=$i)
                        echo "<li class='active' ><a href='menucon.php?start=".($display*($i-1))."'>$i</a> </li>";  
                    else
                        echo "<li class='disabled'><a href='#'>$i</a></li>";
                    
                }
                if($current!=$page)
                    echo "<li><a href='menucon.php?start=$next'>&#62;</a></li>";    
                
            }   
           
            
        ?> 
        </ul>   
        </div>
       
        
        <br>  
    
	 </div>
</div>    
<?php  require "includes/footer.php";
