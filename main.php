<div id="main">
    <div id="center">
        <?php 
        $limit = 1;
            $offset = 0;

            $all = all_post_comment($limit, $offset);
            while ($post = mysqli_fetch_assoc($all)) { ?>

        <?php $string = substr($post['text'], 0, 450); 
            $string = substr($post['text'], 0, strrpos($string, ' '));
            $category = get_category_by_id($post['category_id']);
            $user = get_user_by_id($post['user_id']);
        ?>
        <div class="first__news">
            <div class="picture_news">
                <div class="button-in-pic">
                    <a class="button__link" href="/passengers.php/?name=<?=$category?>&page=1"><?=$category?></a>
                </div>
                <div class="img__news">
                    <a href="/post.php?id=<?php echo $post['id']; ?>" class="img_link_post">
                        <img class="image__post" src="<?=$post['img']?>" alt="news">
                    </a>
                </div>
            </div>
            <div class="title__text-news">
                <h5 class="title_news">
                    <a href="/post.php?id=<?php echo $post['id']; ?>"><?=$post['title']?></a>
                </h5>
                <div class="icon_bottom_news">
                    <span class="user-data">
                        <i class="fas fa-user"></i>
                        <a class="posted__author" href="#"><?=$user?></a>
                    </span>
                    <span class="date__news">
                        <i class="fas fa-calendar-alt"></i>
                        <a class="posted__date" href="#"><?php echo rdate("d M Y", strtotime($post['date'])) ?></a>
                    </span>
                    <span class="comment__news">
                        <i class="fas fa-comment-alt"></i>
                        <a class="posted__comment" href="#"><?=$post['comments']?></a>
                    </span>
                </div>
                <h5 class="text__news-post"><?php echo $string .". "; ?></h5>
                <div class="button__readmore">
                    <a class="button__read" href="/post.php?id=<?php echo $post['id']; ?>">Подробнее</a>
                </div>
            </div>
        </div>  
    <?php } ?>
        <div class="block__news">
        <?php 
        $limit = 3;
            $offset = 0;

            $all = all_post_comment($limit, $offset);
            while ($post = mysqli_fetch_assoc($all)) { ?>

            <?php $string = substr($post['text'], 0, 450); 
            $string = substr($post['text'], 0, strrpos($string, ' '));
            $category = get_category_by_id($post['category_id']);
        ?>

            <div class="picture_news_mini">
                <div class="picture__news">
                    <div class="button-in-picture">
                        <a class="button__link" href="/passengers.php/?name=<?=$category?>&page=1"><?=$category?></a>
                    </div>
                    <div class="img__news">
                        <a href="/post.php?id=<?php echo $post['id']; ?>" class="img_link_post">
                            <img class="image__block" src="<?=$post['img']?>" alt="news">
                        </a>
                    </div>
                </div>
                <div class="title__text-block">
                    <h6 class="title-block">
                        <a href="/post.php?id=<?php echo $post['id']; ?>"><?=$post['title']?></a>
                    </h6>
                    <div class="date_block">
                        <span class="date_icon">
                            <i class="fas fa-calendar-alt"></i>
                            <a class="posted__date" href="#"><?php echo rdate("d M Y", strtotime($post['date'])) ?></a>
                        </span>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="line_under">
            <div class="line_u"></div>
        </div>
        <div class="line_under">
            <div class="line_u"></div>
        </div>

        <div class="title__newest">
            <div class="listing__posts">

                <?php 
                $limit = 6;
                    $offset = 0;

                    $all = all_post($limit, $offset);
                    while ($post = mysqli_fetch_assoc($all)) { ?>

                    <?php $string = substr($post['title'], 0, 110); 
                    $category = get_category_by_id($post['category_id']);
                ?>

                <div class="listing_post_left">
                    <div class="listing_content">
                        <h6 class="listing_post_title">
                            <a href="/post.php?id=<?php echo $post['id']; ?>"><?=$string?>...</a>
                        </h6>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
        <div class="line_under">
            <div class="line_u"></div>
        </div>
        <div class="line_under">
            <div class="line_u"></div>
        </div>

        <div class="news_block__with-photo">
            <?php 
            $limit = 1;
            $offset = 0;

            $all = all_post($limit, $offset);
            while ($post = mysqli_fetch_assoc($all)) { ?>

            <?php $string = substr($post['title'], 0, 120); 
            $category = get_category_by_id($post['category_id']);
            ?>  
            <div class="picture__news_two">
                <div class="button-in-picture-two">
                    <a class="button__link" href="/passengers.php/?name=<?=$category?>&page=1"><?=$category?></a>
                </div>

                <div class="text__in_pic">
                    <p class="date__text">
                        <a href="#"><?php echo rdate("d M Y", strtotime($post['date']))?></a>
                    </p>
                    <h6 class="title_block-in_pic">
                        <a href="/post.php?id=<?php echo $post['id']; ?>"><?=$string?></a>
                    </h6>
                </div>
                <div class="block_image">
                    <a href="/post.php?id=<?php echo $post['id']; ?>" class="img_link_post_two">
                        <img class="image__block_two" src="<?=$post['img']?>" alt="news">
                    </a>
                </div>
            </div>

            <?php } ?>
            <div class="list_news__title">

            <?php 
            $limit = 4;
            $offset = 0;

            $all = all_post($limit, $offset);
            while ($post = mysqli_fetch_assoc($all)) { ?>

            <?php $string = substr($post['title'], 0, 180); 
            $category = get_category_by_id($post['category_id']);
            ?>  
                <div class="post_category_t">
                    <div class="button__category">
                        <a class="button__link" href="/passengers.php/?name=<?=$category?>&page=1"><?=$category?></a>
                    </div>
                    <div class="text__category">
                        <h6 class="title__category">
                            <a href="/post.php?id=<?php echo $post['id']; ?>"><?=$string?>...</a>
                        </h6>
                        <div class="date__content">
                            <span class="icon_content">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                            <a class="slider__date" href="#"><?php echo rdate("d M Y", strtotime($post['date']))?></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="line_under">
            <div class="line_u"></div>
        </div>
        <div class="line_under1">
            <div class="line_u"></div>
        </div>

        <?php 
        $limit = 1;
            $offset = 1;

            $all = all_post_comment($limit, $offset);
            while ($post = mysqli_fetch_assoc($all)) { ?>

        <?php $string = substr($post['text'], 0, 1000); 
            $string = substr($post['text'], 0, strrpos($string, '.'));
            $category = get_category_by_id($post['category_id']);
            $user = get_user_by_id($post['user_id']);
        ?>
        <div class="first__news">
            <div class="picture_news">
                <div class="button-in-pic">
                    <a class="button__link" href="/passengers.php/?name=<?=$category?>&page=1"><?=$category?></a>
                </div>
                <div class="img__news">
                    <a href="/post.php?id=<?php echo $post['id']; ?>" class="img_link_post">
                        <img class="image__post" src="<?=$post['img']?>" alt="news">
                    </a>
                </div>
            </div>
            <div class="title__text-news">
                <h5 class="title_news">
                    <a href="/post.php?id=<?php echo $post['id']; ?>"><?=$post['title']?></a>
                </h5>
                <div class="icon_bottom_news">
                    <span class="user-data">
                        <i class="fas fa-user"></i>
                        <a class="posted__author" href="#"><?=$user?></a>
                    </span>
                    <span class="date__news">
                        <i class="fas fa-calendar-alt"></i>
                        <a class="posted__date" href="#"><?php echo rdate("d M Y", strtotime($post['date'])) ?></a>
                    </span>
                    <span class="comment__news">
                        <i class="fas fa-comment-alt"></i>
                        <a class="posted__comment" href="#"><?=$post['comments']?></a>
                    </span>
                </div>
                <h5 class="text__news-post"><?php echo $string.". "; ?></h5>
                <div class="button__readmore">
                    <a class="button__read" href="/post.php?id=<?php echo $post['id']; ?>">Подробнее</a>
                </div>
            </div>
        </div>  
    <?php } ?>
    </div>    
</div>