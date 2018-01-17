<?php

session_start();
ob_start();

include "includes/db.php";
include "oop.php";
include "includes/functions.php";


?>




<!DOCTYPE html>
<html lang="en">



<head>
    <title>Cart</title>
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
<div class="dividerInitial"></div>


<?php


//returns the list of cart_item objects
$cart_items = getcart($_SESSION['user_name']);


//if cart is empty show the message
if (sizeof($cart_items) == 0) { ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="div-col-6">
                <h4 class="display-4 text-danger">
                    Cart is Empty, please add items!
                </h4>
            </div>
        </div>
    </div>


<!--else show the cart items-->
<?php } else { ?>

    <!--cart-->
    <h4 class="display-4 text-primary text-center"
        style="margin: 32px;">
        Cart
    </h4>


    <!--table that shows the cart items-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">

                <table class="table table-bordered table-responsive table-hover">
                    <thead>
                    <tr>
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Unit Final Price</th>
                        <th>Total Price</th>
                    </tr>
                    </thead>

                    <tbody>

                    <?php

                    $total = 0;

                    foreach ($cart_items as $item) { ?>

                        <tr>
                            <td><?php echo $item->iid; ?></td>
                            <td><?php echo $item->name; ?></td>
                            <td><?php echo $item->quantity; ?></td>
                            <td><?php echo $item->up; ?></td>
                            <td><?php echo $item->ufp; ?></td>
                            <td><?php echo $item->ufp * $item->quantity; ?></td>
                        </tr>

                        <?php
                        $total += $item->ufp * $item->quantity;
                    } ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <h4 class="text-center text-danger">Total Cost: <?php echo $total; ?></h4>


    <div class="dividerInitial"></div>


    <h4 class="display-4 text-primary text-center"
        style="margin: 32px;">
        Purchase
    </h4>


    <!--Purchase form-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="purchase.php" method="post">


                    <!--Contact No-->
                    <div class="form-group">
                        <input type="text"
                               id="contact_no"
                               name="contact_no"
                               class="form-control"
                               autocomplete="on"
                               minlength="10"
                               placeholder="Contact No"
                               autofocus
                               required>

                    </div>

                    <!--Shipping Address-->
                    <div class="form-group">

                        <input type="text"
                               id="address"
                               name="address"
                               class="form-control"
                               placeholder="Address"
                               minlength="1"
                               required>
                    </div>

                    <!--total, hidden-->
                    <div class="form-group">

                        <input type="number"
                               name="total"
                               class="form-control"
                               hidden
                               value="<?php echo $total; ?>"
                               required>
                    </div>


                    <div class="form-group">

                        <input type="text"
                               id="user_name"
                               name="user_name"
                               class="form-control"
                               placeholder="User_name"
                               hidden
                               value="<?php echo $_SESSION['user_name']; ?>"
                               readonly
                               required>
                    </div>


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" name="buy" value="Buy">
                    </div>

                </form>
            </div>
        </div>
    </div>


<?php } ?>


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
