<?php require "includes/header.php";
if(isset($_REQUEST['id']))
{
    $id = $_REQUEST['id'];  
    $_SESSION["idupdate"] = $_REQUEST['id'];
    
} 
if(isset($_POST['submit']))
{
   $id =  $_SESSION["idupdate"] ;
        $TenMenu = $_POST['tenmenucha'];
        $Visible = $_POST['visible'];
    $update_menu = "update menucha set tenmenucha = '$TenMenu', visible= '$Visible'  where id=$id";
    if(mysqli_query($conn,$update_menu))
    {
        unset($_SESSION["idupdate"] );    
        echo "<script language='javascript'>alert('Cập nhật thành công!');";
        echo "location.href='editmenucha.php?id=$id';</script>"; 
    }
    else
    {
        echo "<script language='javascript'>alert('Cập nhật thất bại!');";
        echo "location.href='editmenucha.php?id=$id';</script>"; 
    }
}

    $select_id = "select * from menucha where id = '$id'";
        $q_select_id = mysqli_query($conn,$select_id);
        if(mysqli_num_rows($q_select_id)>0)
        while($row_select_id =mysqli_fetch_array($q_select_id))
        { 
?>

<div class="group-box">
	<div align="center">
	<div class="title">Sửa thông tin menu cha</div>
      <br>    
	      <form class="form-horizontal" action="editmenucha.php" method="post">
	<div class="form-group">
		<label for="tenmenucha" class="col-sm-4 control-label">Tên Menu Cha:</label>
		<div class="col-sm-3">
			<input type="text"  value="<?php echo $row_select_id['tenmenucha'] ?>" class="form-control" id="tenmenucha" name="tenmenucha" >
		</div>
	</div>        
      <div class="form-group">
		<label for="visible" class="col-sm-4 control-label">Visible:</label>
		<div class="col-sm-3">
     <label class="radio-inline" >
     <input type="radio" name="visible" <?php if($row_select_id['visible'] == 'True') echo 'checked'; ?>  value="True">True
    </label>
    <label class="radio-inline">
      <input type="radio" name="visible" <?php if($row_select_id['visible'] == 'False') echo 'checked'; ?> value="False">False
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
<?php } require "includes/footer.php";