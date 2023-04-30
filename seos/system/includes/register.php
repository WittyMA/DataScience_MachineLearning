<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/index.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="../css/register.css?v=<?= time(); ?>">
	
</head>
<body>
    <nav class="top-nav-bar">
        <div class="titlename">
            <h2>SEOS</h2>
        </div>


        <div class="search-bar">
            <form method="get" action="">
            <input class="search" type="text" placeholder="Search a product here...">
            <button type+"submit" name="search" class="search-btn"> Search</button>
                
            </form>

        
        </div>

        <div class="form-bar">
		<a class="Home-btn" href="../../index.php">Home</a>
        <a class= "register-btn" href="register.php">Register</a>
        <a class="login-btn" href="login.php">login</a>
		


        </div>
    </nav>





	<section class="reg-form">
		<h2>REGISTER</h2>
		<form action="register_config.php" method="post">

		<?php if (isset($_GET['fullname_error'])) { ?>
			<div class="form-item">
				<p class="form-label">Full Name:</p>
				<input type="text" name="full_name" id="" value = "<?= $_GET['fullname']; ?>" >
			</div>
			<p class="error_mg"><?= $_GET['fullname_error'] ?></p>
		<?php } elseif (isset($_GET['fullname'])) { ?>
			<div class="form-item">
				<p class="form-label">Full Name:</p>
				<input type="text" name="full_name" id="" value = "<?=$_GET['fullname'];?>" >
			</div>
		<?php } else { ?>
			<div class="form-item">
				<p class="form-label">Full Name:</p>
				<input type="text" name="full_name" id="" >
			</div>
		<?php } ?>
			




			<div class="form-item">
				<p class="form-label">Email (Institutional email):</p>
				<input type="text" name="email" id="" >
			</div>

			<div class="form-item">
				<p class="form-label">Password:</p>
				<input type="password" name="password" id="" >
			</div>

			<div class="form-item">
				<p class="form-label">Confirm Password:</p>
				<input type="password" name="confirm_password" id="" >
			</div>

			<div class="form-item">
				<input type="submit" name="register" value = "REGISTER" >
			</div>
		</form>
		<a href="login.php" class="form-link" >Aready have an account</a>
	</section>







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







