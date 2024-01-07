<?php require "includes/header.php";
if(isset($_POST['hoten']))
{
     $hoten= $_POST['hoten'];
    $phone= $_POST['phone'];
    $email= $_POST['email'];
    $noidung= $_POST['noidung'];
    $ngaygui = date('Y/m/d');
    echo $hoten;
        $insert_lh= "insert into lienhe(hoten,phone,email,noidung,ngaygui) value('$hoten','$phone','$email','$noidung','$ngaygui')";
        if(mysqli_query($conn,$insert_lh))
        {
         echo "<script language='javascript'>alert('Gửi thành công!');";
		echo "location.href='lienhe.php';</script>";    
        }
        else
        {
            echo "<script language='javascript'>alert('Gửi thất bại!');";
		      echo "location.href='lienhe.php';</script>";
        }
}
?> <div  class="row" style="width:580px;margin:0px auto;margin-right:36px"  >        
           <form action="lienhe.php" method="post">
        <div class="panel panel-default" style="padding-left:0px" >
                <div class="panel-heading" style="text-align:center;font-size:x-large"><strong>Liên Hệ</strong> 
                </div>
                <div class="panel-body" >
                    
                        <div class="form-group">
                            
                            <div class="col-sm-12">
                                <label for="">Họ Tên:</label>
                                <input id="hoten" name="hoten" class="form-control"  type="text">
                            </div>
                        </div>
                        <div class="form-group">   
                            <div class="col-sm-12">
                                <label for="">Phone:</label>
                                <input id="phone" name="phone" class="form-control"   type="text">
                            </div>
                        </div>
                        <div class="form-group">   
                            <div class="col-sm-12">
                                <label for="">Email:</label>
                                <input id="email" name="email" class="form-control"  type="email">
                            </div>
                        </div>  
                        <div class="form-group">   
                            <div class="col-sm-12">
                                <label for="">Nội Dung:</label>
                                <textarea id="noidung" name="noidung" class="form-control" rows="4" cols="50">
                                </textarea>
                            </div>
                        </div>  
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-8" style="font-size:14px;margin-top:20px;text-align:center;font-weight:bold">
                               <input type="submit" Class="btn-primary" value="Gửi" id="btnGui" id="submit" name="submit">
                               <input type="reset" Class="btn-default" value="Nhập Lại">
                            </div>
                        </div>
                    
                </div>
                
                <div class="panel-footer">
                </div>
            </div>
   </form>
</div>

    <?php require "includes//footer.php"; ?>