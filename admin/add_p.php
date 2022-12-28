<?php 
	include '../db.php';
  $descErr = $userErr = "";
  $desc = $user = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $desc = $_POST['desc'];
    $user = $_POST['user'];
  }

	$message = '';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["title"])) {
      $descErr = "Описание обязательно";
    } else {
      $desc = $_POST["title"];
    }
      
    if (empty($_POST["user"])) {
      $userErr = "Автор обязательно";
    } else {
      $user = $_POST["user"];
    }
  }

  if (isset($_POST['send'])){

    if ((!empty($_FILES['img-min']['name'])) && (!empty($_FILES['img-orig']['name'])) && (strlen($_POST['desc']) > 3)) {
      
      $path = '/img/originals/' . time() . $_FILES['img-orig']['name'];
      move_uploaded_file($_FILES['img-orig']['tmp_name'], '../' . $path);

      $path_min = '/img/' . time() . $_FILES['img-min']['name'];
      move_uploaded_file($_FILES['img-min']['tmp_name'], '../' . $path_min);

      mysqli_query($db,
      "
      INSERT INTO `photogallery` (`photo_id`, `description`, `url`, `user_id`, `url_min`) VALUES (NULL, '$desc', '$path', '$user', '$path_min')");
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
	<title>Панель администратора: Добавить фотографии</title>
</head>

<body>
<h2>Добавить фотографию</h2>
<p>Загрузка фотографий.</p>

<div class="container">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    <div class="row">
      <p><span class="error">* обязательные поля</span></p>
      <p><span class="error"><?=$message?></span></p>
      <div class="col-25">
        <label>Изображение высокого разрешения</label>
      </div>
      <div class="col-75">
        <input type="file" name="img-orig" id="img-orig">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label>Изображение низкого разрешения</label>
      </div>
      <div class="col-75">
        <input type="file" name="img-min" id="img-min">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="desc">Описание</label>
      </div>
      <div class="col-75">
        <span class="error">* <?php echo $descErr;?></span>
        <input type="text" id="fname" name="desc" placeholder="Описание">
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
      <input type="submit" name="send" value="Создать">
    </div>
  </form>
</div>

</body>
</html>
