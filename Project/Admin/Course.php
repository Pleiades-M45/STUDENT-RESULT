<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
include('Head.php');
if (isset($_POST["btn_submit"])) {
	$programme = $_POST["programme"];
	$semester = $_POST["semester"];
	$courses_code = $_POST["courses_code"];
	$courses_name = $_POST["courses_name"];
	$credits = $_POST["credits"];

	$insql = "INSERT INTO tbl_courses (semester_id,programme_id,courses_code,courses_name,credits) VALUES ($semester,$programme,'$courses_code','$courses_name',$credits)";
	if (mysqli_query($con, $insql)) {
?>
	<?php
	} else {
	?>
		<script>
			alert('Couldn\'t add course!!');
		</script>
	<?php
	}
}
if (isset($_GET["del"])) {
	$del = $_GET["del"];
	$delsql = "DELETE FROM tbl_courses WHERE courses_id='$del'";
	if (mysqli_query($con, $delsql)) {
	?>
		<script>
			window.location = "Course.php";
		</script>
	<?php
	} else {
	?>
		<script>
			alert('Couldn\'t delete course!!');
			window.location = "Course.php";
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
	<title>Admin | Course</title>
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
							<label for="programme">
								<h4 class="card-title">Programme</h4>
							</label>
							<select class="form-control js-example-basic-single w-100" name="programme" id="programme" onchange="getSemester(this.value)" required>
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
							<select class="form-control js-example-basic-single w-100" name="semester" id="semester" required>
							</select>
						</div>
						<div class="form-group">
							<label for="courses_code">
								<h4 class="card-title">Course Code</h4>
							</label>
							<input type="text" class="form-control" name="courses_code" placeholder="Course code" required title="Allows Only Numbers and Uppercase alphabets" pattern="^[A-Z0-9]*$">
						</div>
						<div class="form-group">
							<label for="courses_name">
								<h4 class="card-title">Course Name</h4>
							</label>
							<input type="text" class="form-control" name="courses_name" placeholder="Course name" required title="Allows Only Alphabets,Spaces and Special Characters(-,+)" pattern="^[A-Z]+[a-zA-Z \+\-]*$">
						</div>
						<div class="form-group">
							<label for="credits">
								<h4 class="card-title">Credits</h4>
							</label>
							<input type="number" class="form-control" name="credits" min=1 max=10 placeholder="Credits" required>
						</div>
						<button type="submit" class="btn btn-primary mr-2" name="btn_submit">Add Course</button>
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
					<h4 class="card-title">Course List</h4>
					<p class="card-description">
						Details of all courses
					</p>
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<td>S.I NO</td>
									<td>Programme</td>
									<td>Course&nbsp;Code</td>
									<td>Course&nbsp;Name</td>
									<td>Credits</td>
									<td>Semester</td>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 0;
								$selQry = "SELECT * FROM tbl_courses co INNER JOIN tbl_sem sem ON sem.sem_id=co.semester_id INNER JOIN tbl_programme pro ON pro.programme_id=co.programme_id;";
								$data = mysqli_query($con, $selQry);
								while ($row = mysqli_fetch_assoc($data)) {
									$i++;
								?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row["programme_name"]; ?></td>
										<td><?php echo $row["courses_code"]; ?></td>
										<td><?php echo $row["courses_name"]; ?></td>
										<td><?php echo $row["credits"]; ?></td>
										<td><?php echo $row["sem_name"]; ?></td>
										<td><a href="Course.php?del=<?php echo $row["courses_id"]; ?>"><button class="btn btn-info btn-block mr-2">Delete</button></a></td>
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
	<script src="../Assets/JQ/jQuery.js"></script>
	<script>
		function getSemester(pid) {
			$.ajax({
				url: "../Assets/AjaxPages/AjaxSemester.php?pid=" + pid,
				success: function(result) {
					$("#semester").html(result);
				}
			});
		}
	</script>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>

</html>