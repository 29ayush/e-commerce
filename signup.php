<?php

include "includes/functions.php";

session_start();
ob_start();


if (is_logged_in()) {
    redirect("index.php");
}

//if sign-up form is sunmitted
if (isset($_POST['signup'])) {

    include 'includes/db.php';

    $user_name = escape($_POST['user_name']);


    //query to check whether this username is available or not
    $query = "SELECT COUNT(*) FROM users WHERE Username = '$user_name'";

    $result = mysqli_query($connection, $query);

    if (!$result)
        die("Query Failed");

    $row = mysqli_fetch_row($result);

    if ($row[0] >= 1)
        $errors = "Username is not available, try another one.";
    else {

        $name = escape($_POST['name']);
        $password = escape($_POST['user_password']);
        $email = escape($_POST['email']);


        //creating a hash of password with random salt
        $options = [
            'cost' => 12,
        ];

        $password = password_hash($password, PASSWORD_BCRYPT, $options);

        $query = "INSERT INTO users ";
        $query .= "( Username, Password, Email, Name ) ";
        $query .= "VALUES ('$user_name','$password','$email','$name')";

        $result = mysqli_query($connection, $query);

        if (!$result)
            die("Insertion of new user data failed!");
        else {
            $_SESSION['user_name'] = $user_name;
            redirect('index.php');
        }
    }
} ?>

<!DOCTYPE html>
<html lang="en">



<head>
    <title>Sign Up</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/align.css">
</head>



<body style="background-image: url('images/BeautifulBackgrounds/Elegant_Background-10.jpg')">


<!--navigation bar-->
<?php include "includes/nav.php"; ?>

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
                    <h4 class="display-4 text-center text-primary">Sign Up</h4>
                </div>

                <div class="card-block"
                     id="form"
                     style="display: none;">


                    <!--if JS is supported then form is shown-->
                    <script>
                        document.getElementById("form").style.display = 'block';
                    </script>


                    <!--if JS is support, then form is shown-->
                    <form action="" method="post">



                        <!--username-->
                        <div class="form-group">

                            <input id="username"
                                   name="user_name"
                                   class="form-control"
                                   placeholder="Username"
                                   autocomplete="on"
                                   required>
                            <small style="color: white;">alphabets, digits & underscore are allowed</small>

                        </div>

                        <!--name-->
                        <div class="form-group">

                            <input id="name"
                                   name="name"
                                   class="form-control"
                                   placeholder="Name"
                                   autocomplete="on"
                                   required>
                            <small style="color: white;">alphabets, digits & underscore are allowed</small>
                        </div>

                        <!--email-->
                        <div class="form-group">

                            <input type="email"
                                   id="email_id"
                                   name="email"
                                   class="form-control"
                                   placeholder="Email-id"
                                   autocomplete="on"
                                   minlength="3"
                                   maxlength="254"
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

                            <small style="color: white;">Password length must be between 8-20</small>

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

                            <input type="submit"
                                   class="btn btn-primary btn-block"
                                   name="signup"
                                   value="Sign Up">
                        </div>


                    </form>

                </div>
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