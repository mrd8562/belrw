<?php session_start();?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Поиск: <?php echo $_GET['query'];?></title>
        
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

    <!--Контент-->
    <div id="content">
        <div class="search__box">
            <h2 class="title_ser">Похожие результаты:</h2>
            <?php 
            $search = $_GET['query'];
            $ser_get = mysqli_query($db, "SELECT * FROM `post` WHERE title LIKE '%$search%' ORDER BY id DESC LIMIT 12");
            while ($ser_get_wh = mysqli_fetch_assoc($ser_get)) {?>

            <div class="title__news_search">
                <div class="title_margin">
                    <h5 class="title_news">
                        <a href="/post.php?id=<?php echo $ser_get_wh['id'];?>"><?php echo $ser_get_wh['title'];?></a>
                    </h5>
                </div>

                <h5 class="text__news-post"><?php echo $ser_get_wh['text'];?></h5>
                <div class="button__readmore">
                    <a class="button__read" href="/post.php?id=<?php echo $ser_get_wh['id']; ?>">Подробнее</a>
                </div>
            </div>
        <?php  }?>
        </div>
    </div>
</div>  
      

<?php require 'footer.php'; ?>   
    
    
     

        
    
    
