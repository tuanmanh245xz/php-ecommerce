<?php require "includes/header.php";
if(isset($_REQUEST['id']))
{
    $id = $_REQUEST['id'];  
    $_SESSION["idupdate"] = $_REQUEST['id'];
    
} 
if(isset($_POST['submit']))
{
    $id =  $_SESSION["idupdate"] ;
      if(empty($_FILES["image"]["name"]))
        $anh = $_POST['anhht'];
      else
      {
           if($_FILES["image"]["type"] == "image/jpeg"|| $_FILES["image"]["type"] == "image/png"|| $_FILES["image"]["type"] == "image/jpg" || $_FILES["image"]["type"] == "image/gif")
              {
                  $tenanh = $_FILES["image"]["name"];
                  $path = '../images/Product/'.$_FILES["image"]["name"];
                  move_uploaded_file($_FILES["image"]["tmp_name"],$path);
                  $anh = $_FILES["image"]["name"];
              }
                else
                {
                     echo "<script language='javascript'>alert('Vui lòng chọn file ảnh có đuôi là jpeg,jpg,png,gif!');";
		             echo "location.href='editsanpham.php?id=$id';</script>";    
                }
      }
    $ttsp = $_POST['thongtinsp'];
    $thongso = $_POST['thongso'];
    $baohanh = $_POST['baohanh'];
    $khuyenmai = $_POST['khuyenmai'];
    $soluong = $_POST['soluong'];
    $pricethitruong = $_POST['pricethitruong'];
   $update_sp = "update product set NameProduct = '".$_POST['tensanpham']."',ImageProduct = '$anh',IdMenuCon=".$_POST['idmenucon'].",Price=".$_POST['price'].", Visible= '".$_POST['visible']."',SPHot='".$_POST['sphot']."',SPKM ='".$_POST['spkm']."',InfoProduct ='$ttsp', baohanh ='$baohanh',khuyenmai='$khuyenmai',soluong_pro=$soluong,pricethitruong=$pricethitruong  ,thongso = '$thongso'  where IdProduct=$id";
    if(mysqli_query($conn,$update_sp))
    {
        unset($_SESSION["idupdate"] );    
        echo "<script language='javascript'>alert('Cập nhật thành công!');";
        echo "location.href='editsanpham.php?id=$id';</script>"; 
    }
    else
    {
        echo "<script language='javascript'>alert('Cập nhật thất bại!');";
        echo "location.href='editsanpham.php?id=$id';</script>"; 
    }
      
      
}
     $select_id = "select * from product where IdProduct = $id";
        $q_select_id = mysqli_query($conn,$select_id);
        if(mysqli_num_rows($q_select_id)>0)
        while($row_select_id =mysqli_fetch_array($q_select_id))
        { 
            $_SESSION["idcon_product"] = $row_select_id['IdMenuCon'];
            
?>
<div class="group-box">
	<div align="center">
	<div class="title">Cập nhật thông tin sản phẩm</div>
      <br>    
	      <form class="form-horizontal" enctype="multipart/form-data"  action="editsanpham.php" method="post">
	<div class="form-group">
		<label for="tensanpham" class="col-sm-3 control-label">Tên sản phẩm:</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" value="<?php echo $row_select_id["NameProduct"]; ?>" id="tensanpham" name="tensanpham" >
		</div>
	</div>        
      <div class="form-group">
		<label for="image" class="col-sm-3 control-label">Ảnh:</label>
		<div class="col-sm-2">
	        <input type="file" name="image">
	        <img src="<?php echo "../images/Product/".$row_select_id["ImageProduct"]; ?>" alt="" height="100px">
	        <input type="hidden" name="anhht" value="<?php echo $row_select_id["ImageProduct"]; ?>">
		</div>
	</div>   
   <div class="form-group">
		<label for="sphot" class="col-sm-3 control-label">SP hot:</label>
	<div class="col-sm-3">
   <label class="radio-inline" >
     <input type="radio" name="sphot"  <?php if($row_select_id['SPHot'] == 'True') echo 'checked'; ?> value="True">True
    </label>
    <label class="radio-inline">
      <input type="radio" name="sphot" <?php if($row_select_id['SPHot'] == 'False') echo 'checked'; ?> value="False">False
    </label>
		</div>
	</div>   
     <div class="form-group">
		<label for="spkm" class="col-sm-3 control-label">SP khuyến mãi:</label>
		<div class="col-sm-3">
   <label class="radio-inline" >
     <input type="radio" name="spkm" <?php if($row_select_id['SPKM'] == 'True') echo 'checked'; ?> value="True">True
    </label>
    <label class="radio-inline">
      <input type="radio" name="spkm" <?php if($row_select_id['SPKM'] == 'False') echo 'checked'; ?> value="False">False
    </label>
		</div>
	</div>  
  <div class="form-group">
		<label for="baohanh" class="col-sm-3 control-label">Bảo hành:</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" value="<?php echo $row_select_id["baohanh"]; ?>" id="baohanh" name="baohanh" >
		</div>
	</div>
  <div class="form-group">
		<label for="khuyenmai" class="col-sm-3 control-label">Khuyến mãi:</label>
		<div class="col-sm-5">
			<textarea d="khuyenmai" class="form-control" name="khuyenmai"  rows="4"><?php echo $row_select_id["khuyenmai"]; ?></textarea>
		</div>
	</div>  
  <div class="form-group">
		<label for="baohanh" class="col-sm-3 control-label">Số lượng:</label>
		<div class="col-sm-2">
			<input type="number" class="form-control" value="<?php echo $row_select_id["soluong"]; ?>" id="soluong" name="soluong" >
		</div>
	</div>     
   <div class="form-group">
		<label for="thongso" class="col-sm-3 control-label">Thông số:</label>
		<div class="col-sm-2">
	    <textarea name="thongso" id="thongso" rows="100"><?php echo $row_select_id['thongso'];  ?></textarea>
	    <script type="text/javascript">
            CKEDITOR.replace('thongso');
            CKEDITOR.config.entities = false;
            CKEDITOR.config.width = '630px';
            CKEDITOR.config.height = '300px';
            </script>
		</div>
	</div>   
   <div class="form-group">
		<label for="thongtinsp" class="col-sm-3 control-label">Thông tin sản phẩm:</label>
		<div class="col-sm-2">
	    <textarea name="thongtinsp" id="thongtinsp" rows="100"   ><?php echo $row_select_id['InfoProduct'];  ?></textarea>
	    <script type="text/javascript">
            CKEDITOR.replace('thongtinsp');
            CKEDITOR.config.entities = false;
            CKEDITOR.config.width = '630px';
            CKEDITOR.config.height = '350px';
            </script>
		</div>
	</div>   
   
    <div class="form-group">
		<label for="price" class="col-sm-3 control-label">Giá tiền:</label>
		<div class="col-sm-3">
	    <input type="text" class="form-control" id="price" value="<?php echo $row_select_id['Price'];  ?>" name="price" >
		</div>
	</div>  
    <div class="form-group">
		<label for="baohanh" class="col-sm-3 control-label">Giá thị trường:</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" value="<?php echo $row_select_id["pricethitruong"]; ?>" id="pricethitruong" name="pricethitruong" >
		</div>
	</div>      
    <div class="form-group">
		<label for="visible" class="col-sm-3 control-label">Visible:</label>
		<div class="col-sm-3">
   <label class="radio-inline" >
     <input type="radio" name="visible" <?php if($row_select_id['Visible'] == 'True') echo 'checked'; ?> value="True">True
    </label>
    <label class="radio-inline">
      <input type="radio" name="visible" <?php if($row_select_id['Visible'] == 'False') echo 'checked'; ?> value="False">False
    </label>
		</div>
	</div>   
    <div class="form-group">
		<label for="menucha" class="col-sm-3 control-label">Menu cha:</label>
		<div class="col-sm-3">
	<select   class="form-control menucha">
          <option selected value="">Chọn menu cha</option>
           <?php
         
             $idcon = $row_select_id['IdMenuCon'];
         $meucon_idcon = mysqli_query($conn,"select * from menucon where id=$idcon");
         if(mysqli_num_rows($meucon_idcon)>0)
         while($rows_menucon_idcon= mysqli_fetch_array($meucon_idcon))
         {
             $tbl_menucha=  mysqli_query($conn,"select * from menucha");
            if(mysqli_num_rows($tbl_menucha)>0)
            {
                while($rows_menucha = mysqli_fetch_array($tbl_menucha))
                {
                     
                    if($rows_menucon_idcon['idcha']  == $rows_menucha['id'] )
                   $selected = 'selected';
              else
                    $selected = '';
                      
                      
                echo '<option '.$selected.' value="'.$rows_menucha['id'].'">'.$rows_menucha['tenmenucha'].'</option>';
                           
                } 
            } 
         }  
        ?>
        
    </select>
		</div>
		
	</div>  
     <div class="form-group">
		<label for="menucha" class="col-sm-3 control-label">Menu con:</label>
		<div class="col-sm-3">
	<select  class="form-control menucon" name="idmenucon">
     <option selected value="">Chọn menu con</option>
    </select>
    
		</div>
	</div>
    <script>
        jQuery(document).ready(function(){
    $(".menucha").ready(function(){
        var idmenucha = $(".menucha").val();
        $.post("district.php",{idmenucha:idmenucha},function(data){
               $(".menucon").html(data);
               })
    })
    $(".menucha").change(function(){
        var idmenucha = $(".menucha").val();
        $.post("district.php",{idmenucha:idmenucha},function(data){
               $(".menucon").html(data);
               })
    })
})    
    </script>
    
	<div class="form-group">
		<div class="col-sm-6 ">
			<input id="submit" name="submit" type="submit" value="Lưu" class="btn btn-primary">
			
		</div>
	</div>
     </form>
    <br>
	 </div>
</div>    
<?php   }  require "includes/footer.php";