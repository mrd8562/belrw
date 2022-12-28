
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/admin/admin_st.css">
	<title>Панель администратора</title>
</head>
<body>
	<div class="header">
		<h1>Панель администратора</h1>
		<a href="/admin/add.php">Добавить новость</a>
	</div>
	



<table>
<tr>
  <th>Номер</th>
  <th>Заголовок</th>
  <th>Текст</th>
  <th>Изображение</th>
  <th>Дата</th>
  <th>Просмотры</th>
  <th>Комментарии</th>
  <th>Категории</th>
  <th>Автор</th>
  <th>Функции</th>
  </tr>
  <?php include '../db.php';


  if (isset($_GET['edit'])) {
  	$id = $_GET['edit'];
  }

$limit = 50;
$offset = 0;


$result = all_post($limit, $offset);
while ($post = mysqli_fetch_assoc($result)) { ?>

<?php $category = get_category_by_id($post['category_id']); ?>
<?php $user = get_user_by_id($post['user_id']); ?>
<?php $text_tini = substr($post['text'], 0, 100); 
$text_tini = substr($post['text'], 0, strrpos($text_tini, ' '));

$title_tini = substr($post['title'], 0, 100); 
$title_tini = substr($post['title'], 0, strrpos($text_tini, ' '));



?>
 <tr>

 
  <td><?php echo $post['id']; ?></td>
  <td><?php echo $title_tini."… "?></td>
  <td><?php echo $text_tini."… "?></td>
  <td><img class="image_post" src="<?php echo $post['img']?>"></td>
  <td><?php echo rdate("d M Y", strtotime($post['date'])) ?></td>
  <td><?php echo $post['views']?></td>
  <td><?php echo $post['comments']?></td>
  <td><?php echo $category?></td>
  <td><?php echo $user?></td>
  <td>
    <a href="../post.php?id=<?php echo $post['id']; ?>">Просмотр</a>
    <a href="/admin/edit.php?edit=<?php echo $post['id']; ?>">Редактировать</a> <a href="/admin/del.php?del=<?php echo $post['id']; ?>">Удалить</a></td>
 </tr>
 <?php } ?>
</table>

<div class="video_table">
  <h2>Видеозаписи</h2>
  <a href="/admin/add_v.php">Добавить</a>
  <table>
<tr>
  <th>Номер</th>
  <th>Заголовок</th>
  <th>Ссылка</th>
  <th>Пользователь</th>
  <th>Функции</th>
</tr>

<?php
if (isset($_GET['edit'])) {
    $id_vid = $_GET['edit'];
  }

$result = all_video($limit, $offset);
while ($video = mysqli_fetch_assoc($result)) { ?>

<tr>
  <td><?php echo $video['video_id']; ?></td>
  <td><?php echo $video['title'];?></td>
  <td><?php echo $video['video_link'];?></td>
  <td><?php echo $video['user_id'];?></td>
  <td>
    <a href="/admin/edit_v.php?edit=<?php echo $video['video_id']; ?>">Редактировать</a><a href="/admin/del_v.php?delv=<?php echo $video['video_id']; ?>">Удалить</a>
  </td>
 </tr>
 <?php  }?>
</table>
</div>

<div class="comm_table">
  <h2>Модерация комментариев</h2>
  <table>
<tr>
  <th>Номер</th>
  <th>Пользователь</th>
  <th>Текст</th>
  <th>Дата</th>
  <th>Номер новости</th>
  <th>Функции</th>
</tr>

<?php

$result = all_comm($limit, $offset);
while ($comment = mysqli_fetch_assoc($result)) { ?>
<?php $user = get_user_by_id($comment['user_id']); ?>
<tr>
  <td><?php echo $comment['comment_id']; ?></td>
  <td><?php echo $user;?></td>
  <td><?php echo $comment['text'];?></td>
  <td><?php echo $comment['date'];?></td>
  <td><?php echo $comment['post_id'];?></td>
  <td>
    <a href="/admin/del_с.php?delс=<?php echo $comment['comment_id']; ?>">Удалить</a>
  </td>
 </tr>
 <?php  }?>
</table>
</div>


<div class="gallery_table">
  <h2>Фотографии</h2>
  <a href="/admin/add_p.php">Добавить</a>
  <table>
<tr>
  <th>Номер</th>
  <th>Описание</th>
  <th>Фото оригинал</th>
  <th>Фото маленькое</th>
  <th>Автор</th>
  <th>Функции</th>
</tr>

<?php

$result = all_photo();
while ($photo = mysqli_fetch_assoc($result)) { ?>
<?php $user = get_user_by_id($photo['user_id']); ?>
<tr>
  <td><?php echo $photo['photo_id']; ?></td>
  <td><?php echo $photo['description'];?></td>
  <td>
    <img class="image_post" src="<?php echo $photo['url'];?>">
  </td>
  <td>
    <img class="image_post" src="<?php echo $photo['url_min'];?>">   
  </td>
  <td><?php echo $user;?></td>
  <td>
    <a href="/admin/del_p.php?delp=<?php echo $photo['photo_id']; ?>">Удалить</a>
  </td>
 </tr>
 <?php  }?>
</table>
</div>

</body>
</html>