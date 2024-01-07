<?php require "includes/header.php";
if(isset($_REQUEST['id']))
{
    $id = $_REQUEST['id'];
    $tbl_lh = mysqli_query($conn,"select * from lienhe where id=$id");  
    if(mysqli_num_rows($tbl_lh)>0)
        $row_lh = mysqli_fetch_array($tbl_lh);
}

?>
<SCRIPT LANGUAGE="JavaScript">
    function confirmAction() {
      return confirm("Bạn có chắc muốn xóa?")
    }
</SCRIPT>
<div class="group-box">
	<div class="group-box">
          <form  class="form-horizontal" action="insertmenucha.php" method="post">
	<div class="form-group" >
		<label  for="" class="col-sm-4 control-label">Họ tên:</label>
		<div class="col-sm-3" >
			<label style="color:#06C;border:none;" for="" class="form-control"><?php echo $row_lh['hoten']; ?>  </label>
		</div>
	</div>        
    <div class="form-group">
		<label for="" class="col-sm-4 control-label">Emai:</label>
		<div class="col-sm-3">
			<label style="border:none;"  for="" class="form-control"><?php echo $row_lh['email']; ?>  </label>
		</div>
	</div>  
    <div class="form-group">
		<label for="" class="col-sm-4 control-label">Phone:</label>
		<div class="col-sm-3">
			<label style="border:none;"  for="" class="form-control"><?php echo $row_lh['phone']; ?>  </label>
		</div>
	</div>  
    <div class="form-group">
		<label for="" class="col-sm-4 control-label">Ngày gửi:</label>
		<div class="col-sm-3">
			<label style="border:none;"  for="" class="form-control"><?php echo $row_lh['ngaygui']; ?>  </label>
		</div>
	</div>  
    <div class="form-group">
		<label for="" class="col-sm-4 control-label">Ngày gửi:</label>
		<div class="col-sm-7">
			<textarea name="" id="" class="form-control" cols="20" rows="10"><?php echo $row_lh['noidung']; ?> </textarea>
		</div>
	</div>  
     </form>
     <br>
      </div>
</div>    
<?php require "includes/footer.php";?>