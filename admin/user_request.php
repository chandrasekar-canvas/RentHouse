<?php
    include "config.php";
	session_start();
    if (!isset($_SESSION["username"]))
    {
        header("Location:login.php?mes=login_error");
    }
	else{
        $username=$_SESSION["username"];
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
       <?php include "header.php"; ?>
    </head>
    <body class="sb-nav-fixed">
        <?php include "nav.php"; ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include "side_nav.php"; ?>
            </div>
            <div id="layoutSidenav_content">
            <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Customer Request</h3></div>
                                    <div class="card-body">
                                       
                                    <!-- 22222222222222 -->

                                 
                                       
                                    <!-- 22222222222222 -->

                                   
<section class="checkout-page-area section-gap-equal" style="padding:60px 0;">
    <div class="container" style="border: 10px solid gray;
    background:#ebac7c;
border-radius: 10px;
padding: 25px;">
<div class="row">
<div class="col-lg-3">
<!-- <button onclick="window.location.href='export.php';" class="btn btn-primary">Export Excel Sheet</button> -->

</div>
<div class="col-lg-9"> 

    

</div>
<div id="users" class="col-xs-12 mt-3">
    <div class="filter-group row">

    
        </div>
    
        <div class="form-group col-xs-12 col-sm-12 ">
          
            <!-- <button class="btn btn-danger" onclick="resetList();">Clear</button> -->
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th>S.No</th>
            <td>my_id</td>
            <td> My Name</td>
            <td>intrest_id</td>
           
           
            <td>my_number</td>
            <td>status</td>
            <td>Approval</td>
            <!-- <th>Update</th> -->
           </tr>
        </thead>
        <tbody class="list">
        
                <?php

$sql="SELECT * FROM intrest";
$res=$con->query($sql);
$i=0;
while($row=$res->fetch_assoc())
{
$i=$i+1;
$id=$row["id"];
$interst_id=$row['intrest_id'];
$my_id=$row["my_id"];
   $my_name=$row["my_name"];
$my_number=$row["my_number"];
$status=$row["status"];


?>
<tr>

<td><?php echo $id;?></td>
<td><?php echo $my_id;?></td>
<td><?php echo $my_name;?></td>

<td><?php echo $interst_id;?></td>


<td><?php echo $my_number;?></td>
<td><?php echo $status;?></td>
<td><a href="user_request.php?edit_id=<?php echo "$id";?>">Approval</a></td>





                <?php } ?>
                
        </tbody>
    </table>
    <?php 
    if(isset($_GET["edit_id"])){
        $edit_id=$_GET["edit_id"];
        echo $sql="UPDATE intrest SET status='Active' WHERE id='$edit_id'";

        if($con->query($sql)){
            echo "<script>alert('Approval updated'); window.location.replace('user_request.php')</script>";
        }else{
            echo "<script>alert('Not Approval updated');</script>";
        }
    }
?>
</div>
           </div>
</section>

                                    <!-- 3333333333333333333 -->
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include "footer.php";  ?>
            </div>
        </div>
       <?php include "footer_script.php"; ?>
    </body>
</html>
























                                    <!-- 3333333333333333333 -->
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include "footer.php";  ?>
            </div>
        </div>
       <?php include "footer_script.php"; ?>
    </body>
</html>





















