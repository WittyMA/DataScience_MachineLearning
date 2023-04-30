<?php
session_start();

include_once '../database/database_connection.php';


if (isset($_POST['login'])) {
    
    
    $email = trim(strip_tags(($_POST['email'])));
    $password = trim(strip_tags(($_POST['password'])));




   $select_query = "SELECT * FROM sellers WHERE email = :email;";
   $seller_stmt = $connection->prepare($select_query);
   $seller_stmt->execute(['email' => $email]);

   if ($seller_stmt->rowCount() > 0) {
    $seler_data = $seller_stmt->fetch();

    if (!password_verify($password, $seler_data->password)) {
        header("Location: login.php");
        exit();
    }

    session_start();
    
    $_SESSION['full_name'] = $seler_data->full_name;
    $_SESSION['password'] = $seler_data->email;
    


    header("Location: ../../index.php");
    exit();






   }






} else {
    header("Location: login.php");
    exit();
}