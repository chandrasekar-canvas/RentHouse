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
                            <div class="">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Customer Register Approval</h3></div>
                                    <div class="card-body">
                                       
                                    <!-- 22222222222222 -->

                                   
<section class="checkout-page-area section-gap-equal" style="padding:60px 0;">
    <div class="container-fluid" style="border: 10px solid gray;
    background:#ebac7c;
border-radius: 10px;
padding: 25px;">
<div class="row">
<!-- <div class="col-lg-3"> -->
<!-- <button onclick="window.location.href='export.php';" class="btn btn-primary">Export Excel Sheet</button> -->

<!-- </div> -->
<div class="col-lg-12"> 

    


<!-- <div id="users" class="col-xs-12 mt-3">
    <div class="filter-group row">

    
        </div>
    
        <div class="form-group col-xs-12 col-sm-12 "> -->
          
            <!-- <button class="btn btn-danger" onclick="resetList();">Clear</button> -->
        <!-- </div>
    </div> -->
    <table class="table">
        <thead>
            <tr>
            <th>S.No</th>
            <td>Name</td>
            <td>Mobile</td>
            <td>Registered Date</td>

            <td>Address</td>    
            <td>Location</td>

           
            <!-- <td>name</td> -->
            
            <td>status</td>
            <td>Approval</td>
            <!-- <th>Update</th> -->
           </tr>
        </thead>
        <tbody class="list">
        
                <?php

$sql="SELECT * FROM customers";
$res=$con->query($sql);
$i=0;
while($row=$res->fetch_assoc())
{
$i=$i+1;
$id=$row["id"];
$name=$row["name"];
$mobile_no=$row["mobile_no"];
$date=$row["date"];
$status=$row["status"];
$address=$row["address"];
$location=$row["location"];



?>
<tr>

<td><?php echo $id;?></td>


<td><?php echo $name;?></td>
<td><?php echo $mobile_no;?></td>
<td><?php echo $date;?></td>
<td><?php echo $address;?></td>
<td><?php echo $location;?></td>

<td><?php echo $status;?></td>
<td><a href="user_approval.php?edit_id=<?php echo "$id";?>">Approval</a></td>





                <?php } ?>
                
        </tbody>
    </table>

    <?php 
    if(isset($_GET["edit_id"])){
        $edit_id=$_GET["edit_id"];
        echo $sql="UPDATE customers SET status='Active' WHERE id='$edit_id'";

        if($con->query($sql)){
            echo "<script>alert('Approval updated'); window.location.replace('user_approval.php')</script>";
        }else{
            echo "<script>alert('Not Approval updated');</script>";
        }
    }
?>
</div>
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





















