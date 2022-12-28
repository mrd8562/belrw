<?php 
	include '../db.php';

  if (isset($_GET['delс'])) {
    $id_com = $_GET['delс'];
    $query = "DELETE FROM `commentaries` WHERE comment_id = $id_com";
    mysqli_query($db, $query);
    header("Location: /admin/index.php");
  }

	?>