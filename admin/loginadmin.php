<!DOCTYPE html>
<html>
    <head>
        <title>Đăng Nhập Hệ Thống Quản Lý</title>
        <link rel="stylesheet" href="../bootstrap-3.3.6-dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../bootstrap-3.3.6-dist/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="../bootstrap-3.3.6-dist/js/bootstrap.js" />
        <link rel="stylesheet" href="../bootstrap-3.3.6-dist/css/bootstrap.css" />
<script type="text/javascript" src="../jquery/jquery.js"></script>
    </head> 
       
        <body style="background-color:#333" >
         <form style="margin: 30px auto;" action="checklogin.php" method="post">
          <div class="panel panel-primary" style="width:30%; margin:0px auto;" >
                <div class="panel-heading" style="text-align:center;font-size:x-large"><strong>Login</strong> 
                </div>
                <div class="panel-body">
                        <div class="form-group">
                            <div class="col-sm-12">
                                 <label for="">Tên đăng nhập:</label>
                                 <input  Class="form-control" type="text" name="acc" id="acc" >
                            </div>
                        </div>
                        <div class="form-group">   
                            <div class="col-sm-12">
                                 <label for="">Mật khẩu:</label>
                                <input     Class="form-control" type="password" name="pass" id="pass" ><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-8" style="font-size:14px;text-align:center;font-weight:bold">
                                <input type="submit" class="btn-primary"  value="Đăng Nhập" id="submit">
                                <input type="reset" class="btn-default" value="Nhập Lại">
                            </div>
                        </div>
                </div>
                <div class="panel-footer">
                </div>
             </div>
                </form>    
        </body>
       
</html>