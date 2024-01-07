<?php
    require('config.php');
session_start();
    if(isset($_POST['type'])){
        
        $date = date('Y/m/d');
        $tongtien = $_SESSION['tongtien'];
        $name	= $_POST['cart_name'];
		$email	= $_POST['cart_email'];
		$phone	= $_POST['cart_tel'];
		$address = $_POST['cart_address'];
        $length = strlen($phone);
        if($tongtien==0)
        {
            echo 6;
        }
        else{
            if($name == "" || $email == "" || $phone == "" || $address == "" ){
			echo "1";
			die();
		}else{
			if(is_numeric($phone)){
				if($length > 9 && $length < 12){
					if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $sql_maxiddh = "select max(id) from donhang";
                    $res = mysqli_query($conn,$sql_maxiddh);
                    $row = mysqli_fetch_array($res);
                    if($row[0]==null)
                        $iddh = 1;
                    else
                        $iddh = $row[0]+1;
				    $sql_dh = "insert into donhang(id,hoten,diachi,email,phone,ngaylap,tongtien) value($iddh,'$name','$address','$email','$phone','$date','$tongtien')";
                    mysqli_query($conn,$sql_dh);
                    foreach($_SESSION['cart'] as $sp)
                     {
                        $idpro = $sp['id'];
                        $gia = $sp['price'];
                        $sl = $sp['soluong'];
                        $tt = $sp['price'] * $sp['soluong'];
                        $sql_ctdh = "insert into chitietdonhang(idpro,gia,soluong,thanhtien,iddonhang) value($idpro,$gia,$sl,$tt,$iddh)";
                        mysqli_query($conn,$sql_ctdh);
                     }
                    unset($_SESSION['cart']);
					echo 4;
                     
                  
					}else{
						echo 5;
					}
				}else{
					echo 3;
				}
			}else{
				echo 2;
			}
		}    
        }
        
        
    }
 
?>