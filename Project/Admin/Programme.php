<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
include('Head.php');
if (isset($_POST["btn_submit"])) {
	$programme_name = $_POST["programme_name"];
	$insql = "INSERT INTO tbl_programme (programme_name) VALUES ('$programme_name')";
	if (mysqli_query($con, $insql)) {
?>
	<?php
	} else {
	?>
		<script>
			alert('Couldn\'t add Programme!!');
		</script>
	<?php
	}
}

if (isset($_GET["del"])) {
	$del = $_GET["del"];
	$delsql = "DELETE FROM tbl_programme WHERE programme_id='$del'";
	if (mysqli_query($con, $delsql)) {
	?>
		<script>
			window.location = "Programme.php";
		</script>
	<?php
	} else {
	?>
		<script>
			alert('Couldn\'t delete programme!!');
			window.location = "Programme.php";
		</script>
<?php
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin | Programme</title>
	<link rel="stylesheet" href="../Assets/CSS/Font.css">
	<style>
		thead th,
		thead td {
			color: black;
			background-color: #b058fe;
		}

		tbody th,
		tbody td {
			color: #313131;
		}

		a:hover {
			text-decoration: none;
		}
	</style>
</head>

<body>
	<div class="row">
		<div class="col-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<p class="card-description">
						Select and add a course
					</p>
					<form action="" method="POST" class="forms-sample">
						<div class="form-group">
							<label for="programme_name">
								<h4 class="card-title">Programme Name</h4>
							</label>
							<input type="text" class="form-control" name="programme_name" placeholder="Programme name" required title="Allows Only Alphabets,Spaces and Special Characters(-,.)" pattern="^[A-Z]+[a-zA-Z \.\-]*$">
						</div>
						<button type="submit" class="btn btn-primary mr-2" name="btn_submit">Add Programme</button>
						<button type="reset" class="btn btn-dark">Cancel</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Programme List</h4>
					<p class="card-description">
						Details of all programmes
					</p>
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<td> SI.NO </td>
									<td> Programme&nbsp;Name </td>
									<td> Action </td>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 0;
								$selsql = "SELECT * FROM tbl_programme";
								$data = mysqli_query($con, $selsql);
								while ($row = mysqli_fetch_assoc($data)) {
									$i++;
								?>
									<tr>
										<td> <?php echo $i; ?> </td>
										<td> <?php echo $row["programme_name"]; ?> </td>
										<td><a href="Programme.php?del=<?php echo $row["programme_id"]; ?>"><button class="btn btn-info btn-block mr-2">Delete</button></a></td>
									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>

</html>