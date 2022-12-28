

<!--Карусель-->
<div class="container">
    <div class="line__slider"></div>
    <div class="slider">
        <div class="slider__wrapper">
            <?php
                $limit = 6;
                $offset = 0;

                $all = all_post($limit, $offset);
                while ($post = mysqli_fetch_assoc($all)) { ?>
            <?php $string = substr($post['title'], 0, 120); 
                $string = substr($post['title'], 0, strrpos($string, ' '));
            ?>
            <div class="slider__item">
              <div class="slider__content">
                <div class="slider__imagebox">
                    <a href="/post.php?id=<?php echo $post['id']; ?>" class="slider_link">
                        <img class="slider__content_img" src="<?php echo $post['img'] ?>" alt="">
                    </a>
                </div>
                <div class="text__content">
                    <h2 class="slider__content_title">
                        <a href="/post.php?id=<?php echo $post['id']; ?>"><?php echo $string."… "; ?></a>
                    </h2>
                    <div class="date__content">
                        <span class="icon_content"><i class="fas fa-calendar-alt"></i></span>
                        <a class="slider__date" href="#"><?php echo rdate("d M Y", strtotime($post['date'])) ?></a>
                    </div>
                </div>
              </div>
            </div>
        <?php } ?>
</div>
<a class="slider__control slider__control_left" href="#" role="button"></a>
<a class="slider__control slider__control_right" href="#" role="button"></a>
</div>
<div class="line__slider"></div>
</div>