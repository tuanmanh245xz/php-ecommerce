<?php require "includes/header.php";
if(isset($_REQUEST['id']))
{
    $id = $_REQUEST['id'];  
    $_SESSION["idupdate"] = $_REQUEST['id'];
    
} 
if(isset($_POST['submit']))
{
   $id =  $_SESSION["idupdate"] ;
        $TenMenu = $_POST['tenmenucon'];
        $Visible = $_POST['visible'];
        $IdCha = $_POST['menucha'];
    $update_menu = "update menucon set tenmenucon = '$TenMenu', visible= '$Visible', idcha = $IdCha   where id=$id";
    if(mysqli_query($conn,$update_menu))
    {
        unset($_SESSION["idupdate"] );
        echo "<script language='javascript'>alert('Cập nhật thành công!');";
        echo "location.href='editmenucon.php?id=$id';</script>"; 
    }
    else
    {
        echo "<script language='javascript'>alert('Cập nhật thất bại!');";
        echo "location.href='editmenucon.php?id=$id';</script>"; 
    }
}

    $select_id = "select * from menucon where id = '$id'";
        $q_select_id = mysqli_query($conn,$select_id);
        if(mysqli_num_rows($q_select_id)>0)
        while($row_select_id =mysqli_fetch_array($q_select_id))
        { 
            
?>
<div class="group-box">
	<div align="center">
	<div class="title">Sửa thông tin menu con</div>
      <br>    
	      <form class="form-horizontal" action="editmenucon.php" method="post">
	<div class="form-group">
		<label for="tenmenucon" class="col-sm-4 control-label">Tên Menu Con:</label>
		<div class="col-sm-3">
			<input type="text" value="<?php echo $row_select_id['tenmenucon']; ?>" class="form-control" id="tenmenucon" name="tenmenucon" >
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
		<label for="menucha" class="col-sm-4 control-label">Menu Cha: </label>
		<div class="col-sm-3">
	<select name="menucha" class="form-control">
      <?php
         $tbl_menucha=  mysqli_query($conn,"select * from menucha");
            if(mysqli_num_rows($tbl_menucha)>0){
                while($rows_menucha = mysqli_fetch_array($tbl_menucha))
                {
             if($row_select_id['idcha']  == $rows_menucha['id'] )
                   $selected = 'selected';
              else
                    $selected = '';
                echo '<option '.$selected.'  value="'.$rows_menucha['id'].'">'.$rows_menucha['tenmenucha'].'</option>';
                }
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
    <?php }  ?>
     </form>
    <br>
	 </div>
</div>    
<?php  require "includes/footer.php";