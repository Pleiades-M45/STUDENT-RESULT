<?php
include("../Assets/Connection/Connection.php");
session_start();
	if(isset($_POST["btn_submit"]))
	{
		$selAdmin="SELECT * FROM tbl_admin WHERE admin_email='".$_POST["email"]."' AND admin_password='".$_POST["password"]."'";
		$dataAdmin=mysqli_query($con,$selAdmin);

		$selStudent="SELECT * FROM tbl_student WHERE student_email='".$_POST["email"]."' AND student_password='".$_POST["password"]."'";
		$dataStudent=mysqli_query($con,$selStudent);

		$selTeacher="SELECT * FROM tbl_teacher WHERE teacher_email='".$_POST["email"]."' AND teacher_password='".$_POST["password"]."'";
		$dataTeacher=mysqli_query($con,$selTeacher);

		$selParent="SELECT * FROM tbl_parent WHERE parent_email='".$_POST["email"]."' AND parent_password='".$_POST["password"]."'";
		$dataParent=mysqli_query($con,$selParent);
		
		if($rowAdmin=mysqli_fetch_assoc($dataAdmin))
		{
			$_SESSION["adminid"]=$rowAdmin["admin_id"];
			$_SESSION["adminname"]=$rowAdmin["admin_name"];
			$_SESSION["adminpic"]=$rowAdmin["admin_photo"];
			$_SESSION["adminemail"]=$rowAdmin["admin_email"];
			header("location:../Admin/HomePage.php");
		}
		else if($rowStudent=mysqli_fetch_assoc($dataStudent))
		{
			$_SESSION["studentid"]=$rowStudent["student_id"];
			$_SESSION["studentname"]=$rowStudent["student_name"];
			$_SESSION["studentpic"]=$rowStudent["student_photo"];
			$_SESSION["studentemail"]=$rowStudent["student_email"];
			header("location:../Student/HomePage.php");
		}
		else if($rowTeacher=mysqli_fetch_assoc($dataTeacher))
		{
			$_SESSION["teacherid"]=$rowTeacher["teacher_id"];
			$_SESSION["teachername"]=$rowTeacher["teacher_name"];
			$_SESSION["teacherpic"]=$rowTeacher["teacher_photo"];
			$_SESSION["teacheremail"]=$rowTeacher["teacher_email"];
			header("location:../Teacher/HomePage.php");
		}
		else if($rowParent=mysqli_fetch_assoc($dataParent))
		{
			$_SESSION["parentid"]=$rowParent["parent_id"];
			$_SESSION["parentname"]=$rowParent["parent_name"];
			$_SESSION["parentpic"]=$rowParent["parent_photo"];
			$_SESSION["parentemail"]=$rowParent["parent_email"];
			header("location:../Parent/HomePage.php");
		}
		else
		{
			echo "<script> alert('Invalid Username or Password')</script>";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login</title>
		
		<link rel="stylesheet" href="../Assets/CSS/Font.css">
		<link rel="stylesheet" href="../Assets/CSS/login.css">

		<!-- envelope, lock -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<!-- eye -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">	
		<link rel="shortcut icon" href="../Assets/Template/Admin/images/favicon_new.png" />
	</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form" action="" method="post">
					<span style="padding-bottom:50px; padding-top:30px;" class="login100-form-title">
                        Log in
                    </span>
					
					<div class="wrap-input100">
						<input class="input100" type="email" name="email" placeholder="Email" required>
						<span class="focus-input100 material-icons" data-placeholder="&#xe0be;"></span>
					</div>

					<div class="wrap-input100">
						<input id="password" class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100 material-icons" data-placeholder="&#xe897;"></span>
						<i class="bi bi-eye-slash" id="togglePassword"></i>
					</div>

					<div class="contact100-form-checkbox">
						<!--
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" checked="checked">
						
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
						-->
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="btn_submit">
							Login
						</button>
					</div>

					<!-- <div class="forgot-password">
                        <a href="#">Forgot Password?</a>
                    </div> -->
    			</form>
			</div>
		</div>
	</div>
	<script>
		 const password = document.querySelector("#password");
		const togglePassword = document.querySelector("#togglePassword");
       

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

		</script>
</body>
</html>