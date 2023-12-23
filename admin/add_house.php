<?php
include "config.php";
session_start();
if (!isset($_SESSION["username"])) {
    header("Location:login.php?mes=login_error");
} else {
    $username = $_SESSION["username"];
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
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Add House</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <!-- extencence work agurathukku enctype poduroom -->
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="house_name" type="text">
                                                    <label>House Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" name="rent" type="text">
                                                    <label>Rent</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="advance" type="text">
                                                    <label>Advance</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="house_type" type="text">
                                                    <label>House Type</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="facility" type="text">
                                                    <label>Facility</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">

                                                    <select name="owner_mobile" class="form-control">
                                                        <?php
                                                        $sql = "SELECT name FROM owners WHERE status='Active' ";
                                                        $res = $con->query($sql);

                                                        while ($row = $res->fetch_assoc()) {
                                                            // $id=$row["id"];
                                                            $name = $row["name"];
                                                            // $mobile_no=$row["mobile_no"];
                                                            echo "<option value='$name'>$name</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <label>House Owner</label>
                                                </div>
                                                
                                            </div>



                                            <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="owner_mobile" type="text">
                                                    <label>Login Mobile_NO</label>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="address" type="text">
                                                    <label>Address</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="location" type="text">
                                                    <label>Location</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="our_expectation" type="text">
                                                    <label>Our Expectation</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="mobile_no" type="text">
                                                    <label>Mobile No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="img1" type="file">
                                                    <label>Image 1</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="img2" type="file">
                                                    <label>Image 2</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="img3" type="file">
                                                    <label>Image 3</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="img4" type="file">
                                                    <label>Image 4</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                                <!-- <a class="btn btn-primary btn-block" href="login.html">Create Account</a> -->
                                                <button class="btn btn-primary btn-block" type="submit" name="submit">Add House </button>
                                            </div>
                                        </div>
                                    </form>

                                    <?php
                                    if (isset($_POST["submit"])) {

                                        $house_name = $_POST["house_name"];
                                        $rent = $_POST["rent"];
                                        $advance = $_POST["advance"];
                                        $house_type = $_POST["house_type"];
                                        $facility = $_POST["facility"];
                                        $address = $_POST["address"];
                                        $location = $_POST["location"];
                                        $our_expectation = $_POST["our_expectation"];
                                        $mobile_no = $_POST["mobile_no"];
                                       
                                        $date = date("Y-m-d");
                                        // $status=$_POST["status"];
                                        $owner_mobile = $_POST["owner_mobile"];

                                        $date = date("Y-m-d");
                                        // uplode file 

                                        $temp = explode(".", $_FILES["img1"]["name"]); 
                                        //file name get
                                        $img1 = "img1$mobile_no." . end($temp);     
                                         //file name rename to photo and mobile no
                                        move_uploaded_file($_FILES["img1"]["tmp_name"], "../asset/imges/house/$img1"); 
                                        //file uplode 

                                        $temp1 = explode(".", $_FILES["img2"]["name"]);
                                         //file name get
                                        $img2 = "img2$mobile_no." . end($temp1);     
                                         //file name rename to photo and mobile no
                                        move_uploaded_file($_FILES["img2"]["tmp_name"], "../asset/imges/house/$img2"); 
                                        //file uplode 

                                        $temp2 = explode(".", $_FILES["img3"]["name"]);
                                         //file name get
                                        $img3 = "img3$mobile_no." . end($temp2);     
                                         //file name rename to photo and mobile no
                                        move_uploaded_file($_FILES["img3"]["tmp_name"], "../asset/imges/house/$img3"); 
                                        //file uplode 

                                        $temp3 = explode(".", $_FILES["img4"]["name"]);
                                         //file name get
                                        $img4 = "img4$mobile_no." . end($temp3);      
                                        //file name rename to photo and mobile no
                                        move_uploaded_file($_FILES["img4"]["tmp_name"], "../asset/imges/house/$img4"); 
                                        //file uplode 

                                        $sql = "INSERT INTO house (id, house_name, rent, advance, house_type, facility, address, location, our_expectation, mobile_no, img1, img2, img3, img4, date, status, owner_mobile) VALUES 
                                                (Null, '$house_name', '$rent', '$advance', '$house_type', '$facility', '$address', '$location', '$our_expectation', '$mobile_no', '$img1', '$img2', '$img3', '$img4', '$date', 'Active', '$owner_mobile')";

                                        if ($con->query($sql)) {

                                            echo "<script>alert('Added Successfully');
                                                    window.location.replace(index.php')</script>";
                                        } else {
                                            echo "<script>alert('Not Added, try Again'); window.location.replace('add_house.php')</script>";
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