<?php

session_start();
ob_start();


include "includes/db.php";
include "oop.php";
include "includes/functions.php";

$user_name = $_SESSION['user_name'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Purchase History</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/align.css">
</head>

<body>

<!--navigation bar-->
<?php include "includes/nav.php"; ?>

<div class="dividerInitial"></div>


<!--cart-->
<h4 class="display-4 text-primary text-center"
    style="margin: 32px;">
    Bills
</h4>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 col-sm-8 col-10">

            <table class="table table-bordered table-responsive table-hover">
                <thead>
                <tr>
                    <th>Bill ID</th>
                    <th>Cost</th>
                    <th>Shipping Address</th>
                    <th>Contact No</th>
                </tr>
                </thead>

                <tbody>

                <?php

                $sql = "SELECT * FROM bills WHERE bill_user_name='$user_name'";

                $result = mysqli_query($connection, $sql);

                if (!$result) die("Bills history, query failed!");


                while ( $bill = mysqli_fetch_assoc($result) ) { ?>

                    <tr>
                        <td><?php echo $bill['bill_id']; ?></td>
                        <td><?php echo $bill['bill_total']; ?></td>
                        <td><?php echo $bill['bill_shipping_address']; ?></td>
                        <td><?php echo $bill['bill_contact_no']; ?></td>
                    </tr>

                <?php } ?>

                </tbody>
            </table>

        </div>
    </div>
</div>



<div class="divider"></div>


<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
        integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>


</body>
</html>