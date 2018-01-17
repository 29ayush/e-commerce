<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top" id="nav-bar">

    <!--    toggle button-->
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!--logo-->
    <a href="index.php" class="navbar-brand">
        <span style="padding-left: 4px;">E-Commerce</span>
    </a>

    <!--    left-->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
        </ul>


        <!--nav right part-->
        <ul class="navbar-nav navbar-right">

            <?php

            /* if user is logged in then logout and profile will be shown in navbar else login option
            will be shown */

            if (is_logged_in()) { ?>

                <li class="nav-item">
                    <a class="nav-link" href="cart.php">
                        <i class="fa fa-shopping-cart" style="font-size: 22px;" aria-hidden="true"></i>

                        <!--no of items in the cart-->

                        <?php

                        $user_name = $_SESSION['user_name'];
                        $sql = "SELECT COUNT(username) FROM carthis WHERE username='$user_name'";
                        $result = mysqli_query($connection, $sql);

                        if (!$result) die("navbar db error." . mysqli_error($connection));

                        echo mysqli_fetch_row($result)[0];

                        ?>
                    </a>
                </li>

                <li class="nav-item dropdown active">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-circle" aria-hidden="true"
                           style="font-size: 20px; position: relative; top: 3px;"></i>

                        <span><?php echo $_SESSION['user_name'] ?></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                        <a class="dropdown-item" href="logout.php">
                            <i class="fa fa-sign-out" aria-hidden="true"
                               style="font-size: 1rem;"></i>
                            Logout
                        </a>

                        <a class="dropdown-item" href="purchase_history.php">
                            <i class="fa fa-history" aria-hidden="true"
                               style="font-size: 1rem;">
                            </i>
                            Bills

                        </a>

                    </div>

                </li>


            <?php } else { ?>

                <!--Login-->
                <li class="nav-item">
                    <a class="nav-link" href="login.php">
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                        <span>Login</span>
                    </a>
                </li>


                <!--SignUp-->
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                        <span>Sign Up</span>
                    </a>
                </li>

            <?php } ?>
        </ul>


    </div>
</nav>