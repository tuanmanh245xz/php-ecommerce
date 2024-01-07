<?php
 
require_once("../config.php");
$tbl_name="account"; // tên table
 
// kết nối cơ sở dữ liệu
//mysqli_connect("$host", "$username", "$password")or die("Không thể kết nối");
// username và password được gửi từ form đăng nhập
if(empty($_POST['acc']) || empty($_POST['acc'])  )
{
    echo "<script language='javascript'>alert('Vui lòng nhập đầy đủ thông tin!');";
		echo "location.href='loginadmin.php';</script>";
}
$myusername=$_POST['acc'];
$mypassword=$_POST['pass']; 
 
// Xử lý để tránh MySQL injection
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($conn,$myusername);
$mypassword = mysqli_real_escape_string($conn,$mypassword);
 
$sql="SELECT * FROM ".$tbl_name . " WHERE Account='".$myusername."' and Password='$mypassword'";
//$result=mysqli_query($conn,$sql);
//$count=mysqli_num_rows($result);
$rowcount = 0 ;
if ($result=mysqli_query($conn,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  //printf("Result set has %d rows.\n",$rowcount);
  // Free result set
  mysqli_free_result($result);
  }

// nếu tài khoản trùng khớp thì sẽ trả về giá trị 1 cho biến $count
if($rowcount==1){
 
// Lúc này nó sẽ tự động gửi đến trang thông báo đăng nhập thành công
session_start();
$_SESSION["Account"] = $myusername;
header("location:default.php");
    
}
else {
 echo "<script language='javascript'>alert('Đăng nhập thất bại!');";
		echo "location.href='loginadmin.php';</script>";
}
?>