<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Tambah Project Leader</title>
</head>
<body>
    <form action="" method="post">
        <table>
            <?php 
                require '../config/koneksi.php';
                $query = mysqli_query($conn, "SELECT max(id_leader) as idBesar FROM tb_project_leader");
                $dat = mysqli_fetch_array($query);
                $idLeader = $dat['idBesar'];
                $urutan = (int) substr($idLeader, 3, 3);
                $urutan++;
                $huruf = "LDR";
                $idLeader = $huruf . sprintf("%03s", $urutan);
            ?>
            <tr>
                <td>id Project Leader</td>
                <td>:</td>
                <td>
                    <input type="text" name="id_leader" required="required" value="<?php echo $idLeader ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>Nama Project Leader</td>
                <td>:</td>
                <td>
                    <input type="text" name="nama_leader" required="required">
                </td>
            </tr>
            <tr>
                <td>Email Project Leader</td>
                <td>:</td>
                <td>
                    <input type="email" name="email_leader" required="required">
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
            $result = mysqli_query($conn, "INSERT INTO tb_project_leader(id_leader, nama_leader, email_leader) VALUES('$id_leader', '$nama_leader', '$email_leader')"); 
            header('Location: index.php');
        }
    ?>
</body>
</html> 