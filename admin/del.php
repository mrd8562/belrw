<?php 
	include '../db.php';

if (isset($_GET['del'])) {
  	$id = $_GET['del'];
	$query = "DELETE FROM `post` WHERE id = $id";
  	mysqli_query($db, $query);
  	header("Location: /admin/index.php");
  }
?>