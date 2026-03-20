<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
include('Head.php');
if (isset($_GET["del"])) {
	$del = $_GET["del"];
	$delsql = "DELETE FROM tbl_complaints WHERE complaint_id='$del'";
	if (mysqli_query($con, $delsql)) {
?>
		<script>
			window.location = "Complaint.php";
		</script>
	<?php
	} else {
	?>
		<script>
			alert('Couldn\'t delete complaint!!');
			window.location = "Complaint.php";
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
	<title>Admin | Complaints</title>
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
		<div class="col-lg-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Complaints List</h4>
					<p class="card-description">
						Details of received complaints
					</p>
					<div class="table-responsive">
						<table class="table table-primary table-bordered table-hover">
							<thead>
								<tr>
									<th> SI.NO </th>
									<th> Name </th>
									<th> Sender Email </th>
									<th> Title </th>
									<th> Message </th>
									<th> Date & Time </th>
									<th> Action </th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 0;
								$selsql = "SELECT * FROM tbl_complaints";
								$data = mysqli_query($con, $selsql);
								while ($row = mysqli_fetch_assoc($data)) {
									$i++;
								?>
									<tr>
										<td> <?php echo $i; ?> </td>
										<td> <?php echo $row["complaint_name"]; ?> </td>
										<td> <?php echo $row["complaint_email"]; ?> </td>
										<td> <?php echo $row["complaint_title"]; ?> </td>
										<td> <?php echo $row["complaint_message"]; ?> </td>
										<td> <?php echo $row["complaint_date"]; ?> </td>
										<td><a href="Complaint.php?del=<?php echo $row["complaint_id"]; ?>"><button class="btn btn-info btn-block mr-2">Delete</button></a></td>
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