<?php
        include("../config.php"); 
        if(isset($_REQUEST['id']))
        {
            $id = $_REQUEST['id'];
            $res = mysqli_query($conn,"select * from donhang where id=$id");
            if(mysqli_num_rows($res)>0)
                $row= mysqli_fetch_array($res);
            $ttthanhtoan = $row['thanhtoan'];
            if($ttthanhtoan==0)
            {
                $sql = "update donhang set thanhtoan = 1 where id=$id";   
                $tt = "Thanh toán";
            }
            else
            {
                $tt = "Hoàn tiền";
                $sql = "update donhang set thanhtoan = 0 where id=$id";
            }
            
        
        if(mysqli_query($conn,$sql))
        {
                echo "<script language='javascript'>alert('$tt thành công');";
                echo "location.href='chitietdonhang.php?id=$id';</script>";        
        }
        else
        {
            echo "<script language='javascript'>alert('$tt thất bại!');";
            echo "location.href='chitietdonhang.php?id=$id.php';</script>";    
        }    
        }
       
        ?>