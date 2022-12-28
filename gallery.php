<?php session_start();?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Фотогалерея</title>
        
        <link href="libs/font/Roboto-Bold.ttf" rel="stylesheet">
        <link href="libs/font/Roboto-Regular.ttf" rel="stylesheet">
        <link rel="shortcut icon" href="/images/favicon.png" type="image/png">
        <link rel="stylesheet" href="/styles/main.css">
        <link rel="stylesheet" href="/libs/font/fontawesome/css/all.min.css">
        <link href="lightbox/css/lightbox.min.css" rel="stylesheet">
    </head>
<?php require 'db.php'; ?>
<?php require 'header.php'; ?>
        
<div id="wrap">
    <?php require 'header_content.php'; ?> 

    <!--Контент-->
    <div id="content">
        <div class="container">

            <div id="gallery">
                <?php
                $result = all_photo();
                while ($photo = mysqli_fetch_assoc($result)) { ?>
                <figure class="photo">
                    <a href="<?php echo $photo['url'];?>" data-lightbox="roadtrip" data-title="<?php echo $photo['description'];?>"><img src="<?php echo $photo['url_min'];?>" alt="<?php echo $photo['url_min'];?>" /></a>
                    <figcaption><?php echo $photo['description'];?></figcaption>
                </figure>

                <?php  }?>
               
            </div>
        </div>
    </div>
</div>  
      

<?php require 'footer.php'; ?>   
    
    
     

        
    
    
