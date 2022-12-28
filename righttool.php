
<div id="righttool">
    <div class="right__line"></div>
    <h1 class="right_title">Обсуждаемые новости</h1>
    <div class="category_block">
        <?php
                require_once 'db.php';
                $limit = 5;
                $offset = 0;

                $all = all_post_comment($limit, $offset);
                while ($post = mysqli_fetch_assoc($all)) { ?>

            <?php $string = substr($post['title'], 0, 120); 
                $string = substr($post['title'], 0, strrpos($string, ' '));
                $category = get_category_by_id($post['category_id']); 
        ?>
        <div class="post_category">
            <div class="button__category">
                <a class="button__link" href="/passengers.php/?name=<?=$category?>&page=1"><?php echo $category;?></a>
            </div>
            <div class="text__category">
                <h6 class="title__category">
                    <a href="/post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title'];?></a>
                </h6>
                <div class="date__content">
                    <span class="icon_content">
                        <i class="fas fa-calendar-alt"></i>
                    </span>
                    <a class="slider__date" href="#"><?php echo rdate("d M Y", strtotime($post['date'])) ?></a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="line_margin">
        <div class="right__line"></div>
    </div>
    <div class="line_margin">
        <div class="right__line"></div>
    </div>
    
    <div class="photogalery">
        <a href="/gallery.php">
            <img class="photogalery_link" src="/images/photogalery.png" alt="photogallery">
        </a>
    </div>
    
    <div class="line_margin">
        <div class="right__line"></div>
    </div>
    <div class="line_margin">
        <div class="right__line"></div>
    </div>

    <div class="sticky_block">
        <div class="newspapers">
            <h1 class="right_title">Новостная рассылка</h1>
        </div>
        <div class="text_newspaper">
            <p>Подпишитесь на нашу новостную рассылку, чтобы быть в курсе событий.</p>
        </div>
        <div class="button_with_input">
            <form method="POST" action="#" class="subscribe-form">
                <input class="subscribe-form__input" type="email" placeholder=" E-mail">
                <a class="button_subs" href="#">
                    <span class="submit-text">Подписаться</span>
                </a>		       
            </form>
        </div>
        
        <div class="line_margin1">
            <div class="right__line"></div>
        </div>
        <div class="line_margin">
            <div class="right__line"></div>
        </div>
        
        
        <div class="most_viewed">
            <h1 class="right_title">Самые просматриваемые</h1>
            <?php 
            $limit = 5;
            $offset = 0;

            $all = all_post_views($limit, $offset);

            $number = 0;
            while ($post = mysqli_fetch_assoc($all)) { $number++;?>
                <?php $string = substr($post['title'], 0, 110); 
                $string = substr($post['title'], 0, strrpos($string, ' '));
                $category = get_category_by_id($post['category_id']); ?>


            <div class="content__right">
                <div class="button-right-content">
                    <p class="button__right"><?php echo $number?></p>
                </div>
                <div class="imagebox_right">
                    <a href="/post.php?id=<?php echo $post['id']; ?>" class="slider_link">
                        <img class="content__img" src="<?php echo $post['img'] ?>" alt="">
                    </a>
                    
                </div>
                <div class="text__content_right">
                    <h2 class="content__right_title">
                        <a href="/post.php?id=<?php echo $post['id']; ?>"><?php echo $string."… "; ?></a>
                    </h2>
                    <div class="date__content">
                        <span class="icon_content"><i class="fas fa-calendar-alt"></i></span>
                        <a class="slider__date" href="#"><?php echo rdate("d M Y", strtotime($post['date'])) ?></a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div> 