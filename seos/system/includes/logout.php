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
session_start();
session_unset();
session_destroy();


header("Location: ../../main.php");
exit();
