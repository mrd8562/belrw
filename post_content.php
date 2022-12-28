<?php 


views_update($_GET['id']);

$post = get_post_by_id($_GET['id']);

$category = get_category_by_id($post['category_id']); 
$user = get_user_by_id($post['user_id']);

?>   



    <div id="main">
        <div id="center">
            
            <div class="inside_news">
                <div class="button_category_inside">
                    <a class="button__link" href="/passengers.php/?page=1"><?php echo $category; ?></a>
                </div>
                <h1 class="title_news_p"><?php echo $post['title']; ?></h1>
                <div class="icon_bar">
                    <div class="user_data">
                        <div class="username_photo">
                            <img class="username_photo" alt="username" src="/images/user_photo.png">
                        </div>
                        <div class="posted_user">
                            <a href="#" class="username_link"><?php echo $user ?></a>
                        </div>
                    </div>
                    
                    <div class="date__news_post">
                        <i class="fas fa-calendar-alt"></i>
                        <a class="posted__date_in" href="#"><?php echo rdate("d M Y", strtotime($post['date'])) ?></a>
                    </div>
                    <div class="viewers">
                        <i class="fas fa-eye"></i>
                        <p class="all_view" href="#"><?php echo $post['views'] ?> просмотров</p>
                    </div>
                    <div class="comment__new">
                        <i class="fas fa-comment-alt"></i>
                        <p class="cooment_count" href="#"><?php echo $post['comments']; ?></p>
                    </div>
                </div>
                <img class="main_img_in__post"alt="" src="<?php echo $post['img'] ?>">
                <div class="newss_content">
                    <p><?php echo $post['text']; ?></p>
                </div>


                <?php
                    if ($_SESSION['user']['login']) {
                        global $id_user;
                        $id_user = $_SESSION['user']['user_id'];
                        ?>

                        <div class="comment_block">
                        <?php 

                        $data = $_POST;
                        $get = $post['id'];

                        if (isset($data['submit'])) {
                            if ($data['comment'] == '') {
                                echo "<p>Пустые поля!</p>";
                            }
                            else{
                                global $id_user;
                                $com = htmlspecialchars($data['comment']);
                                mysqli_query($db,
                                "INSERT INTO `commentaries` (`comment_id`, `user_id`, `text`, `date`, `status`, `post_id`) VALUES (NULL, '$id_user', '$com', current_timestamp(), '0', '$get')");


                                echo "<p>Комментарий успешно отправлен!</p>";
                            }
                        }

                        ?>

                        <form action="" method="post" enctype="multipart/form-data">
                        <h6 class="title__blocks">Оставить комментарий</h6>
                        <div class="line_title_block">
                            <div class="line_u"></div>
                        </div>
                        <div class="comment_elements">
                            <div class="comment_form">
                                <label for="comment">Комментарий</label>
                                <textarea class="comment_textarea" name="comment" cols="45" rows="8" style="margin-top: 0px;margin-bottom: 0px;height: 155px;" ></textarea>
                            </div>
                        </div>
                        <div class="button__send_com">
                            <input type="submit" name="submit" class="button__send" value="Отправить">
                        </div>
                        </form>
                    </div>
                    <?php 

                     

                    $all_com = mysqli_query($db,"SELECT * FROM `commentaries` WHERE `post_id` = '$get' ORDER BY `date` DESC LIMIT 6");

                    while ($all_com_wh = mysqli_fetch_assoc($all_com)) {  ?>
                    <?php $user = get_user_by_id($all_com_wh['user_id']); ?>

                    <div class="comment_content">
                        
                        <div class="img_standart">
                            <img class="username_com" alt="user" src="/images/user_comm.jpg">
                            <h6 class="user_name"><?php echo $user; ?></h6>
                        </div>
                        <div class="text_com">
                            
                            <p class="text_comm"><?php echo $all_com_wh['text']; ?></p>
                            <div class="date__news_com">
                                <i class="fas fa-calendar-alt"></i>
                                <p class="posted__date_in_com"><?php echo $all_com_wh['date']; ?></p>
                            </div>
                        </div>
                        <?php echo $coom;?>
                    </div>
                    <?php }


                        
                    } else {
                        echo 
                        '<div class="no_login_comment">
                    <h2 class="no_log">Комментарии недоступны! <a class="registration_link" href="/login.php">Войти</a>, чтобы войти в аккаунт!</h2>
                </div>';
                    }

                ?>
                </div>
            </div>    
        </div>