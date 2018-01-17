<?php

function is_availale($iid, $q){

    global $connection;

    $sql = "SELECT item_stock FROM items WHERE item_id=$iid";
    $result = mysqli_query($connection, $sql);

    if (!$result) die("Fetching quantity failed");

    $available_q = mysqli_fetch_row( $result )[0];

    return $q <= $available_q;
}

function addtocart($uid,$iid,$n)
{
    global $connection;

    $sql = "SELECT * FROM carthis WHERE username='$uid' AND iid=$iid";
    $result = mysqli_query($connection, $sql);

    if (!$result) die("Fetching Cart failed");
    if (mysqli_num_rows($result) > 0)
    {

        // if item is already there in the cart then replace the quantity
        $sql = "UPDATE carthis SET quantity = $n WHERE username='$uid' AND iid=$iid;";
        $result = mysqli_query($connection, $sql);

        if (!$result) die("Adding items failed");

    }
    else
    {
        $sql = "INSERT INTO carthis ( username, iid, quantity ) VALUES ( '$uid', $iid, $n )"; // update
        $result = mysqli_query($connection, $sql);

        if (!$result) die("Adding items failed");

    }


    return 1;

}

function getcart($uid)
{
    global $connection;

    $sql = "SELECT * FROM carthis WHERE username='$uid'";
    $result = mysqli_query($connection, $sql);

    if (!$result) die("Fetching Cart failed");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $item = item_fetch($row['iid']);
            $item_obj = new cart_item();
            $item_obj->set_var($row,$item);
            $item_array[] = $item_obj;
        }

    } else {
        $item_array = array(); //Empty Array
    }
    return $item_array;

}

function deletecart($uid)
{
    global $connection;

    $sql = "DELETE FROM carthis WHERE username='$uid'";
    $result = mysqli_query($connection, $sql);

    if (!$result) die("DELTE items failed");

    return 1;

}




function fetchall($n)
{
    global $connection;

    $sql = "SELECT * FROM items LIMIT $n";
    $result = mysqli_query($connection, $sql);

    if (!$result) die("Fetching items failed");

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $item_obj = new item();
            $item_obj->set_var($row);
            $item_array[] = $item_obj;
        }

    } else {
        $item_array = array(); //Empty Array
    }

    return $item_array;

}

function item_fetch($id)
{
    global $connection;

    $sql_id = "SELECT * FROM items WHERE item_id=$id";
    $result = mysqli_query($connection, $sql_id);

    if (!$result) die("Fetching item failed");

    $item_obj = new full_item();

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $item_obj->set_var($row);


        //fetch reviews
        $sql_id = "SELECT review_text FROM reviews WHERE review_item_id = $id";
        $result = mysqli_query($connection, $sql_id);

        if (!$result) die("Fetching item failed");

        $review_array = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $review_array[] = $row['review_text'];
        }

        $item_obj->add_reviews($review_array);

    }

    return $item_obj;

}


function is_logged_in()
{
    return isset($_SESSION['user_name']);
}


//to filter out bad things from input string
function escape($str)
{
    global $connection;

    $str = strip_tags($str, '<br>');
    $str = mysqli_real_escape_string($connection, $str);
    $str = trim($str);

    return $str;
}

/*redirect to given site*/
function redirect($url)
{
    header('Location: ' . $url);
    ob_end_flush();
    die();
}


function checkLength($str, $errOutput, $input_name, $min, $max)
{

    if (!(strlen($str) <= $max && strlen($str) >= $min)) {
        $errOutput .= $input_name . '\'s length must be between ' . $min . ' and ' . $max . '.';
    }

    return $errOutput;
}

function checkPassword($password, $errOutput, $regex, $constrain)
{
    if (!preg_match($regex, $password)) {
        $errOutput .= "Password can have " . $constrain . " only. ";
    }

    return $errOutput;
}


function postExists($post_id)
{
    global $connection;

    $query = "SELECT COUNT(*) FROM posts WHERE post_id = $post_id AND allowed = 1";
    $result = mysqli_query($connection, $query);

    if (!$result)
        die("Query failed.");

    //if post exists
    if ($count = mysqli_fetch_row($result)[0] == 1)
        return true;
    else {
        echo $count;
        return false;
    }
}


?>