<?php session_start();?>
<!doctype html>
<html>
<head>
	<title>Hệ thống quản lý công ty Lap</title>
	<meta charset="utf-8"> 
	<link rel="stylesheet" href="../bootstrap-3.3.6-dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="../bootstrap-3.3.6-dist/css/bootstrap-theme.min.css" />
<link rel="stylesheet" href="../bootstrap-3.3.6-dist/js/bootstrap.js" />
<link rel="stylesheet" href="../bootstrap-3.3.6-dist/css/bootstrap.css" />
	<link rel="stylesheet" 	href="../css/ui-lightness/jquery-ui-1.10.2.custom.css" />
	<link rel="stylesheet" type="text/css" href="../css/styleadmin.css" />
	<script src="../js/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="../js/jquery.js" type="text/javascript"></script>
	<script src="editor/asset/ckeditor/ckeditor.js" type="text/javascript"></script>
	
<!-- 	<link rel="stylesheet" 	href="css/jmetro/jquery-ui-1.10.2.custom.css" /> -->
</head>
<body>
	<div id="pageWrapper">
		<div id="header">
			<h1 id="pqd">Khu Vực Quản Trị</h1>
			<h1 id="siteTitle"> Hệ Thống Quản Lý Website LapShop </h1>
			<img id="logo2" src="../images/Layout/logo2.png" />		
		</div> <!-- End of header -->
		
		<div id="nav"> 
		<div  id="menu" > 
			<a href="default.php">Trang chủ</a> |  
			<a href="../default.php" target="_blank">Xem trang site</a>		 
		</div>		 
		<div  id="login" > 
			<?php 
				// lấy cookie đăng nhập tự động
                
				 include("../config.php"); 
                 
				if (isset($_SESSION["Account"])){
					echo "Xin chào ". $_SESSION["Account"];
					echo " | <a href='logout.php' >Thoát</a>";	
				}else {
					
					header("location:loginadmin.php");
				}
			?>
		</div>
		</div> <!-- End of Navigation menu --> 
		
		<div id="contentWrapper" > 
			<div id="leftSide" > 
				<div class="group-box" id="danhmuc"> 
						<div class="title">Quản lý</div>  
						<div class="group-box-content">
							<ul>
							    <li> <a href="menucha.php">Menu Cha</a> </li>								
								<li> <a href="menucon.php">Menu Con</a> </li>
								<li> <a href="sanpham.php">Sản Phẩm</a> </li>
								<li> <a href="donhang.php">Đơn Hàng</a> </li>
								<li> <a href="lienhe.php">Liên Hệ</a> </li>
							</ul>						
						</div>						
				</div>			 
			</div> <!-- End of Left Side -->
		<div id="mainContent">
				
