<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
include('Head.php');
if (isset($_POST["btn_submit"])) {
	$exam_name = $_POST["exam_name"];
	$sem_id = $_POST["sem_id"];
	$insQry = "INSERT INTO tbl_exam(exam_name,sem_id,exam_status) VALUES ('$exam_name',$sem_id,0)";
	if (mysqli_query($con, $insQry)) {
?>
	<?php
	} else {
	?>
		<script>
			alert('Couldn\'t add exam!!');
		</script>
	<?php	}
}

if (isset($_GET["del"])) {
	$del = $_GET["del"];
	$delQry = "DELETE FROM tbl_exam WHERE exam_id=$del";
	if (mysqli_query($con, $delQry)) {
	?>
		<script>
			window.location = "Exam.php";
		</script>
	<?php
	} else {
	?>
		<script>
			alert('Couldn\'t delete exam!!');
			window.location = "Exam.php";
		</script>
	<?php
	}
}


if (isset($_GET["sta"])) {
	$sta = $_GET["sta"];
	$pubQry = "UPDATE tbl_exam SET exam_status=1 WHERE exam_id=$sta";

	if (mysqli_query($con, $pubQry)) {

		$grpQry = "SELECT student_id FROM tbl_exam_mark WHERE exam_id=$sta GROUP BY student_id HAVING COUNT(*)>0";
		$grpdata = mysqli_query($con, $grpQry);

		while ($num = mysqli_fetch_assoc($grpdata)) {
			$student = $num["student_id"];
			$status = 0;
			$selsql = "SELECT * FROM tbl_exam_mark exmark INNER JOIN tbl_exam ex ON exmark.exam_id=ex.exam_id ORDER BY exmark.student_id";
			$data = mysqli_query($con, $selsql);
			while ($row = mysqli_fetch_assoc($data)) {
				if ($row["student_id"] == $student) {
					$total = $row["external_mark"] + $row["internal_mark"];
					if ($total < 35) {
						$status = -1;
						break;
					}
				}
			}
			$abc = mysqli_query($con, "INSERT INTO tbl_exam_status(exam_id,student_id,result_status) VALUES($sta,$student,$status)");
		}
	?>
		<script>
			window.location = "Exam.php";
		</script>
	<?php
	} else {
	?>
		<script>
			alert('Couldn\'t publish exam!!');
			window.location = "Exam.php";
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
	<title>Admin | Exam</title>
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
						Add new examination
					</p>
					<form action="" method="post" class="forms-sample">
						<div class="form-group">
							<label for="exam_name">
								<h4 class="card-title">Exam Name</h4>
							</label>
							<input type="text" class="form-control" name="exam_name" placeholder="Exam name" required title="Allows Only Numbers and Uppercase Alphabets" pattern="^[A-Z0-9 ]*$">
						</div>
						<div class="form-group">
							<label for="sem_id">
								<h4 class="card-title">Semester</h4>
							</label>
							<select class="form-control js-example-basic-single w-100" name="sem_id" required>
								<option value="">----select----</option>
								<?php
								$selSEM = "select * from tbl_sem";
								$data = mysqli_query($con, $selSEM);
								while ($row = mysqli_fetch_assoc($data)) {
								?>
									<option value="<?php echo $row["sem_id"] ?>"><?php echo $row["sem_name"]; ?></option>
								<?php
								}
								?>
							</select>
						</div>
						<button type="submit" class="btn btn-primary mr-2" name="btn_submit">Add Exam</button>
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
					<h4 class="card-title">Exams List</h4>
					<p class="card-description">
						Details of examinations
					</p>
					<div class="table-responsive">
						<table class="table table-primary table-bordered table-hover">
							<?php
							$selQry = "SELECT * FROM tbl_exam e INNER JOIN tbl_sem s ON e.sem_id=s.sem_id";
							$data = mysqli_query($con, $selQry);
							if (mysqli_num_rows($data) > 0) {
							?>
								<thead>
									<tr>
										<th>SI.NO</th>
										<th>Exam Name</th>
										<th>Semester</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 0;
									while ($row = mysqli_fetch_array($data)) {
										$i++;
									?> <tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $row["exam_name"]; ?></td>
											<td><?php echo $row["sem_name"]; ?></td>
											<?php
											if ($row["exam_status"] == 0) {
											?>
												<td><a href="Exam.php?sta=<?php echo $row["exam_id"]; ?>"><button class="btn btn-success btn-block mr-2">Publish</button></a></td>
											<?php
											} else {
											?>
												<td style="color:green">Published</td>
											<?php
											}
											?>
											<td><a href="Exam.php?del=<?php echo $row["exam_id"]; ?>"><button class="btn btn-info btn-block mr-2">Delete</button></a></td>
										</tr>
								<?php
									}
								} else {
									echo "0 results";
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