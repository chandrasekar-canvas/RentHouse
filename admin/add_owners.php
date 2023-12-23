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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add House Owners</h3></div>
                                    <div class="card-body">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="name" type="text" >
                                                        <label>Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="mobile_no" type="text" >
                                                        <label>Mobile No</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="email" type="email">
                                                        <label>Email</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="location" type="text" >
                                                        <label>Location</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="address" type="text" >
                                                <label>Address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="photo" type="file">
                                                        <label>Photo</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="aadhar_card" type="file">
                                                        <label>Your Aadhar Card Img</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                  
                                                <button class="btn btn-primary btn-block" type="submit" name="submit">Add House Owner</button>
                                            </div>
                                            </div>
                                        </form>

                                        <?php
                                            if(isset($_POST["submit"])){
                                                                                         
                                                $name=$_POST["name"];
                                                $mobile_no=$_POST["mobile_no"];
                                                $email=$_POST["email"];
                                                $address=$_POST["address"];
                                                $location=$_POST["location"];
                                              
                                                $date=date("Y-m-d");
                                              
                                                $temp = explode(".", $_FILES["photo"]["name"]);
                                             
                                                $photo = "photo$mobile_no." . end($temp); 
                                                   
                                                move_uploaded_file($_FILES["photo"]["tmp_name"], "assets/upload/photo/$photo"); 



                                                $temp1 = explode(".", $_FILES["aadhar_card"]["name"]); 
                                                $aadhar_card= "aadhar$mobile_no." . end($temp);     
                                                move_uploaded_file($_FILES["aadhar_card"]["tmp_name"], "assets/upload/aadhar/$aadhar_card");

                                                

                                                $sql="INSERT INTO owners(id, name, mobile_no, email, address, location, photo, aadhar_card, date, status) VALUES (NUll, '$name', '$mobile_no', '$email', '$address', '$location', '$photo', '$aadhar_card', '$date', 'Active')";

                                                if($con->query($sql)){
                                                    
                                                    echo "<script>alert('Added Successfully');
                                                    window.location.replace('view_owners.php')</script>";
                                                }
                                                else{
                                                    echo "<script>alert('Not Added, try Again'); window.location.replace('add_owners.php')</script>";
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
