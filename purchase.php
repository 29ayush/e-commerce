<?php


ob_start();

//if post request to purchase cart items is send then do this
if (isset($_POST['buy'])) {

    session_start();

    include "includes/db.php";
    include "oop.php";
    include "includes/functions.php";

    $cart_items = getcart($_POST['user_name']);
    $contact_no = $_POST['contact_no'];
    $address= $_POST['address'];
    $total= $_POST['total'];
    $user_name = $_SESSION['user_name'];


    //create a bill in the database
    $sql = "INSERT INTO bills (bill_total, bill_user_name, bill_contact_no, bill_shipping_address) ";
    $sql .= " VALUES ( $total, '$user_name', '$contact_no', '$address' ) ";

    $result = mysqli_query($connection, $sql);

    if(!$result) die("Bill creation failed");


    //get the bill id
    $bill_id = mysqli_insert_id($connection);


    //purchase each item in the cart
    //it will add items in the table purchased_items
    //and also reduces the stock
    foreach ( $cart_items as $cart_item )
        $cart_item->purchase($bill_id);


    //removes all the cart items from the Database
    deletecart($user_name);

}

//redirect user to home page
redirect("index.php");

?>