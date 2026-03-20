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
    <title>Teacher | Results</title>
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
                        View exam results
                    </p>
                    <form action="" method="POST" class="forms-sample">
                        <div class="form-group">
                            <label for="programme">
                                <h4 class="card-title">Exam</h4>
                            </label>
                            <select class="form-control js-example-basic-single w-100" name="exam_id" required id="exid">
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
                        <div class="form-group">
                            <label for="semester">
                                <h4 class="card-title">Programme</h4>
                            </label>
                            <select class="form-control js-example-basic-single w-100" name="programme_id" required id="pid">
                                <?php
                                $selQry = "SELECT * FROM tbl_programme";
                                $data = mysqli_query($con, $selQry);
                                while ($row = mysqli_fetch_assoc($data)) {
                                ?>
                                    <option value="<?php echo $row["programme_id"] ?>"><?php echo $row["programme_name"]; ?></option>
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
                <div class="card-body">
                    <h4 class="card-title">Results</h4>
                    <p class="card-description">
                        Pass details of students
                    </p>
                    <div id="examresult"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="../Assets/JQ/jQuery.js"></script>

    <script>
        function examcalc() {
            var exid = document.getElementById("exid").value;
            var pid = document.getElementById("pid").value;
            $.ajax({
                url: "../Assets/AjaxPages/AjaxResultStatus.php?exid=" + exid + "&pid=" + pid,
                success: function(result) {
                    $("#examresult").html(result);
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