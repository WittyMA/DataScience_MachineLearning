<?php 

if (!isset($_GET['product_id'])) {
    header("Location: ../../index.php");
    exit();
}

include_once '../database/database_connection.php';


$product_id = $_GET['product_id'];
$select_product = "SELECT * FROM products,sellers WHERE products.seller_id = sellers.id AND product_id = :product_id;";
$stmt_product = $connection->prepare($select_product);
$stmt_product->execute(['product_id' => $product_id]);
$product = $stmt_product->fetch();

include_once 'header.php';
?>





<main class="container">
        <div class="product-card">
            <span>
                <img src="images/<?= $product->product_image;?>" alt="product image">
            </span>
            <span>
                <h3><?= ucwords($product->product_name);?></h3>
                <p>GHs <?= ($product->product_price);?></p>
            </span>
            <span class="product-desc">
                Description:<p> <?= ucwords($product->product_description);?></p>
            </span>
            <span>
                <p>Seller's contact: <?= ucwords($product->phone);?></p>
            </span>
            <span>
                <p>Seller's email: <?= ucwords($product->email);?></p>
            </span>
            <span>
                <p>Seller's residence: <?= ucwords($product->residence);?></p>
            </span>
            <span>
                <p>Seller's contact: <?= ucwords($product->phone);?></p>
            </span>
        </div>
    
        
    </main>


















<?php 

include_once 'footer.php';

?>