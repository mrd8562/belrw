<?php session_start();?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Информационный портал Витебского отделения БелЖД</title>
        
        <link href="libs/font/Roboto-Bold.ttf" rel="stylesheet">
        <link href="libs/font/Roboto-Regular.ttf" rel="stylesheet">
        <link rel="shortcut icon" href="/images/favicon.ico" type="image/png">
        <link rel="stylesheet" href="/styles/main.css">
        <link rel="stylesheet" href="/libs/font/fontawesome/css/all.min.css">
    </head>
<?php require 'db.php'; ?>
<?php require 'header.php'; ?>
        
<div id="wrap">
    <?php require 'header_content.php'; ?> 

    <?php require 'slider.php'; ?>  

    <!--Контент-->
    <div id="content">
    
        <?php require 'righttool.php'; ?> 

        <?php require 'main.php'; ?> 

    </div>
</div>  

<div class="wrap-bot">
    <?php require 'video_player.php'; ?> 
</div>
        
<?php require 'on_footer.php'; ?>         

<?php require 'footer.php'; ?>   
    
     </body>
</html>   
     

        
    
    
