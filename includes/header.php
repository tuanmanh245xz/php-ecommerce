<!DOCTYPE html>
<html>
<head>
<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="js/tooltip.js" type="text/javascript"></script>
<script src="js/popup.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="js/magiczoom.js " type="text/javascript"></script>
<script src="js/tabs.js" type="text/javascript"></script>
<script src="js/jqueryEasing.js" type="text/javascript"></script>
<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap-theme.min.css" />
<link rel="stylesheet" href="bootstrap-3.3.6-dist/js/bootstrap.js" />
<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.css" />
<link rel="stylesheet" href="css/styleSite.css"/>
<link rel="stylesheet" href="css/magiczoom.css"/>
<script type="text/javascript">
    $(function() {

    $('.neoslideshow img:gt(0)').hide();

    setInterval(function(){

      $('.neoslideshow :first-child').fadeOut()

         .next('img').fadeIn()

         .end().appendTo('.neoslideshow');},

      4000);

})
   $(window).scroll(function(){
		t = parseInt($(window).scrollTop());
		var hbody  = $('body').css('height');
		if(t >270 )
        {
         $('#banner_right_scroll').css("position","fixed");
         $('#banner_right_scroll').css("width","15%");    
        }
        else
        {
            $('#banner_right_scroll').css("position","inherit");
            $('#banner_right_scroll').css("width","100%");    
        }
        if(t >542)
        {
         $('#banner_left_scroll').css("position","fixed");
         $('#banner_left_scroll').css("width","205px");    
        }
        else
        {
            $('#banner_left_scroll').css("position","inherit");
            $('#banner_left_scroll').css("width","100%");    
        }   
	})



</script>
</head>
<body>
   <?php
        session_start();
        require_once("config.php");
        $q_tenmenu = mysqli_query($conn,"select * from menucha where Visible='True'");
        ?>
    <!-- TOP -->
    <div class="container">
    <div class="row">
	<div class="col-xs-12">
	<div class="top">
        <div style="float:right;margin-top:8px;margin-left:400px;margin-right:100px">
            <a href="giohang.php"><img src="images/Layout/GioHang.png" alt=""></a>
        </div>
         <div class="search">
         	<div class="search_text"><a href="#"></a></div>
           <form action="timkiem.php" id="frm_search" method="get">
                 <input type="text" id="search" class="search_input" placeholder="Bạn muốn tìm gì?" name="search" />
            <button type="submit"  class="search_btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
           </form>
      	</div>
      	<script type="text/javascript">
               $(document).ready(function() {
$("#frm_search").submit(function (e) {
if ($("#search").val() == "" ) {
alert('Vui lòng nhập từ khóa để tìm kiếm');
e.preventDefault(); 
} 
});
});
             </script>
     </div> 
        </div>
        </div>
    <!--TOP--> 
    <div class="row">        
	<div class="col-xs-12">    
    <div class="header">	
    	<div id="logo"><a href="default.php"><img src="images/Layout/logo.jpg"  width="370px" height="190" alt="Logo"/></a></div>  
        <div class="accordian">
            <ul>
                <li>
                    <div class="image_title">
                        <a href="#">Hàng Online</a>
                    </div>
                     <a href="#"><img src="images/Layout/1.jpg" alt="" width="600" height="190"></a>
                </li>
                <li>
                    <div class="image_title">
                        <a href="#">Dell Vostro 2420</a>
                    </div>
                    <a href="#"><img src="images/Layout/2.jpg" alt="" width="600" height="190"></a>
                </li>
                <li>
                    <div class="image_title">
                        <a href="#">Canvas HD</a>
                    </div>
                    <a href="#"><img src="images/Layout/3.jpg" alt="" width="600" height="190"></a>
                </li>
                <li>
                    <div class="image_title">
                        <a href="#">Iphone 6</a>
                    </div>
                    <a href="#"><img src="images/Layout/4.jpg" alt="" width="620" height="173">"></a>
                </li>
            </ul>
        </div>
            
    </div>
    </div>
        </div>
    <!-- Menutab-->
    	<div id="menu_tab">	
 			<ul class="menu">
            	<li><a href="default.php" id="trangchu">Trang Chủ</a></li>
               	<li  class="divider"></li>
                <li><a href="gioithieu.php" id="gioithieu">Giới Thiệu</a></li>
                <li  class="divider"></li>
                <li><a href="baohanh.php" id="baohanh">Bảo Hành</a></li>
                <li  class="divider"></li>
                <li><a href="khuyenmai.php" id="khuyenmai">Khuyến Mãi</a></li>
                <li  class="divider"></li>
                <li><a href="lienhe.php" id="lienhe">Liên Hệ</a></li> 
            </ul>   
		</div>
    <!--Menutab-->
        <!-- Content-->
    
        <!-- Left Content -->
        <div class="row">
        <div class="col-xs-2" style="width:20%" >
        	<!-- DanhMuc -->
            <div class="tittle_box">Danh Mục Sản Phẩm</div>
            <ul class="content_box">
            
            <?php 
                   while($row=mysqli_fetch_array($q_tenmenu))
                   {
             ?>

            	<li  class="menu"><a href="nhomsanpham.php?id=<?php echo $row["id"]; ?>"><?php  echo $row["tenmenucha"]; ?></a></li>        
             <?php
                   }
             ?></ul>  
            <!-- DanhMuc -->
            <!-- Banner2 -->
            <div class="tittle_box">Đặc Biệt</div>  
            <?php
    $q_spdb = "select * from product where SPKM='True' and SPHot='False' and Visible='True' order by IdProduct desc limit 0,1   " ;
    $res_spdb = mysqli_query($conn,$q_spdb);
    if(mysqli_num_rows($res_spdb)>0)
    while($row_spdb = mysqli_fetch_array($res_spdb))
    {
                ?>  
            
                <div class="border_box">
                    <div class="product_tittle">
                        <a href="chitietsanpham.php?id=<?php echo $row_spdb['IdProduct']; ?>"><?php echo $row_spdb['NameProduct']; ?></a>
                    </div>
                    <div class="product_image">
                        <a href="chitietsanpham.php?id=<?php echo $row_spdb['IdProduct']; ?>">
                            <img  src="<?php echo 'images/Product/'.$row_spdb['ImageProduct']; ?>" alt="" >
                        </a>
                    </div>
                    <div class="product_price">
                        <span class="giamoi"><?php echo number_format($row_spdb['Price'],0,'','.') ?>đ</span>
                    </div>
                </div>
    <?php } ?>
           <div class="tittle_box">Quảng Cáo</div>  
        	<div class="banner3">
               <div id="banner_left_scroll">
                   <a href="#"><img  src="images/Layout/Cocacola_dong.gif" alt="banner3" height="161" width="100%" border=2px/></a>
                   <a href="#"><img  src="images/Layout/clear_men.jpg" alt="banner3" style="padding-top:2px" height="520px" width="100%" border=2px   /></a>
               </div>
            </div>
            <div class="banner3">
            	
            </div>
            <!-- Banner2 -->    
        </div>        
        
        <!--Left Content --> 
        <div class="col-xs-6" style="width:60.9%;margin-top:6px;margin-left:-22px" >