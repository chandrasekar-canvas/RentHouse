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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        thead input {
            width: 100%;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <?php include "nav.php"; ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include "side_nav.php"; ?>
        </div>
        <div id="layoutSidenav_content">
            <div class="container" style="padding: 10px;">
                <section class="content">
                    <div class="box box-default" style="background: #fff; border-radius: 25px;">
                        <button onclick="window.location.href='member_export.php';" class="btn btn-primary">Export Excel Sheet</button>
                        <button onclick="window.print()">Print this page</button>

                        <table id="example" class="display table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Profile</th>
                                    <th>Name</th>
                                    <th>Mobile No</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Location</th>
                                    <th>Aadhar Card</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $sql = "SELECT * FROM owners ORDER BY id DESC";
                                $res = $con->query($sql);
                                $i = 0;
                                while ($row = $res->fetch_assoc()) {
                                    $i = $i + 1;
                                    $id = $row["id"];
                                    $name = $row["name"];
                                    $email = $row["email"];
                                    $mobile_no = $row["mobile_no"];
                                    $address = $row["address"];
                                    $location = $row["location"];
                                    $photo = $row["photo"];
                                    $date = $row["date"];

                                    
                                    $aadhar_card = $row["aadhar_card"];
                                    $status = $row["status"];
                                ?>
                                    <tr>
                                    <td> <img src="../asset/imges/photo/<?php echo $photo; ?>" style="width:100px; height:100px;  border-radius:50%; margin:29px; padding:14px;">

                                        <td><?php echo "$name"; ?></td>
                                        <td><?php echo "$mobile_no"; ?></td>
                                        <td><?php echo "$email"; ?></td>
                                        <td><?php echo "$address"; ?></td>
                                        <td><?php echo "$location"; ?></td>
                                        <td> <img src="../asset/imges/aadhar/<?php echo $aadhar_card; ?>" style="width:150px; height:150px;  border-radius:10px; margin:29px; padding:14px;">
</td>

                                        <td><?php echo "$date"; ?></td>
                                        <td><?php echo "$status"; ?></td>
                                        <td style="vertical-align: middle; text-align: justify;">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button onclick="location.href='edit_owner.php?edit_id=<?php echo $id; ?>'" class="btn btn-primary" style="width: 40px;"><i class="fas fa-edit text-white"></i></button>

                                                <button onclick="if(confirm('Are you sure you want to delete? This action cannot be undone.')) { location.href='view_owners.php?delete_id=<?php echo $id; ?>'; }" class="btn btn-danger" style="width: 40px;"><i class="fas fa-trash text-white"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Profile</th>
                                    <th>Name</th>
                                    <th>Mobile No</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Location</th>
                                    <th>Aadhar Card</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <?php

                                    $sql1 = "SELECT * FROM owners WHERE status='Active'";
                                    $res = $con->query($sql1);
                                    $status = $res->num_rows;
                                    echo $status;
                                    ?>

                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>


                        <?php
                        $query = "SELECT * FROM owners WHERE status = 'Active'";
                        $res = mysqli_query($con, $query);

                        // Display the approved content on the webpage
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo "<script>alert('sucessfully'); window.location.replace('view_owners.php');<p>" . $row['id'] . "</p></script>";
                        }
                        ?>
                        <?php
                        if (isset($_GET["delete_id"])) {
                            $delete_id = $_GET["delete_id"];
                            $sql = "DELETE FROM owners where id='$delete_id'";
                            if ($con->query($sql)) {
                                echo "<script>alert('Deleted Successfully');
                window.location.replace('view_owners.php')</script>";
                            } else {
                                echo "<script>alert('Not Deleted');
                window.location.replace('view_owners.php')</script>";
                            }
                        }
                        ?>

                    </div>
                </section>
            </div>


            <script>
                $(document).ready(function() {
                    // Setup - add a text input to each footer cell
                    $('#example thead tr')
                        .clone(true)
                        .addClass('filters')
                        .appendTo('#example thead');

                    var table = $('#example').DataTable({
                        orderCellsTop: true,
                        fixedHeader: true,
                        initComplete: function() {
                            var api = this.api();

                            // For each column
                            api
                                .columns()
                                .eq(0)
                                .each(function(colIdx) {
                                    // Set the header cell to contain the input element
                                    var cell = $('.filters th').eq(
                                        $(api.column(colIdx).header()).index()
                                    );
                                    var title = $(cell).text();
                                    $(cell).html('<input type="text" placeholder="' + title + '" />');

                                    // On every keypress in this input
                                    $(
                                            'input',
                                            $('.filters th').eq($(api.column(colIdx).header()).index())
                                        )
                                        .off('keyup change')
                                        .on('change', function(e) {
                                            // Get the search value
                                            $(this).attr('title', $(this).val());
                                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                                            var cursorPosition = this.selectionStart;
                                            // Search the column for that value
                                            api
                                                .column(colIdx)
                                                .search(
                                                    this.value != '' ?
                                                    regexr.replace('{search}', '(((' + this.value + ')))') :
                                                    '',
                                                    this.value != '',
                                                    this.value == ''
                                                )
                                                .draw();
                                        })
                                        .on('keyup', function(e) {
                                            e.stopPropagation();

                                            $(this).trigger('change');
                                            $(this)
                                                .focus()[0]
                                                .setSelectionRange(cursorPosition, cursorPosition);
                                        });
                                });
                        },
                    });
                });
            </script>











            <?php include "footer.php";  ?>
        </div>
    </div>
    <?php include "footer_script.php"; ?>
</body>

</html>