<?php 
 require 'config/koneksi.php';
 $result = mysqli_query($conn, "SELECT * FROM tb_project ORDER by id_project ASC");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		<title>Project monitoring</title>
		<style>
			.center {
			text-align: center;
			}
		</style>
	</head>
	<body class="bg-success p-2 text-dark bg-opacity-25">
		<div>
		<header class="py-3 mb-4 border-bottom">
			<div class="container d-flex flex-wrap justify-content-center">
			<a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
				<path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z"/>
				</svg>
				<span class="fs-4"> Monitoring</span>
			</a>
			<form class="col-12 col-lg-auto mb-3 mb-lg-0">
				<input type="search" class="form-control" placeholder="Search..." aria-label="Search">
			</form>
			<div>
				<a class="btn btn-info" href="leader/index.php">Project leader <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
				<path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
				<path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/>
				</svg></a>
			</div>
			</div>
		</header>
		</div>
		<div class="center">
			<p class="h4">Project Monitoring</p>
		</div>
		<div>
			<a class="btn btn-primary" href="tambah_data.php">Add Project <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
			<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
			<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
			</svg></a>
		</div>
		<div class="container-xl" > 
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th>No.</th> 
						<th>Nama Project</th> 
						<th>Client</th>
						<th>Project Leader</th>
						<th>Start date</th>
						<th>End date</th>
						<th>Progress</th>
						<th>Aksi</th>
					</tr>
					</thead>
					<tbody>
						<?php
						$no=0;
						while ($data = mysqli_fetch_array($result)) :
							$no++;
						?>
						<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $data['nama_project']; ?></td> 
						<td><?php echo $data['nama_client']; ?></td> 			
						<td>
						<div class="col-sm-9">
      						<div class="row">
							  <div class="row row-cols-2">
									<?php 
									
									$queryLeader = mysqli_query($conn, "SELECT * FROM tb_project_leader WHERE id_leader='$data[id_leader]'");
									$dataLeader = mysqli_fetch_assoc($queryLeader);
									?>
									<div class="col"><?php echo $dataLeader['nama_leader']; ?> </div>
									<div class="col"><?php echo $dataLeader['email_leader']; ?> </div>
									
								</div>
							</div>
						</div>
						</td> 						
						<td><?php echo $data['project_start']; ?></td>
						<td><?php echo $data['project_end']; ?></td>
						<td>
						<div class="progress">
							<div class="progress-bar <strong>progress-bar-animated</strong> progress-bar-striped bg-primary" role="progressbar" style="width:<?php echo $data['project_progress']; ?>%" aria-valuenow="<?php echo $data['project_progress']; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $data['project_progress']; ?> %</div>
						</div>
						</td>
						<td>
						<a class="btn-edit btn btn-warning btn-circle" href="edit_data.php?id_project=<?php echo $data['id_project']; ?>">
						Edit 
						</a>
						<a class="btn-hapus btn btn-danger btn-circle" href="hapus_data.php?id_project=<?php echo $data['id_project']; ?>">
						Hapus 
						</a>
					</td> 
					</tr>
					<?php 
						endwhile;
					?>
				</tbody>
				</table>
			</div>
		</div>
		<figure class="text-center">
			<blockquote class="blockquote">
				<p>Created By</p>
			</blockquote>
			<figcaption class="blockquote-footer">
				<cite title="Source Title">Arrio Saputra</cite>
			</figcaption>
    	</figure>
	</body>
</html>