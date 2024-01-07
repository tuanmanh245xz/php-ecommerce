<?php require "includes/header.php";
$tbl_menucha = mysqli_query($conn,"select * from menucha");    
?>
<SCRIPT LANGUAGE="JavaScript">
    function confirmAction() {
      return confirm("Bạn có chắc muốn xóa?")
    }
</SCRIPT>
<div class="group-box">
	<div align="center">
	<div class="title">Quản lý menu cha</div>
       
        
               <table border="1px" style="font-size:15px;margin-top:20px"> 
        <tr>
            <th>Id</th>
            <th>Tên Menu Cha</th>
            <th>Visible</th>
            <td style="text-align: center" colspan="2" align="center"><a href="insertmenucha.php"><img  src="../images/Layout/add.png" alt=""></a></td>
            
        </tr>
        <script type="text/javascript">
            $(document).ready(function(){
               /* $('#checkboxAll').click(function(){
                    if($(this).is(":checked"))
                        $('.chkCheckBoxId').prop('checked',true);
                    else
                        $('.chkCheckBoxId').prop('checked',false);
                                        });
               $('#btn_delete').click(function(){
                    if(confirm("Bạn có chắc muốn xóa?"))
                    {
                        var id = [];
                        $(':checkbox:checked').each(function(i){
                           id[i]  = $(this).val();
                        });
                        if(id.length===0)
                        {
                            alert("Vui lòng click checkbox");
                        }
                        else
                        {
                            $.ajax{
                                url:'deletemenucha.php',
                                method:'POST',
                                data:{id:id},
                                success:function()
                                {
                                    for(var i=0;i<id.length;i++)
                                    {
                                        $('tr#'+id[i]+'').css('background-color','#ccc');
                                        $('tr#'+id[i]+'').fadeOut('slow');
                                    }
                                }
                            });
                        }
                    }
                    else
                    {
                        return false;
                    }
                });
            });*/
               </script>
        <?php if(mysqli_num_rows($tbl_menucha)>0) while($row_menucha=mysqli_fetch_array($tbl_menucha)) { ?>
        <tr>
            <td><?php echo $row_menucha['id']; ?></td>
            <td><?php echo $row_menucha['tenmenucha']; ?></td>
            <td><?php echo $row_menucha['visible']; ?></td>
            <td><a href="editmenucha.php?id=<?php echo $row_menucha['id']; ?>"><center><img src="../images/Layout/edit.png" alt=""></center></a></td>
            <td><a onclick="return confirmAction()" href="deletemenucha.php?id=<?php echo $row_menucha['id']; ?>">
            <center><img src="../images/Layout/delete.png" alt=""></center></a></td>
        </tr>    
        <?php } ?>
    </table>    
          
        <br>  
        
	 </div>
</div>    
<?php require "includes/footer.php";