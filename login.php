<?php

include 'includes/functions.php';

ob_start();
session_start();


if ( is_logged_in() ) {
    redirect("index.php");
}


//if login form is submitted
if (isset($_POST['login'])) {

    include 'includes/db.php';

    $user_name = escape($_POST['user_name']);
    $password = escape($_POST['user_password']);
    $query = "SELECT * FROM users ";
    $query .= "WHERE Username = '$user_name' ";

    $result = mysqli_query($connection, $query);

    if (!$result)
        die("query failed.");

    if (mysqli_num_rows($result) === 0)
        $errors = "User Doesn't Exist ";
    else {

        $row = mysqli_fetch_assoc($result);

        if ( password_verify( $password , $row['Password'] ) ) {

            $_SESSION['user_name'] = $row['Username'];

            redirect('index.php');

        } else {
            $errors = "Please Check Your Password. ";
        }
    }
} ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/align.css">
</head>

<body style="background-image: url('images/BeautifulBackgrounds/Elegant_Background-10.jpg')">

<!--navigation bar-->
<?php include "includes/nav.php" ; ?>

<div class="dividerInitial"></div>
<div class="dividerInitial"></div>

<div class="container" style="background-color: transparent">
    <div class="row justify-content-center" style="background-color: transparent">
        <div class="col-12 col-sm-10 col-md-8 col-lg-7 col-xl-6" style="background-color: transparent">
            <div class="card" style="background-color: rgba(0,0,0,0.7)">

                <noscript style="padding: 32px;">

                    <p class="text-center text-primary">
                        Hey, how old is your browser? It doesn't support JavaScript!
                    </p>
                    <p class="text-primary text-center">
                        Please upgrade your browser.
                    </p>

                </noscript>


                <div class="card-header" style="background-color: transparent">
                    <h4 class="display-4 text-center text-primary">Login</h4>
                </div>


                <!--if JavaScript is on, only then it will show sign-up form-->
                <div class="card-block"
                     id="form"
                     style="display: none;">

                    <!--if JS is supported then form is shown-->
                    <script>
                        document.getElementById("form").style.display = 'block';
                    </script>


                    <!-- Login form-->
                    <form action="" method="post">




                        <!--email-->
                        <div class="form-group">
                            <input type="text"
                                   id="username"
                                   name="user_name"
                                   class="form-control"
                                   autocomplete="on"
                                   placeholder="Username"
                                   autofocus
                                   required>

                        </div>
                        <!--password-->
                        <div class="form-group">

                            <input type="password"
                                   id="password"
                                   name="user_password"
                                   class="form-control"
                                   placeholder="Password"
                                   minlength="8"
                                   maxlength="20"
                                   required>
                        </div>



                        <!--if there is an error show alert-->
                        <div id="messageContainer"
                             class="form-group" <?php if (!isset($errors)) echo "style=\"display: none;\""; ?> >
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="message">

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                                <!--content will be added dynamically-->
                                <?php
                                if (isset($errors)) echo $errors;
                                ?>

                            </div>
                        </div>



                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" name="login" value="Login">
                        </div>

                    </form>

                </div>
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