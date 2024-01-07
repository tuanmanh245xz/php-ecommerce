<?php
    session_start();
    if(isset($_GET['type']))
    {
        if($_GET['type'] == 'all')      
        {
            unset($_SESSION['cart']);
            header("location:giohang.php");
            exit();
        }
        if($_GET['type']=='one')
        {
            $id = $_GET['id'];
            unset($_SESSION['cart'][$id]);
            header("location:giohang.php");
            exit();
            
        }
    }
?>