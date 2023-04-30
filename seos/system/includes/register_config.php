<?php 

include_once '../database/database_connection.php';


if (isset($_POST['register'])) {
    
    $fullname = trim(strip_tags(htmlspecialchars($_POST['full_name'])));
    $email = trim(strip_tags(($_POST['email'])));
    $password = trim(strip_tags(($_POST['password'])));
    $confirm_password = trim(strip_tags(($_POST['confirm_password'])));


    $seller_data = 'fullname=' . $fullname . '&email=' . $email;

    if (empty($fullname)) {
        header("Location: register.php?fullname_error=Enter your name.&$seller_data");
        exit();
    }

    if (empty($email)) {
        header("Location: register.php?email_error=Enter your email.&$seller_data");
        exit();
    }

    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        header("Location: register.php?email_error=Invalid email.&$seller_data");
        exit();
    }

    $select_email = "SELECT * FROM sellers WHERE email = :email;";
    $email_stmt_select = $connection->prepare($select_email);
    $email_stmt_select->execute(['email' => $email]);

    if ($email_stmt_select->rowCount() > 0 ) {
        header("Location: register.php?email_error=email is taken.&$seller_data");
        exit();
    }




    if (empty($password)) {
        header("Location: register.php?password_error=Enter your password.&$seller_data");
        exit();
    }

    if (strlen($password) < 8 ) {
        header("Location: register.php?password_error=Passowrd should be more than 8 characters.&$seller_data");
        exit();
    }

    if ($password != $confirm_password) {
        header("Location: register.php?password_error=Password do not match.&$seller_data");
        exit();
    }


    
    $hash_password = password_hash($password,PASSWORD_DEFAULT);


    $insert_query = "INSERT INTO `sellers`( `email`, `password`, `full_name`) VALUES (:email,:pass_word,:full_name);";
    $insert_stmt = $connection->prepare($insert_query);
    
    if ($insert_stmt->execute(['email' => $email, 'pass_word' => $hash_password, 'full_name' => $fullname])) {
        header("Location: register.php?success=Seller registered");
        exit();
    } else {
        header("Location: register.php?error=something went wrong, please try again");
        exit();
    }





} else {
    header("Location: register.php");
    exit();
}