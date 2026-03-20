<?php
include("../Assets/Connection/Connection.php");
 session_start();
 ob_start();
include('Head.php');
 if(isset($_POST["btn_submit"]))
	{
		$current_password=$_POST["current_password"];
		$new_password=$_POST["new_password"];
		$re_password=$_POST["re_password"];
		
		$selQry="SELECT * FROM tbl_teacher WHERE teacher_id='".$_SESSION["teacherid"]."'";
		$data=mysqli_query($con,$selQry);
		$row= mysqli_fetch_array($data);
		
		if($current_password==$row["teacher_password"])
		{
			if($new_password==$re_password)
			{
				$upQry="UPDATE tbl_teacher SET teacher_password='$new_password' WHERE teacher_id='".$_SESSION["teacherid"]."'";
				if($data=mysqli_query($con,$upQry))
				{
					?>
				
			<?php
				}
				else
				{
					?>
					<script>
						alert('Password Updation Failed !!!');
					</script>
				<?php				}
			}
			else
			{
				?>
				<script>
					alert('Passwords do not match !!!');
				</script>
			<?php			}
		}
		else
		{
			?>
			<script>
				alert('Incorrect Current Password !!');
			</script>
	<?php		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Teacher | ChangePassword</title>
		<link rel="stylesheet" href="../Assets/CSS/Font.css">
</head>

<body>
<div class="row">
		<div class="col-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<p class="card-description">
						Set new password
					</p>
					<form action="" method="post" class="forms-sample">
						<div class="form-group">
							<label for="current_password"><h4 class="card-title">Current Password</h4></label>
							<input type="password" class="form-control" name="current_password" placeholder="Current Password" required>
						</div>
						<div class="form-group">
							<label for="new_password"><h4 class="card-title">New Password</h4></label>
							<input type="password" class="form-control" name="new_password" placeholder="New password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters">
						</div>
						<div class="form-group">
							<label for="re_password"><h4 class="card-title">Confirm New Password</h4></label>
							<input type="password" class="form-control" name="re_password" placeholder="Confirm new password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters">
						</div>
						<button type="submit" class="btn btn-primary mr-2" name="btn_submit">Submit</button>
						<button type="reset" class="btn btn-dark">Cancel</button>

					</form>
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