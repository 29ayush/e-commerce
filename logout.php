<?php

session_start();
ob_start();

include "includes/functions.php";

if (is_logged_in()) {

    session_unset();
    session_destroy();

}

redirect('index.php');

?>