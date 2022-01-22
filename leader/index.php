<?php 
    require '../config/koneksi.php';
    $result = mysqli_query($conn, "SELECT * FROM tb_project_leader");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Leader Project</title>
</head>
<body>
    <a href="tambah_data.php">Tambah Data</a>
    <table border="1">
        <tr>
            <td>id Project Leader</td>        
            <td>Nama Project Leader</td>  
            <td>Email Project Leader</td>
            <td>Aksi</td>
        </tr>
        <?php
            while ($data = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <td><?php echo $data['id_leader']; ?></td>            
                <td><?php echo $data['nama_leader']; ?></td>
                <td><?php echo $data['email_leader']; ?></td>             
                <td>
                    <a href="edit_data.php?id_leader=<?phpecho $data['id_leader']; ?>">
                        Edit                    
                    </a>
                    <a href="hapus_data.php?id_leader=<?php echo $data['id_leader']; ?>">
                        Hapus                    
                    </a>
                </td>            
            </tr>
        <?php             
            }
        ?>
    </table>
</body>
</html>