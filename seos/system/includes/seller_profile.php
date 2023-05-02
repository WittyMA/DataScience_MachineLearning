<?php

// initializing a session
session_start();


// Checking if the user is already logged in, if no then redirect  to login page
if(!isset($_SESSION["id"]) && !isset($_SESSION['email'])){
    header("Location: login.php");
    exit();
}

include_once '../database/database_connection.php';

// seller
$seller_id = $_SESSION['id'];
$select_seller = "SELECT * FROM sellers WHERE id = :id;";
$stmt_seller = $connection->prepare($select_seller);
$stmt_seller->execute(['id' => $seller_id]);
$seller_details = $stmt_seller->fetch();

// products
$select_product = "SELECT * FROM products WHERE seller_id = :seller_id;";
$stmt_product = $connection->prepare($select_product);
$stmt_product->execute(['seller_id' => $seller_id]);
$products = $stmt_product->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../media/cartt.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller </title>
    <link rel="stylesheet" href="../css/profile.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="../css/register.css?v=<?= time(); ?>">
    <!--  -->
    <link rel="stylesheet" href="../fontawesome/css/all.css">
	<link rel="stylesheet" href="system/includes/main.php?v=<?= time();?>">
</head>
<body>

<nav class="profile-navbar">
    <div class="personal-info">
        <h2 class="name"><?= strtoupper($seller_details->first_name . ' ' . $seller_details->last_name) ?></h2>
        <p><?= $seller_details->phone;?></p>
        <p><?= $seller_details->email;?></p>
        <p>Seller</p>
    </div>

    <div class="logout">
        <a href="logout.php"> LOGOUT</a>
    </div>
</nav>

<main class="main-container">

    <section class="list">
                <h2>MY PRODUCTS</h2>
                <div class="list-header">
                    <h3>PRODUCT ID</h3>
                    <h3>PRODUCT NAME</h3>
                    <h3>PRODUCT PRICE</h3>
                    <h3>ACTION</h3>
                </div>
                <?php foreach ($products as $product) { ?>
                    <div class="list-item">
                        <span><?= strtoupper($product->product_id); ?></span>
                        <span><?= ucwords($product->product_name); ?></span>
                        <span>GHs <?= $product->product_price; ?></span>
                        <span>
                            <form action="delete_product.php" method="post">
                                <input type="hidden" name="product_id" value="<?= $product->product_id; ?>">
                                <button type="submit" name="delete" class="del-btn" ><i class="fas fa-trash-alt" ></i></button>
                            </form>
                        </span>
                    </div>                   
                <?php } ?>

            </section>

    <!--  -->
    <div class="product-form">
    <h2>UPLOAD PRODUCT </h2>
    <form action="upload_product.php" method="post" enctype="multipart/form-data" >

		<p class="form-label">Product ID:</p>
		<?php if (isset($_GET['product_id_error'])) { ?>
			<div class="form-item">
				<input type="text" name="product_id" id="" value = "<?= $_GET['product_id']; ?>" >
			</div>
			<p class="error_mg"><?= $_GET['product_id_error'] ?></p>
		<?php } elseif (isset($_GET['product_id'])) { ?>
			<div class="form-item">
				<input type="text" name="product_id" id="" value = "<?=$_GET['product_id'];?>" >
			</div>
		<?php } else { ?>
			<div class="form-item">
				<input type="text" name="product_id" id="" >
			</div>
		<?php } ?>


		<!--  -->


		<p class="form-label">Product Name:</p>
		<?php if (isset($_GET['product_name_error'])) { ?>
			<div class="form-item">
				
				<input type="text" name="product_name" id="" value = "<?= $_GET['product_name']; ?>" >
			</div>
			<p class="error_mg"><?= $_GET['product_name_error'] ?></p>
		<?php } elseif (isset($_GET['last_name'])) { ?>
			<div class="form-item">
				<input type="text" name="product_name" id="" value = "<?=$_GET['product_name'];?>" >
			</div>
		<?php } else { ?>
			<div class="form-item">
				<input type="text" name="product_name" id="" >
			</div>
		<?php } ?>
			




			<p class="form-label">Product Description:</p>
		<?php if (isset($_GET['description_error'])) { ?>
			<div class="form-item">
				<input type="text" name="description" id="" value = "<?= $_GET['description']; ?>" >
			</div>
			<p class="error_mg"><?= $_GET['description_error'] ?></p>
		<?php } elseif (isset($_GET['description'])) { ?>
			<div class="form-item">
				<input type="text" name="description" id="" value = "<?=$_GET['description'];?>" >
			</div>
		<?php } else { ?>
			<div class="form-item">
				<input type="text" name="description" id="" >
			</div>
		<?php } ?>


			<p class="form-label">Price:</p>
		<?php if (isset($_GET['price_error'])) { ?>
			<div class="form-item">
				<input type="text" name="price" id="" value = "<?= $_GET['price']; ?>" >
			</div>
			<p class="error_mg"><?= $_GET['price_error'] ?></p>
		<?php } elseif (isset($_GET['price'])) { ?>
			<div class="form-item">
				<input type="text" name="price" id="" value = "<?=$_GET['price'];?>" >
			</div>
		<?php } else { ?>
			<div class="form-item">
				<input type="text" name="price" id="" >
			</div>
		<?php } ?>



        <!--  -->
			<p class="form-label">Product Image:</p>
		<?php if (isset($_GET['product_image_error'])) { ?>
			<div class="form-item">
				<input type="file" name="product_image" id="" value = "<?= $_GET['product_image']; ?>" >
			</div>
			<p class="error_mg"><?= $_GET['product_image_error'] ?></p>
		<?php } elseif (isset($_GET['residence'])) { ?>
			<div class="form-item">
				<input type="file" name="product_image" id="" value = "<?=$_GET['product_image'];?>" >
			</div>
		<?php } else { ?>
			<div class="form-item">
				<input type="file" name="product_image" id="" >
			</div>
		<?php } ?>

			<div class="form-item">
				<input type="hidden" name="seller_id" value="<?= $_SESSION['id'] ?>"  id="" >
			




			<div class="form-item">
				<input type="submit" name="upload_product" value = "UPLOAD" >
			</div>
		</form>
    </div>

</main>











    <script src="../fontawesome/js/all.js"></script>
</body>
</html>