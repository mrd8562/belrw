<div id="wrap">
    <div class="line_under">
        <div class="line_u"></div>
    </div>


    <div class="block__news_under" id="category">
        <div class="block__news_under">
            <div class="block__news">
                <?php 
                $limit = 4;
                    $offset = 1;

                    $all = all_post($limit, $offset);
                    while ($post = mysqli_fetch_assoc($all)) { ?>

                <?php $string = substr($post['title'], 0, 1000); 
                    $string = substr($post['title'], 0, strrpos($string, '.'));
                    $category = get_category_by_id($post['category_id']);
                    $user = get_user_by_id($post['user_id']);
                ?>
                <div class="picture_news_under">
                    <div class="picture__news">
                        <div class="button-in-picture_bottom">
                            <a class="button__link" href="/passengers.php/?name=<?=$category?>&page=1"><?=$category?></a>
                        </div>
                        <div class="img__news">
                            <a href="/post.php?id=<?php echo $post['id']; ?>" class="img_link_post">
                                <img class="image__block_new" src="<?=$post['img']?>" alt="news">
                            </a>
                        </div>
                    </div>
                    <div class="title__text-block">
                        <h6 class="title-block">
                            <a href="/post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title'] ?></a>
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
            </div>
        </div>



        <div class="block__news_under">
            <div class="block__news">
                <?php 
                $limit = 4;
                    $offset = 4;

                    $all = all_post($limit, $offset);
                    while ($post = mysqli_fetch_assoc($all)) { ?>

                <?php $string = substr($post['title'], 0, 1000); 
                    $string = substr($post['title'], 0, strrpos($string, '.'));
                    $category = get_category_by_id($post['category_id']);
                    $user = get_user_by_id($post['user_id']);
                ?>
                <div class="picture_news_under">
                    <div class="picture__news">
                        <div class="button-in-picture_bottom">
                            <a class="button__link" href="/passengers.php/?name=<?=$category?>&page=1"><?=$category?></a>
                        </div>
                        <div class="img__news">
                            <a href="/post.php?id=<?php echo $post['id']; ?>" class="img_link_post">
                                <img class="image__block_new" src="<?=$post['img']?>" alt="news">
                            </a>
                        </div>
                    </div>
                    <div class="title__text-block">
                        <h6 class="title-block">
                            <a href="/post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title'] ?></a>
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
        </div> 
    

    <div class="line_under">
        <div class="line_u"></div>
    </div>
    <div class="line_under1">
        <div class="line_u"></div>
    </div>

    <div class="category__titles">

        <div class="category__block">
            <div class="block_picture_title">
                <h1 class="title_block">
                    <a href="/passengers.php/?name=Пассажирам&page=1">Пассажирам</a>
                </h1>
                <div class="line_h1"></div>
                <?php 
                require_once 'db.php';
                $limit = 1;
                $offset = 0;
                $id_catalog = 1;

                $all = get_post($limit, $offset, $id_catalog);
                while ($post = mysqli_fetch_assoc($all)) { ?>

                <?php 
                    $str = substr($post['title'], 0, 1000); 
                    $str = substr($post['title'], 0, strrpos($string, ' '));
                ?>
                <div class="content_picture">
                    <div class="imagebox_block">
                        <div class="imagebbox">
                            <a href="/post.php?id=<?php echo $post['id']; ?>" class="slider_link">
                                <img class="content__images" src="<?php echo $post['img']?>" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="text__content_category">
                        <h2 class="content__right_title">
                            <a href="/post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']?></a>
                        </h2>
                        <div class="date__content">
                            <span class="icon_content">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                            <a class="slider__date" href="#"><?php echo rdate("d M Y", strtotime($post['date'])) ?></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
                <?php 
                $limit = 3;
                $offset = 1;

                $all = get_post($limit, $offset, $id_catalog);
                while ($post = mysqli_fetch_assoc($all)) { ?>

                <?php 
                    $str = substr($post['title'], 0, 1000); 
                    $str = substr($post['title'], 0, strrpos($string, ' '));
                ?>
                <div class="title_without_pic">
                    <div class="line_gray"></div>
                    <div class="text_content">
                        <h2 class="content__right_title">
                            <a href="/post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']?></a>
                        </h2>
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

            <div class="block_picture_title">
                <h1 class="title_block">
                    <a href="/passengers.php/?name=Cтатьи&page=1">Cтатьи</a>
                </h1>
                <div class="line_h1"></div>

                <?php 
                $limit = 1;
                $offset = 0;
                $id_catalog = 2;

                $all = get_post($limit, $offset, $id_catalog);
                while ($post = mysqli_fetch_assoc($all)) { ?>

                <?php 
                    $str = substr($post['title'], 0, 1000); 
                    $str = substr($post['title'], 0, strrpos($string, ' '));
                ?>

                <div class="content_picture">
                    <div class="imagebox_block">
                        <a href="/post.php?id=<?php echo $post['id']; ?>" class="slider_link">
                            <img class="content__images" src="<?php echo $post['img']?>" alt="">
                        </a>
                    </div>
                    <div class="text__content_category">
                        <h2 class="content__right_title">
                            <a href="/post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']?></a>
                        </h2>
                        <div class="date__content">
                            <span class="icon_content">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                            <a class="slider__date" href="#"><?php echo rdate("d M Y", strtotime($post['date'])) ?></a>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <?php 
                $limit = 4;
                $offset = 1;

                $all = get_post($limit, $offset, $id_catalog);
                while ($post = mysqli_fetch_assoc($all)) { ?>

                <?php 
                    $str = substr($post['title'], 0, 1000); 
                    $str = substr($post['title'], 0, strrpos($string, ' '));
                ?>

                <div class="title_without_pic">
                    <div class="line_gray"></div>
                    <div class="text_content">
                        <h2 class="content__right_title">
                            <a href="/post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']?></a>
                        </h2>
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
            
            <div class="block_picture_title">
                <h1 class="title_block">
                    <a href="/passengers.php/?name=Интервью&page=1">Интервью</a>
                </h1>
                <div class="line_h1"></div>

                <?php 
                $limit = 1;
                $offset = 0;
                $id_catalog = 4;

                $all = get_post($limit, $offset, $id_catalog);
                while ($post = mysqli_fetch_assoc($all)) { ?>

                <?php 
                    $str = substr($post['title'], 0, 1000); 
                    $str = substr($post['title'], 0, strrpos($string, ' '));
                ?>

                <div class="content_picture">
                    <div class="imagebox_block">
                        <a href="/post.php?id=<?php echo $post['id']; ?>" class="slider_link">
                            <img class="content__images" src="<?php echo $post['img']?>" alt="">
                        </a>
                    </div>
                    <div class="text__content_category">
                        <h2 class="content__right_title">
                            <a href="/post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']?></a>
                        </h2>
                        <div class="date__content">
                            <span class="icon_content">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                            <a class="slider__date" href="#"><?php echo rdate("d M Y", strtotime($post['date'])) ?></a>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <?php 
                $limit = 4;
                $offset = 1;

                $all = get_post($limit, $offset, $id_catalog);
                while ($post = mysqli_fetch_assoc($all)) { ?>

                <?php 
                    $str = substr($post['title'], 0, 1000); 
                    $str = substr($post['title'], 0, strrpos($string, ' '));
                ?>

                <div class="title_without_pic">
                    <div class="line_gray"></div>
                    <div class="text_content">
                        <h2 class="content__right_title">
                            <a href="/post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']?></a>
                        </h2>
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


            <div class="block_picture_title">
                <h1 class="title_block">
                    <a href="/passengers.php/?name=Репортажи&page=1">Репортажи</a>
                </h1>
                <div class="line_h1"></div>

                <?php 
                $limit = 1;
                $offset = 0;
                $id_catalog = 5;

                $all = get_post($limit, $offset, $id_catalog);
                while ($post = mysqli_fetch_assoc($all)) { ?>

                <?php 
                    $str = substr($post['title'], 0, 1000); 
                    $str = substr($post['title'], 0, strrpos($string, ' '));
                ?>

                <div class="content_picture">
                    <div class="imagebox_block">
                        <a href="/post.php?id=<?php echo $post['id']; ?>" class="slider_link">
                            <img class="content__images" src="<?php echo $post['img']?>" alt="">
                        </a>
                    </div>
                    <div class="text__content_category">
                        <h2 class="content__right_title">
                            <a href="/post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']?></a>
                        </h2>
                        <div class="date__content">
                            <span class="icon_content">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                            <a class="slider__date" href="#"><?php echo rdate("d M Y", strtotime($post['date'])) ?></a>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <?php 
                $limit = 4;
                $offset = 1;

                $all = get_post($limit, $offset, $id_catalog);
                while ($post = mysqli_fetch_assoc($all)) { ?>

                <?php 
                    $str = substr($post['title'], 0, 1000); 
                    $str = substr($post['title'], 0, strrpos($string, ' '));
                ?>

                <div class="title_without_pic">
                    <div class="line_gray"></div>
                    <div class="text_content">
                        <h2 class="content__right_title">
                            <a href="/post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']?></a>
                        </h2>
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

            <div class="block_picture_title">
                <h1 class="title_block">
                    <a href="/passengers.php/?name=Корпоративные&page=1">Корпоративные</a>
                </h1>
                <div class="line_h1"></div>

                <?php 
                $limit = 1;
                $offset = 0;
                $id_catalog = 6;

                $all = get_post($limit, $offset, $id_catalog);
                while ($post = mysqli_fetch_assoc($all)) { ?>

                <?php 
                    $str = substr($post['title'], 0, 1000); 
                    $str = substr($post['title'], 0, strrpos($string, ' '));
                ?>

                <div class="content_picture">
                    <div class="imagebox_block">
                        <a href="/post.php?id=<?php echo $post['id']; ?>" class="slider_link">
                            <img class="content__images" src="<?php echo $post['img']?>" alt="">
                        </a>
                    </div>
                    <div class="text__content_category">
                        <h2 class="content__right_title">
                            <a href="/post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']?></a>
                        </h2>
                        <div class="date__content">
                            <span class="icon_content">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                            <a class="slider__date" href="#"><?php echo rdate("d M Y", strtotime($post['date'])) ?></a>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <?php 
                $limit = 4;
                $offset = 1;

                $all = get_post($limit, $offset, $id_catalog);
                while ($post = mysqli_fetch_assoc($all)) { ?>

                <?php 
                    $str = substr($post['title'], 0, 1000); 
                    $str = substr($post['title'], 0, strrpos($string, ' '));
                ?>

                <div class="title_without_pic">
                    <div class="line_gray"></div>
                    <div class="text_content">
                        <h2 class="content__right_title">
                            <a href="/post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']?></a>
                        </h2>
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

            <div class="block_picture_title">
                <h1 class="title_block">
                    <a href="/passengers.php/?name=Грузоперевозчикам&page=1">Грузоперевозчикам</a>
                </h1>
                <div class="line_h1"></div>

                <?php 
                $limit = 1;
                $offset = 0;
                $id_catalog = 3;

                $all = get_post($limit, $offset, $id_catalog);
                while ($post = mysqli_fetch_assoc($all)) { ?>

                <?php 
                    $str = substr($post['title'], 0, 1000); 
                    $str = substr($post['title'], 0, strrpos($string, ' '));
                ?>

                <div class="content_picture">
                    <div class="imagebox_block">
                        <a href="/post.php?id=<?php echo $post['id']; ?>" class="slider_link">
                            <img class="content__images" src="<?php echo $post['img']?>" alt="">
                        </a>
                    </div>
                    <div class="text__content_category">
                        <h2 class="content__right_title">
                            <a href="/post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']?></a>
                        </h2>
                        <div class="date__content">
                            <span class="icon_content">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                            <a class="slider__date" href="#"><?php echo rdate("d M Y", strtotime($post['date'])) ?></a>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <?php 
                $limit = 4;
                $offset = 1;

                $all = get_post($limit, $offset, $id_catalog);
                while ($post = mysqli_fetch_assoc($all)) { ?>

                <?php 
                    $str = substr($post['title'], 0, 1000); 
                    $str = substr($post['title'], 0, strrpos($string, ' '));
                ?>

                <div class="title_without_pic">
                    <div class="line_gray"></div>
                    <div class="text_content">
                        <h2 class="content__right_title">
                            <a href="/post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']?></a>
                        </h2>
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
            

        </div>
    </div>      
</div></div>  