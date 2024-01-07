<?php
        include("../config.php"); 
        if(isset($_REQUEST['id']))
        {
            $id = $_REQUEST['id'];
        $delete_menu = "delete from donhang where id='$id'";
            $delete_ctdh = "delete from chitietdonhang where iddonhang='$id'";
        if(mysqli_query($conn,$delete_menu)&& mysqli_query($conn,$delete_ctdh))
        {
            echo "<script language='javascript'>alert('Xóa thành công!');";
            echo "location.href='donhang.php';</script>";    
        }
        else
        {
            echo "<script language='javascript'>alert('Xóa thất bại!');";
            echo "location.href='donhang.php';</script>";    
        }    
        }
       
        ?>