<?php
    require("config.php");
    session_start();
    if(isset($_GET['id']) && $_GET['act']=="add")
                {
                    $id = $_GET['id'];
                    $sql_idpro = "select * from product where IdProduct=$id";
                    $result = mysqli_query($conn,$sql_idpro);
                    
                    if(mysqli_num_rows($result)>0)
                    {
                        $row = mysqli_fetch_array($result);
                        $name_pro = $row['NameProduct'];
                        $price_pro = $row['Price'];
                        $image_pro = $row['ImageProduct'];
                        $_SESSION['cart'][$id]['name'] = $name_pro;
                        $_SESSION['cart'][$id]['id'] = $id;
                        $_SESSION['cart'][$id]['price'] = $price_pro;
                        $_SESSION['cart'][$id]['image'] = $image_pro;
                        if(isset($_SESSION['cart'][$id]['soluong']))
                        {
                            $_SESSION['cart'][$id]['soluong'] = $_SESSION['cart'][$id]['soluong']+ 1;
                        }else
                        {
                            $_SESSION['cart'][$id]['soluong'] = 1;
                        }
                    }
                    
header('location: giohang.php');
                    
                }
?>