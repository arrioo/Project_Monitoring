<?php 
    require '../config/koneksi.php';
    $id_leader = $_GET['id_leader'];
    $result = mysqli_query($conn, "DELETE FROM tb_leader WHERE id_leader='$id_leader'");
    header('Location: index.php');
?>