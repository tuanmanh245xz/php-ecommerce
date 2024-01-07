<?php
        include("../config.php"); 
        if(isset($_REQUEST['id']))
        {
            $id = $_REQUEST['id'];
        $delete_menu = "delete from menucha where id='$id'";
        if(mysqli_query($conn,$delete_menu))
        {
            echo "<script language='javascript'>alert('Xóa thành công!');";
            echo "location.href='menucha.php';</script>";    
        }
        else
        {
            echo "<script language='javascript'>alert('Xóa thất bại!');";
            echo "location.href='menucha.php';</script>";    
        }    
        }
       
        ?>