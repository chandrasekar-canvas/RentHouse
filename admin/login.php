<?php
    include "config.php";
	session_start();
    
   
?>

<style>
    body{
        background-image:url(assets\imgages\bg.jpeg);
    }
</style>
<!DOCTYPE html>
<html lang="en">
    <head>
       <?php include "header.php"; ?>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3  class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control"  name="username" type="text" placeholder="Enter Your Username" />
                                                <label for="inputEmail">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control"  name="password" type="password" placeholder="Enter Your Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <!-- <a class="small" href="password.html">Forgot Password?</a> -->
                                                <!-- <a class="btn btn-primary" href="index.html">Login</a> -->
                                                <button type="submit" name="submit"  class="btn btn-primary">Login</button> 
                                            </div>
                                        </form>
                                        <?php
                                            if(isset($_POST["submit"]))
                                            {
                                            $username=$_POST["username"];
                                            $password1=$_POST["password"];
                                            $password=md5($password1); //encrpt  password change in use md5()
                                            $sql="SELECT * FROM admin WHERE username='$username' AND password='$password'";
                                            $res=$con->query($sql);
                                            // echo $sql;
                                            if($row=$res->fetch_assoc())
                                            {
                                            $_SESSION["username"]=$row["username"];
                                            echo "<script>window.open('index.php','_self');</script>";
                                            }
                                            else 
                                            {
                                            echo "<script>swal('Invalid Login Credentials');</script>";
                                            }
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
            </div>
        </div>
        <?php include "footer_script.php"; ?>
    </body>
</html>
