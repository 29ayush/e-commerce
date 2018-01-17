<?php

/**
 * Created by PhpStorm.
 * User: suman
 * Date: 30/10/17
 * Time: 9:13 PM
 */

class cart_item
{
    var $uid;
    var $iid;
    var $name;
    var $quantity;
    var $up;
    var $ufp;

    function set_var($row, $item)
    {
        $this->uid = $row["username"];
        $this->iid = $row["iid"];
        $this->quantity = $row["quantity"];
        $this->name = $item->name;
        $this->up = $item->price;
        $this->ufp = ($item->price * (100 - $item->discount)) / 100;
    }

    function purchase($bill_id)
    {

        global $connection;

        $sql = "INSERT INTO purchased_items (purchased_item_source_id, purchased_item_quantity, purchased_item_bill_id) VALUES ";
        $sql .= "( $this->iid, $this->quantity, $bill_id )";

        $result = mysqli_query($connection, $sql);

        if (!result) echo "Failed to insert item in purchased items table.";

        $sql = "UPDATE items SET item_stock = item_stock - $this->quantity WHERE item_id=$this->iid";
        $result = mysqli_query($connection, $sql);

        if (!result) echo "Stock updation failed";

    }
}


//class that will be used to store all the details
//of the item
class full_item
{
    var $id;
    var $name;
    var $type;
    var $price;
    var $discount;
    var $stock;
    var $EMI;
    var $description;
    var $picture_url;
    var $rating;
    var $review = array();

    function set_var($row)
    {
        $this->id = $row["item_id"];
        $this->name = $row["item_name"];
        $this->type = $row["item_type"];
        $this->price = $row["item_price"];
        $this->discount = $row["item_discount"];
        $this->stock = $row["item_stock"];
        $this->EMI = $row["item_EMI"];
        $this->description = $row["item_description"];
        $this->picture_url = $row["item_picture_url"];
        $this->rating = $row["item_rating"];
    }

    function add_reviews($reviews)
    {
        $this->review = $reviews;
    }

}

//stores only important information of the item
class item
{
    var $id;
    var $stock;
    var $name;
    var $price;
    var $discount;
    var $picture_url;
    var $rating;

    function set_var($row)
    {
        $this->id = $row["item_id"];
        $this->name = $row["item_name"];
        $this->price = $row["item_price"];
        $this->discount = $row["item_discount"];
        $this->picture_url = $row["item_picture_url"];
        $this->rating = $row["item_rating"];
        $this->stock = $row["item_stock"];
    }
}


?>