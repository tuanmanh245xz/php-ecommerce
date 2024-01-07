<?php
        include("../config.php"); 
        $id = $_REQUEST['id'];
        $delete_sp = "delete from product where IdProduct='$id'";
        if(mysqli_query($conn,$delete_sp))
        {
            echo "<script language='javascript'>alert('Xóa thành công!');";
            echo "location.href='sanpham.php';</script>";    
        }
        else
        {
            echo "<script language='javascript'>alert('Xóa thất bại!');";
            echo "location.href='sanpham.php';</script>";    
        }
       
        ?>