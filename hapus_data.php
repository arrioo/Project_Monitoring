<?php 
	require 'config/koneksi.php';
	$id_project = $_GET['id_project'];
	$result = mysqli_query($conn, "DELETE FROM tb_project WHERE id_project='$id_project'");
	header('Location: index.php');
?>