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
                

            <div class="container">
            <div class="row" style="margin-top: 100px;">
                  

            <div class="col-lg-1 admin">
            </div>
              
                <div class="col-lg-5 admin ">
                <h2 class="admin-hd text-center">Total Active  house</h2>
                <hr>
                <p class="num">
                <?php
                                            $sql1="SELECT * FROM house";
                                            $res=$con->query($sql1);
                                            $status=$res->num_rows;
                                            
                                        ?>
                                         <h1 class="text-center"><?php echo $status;?></h1>
                </p>
  </div>



  <div class="col-lg-5 admin ">
                <h2 class="admin-hd text-center">Total Active  Customers</h2>
                <hr>
                <p class="num">
                <?php
                                            $sql1="SELECT * FROM customers";
                                            $res=$con->query($sql1);
                                            $status=$res->num_rows;
                                            
                                        ?>
                                         <h1 class="text-center"><?php echo $status;?></h1>
                </p>
  </div>



  <div class="col-lg-1 mt-3"></div>


</div>
</div>


<div class="container">
            <div class="row" style="margin-top: 100px;">
                  

            <div class="col-lg-1 admin">
            </div>
              
                <div class="col-lg-5 admin ">
                <h2 class="admin-hd text-center">Total Registered house</h2>
                <hr>
                <p class="num">
                <?php
                                            $sql1="SELECT * FROM house WHERE status='Active'";
                                            $res=$con->query($sql1);
                                            $status=$res->num_rows;
                                            
                                        ?>
                                         <h1 class="text-center"><?php echo $status;?></h1>
                </p>
  </div>



  <div class="col-lg-5 admin ">
                <h2 class="admin-hd text-center">Total Registered Customers</h2>
                <hr>
                <p class="num">
                <?php
                                            $sql1="SELECT * FROM customers WHERE status='Active'";
                                            $res=$con->query($sql1);
                                            $status=$res->num_rows;
                                            
                                        ?>
                                         <h1 class="text-center"><?php echo $status;?></h1>
                </p>
  </div>



  <div class="col-lg-1 mt-3"></div>


</div>


<div class="container">
            <div class="row" style="margin-top: 100px;">
                  

            <div class="col-lg-1 admin">
            </div>
              
                <div class="col-lg-5 admin ">
                <h2 class="admin-hd text-center">Total InActive  house</h2>
                <hr>
                <p class="num">
                <?php
                                            $sql1="SELECT * FROM house WHERE status='InActive'";
                                            $res=$con->query($sql1);
                                            $status=$res->num_rows;
                                            
                                        ?>
                                         <h1 class="text-center"><?php echo $status;?></h1>
                </p>
  </div>



  <div class="col-lg-5 admin ">
                <h2 class="admin-hd text-center">Total InActive Customers</h2>
                <hr>
                <p class="num">
                <?php
                                            $sql1="SELECT * FROM customers WHERE status='InActive'";
                                            $res=$con->query($sql1);
                                            $status=$res->num_rows;
                                            
                                        ?>
                                         <h1 class="text-center"><?php echo $status;?></h1>
                </p>
  </div>



  <div class="col-lg-1 mt-3"></div>


</div>


</div>


    
                </div>
               

            </div>
        </div>

                    
  </div>
</div>
                </div>
             
            </div>
        </div>
      

    </div>



                <?php include "footer.php";  ?>
            </div>
        </div>
       <?php include "footer_script.php"; ?>
    </body>
</html>
