<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
include('Head.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student | Result</title>
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
						View exam result
					</p>
					<form action="" method="POST" class="forms-sample">
						<div class="form-group">
							<label for="exam_id">
								<h4 class="card-title">Exam</h4>
							</label>
							<select class="form-control js-example-basic-single w-100" name="exam_id" id="exid" required>
								<?php
								$selQry = "select * from tbl_exam WHERE exam_status=1";
								$data = mysqli_query($con, $selQry);
								while ($row = mysqli_fetch_assoc($data)) {
								?>
									<option value="<?php echo $row["exam_id"] ?>"><?php echo $row["exam_name"]; ?></option>
								<?php
								}
								?>
							</select>
						</div>
						<button type="button" class="btn btn-primary mr-2" name="btn_submit" onclick="examcalc()">View</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body" id="examresult">
				</div>
				<p align="center"><button type="button" class="btn btn-info btn-icon-text" id="printresult" style="display:none;">Print<i class="mdi mdi-printer btn-icon-append"></i></button></p>
			</div>
		</div>
	</div>

	<script src="../Assets/JQ/jQuery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
	<script>
		function examcalc() {
			var pid = document.getElementById("exid").value;
			$.ajax({
				url: "../Assets/AjaxPages/AjaxExamResult.php?pid=" + pid,
				success: function(result) {
					$("#examresult").html(result);
				}
			});
			document.getElementById("printresult").style.display = "block";
		}

		jQuery(document).ready(function() {
			$('#printresult').click(function() {
				html2canvas(document.querySelector("#pleasework")).then((canvas) => {
					let base64image = canvas.toDataURL('image/png');
					//console.log(base64image);
					let pdf = new jsPDF('p', 'px', [1400, 1050]);
					pdf.addImage(base64image, 'PNG', 20, 20, 1000, 550);
					pdf.save('Result.pdf');
				});
			});
		});
	</script>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>
</html>