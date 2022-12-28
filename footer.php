    <!--Подвал-->
    
    <div id="footer">
        
        <div class="content__footer">
            <div class="element_footer">
                <div class="block__footer_logo">
                    <a href="/" class="logo-link">
                        <div class="logo_img_white"></div>
                    </a>
                </div>
                <p class="text_under_logo">Белорусская железная дорога — оператор белорусской сети железных дорог. Это государственное объединение, подчинённое Министерству транспорта и коммуникаций Республики Беларусь. В его состав входит 66 организаций, имеющие статус юридического лица и три представительства.</p>
            </div>

            
            <div class="last_post_footer">
                <h4 class="title_last_post">Последние публикации</h4>
                <div class="footer_block_last__post">



                    <?php
                        $limit = 2;
                        $offset = 0;

                        $all = all_post($limit, $offset);
                        while ($post = mysqli_fetch_assoc($all)) { ?>

                        <?php
                        $category = get_category_by_id($post['category_id']); 

                        $string = substr($post['title'], 0, 110);
                    ?>
                    <div class="content_picture_footer">
                        <div class="imagebox_block">
                            <a href="/post.php?id=<?php echo $post['id']; ?>" class="slider_link">
                                <img class="content__img_footer" src="<?php echo $post['img'] ?>" alt="">
                            </a>
                        </div>
                        <div class="text__content_footer">
                            <div class="date__content">
                                <span class="icon_content">
                                    <i class="fas fa-calendar-alt"></i>
                                </span>
                                <a class="date_last_post" href="#"><?php echo rdate("d M Y", strtotime($post['date'])) ?></a>
                            </div>
                            <h2 class="content__title_footer">
                                <a href="/post.php?id=<?php echo $post['id']; ?>"><?php echo $string; ?></a>
                            </h2>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            
            <div class="all_category">
                <h4 class="title_last_post">Категории</h4>
                <ul class="all__list">
                    <li class="element_catalog"><a href="/?name=Корпоративные&page=1">Корпоративные</a></li>
                    <li class="element_catalog"><a href="/passengers.php/?name=Пассажирам&page=1">Пассажирам</a></li>
                    <li class="element_catalog"><a href="/passengers.php/?name=Cтатьи&page=1">Статьи</a></li>
                    <li class="element_catalog"><a href="/?name=Интервью&page=1">Интервью</a></li>
                    <li class="element_catalog"><a href="/?name=Репортажи&page=1">Репортажи</a></li>
                    <li class="element_catalog"><a href="/?name=Грузоперевозчикам&page=1">Грузоперевозчикам</a></li>
                </ul>
            </div>
            
            <!-- <div class="popular_tags">
                <h4 class="title_last_post">Популярные метки</h4>
                <div class="tags_list">
                    <div class="but_tags">
                        <div class="tag">
                            <a class="button__tags" href="#">Пассажир</a>
                        </div>
                        <div class="tag">
                            <a class="button__tags" href="#">Новость</a>
                        </div>
                        <div class="tag">
                            <a class="button__tags" href="#">Груз</a>
                        </div>
                        <div class="tag">
                            <a class="button__tags" href="#">БЖД</a>
                        </div>
                        <div class="tag">
                            <a class="button__tags" href="#">2020</a>
                        </div>
                        <div class="tag">
                            <a class="button__tags" href="#">2019</a>
                        </div>
                        <div class="tag">
                            <a class="button__tags" href="#">2018</a>
                        </div>
                    </div>
                </div>
                
            </div>   --> 
        </div>
        
        <div class="footer_bottom">
            <div class="line_gray"></div>
            <div class="under_line__footer">
                <p>&copy; 2020 Белорусская железная дорога</p>
                <ul class="menu_footer">
                    <li><a class="header-link" href="https://www.rw.by/corporate/contacts/">Информация</a></li>
                    <li><a class="header-link" href="/">Категории</a></li>
                    <li><a class="header-link" href="/">Контакты</a></li>
                </ul>
            </div>
        </div>
        
    </div>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/carousel.js"></script>
    <script src="lightbox/js/lightbox-plus-jquery.min.js"></script>
    <script src="/js/main.js"></script>