<?php
        include("../config.php"); 
        if(isset($_REQUEST['id']))
        {
            $id = $_REQUEST['id'];
        $delete_menu = "delete from lienhe where id=$id";
        if(mysqli_query($conn,$delete_menu))
        {
                echo "<script language='javascript'>alert('Xóa thành công!');";
                echo "location.href='lienhe.php';</script>";        
        }
        else
        {
            echo "<script language='javascript'>alert('Xóa thất bại!');";
            echo "location.href='lienhe.php';</script>";    
        }    
        }
       
        ?>