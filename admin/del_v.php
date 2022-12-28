<?php 
	include '../db.php';

  if (isset($_GET['delv'])) {
    $id_vid = $_GET['delv'];
    $query = "DELETE FROM `video` WHERE video_id = $id_vid";
    mysqli_query($db, $query);
    header("Location: /admin/index.php");
  }

	?>