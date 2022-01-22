<?php 
	require 'config/koneksi.php';
	$id_project = $_GET['id_project'];
	$result = mysqli_query($conn, "SELECT * FROM tb_project WHERE id_project='$id_project'");
	$dataProject = mysqli_fetch_assoc($result);
	$refLeader = mysqli_query($conn, "SELECT * FROM tb_project_leader");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
        .center {
        text-align: center;
        }
    </style>
	<title>Edit Data</title>
</head>
<body>
	<div class="center">
		<p class="h4"> Edit Data <?php echo $id_project?></p>
	</div>
	<div class="w-100 p-4 d-flex justify-content-center pb-4">
		<form method="post">
			<div class="form-group">
                <label >Id Project</label>
                <input  class="form-control" type="text" name="id_project" required="required" value="<?php echo $dataProject['id_project'] ?>" readonly/>
			</div>
			<div class="form-outline mb-4">
                <label class="form-label" >Nama Project</label>
                <input type="text" class="form-control" name="nama_project" required="required" value="<?php echo $dataProject['nama_project'] ?>"/>
            </div>
			<div class="form-outline mb-4">
                <label class="form-label" >Nama Client</label>
                <input type="text" class="form-control" name="nama_client" required="required" value="<?php echo $dataProject['nama_client'] ?>"/>
            </div>
			
			<div class="form-outline mb-4">
                <label class="form-label">Pilih Project Leader</Label>
				<td>:</td>
				<td>
				<select class="form-select" name="id_leader" id="">
				<?php
				while ($dataLeader = mysqli_fetch_array($refLeader)) {
					?>
					<option value="<?php echo $dataLeader['id_leader']; ?>" 
					<?php if($dataProject['id_leader'] == $dataLeader['id_leader']) 
					{ 
						echo "selected"; } ?>>
						<?php echo $dataLeader['nama_leader']; ?></option>
						<?php 
					}
				?> 
				</select>
				</td>
				</tr>
			</div>
			<div class="row mb-4">
				<div class="col">
					<div class="form-outline">
						<label class="form-label"> Start Date</label>
						<input type="date" class="form-control" name="project_start" value="<?php echo $dataProject['project_start']?>"/>                
					</div>
				</div>
				<div class="col">
					<div class="form-outline">
						<label class="form-label">End Date</label>
						<input type="date" class="form-control" name="project_end" value="<?php echo $dataProject['project_end']?>"/> 
					</div>
				</div>
            </div> 
			<div class="form-outline mb-4">
				<label class="form-label" >Progress</label>
				<input type="number" class="form-control" name="project_progress" required="required" placeholder="Berapa Persen(hanya angka)" value="<?php echo $dataProject['project_progress']?>"/>
            </div>			
			<tr>
			<td></td> 
			<td></td>
			<td>
			<input class="btn btn-primary btn-block mb-4" type="submit" value="Simpan Hasil Edit" name="submit"> 
			</td>
			</tr>
		</table> 
	</form>
	<?php 
		require 'config/koneksi.php';
		if (isset($_POST['submit'])) {
		$id_project = $_POST['id_project'];
		$nama_project = $_POST['nama_project'];
		$nama_client = $_POST['nama_client'];
		$id_leader = $_POST['id_leader'];
		$project_start = $_POST['project_start'];
		$project_end = $_POST['project_end'];
		$project_progress = $_POST['project_progress'];
		$result = mysqli_query($conn, "UPDATE tb_project SET 
		nama_project='$nama_project', nama_client ='$nama_client', 
		id_leader='$id_leader', project_start='$project_start', project_end='$project_end', project_progress='$project_progress' WHERE id_project='$id_project'");
		header('Location: index.php');
		}
	?>
	</body>
</html>