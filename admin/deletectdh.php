<?php
        include("../config.php"); 
        if(isset($_REQUEST['id']))
        {
            $idctdh = $_REQUEST['id'];
            $iddh = $_REQUEST['iddh'];
            $res_ctdh =mysqli_query($conn,"select * from chitietdonhang where id=$idctdh");
            if(mysqli_num_rows($res_ctdh)>0)
            {
            $row_ctdh = mysqli_fetch_array($res_ctdh);                    
            }
             $res_dh =mysqli_query($conn,"select * from donhang where id=$iddh");
            if(mysqli_num_rows($res_dh)>0)
            $row_dh = mysqli_fetch_array($res_dh);
            $thanhtien_ctdh = $row_ctdh['thanhtien'];
            $tongtien_dh = $row_dh['tongtien'];
            $upda_tt = $tongtien_dh - $thanhtien_ctdh;
        $delete_menu = "delete from chitietdonhang where id='$idctdh'";
        if(mysqli_query($conn,$delete_menu))
        {
            if(mysqli_query($conn,"update donhang set tongtien = $upda_tt where id=$iddh"))
            {
                echo "<script language='javascript'>alert('Xóa thành công!');";
                echo "location.href='chitietdonhang.php?id=$iddh';</script>";        
            }
        }
        else
        {
            echo "<script language='javascript'>alert('Xóa thất bại!');";
            echo "location.href='chitietdonhang.php?id=$iddh';</script>";    
        }    
        }
       
        ?>