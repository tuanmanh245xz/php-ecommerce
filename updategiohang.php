<?php
    session_start();
    $stt = 0;
    foreach($_POST['cart_num']as $k)
    {
        if($_POST['cart_qty'][$stt]<=0)
        {
            unset($_SESSION['cart'][$k]);
        }
        else
        {
            $_SESSION['cart'][$k]['soluong'] = $_POST['cart_qty'][$stt];
        }
        $stt++;
    }
    header("location:giohang.php");
            exit();
?>