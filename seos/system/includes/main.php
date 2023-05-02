<?php 
include_once 'system/database/database_connection.php';

$product_select = "SELECT * FROM products,sellers WHERE products.seller_id = sellers.id;";
$stmt_product = $connection->prepare($product_select);
$stmt_product->execute();
$products = $stmt_product->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="system/media/cartt.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME SEOS</title>
    <link rel="stylesheet" href="system/css/index.css?v=<?= time();?>">
    <link rel="stylesheet" href="system/inludes/register.php?v=<?= time();?>">
    <link rel="stylesheet" href="system/inludes/login.php?v=<?= time();?>">
</head>
<body>
    <nav class="top-nav-bar">
        <div class="titlename">
            <a href="index.php"><h2>SEOS</h2></a>
        </div>


        <div class="search-bar">
            <form method="get" action="system/includes/search_page.php">
            <input class="search" type="text" name="search_item" placeholder="Search a product here...">
            <button type="submit" name="search" class="search-btn"> Search</button>
                
            </form>

        
        </div>

        <div class="form-bar">

        <a class="Home-btn" href="index.php">Home</a>
        <a class= "register-btn" href="system/includes/seller_profile.php">Account</a>
        <a class="login-btn" href="system/includes/logout.php">logout</a>
       

        </div>
    </nav>


    <!-- showcase -->

    <section class="show-case">
        <h2>LET'S ADVERTIZE YOUR PRODUCTS FOR YOU.</h2>
    </section>


    <!-- main ad page -->
    <section class="main-container" >


    <h1 class="recent-btn">Recently added products</h1>

    <main class="container">
        <?php foreach ($products as $product) { ?>
            <div class="product-card">
            <span>
                <img src="system/includes/images/<?= $product->product_image;?>" alt="product image">
            </span>
            <span>
                <h3><?= ucwords($product->product_name);?></h3>
                <p>GHs <?= ($product->product_price);?></p>
                <form action="system/includes/view_more_page.php" method="get">
                    <input type="hidden" name="product_id" value="<?= ucwords($product->product_id);?>">
                    <button type="submit" class="view-more-btn" >VIEW MORE</button>
                </form>
                <span>
                    <p>Seller's contact: <?= ucwords($product->phone);?></p>
                </span>
            </span>
        </div>
        <?php } ?>
        
    </main>








    </section>

<!--  -->
    <footer class="the_footer">
		<div class="left-text">
			<h2 class="list-header">Trending categories</h2>
			<ul>
				<li>clothes</li>
				<li>Perfumes</li>
				<li>Shoes</li>
				<li>Bags</li>
		
			</ul>
			</div>

			<div class="middle-text">
				<h2 class="list-header">Most Purschase product</h2>
				<ul>
					<li>converse shoes</li>
					<li>Strong Perfumes</li>
					<li>mini skirt</li>
					<li>B.sneakers</li>
			
				</ul>
				</div>

				<div class="right-text">
					<h2 class="list-header">HELP & SUPPORT</h2>
					<ul>
						<li>Contact us</li>
						<li>About us</li>
						<li>Private Policy</li>
						<li>Terms of use</li>

					</ul>

					<div class="soc-image">
						<img src="system/media/images/facebook.png" alt="facebook">
						<img src="system/media/images/instagram.png" alt="instagram">
						<img src="system/media/images/whatsapp.png" alt="whatsapp">
						<img src="system/media/images/twitter.png" alt="twitter">
					</div>
		</div>

		

    </footer>
    


    
</body>
</html> 
