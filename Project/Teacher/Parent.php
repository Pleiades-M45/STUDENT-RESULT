<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
include('Head.php');
if (isset($_POST["btn_submit"])) {
	$parent_name = $_POST["parent_name"];
	$parent_email = $_POST["parent_email"];
	$parent_password = 'Parent123';
	$parent_contact = $_POST["parent_contact"];

	$insql = "INSERT INTO tbl_parent (parent_name,parent_email,parent_password,parent_contact) VALUES ('$parent_name','$parent_email','$parent_password','$parent_contact')";
	if (mysqli_query($con, $insql)) {
?>

	<?php
	} else {
	?>
		<script>
			alert('Couldn\'t add parent !!');
		</script>
	<?php
	}
}
if (isset($_GET["del"])) {
	$del = $_GET["del"];
	$delsql = "DELETE FROM tbl_parent WHERE parent_id='$del'";
	if (mysqli_query($con, $delsql)) {
	?>
		<script>
			window.location = "Parent.php";
		</script>
	<?php
	} else {
	?>
		<script>
			alert('Couldn\'t delete parent!!');
			window.location = "Parent.php";
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
	<title>Teacher | Parent</title>
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
	<div class="col-xl-3 grid-margin stretch-card">
        </div>
		<div class="col-6 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<p class="card-description">
						Add a parent
					</p>
					<form action="" method="POST" class="forms-sample">
						<div class="form-group">
							<label for="parent_name">
								<h4 class="card-title">Name</h4>
							</label>
							<input type="text" class="form-control" name="parent_name" placeholder="Parent name" required title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$">
						</div>
						<div class="form-group">
							<label for="parent_email">
								<h4 class="card-title">Email</h4>
							</label>
							<input type="email" class="form-control" name="parent_email" placeholder="Parent email" required>
						</div>
						
						<div class="form-group">
							<label for="parent_contact">
								<h4 class="card-title">Contact</h4>
							</label>
							<input type="text" class="form-control" name="parent_contact" maxlength=10 placeholder="Contact number" required pattern="[7-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaing 9 digit with 0-9">
						</div>
						<button type="submit" class="btn btn-primary mr-2" name="btn_submit">Add Parent</button>
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
					<h4 class="card-title">Parents List</h4>
					<p class="card-description">
						Details of all parents
					</p>
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>S.I NO</th>
									<th>Parent&nbsp;Name</th>
									<th>Parent&nbsp;Email</th>
									<th>Parent&nbsp;Contact</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 0;
								$selQry = "select * from tbl_parent";
								$data = mysqli_query($con, $selQry);
								while ($row = mysqli_fetch_assoc($data)) {
									$i++;
								?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row["parent_name"]; ?></td>
										<td><?php echo $row["parent_email"]; ?></td>
										<td><?php echo $row["parent_contact"]; ?></td>
										<td><a href="Parent.php?del=<?php echo $row["parent_id"]; ?>"><button class="btn btn-info btn-block mr-2">Delete</button></a></td>
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