<?php session_start() ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Категория: <?php echo $_GET['name']?></title>
        
        <link href="libs/font/Roboto-Bold.ttf" rel="stylesheet">
        <link href="libs/font/Roboto-Regular.ttf" rel="stylesheet">
        <link rel="shortcut icon" href="/images/favicon.ico" type="image/png">
        <!-- <link rel="stylesheet" href="/styles/main.css"> -->
        <link rel="stylesheet" href="/styles/category_styles.css">
        <link rel="stylesheet" href="/libs/font/fontawesome/css/all.min.css">
    </head>
<?php require 'header.php'; ?>
<div id="wrap">
    <?php require 'header_content.php'; ?> 

    <!--Контент-->
    <div id="content">
    
        <?php require 'righttool.php'; ?> 

        <?php require 'passengers_content.php'; ?> 

    </div>
</div> 

<?php require 'footer.php'; ?>  
