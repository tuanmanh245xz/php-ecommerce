<?php require "includes\header.php";

?>
        <!-- Center Content-->
             <div  style="box-shadow: 1px 1px 10px 1px #ccc;height:auto;width:714px;padding:10px;">
                 <div style="font-weight:bold;font-family:Tahoma; font-size:12px;margin:10px;">Hướng dẫn:</div>
                  <ul style="font-family:Tahoma; font-size:12px; line-height:18px;padding-left: 15px;margin: 10px 0;list-style: none;    ">
        <li >Để cập nhật số lượng sản phẩm cần mua, vui lòng điền số lượng vào ô tương ứng, rồi click vào "Cập nhật giỏ hàng" trang web sẽ tự động cập nhật lại tổng giá trị mới nhất cho quý khách.</li>
        <li >Nếu quý khách không muốn đặt mua sản phẩm nữa, click Xóa để loại bỏ sản phẩm</li>
        <li >Khi quý khách thỏa mãn với đơn hàng của mình, vui lòng click nút <b class="send_info" style="color:#1daae6;cursor:pointer;">Gửi đơn hàng</b>.</li>
                </ul>
                <div >
                     <form action="updategiohang.php" method="post">
            <table >
                <tr>
            <th>STT</th>
            <th>Sản Phẩm</th>
            <th>Giá Bán</th>
            <th>Số Lượng</th>
            <th>Thành Tiền</th>
            <th>Xóa</th>
            </tr>
            <?php
                $total = 0;
                if(isset($_SESSION['cart'])&& $_SESSION['cart']!=null)
                    {
                       $stt = 0;
                    foreach($_SESSION['cart'] as $sp)
                    {
                        $stt++;
                ?> 
             <tr>
            <td><?php echo $stt; ?></td>
            <td style="text-align:left;padding-left:20px;"><img height="50px" src="images/Product/<?php echo $sp['image']; ?>" alt=""><?php echo  $sp['name']?></td>
            <td><?php echo number_format($sp['price'],"0","",".")?> đ</td>
            <td>
            <input type="number" name="cart_qty[]" id="soluong" style="width:40px" value="<?php echo  $sp['soluong']?>">
            <input type="hidden" name="cart_num[]" id="" value="<?php echo $sp['id'] ;?>" onchange="" size="10" />
            </td>
            <td><?php $thanhtien = $sp['soluong'] * $sp['price'];  echo  number_format($thanhtien,"0","",".");?> đ</td>
            <td><a  href="deletegiohang.php?id=<?php echo $sp['id'] ?>&&type=one"><img src="images/Layout/delete.png" alt="Xóa" title="Xóa"></a></td>
        </tr>  
           <?php 
            $total += $thanhtien;     } } else echo '<tr><td colspan="6">Không có sản phẩm nào trong giỏ hàng</td></tr>';
               ?>
           <tr>
               <td style="text-align:center" colspan="2" align="center">
                   <div class="margin_auto" style="margin-top:6px;">
                           <div class='buy'><input type="submit" style="height:32px;" class="contact_sub" name="ok" value="Cập nhật giỏ hàng"  title="Cập nhật giỏ hàng"></div>
        <div style="margin-left:20px;" class='buy'><a class="contact_sub" href="deletegiohang.php?type=all" title="Xóa tất">Xóa giỏ hàng</a></div> 
                   </div>
                    
               </td>
              
               <td style="text-align: center" colspan="4" align="center">
                    <b><span id='total_value'>Tổng giá trị :&nbsp; <?php echo number_format($total,"0","","."); $_SESSION['tongtien'] = $total; ?></span> đ</b> 
               </td>
           </tr>
           <tr>
               <td style="text-align: center" colspan="6" align="center">
                   <div class="margin_auto" style="margin-top:6px;">
            <div class='buy'><a class="contact_sub" href="default.php" title="Mua thêm">Mua tiếp</a></div>
            <div style="margin-left:20px;" class='buy'><a class="send_info contact_sub" href="javascript:void(0)" title="Gửi đơn hàng" >Gửi đơn hàng</a></div>
        </div>
               </td>
           </tr>
            </table>
              </form> 
                <div class="send_cart">
    	<div class="contact_info" id="cart_scroll" style="width: 920px;margin:10px;">
    	<div class="contact_view cart_view">
        	
        </div>
    	<form action="javascript:void(0)" method="post">
        	<div class="form_items">
            	<div class="form_items_left">&nbsp;</div>
                <div class="form_items_right" style="padding: 5px 0px 10px;font-size: 15px;color: #118cd2;font-weight: bold;">Thông tin khách hàng</div>
            </div>
        	<div class="form_items">
            	<div class="form_items_left">Họ &amp; tên <span class="red">*</span></div>
                <div class="form_items_right"><input class="inputtxt" type="text" size="50" placeholder="Họ và tên" name="cart_name" id="cart_name"></div>
            </div>
            <div class="cls"></div>
            <div class="form_items">
            	<div class="form_items_left">Email <span class="red">*</span></div>
                <div class="form_items_right"><input class="inputtxt" type="email"     size="50" placeholder="Email" name="cart_email" id="cart_email"></div>
            </div>
            <div class="cls"></div>
            <div class="form_items">
            	<div class="form_items_left">Điện thoại <span class="red">*</span></div>
                <div class="form_items_right"><input class="inputtxt" type="text" size="50" placeholder="Số điện thoại" name="cart_tel" id="cart_tel"></div>
            </div>
            <div class="cls"></div>
            <div class="form_items">
            	<div class="form_items_left">Địa chỉ <span class="red">*</span></div>
                <div class="form_items_right"><input class="inputtxt" type="text" size="50" placeholder="Địa chỉ" name="cart_address" id="cart_address"></div>
            </div>
            <div class="cls"></div>
            <div class="form_items">
            	<div class="form_items_left">&nbsp;</div>
                <div class="form_items_right"><input class="contact_sub" type="submit" value="Gửi đơn hàng" name="ok" id="send_all" /></div>
            </div>
            
        </form>
    </div>
	</div>     
                </div>
             </div>
      
     
      
<?php require "includes\\footer.php";?>
 
