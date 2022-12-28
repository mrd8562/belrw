<div class="video-players-block">
    <div class="gallery">
        <div class="full-video">
            <?php
            $result = all_video();
            $video = mysqli_fetch_assoc($result)?>

            <iframe src="//www.youtube.com/embed/<?php echo $video['video_link'];?>" allowfullscreen frameborder="0" name="tab"></iframe>
        </div>
        <div class="title-video">
            <div class="video-list">
                <?php
                $result = all_video($limit, $offset);
                while ($video = mysqli_fetch_assoc($result)) { $num++;?>

                <div class="video--title">
                    <a class="video__link-block" href="//www.youtube.com/embed/<?php echo $video['video_link'];?>?rel=0&autoplay=1" target="tab">
                        <p class="number_vid"><?php echo $num?></p>
                        <img src="//img.youtube.com/vi/<?php echo $video['video_link'];?>/default.jpg">
                        <h5 class="title_vid"><?php echo $video['title'];?></h5>
                    </a>
                </div>

                <div class="line_vid"></div>
                <?php  }?>
            </div>
        </div>
    </div>
</div>