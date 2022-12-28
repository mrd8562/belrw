<div id="main">
    <div id="center">
        <div class="title__category_link">
            <h2>Категория: <?php echo $_GET['name']?></h2>
        </div>

        <?php
            $category_name = $_GET['name'];
            if ($category_name == "Пассажирам"){
                $cat_id = "1";
            }
            else if ($category_name == "Cтатьи"){
                $cat_id = "2";
            }
            else if ($category_name == "Грузоперевозчикам"){
                $cat_id = "3";
            }
            else if ($category_name == "Интервью"){
                $cat_id = "4";
            }
            else if ($category_name == "Репортажи"){
                $cat_id = "5";
            }
            else if ($category_name == "Корпоративные"){
                $cat_id = "6";
            }


            $page = isset($_GET['page']) ? $_GET['page']: 1;
            $limit = 4;
            $page = $page - 1;

            $offset = $limit * $page;


            $result = get_posts($limit, $offset, $cat_id);
            while ($post = mysqli_fetch_assoc($result)) { ?>



            <?php $category = get_category_by_id($post['category_id']); ?>
            <?php $user = get_user_by_id($post['user_id']); ?>

            <?php $string = substr($post['text'], 0, 450); 
            $string = substr($post['text'], 0, strrpos($string, ' '));
            

        ?>

            <div class="first__news">
                <div class="picture_news">
                    <div class="button-in-pic">
                        <a class="button__link" href="#"><?php echo $category; ?></a>
                    </div>
                    <div class="img__news">
                        <a href="/post.php?id=<?php echo $post['id']; ?>" class="img_link_post">
                            <img class="image__post" src="<?php echo $post['img'] ?>" alt="news">
                        </a>
                    </div>
                </div>
                <div class="title__text-news">
                    <h5 class="title_news">
                        <a href="/post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title'] ?></a>
                    </h5>
                    <div class="icon_bottom_news">
                        <span class="user-data">
                            <i class="fas fa-user"></i>
                            <a class="posted__author" href="#"><?php echo $user ?></a>
                        </span>
                        <span class="date__news">
                            <i class="fas fa-calendar-alt"></i>
                            <a class="posted__date" href="#"><?php echo rdate("d M Y", strtotime($post['date'])) ?></a>
                        </span>
                        <span class="comment__news">
                            <i class="fas fa-comment-alt"></i>
                            <a class="posted__comment" href="#"><?php echo $post['comments'] ?></a>
                        </span>
                    </div>
                    <h5 class="text__news-post"><?php echo $string."… "; ?></h5>
                    <div class="icon_with_text">
                        <i class="fas fa-tags"></i>
                        <a class="text_next" href="#"><?php echo $category; ?></a>
                    </div>
                    <div class="button__readmore">
                        <a class="button__read" href="/post.php?id=<?php echo $post['id']; ?>">Подробнее</a>
                    </div>
                </div>

                <div class="line_under">
                    <div class="line_u"></div>
                </div>
            </div>   

        <?php } ?>

        

        
    </div>

    <?php


        global $db;

        $sql = "SELECT * FROM `post` WHERE category_id = '$cat_id'";

        $res = mysqli_query($db, $sql);

        $count = mysqli_num_rows($res);


        
        $check = $offset + $limit;
        $count;

        if ($count > $check) {
            $next_page = $_GET['page'] + 1;
            echo '
            <div class="load__more">
        
                <i class="fas fa-sync-alt fa-spin-hover"></i>
                <a class="load_text" href="/passengers.php/?name='.$category_name.'&page='.$next_page.'">Загрузить больше</a>
        
            </div> ';
        } elseif ($count < $check) {
            echo '
            <div class="load__more_last">
        
                <i class="fas fa-sync-alt"></i>
                <a class="load_text_last" href="/passengers.php/?page='.$next_page.'">Загрузить больше</a>
        
            </div> ';
        }


    ?>

</div>