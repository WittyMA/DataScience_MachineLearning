<?php

include_once('../database/database_connection.php');



if (isset($_POST['delete'])) {

    $product_id = $_POST['product_id'];


    $delete_product = "DELETE FROM products WHERE product_id = :product_id;";
    $stmt_del = $connection->prepare($delete_product);



    if($stmt_del->execute(['product_id' => $product_id])){
        header("Location: seller_profile.php?success=Product deleted.");
        exit();
    } else {
        header("Location: seller_profile?error=Something went wrong. Please try again.");
        exit();
    }




}else {
    header("Location: seller_profile.php");
}