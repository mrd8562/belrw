<?php 
	include '../db.php';
  $titleErr = $linkErr = $userErr = "";
  $title = $link = $user = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $link = $_POST['linkv'];
    $user = $_POST['user'];
  }

	$message = '';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["title"])) {
      $titleErr = "Заголовок обязательно";
    } else {
      $name = $_POST["title"];
    }
    
    if (empty($_POST["linkv"])) {
      $linkErr = "Ссылка обязательно";
    } else {
      $name = $_POST["linkv"];
    }
      
    if (empty($_POST["user"])) {
      $userErr = "Автор обязательно";
    } else {
      $name = $_POST["user"];
    }
  }

	if (isset($_POST['send'])){

		if ((strlen($_POST['title']) > 3) && (strlen($_POST['linkv']) > 3)) {
			mysqli_query($db,
			"
			INSERT INTO	`video`(`video_id`, `title`, `video_link`, `user_id`) VALUES (NULL,'$title','$link','$user')");
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
	<title>Панель администратора: Добавить видеозапись</title>
</head>

<body>

<h2>Добавить видеозапись</h2>
<p>Введите данные чтобы добавить новость.</p>

<div class="container">
  <form enctype="multipart/form-datа" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="row">
      <p><span class="error">* обязательные поля</span></p>
    	<p><span class="error"><?=$message?></span></p>
      <div class="col-25">
        <label for="title">Заголовок</label>
      </div>
      <div class="col-75">
        <span class="error">* <?php echo $titleErr;?></span>
        <input type="text" id="fname" name="title" placeholder="Заголовок">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="text">Ссылка</label>
      </div>
      <div class="col-75">
        <span class="error">* <?php echo $linkErr;?></span>
        <input type="text" id="text" name="linkv" placeholder="E3c6G_EDdLY">
        
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
