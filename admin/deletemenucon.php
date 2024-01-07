<?php
        include("../config.php"); 
        $id = $_REQUEST['id'];
        $delete_menu = "delete from menucon where id='$id'";
        if(mysqli_query($conn,$delete_menu))
        {
            echo "<script language='javascript'>alert('Xóa thành công!');";
            echo "location.href='menucon.php';</script>";    
        }
        else
        {
            echo "<script language='javascript'>alert('Xóa thất bại!');";
            echo "location.href='menucon.php';</script>";    
        }
       
        ?>