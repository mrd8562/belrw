<?php

$dbhost = "127.0.0.1";
$dbname = "belrwbd";
$username = "root";
$password = "root";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
	$db = mysqli_connect($dbhost, $username, $password, $dbname);
} catch (PDOException $e) {
	echo 'Connection failed: ' . $e->getMessage();
}

/*статьи для пассажиров*/
function get_posts($limit, $offset, $cat_id){
	global $db;

	$sql = "SELECT * FROM `post` WHERE category_id = '$cat_id' LIMIT $limit OFFSET $offset";

	$result = mysqli_query($db, $sql);

	$count = mysqli_num_rows($result);

	return $result;
}

function get_post($limit, $offset, $id_catalog){
	global $db;

	$sql = "SELECT * FROM `post` WHERE category_id = '$id_catalog' ORDER BY date DESC LIMIT $limit OFFSET $offset";

	$result = mysqli_query($db, $sql);

	$count = mysqli_num_rows($result);

	return $result;
}


/*статьи для пассажиров*/
function get_posts_all($limit, $offset){
	global $db;

	$sql = "SELECT * FROM `post` WHERE category_id = '1' LIMIT $limit OFFSET $offset";

	$result = mysqli_query($db, $sql);

	$count = mysqli_num_rows($result);

	return $result;
}

/*статьи все*/
function all_post($limit, $offset){
	global $db;

	$sql = "SELECT * FROM `post` WHERE category_id ORDER BY `date` DESC LIMIT $limit OFFSET $offset ";

	$result = mysqli_query($db, $sql);

	$count = mysqli_num_rows($result);

	return $result;
}

/*статьи по комметам*/
function all_post_comment($limit, $offset){
	global $db;

	$sql = "SELECT * FROM `post` WHERE category_id ORDER BY comments DESC LIMIT $limit OFFSET $offset;";

	$result = mysqli_query($db, $sql);

	$count = mysqli_num_rows($result);

	return $result;
}

/*статьи по комметам*/
function all_post_views($limit, $offset){
	global $db;

	$sql = "SELECT * FROM `post` WHERE category_id ORDER BY views DESC LIMIT $limit OFFSET $offset ";

	$result = mysqli_query($db, $sql);

	$count = mysqli_num_rows($result);

	return $result;
}

/*получение статьи по ее id*/
function get_post_by_id($id){
	global $db;

	$po = mysqli_query($db, "SELECT * FROM `post` WHERE id = $id");

	while ($p = mysqli_fetch_assoc($po)) {
	return $p;
	}
}



/*получение название категории по ее id*/
function get_category_by_id($id){
	global $db;
	$categories = mysqli_query($db,"SELECT * FROM `categories` WHERE id = $id");

	while ($category = mysqli_fetch_assoc($categories)) {
	return $category['category_name'];
	}
}

/*получение название категории*/
function get_category(){
	global $db;
	$sql = "SELECT * FROM `categories`";

	$categories = mysqli_query($db, $sql);
	return $categories;
}

/*получение имени пользователя по его id*/
function get_user_by_id($id){
	global $db;
	$users = mysqli_query($db,"SELECT * FROM `user` WHERE user_id = $id");

	while ($user = mysqli_fetch_assoc($users)) {
	return $user['login'];
	}
}

/*Апдейт просмотров*/
function views_update($id){
	global $db;

	$po = mysqli_query($db, "UPDATE `post` SET views = views + 1 WHERE id = $id");
}

/*проверка пользователя*/
function checkUser($email, $password){
	global $db;
	if(($email == "") || ($password == "")) return false;
	$result_set = mysqli_query($db, "SELECT `password` FROM `user` WHERE email = $email");
	$user = $result_set->fetch_assoc();
	$real_password = $user['password'];
	return $real_password == $password;
}

/*проверка админа*/
function isAdmin($email){
	global $db;
	$result_set = mysqli_query($db, "SELECT * FROM `user` WHERE email = $email");
	$row = $result_set->fetch_assoc();
	return $row['admin'];
}

/*статьи все*/
function all_video(){
	global $db;

	$sql = "SELECT * FROM `video`";

	$result = mysqli_query($db, $sql);

	return $result;
}

function all_comm(){
	global $db;
	
	$sql = "SELECT * FROM `commentaries`";

	$result = mysqli_query($db, $sql);

	return $result;
}
function all_photo(){
	global $db;
	
	$sql = "SELECT * FROM `photogallery`";

	$result = mysqli_query($db, $sql);

	return $result;
}

function rdate($param, $time=0) {
	if(intval($time)==0)$time=time();
	$MonthNames=array("Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", "Июля", "Августа", "Сентября", "Октября", "Ноября", "Декабря");
	if(strpos($param,'M')===false) return date($param, $time);
		else return date(str_replace('M',$MonthNames[date('n',$time)-1],$param), $time);
	}
