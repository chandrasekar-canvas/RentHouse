
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit House Owners</h3></div>
                                    <div class="card-body">
                                    <?php
                                        if (isset($_GET["edit_id"])) {
                                        $edit_id = $_GET["edit_id"];
                                        $sql="SELECT * FROM owners WHERE id='$edit_id'";
                                        $res=$con->query($sql);
                                         $row=$res->fetch_assoc();
                                            $id=$row["id"];
                                            $name=$row["name"];
                                            $email=$row["email"];
                                            $mobile_no=$row["mobile_no"];
                                            $address=$row["address"];
                                            $location=$row["location"];
                                            $photo=$row["photo"];
                                            $date=$row["date"];
                                            $aadhar_card=$row["aadhar_card"];
                                            $status=$row["status"];
                                    ?>
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="name" value="<?php echo "$name"; ?>" type="text" >
                                                        <label>Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="mobile_no" value="<?php echo "$mobile_no"; ?>" type="text" >
                                                        <label>Mobile No</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="email" type="email" value="<?php echo "$email"; ?>">
                                                        <label>Email</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="location" type="text" value="<?php echo "$location"; ?>">
                                                        <label>Location</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="address" type="text" value="<?php echo "$address"; ?>">
                                                <label>Address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="date" type="date" value="<?php echo "$date"; ?>">
                                                        <label>Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select name="status" class="form-control">
                                                            <option value="">Select Status(<?php echo "$status"; ?>)</option>
                                                            <option value="Active">Active</option>
                                                            <option value="InActive">InActive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <!-- <a class="btn btn-primary btn-block" href="login.html">Create Account</a> -->
                                                <button class="btn btn-primary btn-block" type="submit" name="submit">Update House Owner</button>
                                            </div>
                                            </div>
                                        </form>
                                        </hr>
                                        </br>
                                        
                                    <?php } ?>
                                        <?php
                                            if(isset($_POST["submit"])){
                                                                                         
                                                $name=$_POST["name"];
                                                $mobile_no=$_POST["mobile_no"];
                                                $email=$_POST["email"];
                                                $address=$_POST["address"];
                                                $location=$_POST["location"];
                                                $status=$_POST["status"];

                                                $date=date("Y-m-d");
                                                // uplode file 
                                                
                                                // $temp = explode(".", $_FILES["photo"]["name"]); //file name get
                                                // $photo = "photo$mobile_no." . end($temp);      //file name rename to photo and mobile no
                                                // move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/photo/$photo"); //file uplode 

                                                // $temp1 = explode(".", $_FILES["aadhar_card"]["name"]);
                                                // $aadhar_card = "aadhar$mobile_no." . end($temp1);
                                                // move_uploaded_file($_FILES["aadhar_card"]["tmp_name"], "upload/aadhar/$aadhar_card");

                                                $sql="UPDATE owners SET name='$name', mobile_no='$mobile_no', email='$email', address='$address', location='$location', date='$date', status='$status' WHERE id='$id'";

                                                if($con->query($sql)){
                                                    
                                                    echo "<script>alert('Updated Successfully');
                                                    window.location.replace('view_owners.php')</script>";
                                                }
                                                else{
                                                    echo "<script>alert('Not Updated, try Again'); window.location.replace('view_owners.php')</script>";
                                                }
                                            }


                                            
                                        ?>

                                                   


                                                  





                                       
                                         <form method="POST" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                               
                                                <div class="col-md-6">
                                                <img src="../asset/imges/aadhar/<?php echo "$aadhar_card"; ?>" style="width:200px; height:200px;  border-radius:10%; margin:29px; padding:14px;">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    
                                                        <input class="form-control" name="aadhar_card" type="file">
                                                        <label>Aadhar Card</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="d-grid">
                                                        <!-- <a class="btn btn-primary btn-block" href="login.html">Create Account</a> -->
                                                    <button class="btn btn-primary btn-block" type="submit" name="submit2">Update Aadhar Card</button>
                                                </div>
                                                </div>
                                            </div>
                                            
                                        </form>
                                        <?php
                                            if(isset($_POST["submit2"])){
                                                                                         
                                             
                                                // uplode file 
                                                
                                                

                                                $temp1 = explode(".", $_FILES["aadhar_card"]["name"]);
                                                $aadhar_card = "aadhar$mobile_no." . end($temp1);
                                                move_uploaded_file($_FILES["aadhar_card"]["tmp_name"], "../asset/imges/aadhar/$aadhar_card");

                                                $sql="UPDATE owners SET aadhar_card='$aadhar_card' WHERE id='$id'";

                                                if($con->query($sql)){
                                                    
                                                    echo "<script>alert('Updated Successfully');
                                                    window.location.replace('edit_owner.php?edit_id=$id')</script>";
                                                }
                                                else{
                                                    echo "<script>alert('Not Updated, try Again'); window.location.replace('view_owners.php')</script>";
                                                }
                                            }
                                        ?>







<!-- 




 -->





 <form method="POST" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                               
                                                <div class="col-md-6">
                                                <img src="../asset/imges/photo/<?php echo "$photo"; ?>" height="100px" width="100px">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    
                                                        <input class="form-control" name="photo" type="file">
                                                        <label>Profile PHOTO</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="d-grid">
                                                        <!-- <a class="btn btn-primary btn-block" href="login.html">Create Account</a> -->
                                                    <button class="btn btn-primary btn-block" type="submit" name="submit4">Update Profile</button>
                                                </div>
                                                </div>
                                            </div>
                                            
                                        </form>
                                        <?php
                                            if(isset($_POST["submit4"])){
                                                                                         
                                             
                                                // uplode file 
                                                
                                                

                                                $temp3 = explode(".", $_FILES["photo"]["name"]);
                                                $photo = "photo$mobile_no." . end($temp3);
                                                move_uploaded_file($_FILES["photo"]["tmp_name"], "../asset/imges/photo/$photo");

                                                $sql="UPDATE owners SET photo='$photo' WHERE id='$id'";

                                                if($con->query($sql)){
                                                    
                                                    echo "<script>alert('Updated Successfully');
                                                    window.location.replace('edit_owner.php?edit_id=$id')</script>";
                                                }
                                                else{
                                                    echo "<script>alert('Not Updated, try Again'); window.location.replace('view_owners.php')</script>";
                                                }
                                            }
                                        ?>
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
