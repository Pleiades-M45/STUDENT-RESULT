<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
include('Head.php');
if (isset($_POST["btn_submit"])) {
	$teacher_name = $_POST["teacher_name"];
	$teacher_email = $_POST["teacher_email"];
	$teacher_password = 'Teacher123';
	$teacher_contact = $_POST["teacher_contact"];

	$insql = "INSERT INTO tbl_teacher (teacher_name,teacher_email,teacher_password,teacher_contact) VALUES ('$teacher_name','$teacher_email','$teacher_password','$teacher_contact')";
	if (mysqli_query($con, $insql)) {
?>
	<?php
	} else {
	?>
		<script>
			alert('Couldn\'t add teacher !!');
		</script>
	<?php
	}
}
if (isset($_GET["del"])) {
	$del = $_GET["del"];
	$delsql = "DELETE FROM tbl_teacher WHERE teacher_id='$del'";
	if (mysqli_query($con, $delsql)) {
	?>
		<script>
			window.location = "Teacher.php";
		</script>
	<?php
	} else {
	?>
		<script>
			alert('Couldn\'t delete teacher!!');
			window.location = "Teacher.php";
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
	<title>Admin | Teacher</title>
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
						Add a new teacher
					</p>
					<form action="" method="post" class="forms-sample">
						<div class="form-group">
							<label for="teacher_name">
								<h4 class="card-title">Name</h4>
							</label>
							<input type="text" class="form-control" name="teacher_name" placeholder="Name" required title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$">
						</div>
						<div class="form-group">
							<label for="teacher_email">
								<h4 class="card-title">Email</h4>
							</label>
							<input type="email" class="form-control" name="teacher_email" placeholder="Email" required>
						</div>
						
						<div class="form-group">
							<label for="teacher_contact">
								<h4 class="card-title">Contact</h4>
							</label>
							<td><input type="text" class="form-control" name="teacher_contact" maxlength=10 placeholder="Contact" required pattern="[7-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaing 9 digit with 0-9"></td>
						</div>
						<button type="submit" class="btn btn-primary mr-2" name="btn_submit">Add Teacher</button>
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
					<h4 class="card-title">Teachers List</h4>
					<p class="card-description">
						Details of all teachers
					</p>
					<div class="table-responsive">
						<table class="table table-primary table-bordered table-hover">
							<thead>
								<tr>
									<th>S.I NO</th>
									<th>Name</th>
									<th>Email</th>
									<th>Contact</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 0;
								$selQry = "select * from tbl_teacher";
								$data = mysqli_query($con, $selQry);
								while ($row = mysqli_fetch_assoc($data)) {
									$i++;
								?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row["teacher_name"]; ?></td>
										<td><?php echo $row["teacher_email"]; ?></td>
										<td><?php echo $row["teacher_contact"]; ?></td>
										<td><a href="Teacher.php?del=<?php echo $row["teacher_id"]; ?>"><button class="btn btn-info btn-block mr-2">Delete</button></a></td>
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