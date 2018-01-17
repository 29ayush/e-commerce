<?php

session_start();
ob_start();

include "includes/db.php";
include "oop.php";
include "includes/functions.php";


//user is not allowed to access his page without logging in
//so this will redirect accordingly
if (!is_logged_in()) {
    redirect("login.php");
}

//id of requested item
//this page will show all the information of this item
$item_id = $_GET['id'];

//this function fetch all the data of the asked item from the database,
// and returns the object of full_item class
$item = item_fetch($item_id);


//if post request is sent
//to add item in the cart
if (isset($_POST['q'])) {

    //add item into cart
    //this function add entry in table cathis also
    //so that cart data will be available even in the next login session, or any other device
    addtocart($_SESSION['user_name'],$item_id, $_POST['q']);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Item</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/align.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">



</head>

<body>


<?php
//navigation bar
include "includes/nav.php"; ?>

<div class="dividerInitial"></div>
<div class="dividerInitial"></div>


<!--shows all the details of the asked item-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card" style="padding: 16px 0">
                <div class="card-body" style="margin: 0 auto">
                    <h4 class="card-title text-center"><?php echo $item->name; ?></h4>

                    <!--product image-->
                    <div style="width: 200px; margin: 32px auto;">

                        <img
                                class="card-img-bottom align"
                                src="images/<?php echo $item->picture_url; ?>"
                                style="width:200px;"
                                alt="item image">

                    </div>

                    <!--stock-->
                    <p class="card-text text-muted text-center" style="margin-bottom:0">Stock:
                        <?php echo $item->stock; ?></p>

                    <!--price-->
                    <p class="card-text text-muted text-center" style="margin-bottom:0">Price:
                        <strike><?php echo $item->price; ?></strike> Rs.</p>

                    <!--final price-->
                    <p class="card-text text-danger text-center" style="margin-bottom:0">Final Price
                        : <b><?php echo ($item->price * (100 - $item->discount)) / 100; ?></b> Rs.</p>

                    <!--discount-->
                    <p class="card-text text-info text-center">
                        <?php echo $item->discount; ?>% discount
                    </p>


                    <!--rating-->
                    <p class="card-text text-danger text-center">
                        Rating - <?php echo $item->rating; ?>
                    </p>



                    <!--add to cart form
                    when user clicks on add_to_cart button
                    quantity will be checked by function is_available()
                    that is written in JavaScript, to make stock checking more user friendly
                    if stock is available then it will add it to the cart,
                    if stock is not available then it will show alert-->
                    <form action="" method="post" style="margin: 0 auto;width: 170px;"
                        onsubmit="return is_available(self);">

                        <input type="number" name="q" id="q" min=1 value=1 style="width: 64px;">
                        <input type="submit" name="add" class="btn-danger" value="Add to cart">

                    </form>


                    <!--description-->
                    <h4 class="text-primary" style="padding: 16px;">
                        <b>Description</b>
                    </h4>

                    <p class="text-justify" style="padding: 0 16px;white-space:pre-line">
                        <?php echo $item->description ?>
                    </p>


                    <!--reviews-->
                    <h4 class="text-primary" style="padding: 16px;">
                        Reviews
                    </h4>

                    <?php foreach ($item->review as $key => $review) { ?>

                    <p class="text-left" style="padding-left: 16px;padding-right: 16px; white-space:pre-line">
                            <?php echo "<b>" . (string) ($key+1) . "</b>" . " - " . $review ?>
                    </p>

                    <?php } ?>



                </div>
            </div>
        </div>
    </div>
</div>


<div class="dividerInitial"></div>
<div class="dividerInitial"></div>



<!-- jQuery first, then Tether, then Bootstrap JS. -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript"
        src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>

<script>

    function is_available ( tmp ) {
        var quantity = $("#q").val();

        if ( quantity <= <?php echo $item->stock; ?> )
            return true;
        else {
            alert("Stock is not enough.");
            return false;
        }
    }

</script>

</body>
</html>