
<?php
include("../config.php");
session_start();
    echo '<option value="">Chọn menu con</option>';
    $idcha = $_POST["idmenucha"];
    $query = "select * from menucon where idcha=$idcha";
      $tbl_menucon=  mysqli_query($conn,$query);
            if(mysqli_num_rows($tbl_menucon)>0)
                while($rows_menucon = mysqli_fetch_array($tbl_menucon))
                {
                    $selected= '';
                    if(isset($_SESSION['idcon_product']))
                    {
                        if($_SESSION['idcon_product'] == $rows_menucon['id'] )
                        $selected = 'selected';
                    }
                          

                echo '<option '.$selected.' value="'.$rows_menucon['id'].'">'.$rows_menucon['tenmenucon'].'</option>';
                }
 unset($_SESSION["idcon_product"]);   
?>