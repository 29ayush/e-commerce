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


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
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


<div class="container-fluid">
    <div class="row justify-content-around">

        <?php

        //fetch 15 available items from the database
        //it returns list of item object
        $itemsList = fetchall(15);

        //display each item
        //One card per item
        foreach ($itemsList as $item) { ?>

            <div class="card text-center" style="width: 20rem; margin-bottom: 16px;">
                <div style="width: 200px; margin: 16px auto;">
                    <img class="card-img-top" src="images/<?php echo $item->picture_url; ?>"
                         style="height: auto;width: 200px;"
                         alt="item image">
                </div>

                <div class="card-block">

                    <h4 class="card-title">
                        <?php echo $item->name; ?>
                    </h4>

                    <p class="card-text text-muted text-center" style="margin-bottom:0">
                        Price: <strike><?php echo $item->price; ?></strike> Rs.</p>

                    <p class="card-text text-muted text-center" style="margin-bottom:0">
                        Discount : <?php echo $item->discount; ?>%</p>

                    <p class="card-text text-danger text-center" style="margin-bottom:0">Final Price
                        : <b><?php echo ($item->price * (100 - $item->discount)) / 100; ?></b> Rs.</p>


                    <p>Rating : <?php echo $item->rating; ?></p>

                    <a href="item.php?id=<?php echo $item->id; ?>">
                        <p class="text-primary">See Details</p>
                    </a>

                </div>

            </div>

        <?php } ?>


    </div>
</div>


<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript"
        src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>


</body>
</html>