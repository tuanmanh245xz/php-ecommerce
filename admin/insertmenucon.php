<?php require "includes/header.php";
if(isset($_POST['submit']))
{
        $TenMenu = $_POST['tenmenucon'];
        $Visible = $_POST['visible'];
        $IdCha = $_POST['menucha'];
        $insert_menu = "insert into menucon(tenmenucon,visible,idcha) value('$TenMenu','$Visible',$IdCha)";
        if(mysqli_query($conn,$insert_menu))
        {
            echo "<script language='javascript'>alert('Thêm thành công!');";
		    echo "location.href='insertmenucon.php';</script>";    
        }
        else
        {
            echo "<script language='javascript'>alert('Thêm thất bại!');";
		    echo "location.href='insertmenucon.php';</script>";    
        }
}
?>
<div class="group-box">
	<div align="center">
	<div class="title">Thêm mới menu con</div>
      <br>    
	      <form class="form-horizontal" action="insertmenucon.php" method="post">
	<div class="form-group">
		<label for="tenmenucon" class="col-sm-4 control-label">Tên Menu Con:</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="tenmenucon" name="tenmenucon" >
		</div>
	</div>        
      <div class="form-group">
		<label for="visible" class="col-sm-4 control-label">Visible:</label>
		<div class="col-sm-3">
	 <label class="radio-inline" >
     <input type="radio" name="visible" checked value="True">True
    </label>
    <label class="radio-inline">
      <input type="radio" name="visible" value="False">False
    </label>
		</div>
	</div>   
     <div class="form-group">
		<label for="menucha" class="col-sm-4 control-label">Menu Cha:</label>
		<div class="col-sm-3">
	<select name="menucha" class="form-control">
      <?php
         $tbl_menucha=  mysqli_query($conn,"select * from menucha");
            if(mysqli_num_rows($tbl_menucha)>0)
                while($rows_menucha = mysqli_fetch_array($tbl_menucha))
                {
                echo '<option value="'.$rows_menucha['id'].'">'.$rows_menucha['tenmenucha'].'</option>';
                }
        ?>
       
    </select>
    
		</div>
	</div>  	      
   
	<div class="form-group">
		<div class="col-sm-6 ">
			<input id="submit" name="submit" type="submit" value="Lưu" class="btn btn-primary">
		</div>
	</div>
     </form>
    <br>
	 </div>
</div>    
<?php  require "includes/footer.php";