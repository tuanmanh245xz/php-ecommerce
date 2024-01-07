<?php require "includes\header.php";
$id = $_GET['id'];
?>

        <!-- Center Content-->
          <div class="center_tittle_bar" >
        <strong>Thông Tin Chi Tiết</strong>
        </div>
         
                <div id="detail_product" style="margin-top:15px">
               <?php 
                    $sql_pro = "select * from product where IdProduct = $id";
                    $res_pro = mysqli_query($conn,$sql_pro);
                    if(mysqli_num_rows($res_pro)>0)
                    $row_pro = mysqli_fetch_array($res_pro);
                    ?>
               <div id="pro_images">
        <div id="pro_images_image"> 
        <img height="120px" src="images/Product/<?php echo $row_pro['ImageProduct']; ?>" alt="<?php echo $row_pro['NameProduct']; ?>">
        </div>
        <div id="pro_images_info">
          <ul class="pro_thumb_list">
          </ul>
        </div>
      </div>
          </div>
          <div id="pro_info">
        <h2 class="detail_title"><?php echo $row_pro['NameProduct']; ?></h2>
        <p class="detail_des"></p>
        <p class="warranty"><span style="font-weight:bold;">Bảo hành:</span> 
			<?php if($row_pro['baohanh'] == '') echo 'Chưa cập nhật'; else  echo $row_pro['baohanh']; ?>
        </p>
        <p class="promotions"><span style="font-weight:bold;">Khuyến mãi: </span><?php if($row_pro['khuyenmai'] == '') echo 'Chưa cập nhật'; else  echo $row_pro['khuyenmai']; ?> </p>
        <p class="status">Trạng thái: <span style="color:red;"><?php if($row_pro['soluong_pro'] == '' || $row_pro['soluong_pro']<=0) echo 'Hết hàng'; else  echo 'Còn '.$row_pro['soluong_pro'].' sản phẩm'; ?> </span> </p>
        <p class="price">Giá: <span style="color:#f00;font-size:16px;"><?php echo number_format($row_pro['Price'],"0","","."); ?><span style="text-decoration:underline">đ</span></span></p>
        
        <p class="market_price">Giá thị trường: <span style="text-decoration:line-through;color:#666;"> 
		<?php if($row_pro['pricethitruong'] == ''|| $row_pro['pricethitruong']<=0) echo 'Chưa cập nhật'; else  echo number_format($row_pro['pricethitruong'],"0","",".").'đ' ; ?>
        </span></p>
        <div class="synthesis">
          <div class="cssOrder" style="margin-top:2px"> <a  href="addgiohang.php?act=add&id=<?php echo $id;?>" title="Đặt hàng"><img src="images/Layout/dhn.png" height="30px" alt=""></a> </div>
        </div>
        <div class="share_this" > 
         <span class='st_sharethis_large' displayText='ShareThis'></span>
<span class='st_facebook_large' displayText='Facebook'></span>
<span class='st_twitter_large' displayText='Tweet'></span>
<span class='st_linkedin_large' displayText='LinkedIn'></span>
<span class='st_pinterest_large' displayText='Pinterest'></span>
<span class='st_email_large' displayText='Email'></span>
          <script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" id="st_insights_js" src="http://w.sharethis.com/button/buttons.js?publisher=62adef91-73fc-4833-bde3-9d954fcf95a2"></script>
<script type="text/javascript">stLight.options({publisher: "62adef91-73fc-4833-bde3-9d954fcf95a2", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
        </div>
      </div> 
       <div id="info_product">
      <div class="tabs_list">
        <ul class="product_tabs">
          <li><a href="" class="active" name="0">Đặc điểm</a></li>
          <li><a href="" name="1">Thông số kỹ thuật</a></li>
          <li><a href="" name="2">Phụ kiện</a></li>
          <li><a href="" name="3">Bình luận</a></li>
        </ul>
      </div>
      <div class="des_detail_pro" style="display: block;">
        <?php if($row_pro['InfoProduct'] == '') echo 'Đang cập nhật'; else  echo $row_pro['InfoProduct']; ?>
      </div>
      <div class="des_detail_pro" style="display: none;">
        <?php if($row_pro['thongso'] == '') echo 'Đang cập nhật'; else  echo $row_pro['thongso']; ?>
      </div>
      <div class="des_detail_pro" style="display: none;">
       <ul class="list_product list_product_3n">
          <p style="margin:10px;">Đang cập nhật !</p>
        </ul>
      </div>
      <div class="des_detail_pro" style="display: none;">
        <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=126308607862589";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
     <div class="fb-comments" data-href="http://localhost:9090/cong_ty_lap/chitietsanpham.php?<?php echo $id; ?>" data-width="682" data-numposts="10"></div>
      </div>
    </div>                      
<?php require "includes\\footer.php";?>