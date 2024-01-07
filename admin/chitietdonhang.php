<?php require "includes/header.php";
if(isset($_REQUEST['id']))
{
    $id = $_REQUEST['id'];
    $tbl_dh = mysqli_query($conn,"select * from donhang where id=$id");
$tbl_ctdh = mysqli_query($conn,"select * from donhang,chitietdonhang,product where donhang.id = chitietdonhang.iddonhang and chitietdonhang.idpro = product.IdProduct and donhang.id=$id");    
    if(mysqli_num_rows($tbl_dh)>0)
        $row_dh = mysqli_fetch_array($tbl_dh);
    $ttthanhtoan = $row_dh['thanhtoan'];
}

?>
<SCRIPT LANGUAGE="JavaScript">
    function confirmActionTT() {
      return confirm("Xác nhận?")
    }
</SCRIPT>
<div class="group-box">
	<div align="center">
	<div class="title">Chi Tiết Đơn Hàng: #<?php echo $id; ?> <?php echo $row_dh['ngaylap']; ?>  
              </div>
	<div align="center">
      <br>    
      <div class="group-box">
          <form  class="form-horizontal" action="insertmenucha.php" method="post">
	<div class="form-group" >
		<label  for="" class="col-sm-4 control-label">Họ tên:</label>
		<div class="col-sm-3" >
			<label style="color:#06C;border:none;" for="" class="form-control"><?php echo $row_dh['hoten']; ?>  </label>
		</div>
	</div>        
    <div class="form-group">
		<label for="" class="col-sm-4 control-label">Địa chỉ:</label>
		<div class="col-sm-3">
			<label style="border:none;"  for="" class="form-control"><?php echo $row_dh['diachi']; ?>  </label>
		</div>
	</div>  
    <div class="form-group">
		<label for="" class="col-sm-4 control-label">Emai:</label>
		<div class="col-sm-3">
			<label style="border:none;"  for="" class="form-control"><?php echo $row_dh['email']; ?>  </label>
		</div>
	</div>  
    <div class="form-group">
		<label for="" class="col-sm-4 control-label">Phone:</label>
		<div class="col-sm-3">
			<label style="border:none;"  for="" class="form-control"><?php echo $row_dh['phone']; ?>  </label>
		</div>
	</div>  
     </form>
      </div>
	      
    <br>
</div>  
              <div style="font-size:16px;color:#06C;">
                  <b><p>Danh sách sản phẩm đặt hàng</p></b>
              </div>
               <table border="1px" style="font-size:15px"> 
        <tr>
            <th>Sản Phẩm</th>
            <th>Giá</th>
            <th>Số Lượng</th>
            <th>Thành Tiền</th>
            <?php if($ttthanhtoan==0) echo '<th>Xóa</th>';
            
            ?>
            
        </tr>
        <?php if(mysqli_num_rows($tbl_ctdh)>0) while($row_ctdh=mysqli_fetch_array($tbl_ctdh)) { ?>
        <tr>
            <td style="text-align:left;"><img height="40px" src="../images/Product/<?php echo $row_ctdh['ImageProduct']; ?>" alt=""><?php echo $row_ctdh['NameProduct']; ?></td>
            <td><?php echo number_format($row_ctdh['gia'],"0","","."); ?>đ</td>
            <td><?php echo $row_ctdh['soluong']; ?></td>
            <td><?php echo number_format($row_ctdh['thanhtien'],"0","","."); ?>đ</td>
            <?php if($ttthanhtoan==0) 
              echo "<td><a title='Xóa' onclick='return confirmAction()' href='deletectdh.php?id=".$row_ctdh['id']."&iddh=".$row_ctdh['iddonhang']."'>
                <center><img src='../images/Layout/delete.png' alt='Xóa'></center></a></td>           
        </tr>    ";
            ?>
        </tr>    
        <?php } ?>
        <tr>
        <td colspan="3">
            <b>Tổng tiền:</b>
        </td>
        <td colspan="2"><?php echo number_format($row_dh['tongtien'],"0","",".") ; ?>đ</td>
        </tr>
    </table>
    <?php
        
        ?>
    <div style="margin-top:20px;">
        <a href="thanhtoandh.php?id=<?php echo $id;?>" onclick="return confirmActionTT()"><input type="button" class="btn-primary" value="<?php
        if($ttthanhtoan==0) echo 'Thanh toán'; else echo 'Hoàn Tiền';    ?>"></a>           
    </div>
    
        <br>  
	 </div>
	 
</div>    

<?php require "includes/footer.php";