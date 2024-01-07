 
$(document).ready(function(){
	$("#send_all").click(function(){
		cart_name		= $("#cart_name").val();
		cart_email		= $("#cart_email").val();
		cart_tel		= $("#cart_tel").val();
		cart_address	= $("#cart_address").val();
		val = "abc";
		$.ajax({
			"url"	: "sendgiohang.php",
			"type"	: "post",
			"data"	: "cart_name="+cart_name+"&cart_email="+cart_email+"&cart_tel="+cart_tel+"&cart_address="+cart_address+"&type="+val,
			"async"	: "false",
			beforeSend : function(){
				$(".cart_view").html("Đang load dữ liệu ...");
			},
			success: function(results_cart){
				if(results_cart == 1){
                    
					$(".cart_view").css("color","#f00").html("<img class='check_suscess' src='Images/Layout/check_error.png' />Vui lòng nhập đầy đủ thông tin");
				}else if(results_cart == 2){
					$(".cart_view").css("color","#f00").html("<img class='check_suscess' src='Images/Layout/check_error.png' />Số điện thoại không hợp lệ");
				}else if(results_cart == 3){
					$(".cart_view").css("color","#f00").html("<img class='check_suscess' src='Images/Layout/check_error.png' />Số điện thoại không đúng, vui lòng kiểm tra lại");
				}else if(results_cart == 5){
					$(".cart_view").css("color","#f00").html("<img class='check_suscess' src='Images/Layout/check_error.png' />Email không đúng định dạng, vui lòng kiểm tra lại");
				}else if(results_cart==6){
                    $(".cart_view").css("color","#f00").html("<img class='check_suscess' src='Images/Layout/check_error.png' />Giỏ hàng đang trống, vui lòng kiểm tra lại!");
                }else if(results_cart==4){
                    $("#cart_name").val("");
					$("#cart_email").val("");
					$("#cart_tel").val("");
					$("#cart_address").val("");
                    alert("Đơn hàng của bạn đã được gửi, chúng tôi sẽ liên hệ với bạn trong thời gian gần nhất !")
                    window.location.href = "giohang.php";
                }
                    
                
			}
		})
		return false;
	});
     $('.send_info').click(function(){
                var dis = $('.send_cart').css('display');
                if(dis=="none")
                $('.send_cart').css("display","block");
                else
                                $('.send_cart').css("display","none");

});
});