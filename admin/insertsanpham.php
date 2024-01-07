<?php require "includes/header.php";
if(isset($_POST['submit']))
{
       if(!empty($_FILES["image"]["name"]))
        {
              
              if($_FILES["image"]["type"] == "image/jpeg"|| $_FILES["image"]["type"] == "image/png"|| $_FILES["image"]["type"] == "image/jpg" || $_FILES["image"]["type"] == "image/gif")
              {
                  $tenanh = $_FILES["image"]["name"];
                  $path = '../images/Product/'.$_FILES["image"]["name"];
                  move_uploaded_file($_FILES["image"]["tmp_name"],$path);
              }
                else
                {
                     echo "<script language='javascript'>alert('Vui lòng chọn file ảnh có đuôi là jpeg,jpg,png,gif!');";
		             echo "location.href='insertsanpham.php';</script>";    
                }
        }
        else
        {
            echo "<script language='javascript'>alert('Vui lòng chọn ảnh!');";
		             echo "location.href='insertsanpham.php';</script>";    
        }
        $price = $_POST["price"];
        $soluong = $_POST["soluong"];
        $pricethitruong = $_POST['pricethitruong'];
        $qinsert_sp = "insert into product(NameProduct,ImageProduct,IdMenuCon,Price,Visible,SPHot,SPKM,InfoProduct,baohanh,khuyenmai,soluong_pro,pricethitruong,thongso) value('".$_POST["tensanpham"]."','".$tenanh."','".$_POST["idmenucon"]."',$price,'".$_POST["visible"]."','".$_POST["sphot"]."','".$_POST["spkm"]."',
        '".$_POST["thongtinsp"]."','".$_POST["baohanh"]."','".$_POST["khuyenmai"]."',$soluong,$pricethitruong,'".$_POST["thongso"]."')";
      if(mysqli_query($conn,$qinsert_sp))
        {
            
            echo "<script language='javascript'>alert('Thêm mới thành công!');";
		    echo "location.href='insertsanpham.php';</script>";    
        }
        else
        {
            echo "<script language='javascript'>alert('Thêm mới thất bại!');";
		    echo "location.href='insertsanpham.php';</script>";    
        }
      
}
?>
<div class="group-box">
	<div align="center">
	<div class="title">Thêm mới sản phẩm</div>
      <br>    
	      <form class="form-horizontal" enctype="multipart/form-data"  action="insertsanpham.php" method="post">
	<div class="form-group">
		<label for="tensanpham" class="col-sm-3 control-label">Tên sản phẩm:</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="tensanpham" name="tensanpham" >
		</div>
	</div>        
      <div class="form-group">
		<label for="image" class="col-sm-3 control-label">Ảnh:</label>
		<div class="col-sm-2">
	        <input type="file" name="image">
		</div>
	</div>   
   <div class="form-group">
		<label for="sphot" class="col-sm-3 control-label">Sản phẩm hot:</label>
	<div class="col-sm-3">
   <label class="radio-inline" >
     <input type="radio" name="sphot" checked value="True">True
    </label>
    <label class="radio-inline">
      <input type="radio" name="sphot" value="False">False
    </label>
		</div>
	</div>   
     <div class="form-group">
		<label for="spkm" class="col-sm-3 control-label">Sản phẩm khuyến mãi:</label>
		<div class="col-sm-3">
   <label class="radio-inline" >
     <input type="radio" name="spkm" checked value="True">True
    </label>
    <label class="radio-inline">
      <input type="radio" name="spkm" value="False">False
    </label>
		</div>
	</div> 
   <div class="form-group">
		<label for="baohanh" class="col-sm-3 control-label">Bảo hành:</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" value="" id="baohanh" name="baohanh" >
		</div>
	</div>
  <div class="form-group">
		<label for="khuyenmai" class="col-sm-3 control-label">Khuyến mãi:</label>
		<div class="col-sm-5">
			<textarea d="khuyenmai" class="form-control" name="khuyenmai"  rows="4"></textarea>
		</div>
	</div>  
  <div class="form-group">
		<label for="baohanh" class="col-sm-3 control-label">Số lượng:</label>
		<div class="col-sm-2">
			<input type="number" class="form-control" value="" id="soluong" name="soluong" >
		</div>
	</div>       
   <div class="form-group">
		<label for="thongso" class="col-sm-3 control-label">Thông số:</label>
		<div class="col-sm-2">
	    <textarea name="thongso" id="thongso" rows="100"></textarea>
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
	    <textarea name="thongtinsp" id="thongtinsp" rows="100"   ></textarea>
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
	    <input type="text" class="form-control" id="price" value="" name="price" >
		</div>
	</div>  
    <div class="form-group">
		<label for="baohanh" class="col-sm-3 control-label">Giá thị trường:</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" value="" id="pricethitruong" name="pricethitruong" >
		</div>
	</div>   
    <div class="form-group">
		<label for="visible" class="col-sm-3 control-label">Visible:</label>
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
		<label for="menucha" class="col-sm-3 control-label">Menu cha:</label>
		<div class="col-sm-3">
	<select   class="form-control menucha">
          <option selected value="">Chọn menu cha</option>
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
		<label for="menucha" class="col-sm-3 control-label">Menu con:</label>
		<div class="col-sm-3">
	<select  class="form-control menucon" name="idmenucon">
     <option selected value="">Chọn menu con</option>
    </select>
    
		</div>
	</div>
    <script>
        jQuery(document).ready(function(){
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
<?php  require "includes/footer.php";