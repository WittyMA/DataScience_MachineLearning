<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="system/includes/main.php?v=<?= time();?>">
</head>
<body>
    
</body>
</html>



<?php


include_once('../database/database_connection.php');




if (isset($_POST['upload_product'])) {
    
    $product_id = trim(strip_tags($_POST['product_id']));
    $product_name = trim(strip_tags($_POST['product_name']));
    $description = trim(strip_tags($_POST['description']));
    $product_price = doubleval(trim(strip_tags($_POST['price'])));
    $seller_id = (trim(strip_tags($_POST['seller_id'])));



    $picture_name = $_FILES['product_image']['name'];
    $picture_temp_name = $_FILES['product_image']['tmp_name'];
    $picture_size = $_FILES['product_image']['size'];
    $picture_type = $_FILES['product_image']['type'];



    // $user_data = 'course_id=' . $course_id . '&module_title=' . $module_title . '&module_id=' . $module_id;


 


    //  if (empty($module_id)) {
    //     header("Location: ../portal/courses.php?module_id_error=Module Code is required.&$user_data");
    //     exit();
    // }


    // if (empty($module_title)) {
    //     header("Location: ../portal/courses.php?module_title_error=Module title is required.&$user_data");
    //     exit();
    // }



    // if (empty($course_id)) {
    //     header("Location: ../portal/courses.php?course_id_error=Course is required.&$user_data");
    //     exit();        
    // }



    $allowed_ext = ['jpeg','jpg','png'];
    $picture_ext = explode('.',$picture_name);
    $picture_ext = strtolower(end($picture_ext));



    if (!(in_array($picture_ext,$allowed_ext))) {
        header("Location: ../portal/instructors.php?picture_error=Picture type not allowed.");
        exit();
    }




    $new_picture_name = $product_id . "." . $picture_ext;
    $picture_folder = 'images/' . $new_picture_name;
    move_uploaded_file($_FILES['product_image']['tmp_name'],$picture_folder);

    


    $insert_query = "INSERT INTO `products`(`product_id`, `product_name`, `product_description`, `product_price`, `seller_id`, `product_image`) VALUES (:product_id,:product_name,:product_description,:product_price,:seller_id,:product_image);";
    $stmt = $connection->prepare($insert_query);
    

    if($stmt->execute(['product_id' => $product_id, 'product_name' => $product_name, 'product_description' => $description, 'product_price' => $product_price, 'seller_id' => $seller_id, 'product_image' => $new_picture_name ])){
        header("Location: seller_profile.php?success=Product added");
        exit();
    } else {
        header("Location: seller_profile.php?error=Something went wrong. Please try again");
        exit();
    }









} else {
    header("Location: seller_profile.php");
    exit();
}

