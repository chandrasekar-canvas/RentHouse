
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
                
<div class="">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit House Owners</h3></div>
                                    <div class="card-body">
                                    <?php
                                        if (isset($_GET["edit_id"])) {
                                        $edit_id = $_GET["edit_id"];
                                        $sql="SELECT * FROM house WHERE id='$edit_id'";
                                        $res=$con->query($sql);
                                         $row=$res->fetch_assoc();
                                        
                                         $id=$row["id"];
                                         $house_name=$row["house_name"];
                                         $rent=$row["rent"];
                                         $advance=$row["advance"];
                                         $house_type=$row["house_type"];
                                         $facility=$row["facility"];
                                         $address=$row["address"];
                                         $location=$row["location"];
                                         $our_expectation=$row["our_expectation"];
                                         $mobile_no=$row["mobile_no"];
                                         $owner_mobile = $row["owner_mobile"];
                                         $img1=$row["img1"];
                                         $img2=$row["img2"];
                                         $img3=$row["img3"];
                                         $img4=$row["img4"];
                                       
                                         $date=$row["date"];
                                         $status=$row["status"];

                                        
                                            
                                    ?>
                                        <form method="POST">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="house_name" value="<?php echo "$house_name"; ?>" type="text" >
                                                        <label>House Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="rent" value="<?php echo "$rent"; ?>" type="text" >
                                                        <label>House_Rent</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="advance" type="text" value="<?php echo "$advance"; ?>">
                                                        <label>House Advance</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="house_type" type="text" value="<?php echo "$house_type"; ?>">
                                                        <label>House Type</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                            <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="facility" type="text" value="<?php echo "$facility"; ?>">
                                                        <label>House facility</label>
                                                    </div>
                                                </div>
                                            

                                            <div class="col-md-6">


                                            
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="address" type="text" value="<?php echo "$address"; ?>">
                                                <label>Address</label>
                                            </div>
                                        </div>
                                        </div>
                                        
                                                    
                                        <div class="form-floating mb-3">
                                                    <input class="form-control" name="owner_mobile" type="text" value="<?php echo "$owner_mobile"; ?>">
                                                    <label>Login Mobile_NO</label>
                                                </div>    
                                            
                                    
                                        <div class="row mb-3">
                                        <div class="col-md-6">

                                        <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="location" type="text" value="<?php echo "$location"; ?>">
                                                        <label>Location</label>
                                                    </div>
                                            
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="mobile_no" type="text" value="<?php echo "$mobile_no"; ?>">
                                                        <label>mobile_no</label>
                                                    </div>
                                            
                                        </div>
                                        </div>
                                        
                                            
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="date" type="date" value="<?php echo "$date"; ?>">
                                                        <label>Date</label>

                                                       
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
                                                    
                                                <button class="btn btn-primary btn-block" type="submit" name="submit">Update House </button>
                                            </div>
                                            </div>
                                        </form>
                                        </hr>
                                        </br>
                                        
                                    <?php } ?>



                                        <?php
                                            if(isset($_POST["submit"])){
                                                                                         
                                                $house_name=$_POST["house_name"];
                                                $rent=$_POST["rent"];
                                                $advance=$_POST["advance"];
                                                $house_type=$_POST["house_type"];
                                                $facility=$_POST["facility"];
                                                $address=$_POST["address"];
                                                $location=$_POST["location"];
                                                $owner_mobile = $_POST["owner_mobile"];
                                                $mobile_no=$_POST["mobile_no"];
                                                $status=$_POST["status"];

                                                $date=date("Y-m-d");
                                                // $status='Active';

                                                

                                                
                                         $sql="UPDATE house SET house_name='$house_name',rent='$rent', advance='$advance',house_type='$house_type', facility='$facility', address='$address',location='$location', mobile_no='$mobile_no', date='$date', owner_mobile='$owner_mobile', status='$status' WHERE id='$id'";
                                      
 
                                                if($con->query($sql)){
                                                    
                                                    echo "<script>alert('Updated Successfully');
                                                    window.location.replace('view_house.php')</script>";
                                                }
                                                else{
                                                    echo "<script>alert('Not Updated, try Again'); window.location.replace('view_owners.php')</script>";
                                                }
                                            }


                                            
                                        ?>

                                                   
</div>
                                                  





                                        <form method="POST" enctype="multipart/form-data">
                                            
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                <td><img src="../asset/imges/house/<?php echo $img1; ?>" width="100px" height="100px" /></td>

                                                    <div class="form-floating mb-3 mb-md-0">
                                                        
                                                        <input class="form-control" name="img1" type="file">
                                                        <label>HOUSE Photo</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="d-grid">
                                                       
                                                    <button class="btn btn-primary btn-block" type="submit" name="submit1">Update Home Img-1</button>
                                                </div>
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                            if(isset($_POST["submit1"])){
                                                                                         
                                             
                                              
                                                
                                                $temp = explode(".", $_FILES["img1"]["name"]); 
                                                //file name get
                                                $img1 = "img1$mobile_no." . end($temp);     
                                                 //file name rename to photo and mobile no
                                                move_uploaded_file($_FILES["img1"]["tmp_name"], "../asset/imges/house/$img1"); 
                                                

                                                $sql="UPDATE house SET img1='$img1' WHERE id='$id'";

                                                if($con->query($sql)){
                                                    
                                                    echo "<script>alert('Updated Successfully');
                                                    window.location.replace('edit_house.php?edit_id=$id')</script>";
                                                }
                                                else{
                                                    echo "<script>alert('Not Updated, try Again'); window.location.replace('view_owners.php')</script>";
                                                }
                                            }
                                        ?>

                                         
                                           <form method="POST" enctype="multipart/form-data">
                                            
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                <img src="../asset/imges/house/<?php echo "$img2"; ?>" height="100px" width="100px">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        
                                                        <input class="form-control" name="img2" type="file">
                                                        <label>House Img-2</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="d-grid">
                                                       
                                                    <button class="btn btn-primary btn-block" type="submit" name="submit2">Update Home Img-2</button>
                                                </div>
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                            if(isset($_POST["submit2"])){
                                                                                         
                                             
                                               
                                                $temp1 = explode(".", $_FILES["img2"]["name"]);
                                                //file name get
                                               $img2 = "img2$mobile_no." . end($temp1);     
                                                //file name rename to photo and mobile no
                                               move_uploaded_file($_FILES["img2"]["tmp_name"], "../asset/imges/house/$img2"); 
                                               //file uplode 
                                                $sql="UPDATE house SET img2='$img2' WHERE id='$id'";

                                                if($con->query($sql)){
                                                    
                                                    echo "<script>alert('Updated Successfully');
                                                    window.location.replace('edit_house.php?edit_id=$id')</script>";
                                                }
                                                else{
                                                    echo "<script>alert('Not Updated, try Again'); window.location.replace('view_owners.php')</script>";
                                                }
                                            }
                                        ?>

                                       

                                        <form method="POST" enctype="multipart/form-data">
                                            
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                <img src="../asset/imges/house/<?php echo "$img3"; ?>" height="100px" width="100px">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        
                                                        <input class="form-control" name="img3" type="file">
                                                        <label>House Img-3</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="d-grid">
                                                        
                                                    <button class="btn btn-primary btn-block" type="submit" name="submit3">Update Home Img-3</button>
                                                </div>
                                                </div>
                                            </div>
                                            
                                        </form>
                                        <?php
                                            if(isset($_POST["submit3"])){
                                                                                         
                                             
                                              
                                                $temp2 = explode(".", $_FILES["img3"]["name"]);
                                         //file name get
                                        $img3 = "img3$mobile_no." . end($temp2);     
                                         //file name rename to photo and mobile no
                                        move_uploaded_file($_FILES["img3"]["tmp_name"], "../asset/imges/house/$img3"); 
                                        //file uplode 

                                                

                                                $sql="UPDATE house SET img3='$img3' WHERE id='$id' ";

                                                if($con->query($sql)){
                                                    
                                                    echo "<script>alert('Updated Successfully');
                                                    window.location.replace('edit_house.php?edit_id=$id')</script>";
                                                }
                                                else{
                                                    echo "<script>alert('Not Updated, try Again'); window.location.replace('view_owners.php')</script>";
                                                }
                                            }
                                        ?>





<form method="POST" enctype="multipart/form-data">
                                            
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                <img src="../asset/imges/house/<?php echo "$img4"; ?>" height="100px" width="100px">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        
                                                        <input class="form-control" name="img4" type="file">
                                                        <label>House Img-4</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="d-grid">
                                                       
                                                    <button class="btn btn-primary btn-block" type="submit" name="submit4">Update Home Img-4</button>
                                                </div>
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                            if(isset($_POST["submit4"])){
                                                                                         
                                             
                                        
                                                
                                                $temp3 = explode(".", $_FILES["img4"]["name"]);
                                                //file name get
                                               $img4 = "img4$mobile_no." . end($temp3);      
                                               //file name rename to photo and mobile no
                                               move_uploaded_file($_FILES["img4"]["tmp_name"], "../asset/imges/house/$img4"); 
                                               //file uplode 

                                                $sql="UPDATE house SET img4='$img4' WHERE id='$id'";

                                                if($con->query($sql)){
                                                    
                                                    echo "<script>alert('Updated Successfully');
                                                    window.location.replace('edit_house.php?edit_id=$id')</script>";
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
