<?php 
    require '../config/koneksi.php';
    $id_leader = $_GET['id_leader'];
    $result = mysqli_query($conn, "SELECT * FROM tb_project_leader WHERE id_leader='$id_leader'"); 
    $dataLeader = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>Id Project Leader</td>
                <td>:</td>
                <td>
                    <input type="text" name="id_leader" 
					value="<?php echo $dataLeader['id_leader'] ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>Nama Leader</td>
                <td>:</td>
                <td>
					<input type="text" name="nama_leader"
					value="<?php echo $dataLeader['nama_leader'] ?>">
                </td>
            </tr> 
            <tr>
                <td>Email Leader</td>
                <td>:</td>
                <td>
					<input type="text" name="email_leader"
					value="<?php echo $dataLeader['email_leader'] ?>">
                </td>
            </tr>           
            <tr>
                <td></td>             
                <td></td> 
                <td>
					<input type="submit" value="Simpan" name="submit">                
                </td>
            </tr>
        </table>    
    </form>
	<?php 
        require '../config/koneksi.php';
        if (isset($_POST['submit'])) {
            $id_leader = $_POST['id_leader'];
            $nama_leader = $_POST['nama_leader'];
            $email_leader = $_POST['email_leader'];
            $result = mysqli_query($conn, "UPDATE tb_project_leader SET id_leader='$id_leader',nama_leader='$nama_leader',email_leader='$email_leader'
                    WHERE id_leader='$id_leader'");
            header('Location: index.php');
        }    
    ?>
</body>
</html> 