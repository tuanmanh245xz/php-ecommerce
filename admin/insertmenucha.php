<?php require "includes/header.php";
if(isset($_POST['submit']))
{
        $TenMenu = $_POST['tenmenucha'];
        $Visible = $_POST['visible'];
        $insert_menu = "insert into menucha(tenmenucha,visible) value('$TenMenu','$Visible')";
        if(mysqli_query($conn,$insert_menu))
        {
            echo "<script language='javascript'>alert('Thêm thành công!');";
		echo "location.href='insertmenucha.php';</script>";    
        }
        else
        {
            echo "<script language='javascript'>alert('Thêm thất bại!');";
		      echo "location.href='insertmenucha.php';</script>";
        }
}
?>
<div class="group-box">
	<div align="center">
	<div class="title">Thêm mới menu cha</div>
      <br>    
	      <form class="form-horizontal" action="insertmenucha.php" method="post">
	<div class="form-group">
		<label for="tenmenucha" class="col-sm-4 control-label">Tên Menu Cha:</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="tenmenucha" name="tenmenucha" >
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
		<div class="col-sm-6 ">
			<input id="submit" name="submit" type="submit" value="Lưu" class="btn btn-primary">
		</div>
	</div>
     </form>
    <br>
	 </div>
</div>    
<?php require "includes/footer.php";