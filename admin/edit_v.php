<?php 
	include '../db.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $link = $_POST['linkv'];
    $user = $_POST['user'];
  }
  $id_v = $_GET['edit'];
	$message = '';
  
  global $db;

  $get_video = mysqli_query($db, "SELECT * FROM `video` WHERE video_id = $id_v");
  $get_video = mysqli_fetch_assoc($get_video);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["title"])) {
      $titleErr = "Заголовок обязательно";
    } else {
      $title = $_POST["title"];
    }
    
    if (empty($_POST["linkv"])) {
      $linkErr = "Ссылка обязательно";
    } else {
      $link = $_POST["linkv"];
    }
      
    if (empty($_POST["user"])) {
      $userErr = "Автор обязательно";
    } else {
      $user = $_POST["user"];
    }
  }

  
if(isset($_POST['send'])){

    if ((strlen($_POST['title']) > 3) && (strlen($_POST['linkv']) > 3)) {
      mysqli_query($db,
      "
      UPDATE `video` SET `title`='$title', `video_link`='$link', `user_id`='$user' WHERE `video`.`video_id`='$id_v'");
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
	<title>Панель администратора: Редактирование видеозаписи</title>
</head>

<body>
<? echo $id_v;?>
<h2>Редактировать видеозапись</h2>
<input type="hidden" id="fname" name="id" value="<?php echo $get_video['id']; ?>">
<div class="container">
  <form enctype="multipart/form-datа" action="" method="post">
    <div class="row">
      <p><span class="error">* обязательные поля</span></p>
    	<p><span class="error"><?=$message?></span></p>
      <div class="col-25">
        <label for="title">Заголовок</label>
      </div>
      <div class="col-75">
        <span class="error">* <?php echo $titleErr;?></span>
        <input type="text" id="fname" name="title" placeholder="Заголовок" value="<?php echo $get_video['title']; ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="text">Ссылка</label>
      </div>
      <div class="col-75">
        <span class="error">* <?php echo $linkErr;?></span>
        <input type="text" id="text" name="linkv" placeholder="E3c6G_EDdLY" value="<?php echo $get_video['video_link']; ?>">
        
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="user">Автор</label>
      </div>
      <div class="col-75">
        <span class="error">* <?php echo $userErr;?></span>
        <select id="country" name="user">
          <option value="6">Admin</option>
        </select>
        
      </div>
    </div>
    <div class="row">
      <input type="submit" name="send" value="Изменить">
    </div>
  </form>
</div>

</body>
</html>
