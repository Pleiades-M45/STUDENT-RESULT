<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
include('Head.php');
if (isset($_POST["btn_submit"])) {
	$programme_id = $_POST["programme_id"];
	$semester = $_POST["semester"];
	$insql = "INSERT INTO tbl_semester (programme_id,semester_name) VALUES ($programme_id,'$semester')";
	if (mysqli_query($con, $insql)) {
?>
	<?php
	} else {
	?>
		<script>
			alert('Couldn\'t add Semester !!');
		</script>
	<?php
	}
}
if (isset($_GET["del"])) {
	$del = $_GET["del"];
	$delsql = "DELETE FROM tbl_semester WHERE semester_id='$del'";
	if (mysqli_query($con, $delsql)) {
	?>
		<script>
			window.location = "Semester.php";
		</script>
	<?php
	} else {
	?>
		<script>
			alert('Couldn\'t delete semester!!');
			window.location = "Semester.php";
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
	<title>Admin | Semester</title>
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
						Add a semester
					</p>
					<form action="" method="POST" class="forms-sample">
						<div class="form-group">
							<label for="programme">
								<h4 class="card-title">Programme</h4>
							</label>
							<select class="form-control js-example-basic-single w-100" name="programme_id" id="programme_id" required>
								<option value="">----select----</option>
								<?php
								$selQry = "select * from tbl_programme";
								$data = mysqli_query($con, $selQry);
								while ($row = mysqli_fetch_assoc($data)) {
								?>
									<option value="<?php echo $row["programme_id"] ?>"><?php echo $row["programme_name"]; ?></option>
								<?php
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="semester">
								<h4 class="card-title">Semester</h4>
							</label>
							<select class="form-control js-example-basic-single w-100" name="semester" required>
								<option value="">----select----</option>
								<?php
								$selQry = "select * from tbl_sem";
								$data = mysqli_query($con, $selQry);
								while ($row = mysqli_fetch_assoc($data)) {
								?>
									<option value="<?php echo $row["sem_id"] ?>"><?php echo $row["sem_name"]; ?></option>
								<?php
								}
								?>
							</select>
						</div>
						<button type="submit" class="btn btn-primary mr-2" name="btn_submit">Add Semester</button>
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
					<h4 class="card-title">Semester list</h4>
					<p class="card-description">
						List of course semesters
					</p>
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<td> SI.NO </td>
									<td> Programme&nbsp;Name </td>
									<td> Semester&nbsp;Name </td>
									<td> Action </td>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 0;
								$selsql = "SELECT * FROM tbl_semester s inner join tbl_programme p on p.programme_id=s.programme_id INNER JOIN tbl_sem sem ON sem.sem_id=s.semester_name ORDER BY sem_id";
								$data = mysqli_query($con, $selsql);
								while ($row = mysqli_fetch_assoc($data)) {
									$i++;
								?>
									<tr>
										<td> <?php echo $i; ?> </td>
										<td> <?php echo $row["programme_name"]; ?> </td>
										<td> <?php echo $row["sem_name"]; ?> </td>
										<td><a href="Semester.php?del=<?php echo $row["semester_id"]; ?>"><button class="btn btn-info btn-block mr-2">Delete</button></a></td>
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