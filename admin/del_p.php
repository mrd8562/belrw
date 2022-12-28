<?php 
	include '../db.php';

  if (isset($_GET['delp'])) {
    $id_photo = $_GET['delp'];
    $query = "DELETE FROM `photogallery` WHERE photo_id = $id_photo";
    mysqli_query($db, $query);
    header("Location: /admin/index.php");
  }

	?>