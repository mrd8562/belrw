<?php 
	include '../db.php';

	$title = $_POST['title'];
	$text = $_POST['text'];
	$date = $_POST['calendar'];

	$category = $_POST['category'];
	$user = $_POST['user'];
	$message = '';
  $id = $_GET['edit'];
  $post = get_post_by_id($_GET['edit']);
  $path = $post['img'];


	
	if (isset($_POST['send'])){

    if ((strlen($_POST['title']) > 1) && (strlen($_POST['text']) > 1)) {
      
      if (!empty($_FILES['img']['name'])){
        $path = '/images/' . time() . $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], '../' . $path);
      }      

      mysqli_query($db,
      "
      UPDATE `post` SET `title`='$title', `text`='$text', `img`='$path', `date`='$date' , `category_id`='$category', `user_id`='$user' WHERE `post`.`id`='$id'");

      header("Location: /admin/index.php");
      exit;
    } else {
      $message = 'Поля должны быть заполнены!';
    }
  } 
 

  views_update($_GET['edit']);
  $title_page = $post['title'];
  

  $category = get_category_by_id($post['category_id']); 
  $user = get_user_by_id($post['user_id']);
  print_r ($_POST['date']);
  print_r ($date);
?>



<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/admin/admin_add.css">
	<title>Панель администратора</title>
</head>

<body>
<h2>Редактировать новость</h2>
<p>Введите данные чтобы изменить новость.</p>
<p><?php echo date($post['date']) ?></p>
<div class="container">
  <form action="" method="post" enctype="multipart/form-data">
    <div class="row">
    	<p><?=$message?></p>
      <div class="col-25">
        <label for="title">Заголовок</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="title" placeholder="Заголовок" value="<?php echo $post['title']; ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="text">Текст</label>
      </div>
      <div class="col-75">
        <textarea type="text" id="text" name="text" placeholder="Текст"><?php echo $post['text']; ?></textarea>
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
        <input type="date" name="calendar" value="2017-06-01">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="category">Категория</label>
      </div>
      <div class="col-75">
        <select id="country" name="category">
          <?php 
          $cat = get_category();
          while ($cate = mysqli_fetch_assoc($cat)) { ?>
            <option value="<?php echo $cate['id']?>"><?php echo $cate['category_name']?></option>
              
           <?php } ?>
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
      <input type="submit" name="send" value="Редактировать">
    </div>
  </form>
</div>

</body>
</html>
