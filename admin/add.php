<?php 
	include '../db.php';

	$title = $_POST['title'];
	$text = $_POST['text'];
	$date = $_POST['calendar'];

	$category = $_POST['category'];
	$user = $_POST['user'];
	$message = '';


  if (isset($_POST['send'])){

    if ((!empty($_FILES['img']['name'])) &&(strlen($_POST['title']) > 1) && (strlen($_POST['text']) > 1)) {

      $path = '/images/' . time() . $_FILES['img']['name'];
      move_uploaded_file($_FILES['img']['tmp_name'], '../' . $path);

      mysqli_query($db,
      "
      INSERT INTO `post`(`id`, `title`, `text`, `img`, `date`, `views`, `comments`, `category_id`, `user_id`) VALUES (NULL,'$title','$text','$path','$date','0','0','$category','$user')");
      header("Location: /admin/index.php");
      exit;
    } else {
      $message = 'Поля должны быть заполнены!';
    }
  } 

?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/admin/admin_add.css">
	<title>Панель администратора: Добавить новость</title>
</head>

<body>



<h2>Добавить новость</h2>
<p>Введите данные чтобы создать новость.</p>

<div class="container">
  <form action="" method="post" enctype="multipart/form-data">
    <div class="row">
    	<p><?=$message?></p>
      <div class="col-25">
        <label for="title">Заголовок</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="title" placeholder="Заголовок">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="text">Текст</label>
      </div>
      <div class="col-75">
        <textarea type="text" id="text" name="text" placeholder="Текст"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label>Изображение</label>
      </div>
      <div class="col-75">
      	<input type="file" name="img" id="img">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="calendar">Дата публикации</label>
      </div>
      <div class="col-75">
        <input type="datetime-local" name="calendar" value="">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="category">Категория</label>
      </div>
      <div class="col-75">
        <select id="country" name="category">
          <option value="1">Пассажирам</option>
          <option value="2">Cтатьи</option>
          <option value="3">Грузоперевозчикам</option>
          <option value="4">Интервью</option>
          <option value="5">Репортажи</option>
          <option value="6">Корпоративные</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="user">Автор</label>
      </div>
      <div class="col-75">
        <select id="country" name="user">
          <option value="6">Admin</option>
        </select>
      </div>
    </div>
    <div class="row">
      <input type="submit" name="send" value="Создать">
    </div>
  </form>
</div>

</body>
</html>
