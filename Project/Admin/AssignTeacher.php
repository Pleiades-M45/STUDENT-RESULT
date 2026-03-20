<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
include('Head.php');
if (isset($_POST["btn_submit"])) {
    $programme = $_POST["programme"];
    $course = $_POST["course"];
    $teacher = $_POST["teacher"];

    $insql = "INSERT INTO tbl_assign (programme_id,courses_id,teacher_id) VALUES ($programme,$course,$teacher)";
    if (mysqli_query($con, $insql)) {
?>
    <?php
    } else {
    ?>
        <script>
            alert('Couldn\'t assign teacher !!');
        </script>
    <?php
    }
}
if (isset($_GET["del"])) {
    $del = $_GET["del"];
    $delsql = "DELETE FROM tbl_assign WHERE assign_id='$del'";
    if (mysqli_query($con, $delsql)) {
    ?>
        <script>
            window.location = "AssignTeacher.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Couldn\'t delete assignation!!');
            window.location = "AssignTeacher.php";
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
    <title>Admin | AssignTeacher</title>
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
                        Select and assign a course
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
                            <select class="form-control js-example-basic-single w-100" name="semester" id="semester" onchange="getCourse(this.value)" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="course">
                                <h4 class="card-title">Course</h4>
                            </label>
                            <select class="form-control js-example-basic-single w-100" name="course" id="course" required>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="teacher">
                                <h4 class="card-title">Teacher</h4>
                            </label>
                            <select class="form-control js-example-basic-single w-100" name="teacher" required>
                                <option value="">----select----</option>
                                <?php
                                $selQry = "select * from tbl_teacher";
                                $data = mysqli_query($con, $selQry);
                                while ($row = mysqli_fetch_assoc($data)) {
                                ?>
                                    <option value="<?php echo $row["teacher_id"] ?>"><?php echo $row["teacher_name"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2" name="btn_submit">Assign Teacher</button>
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
                    <h4 class="card-title">Assigned Courses</h4>
                    <p class="card-description">
                        Details of all courses assigned
                    </p>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>S.I NO</th>
                                    <th>Programme</th>
                                    <th>Semester</th>
                                    <th>Course&nbsp;Code</th>
                                    <th>Course&nbsp;Name</th>
                                    <th>Teacher&nbsp;Name</th>
                                    <th>Credits</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $selQry = "SELECT * FROM tbl_assign assign INNER JOIN tbl_programme pro ON pro.programme_id=assign.programme_id INNER JOIN tbl_courses co ON co.courses_id=assign.courses_id INNER JOIN tbl_teacher tea ON tea.teacher_id=assign.teacher_id INNER JOIN tbl_sem sem ON sem.sem_id=co.semester_id ORDER BY tea.teacher_name";
                                $data = mysqli_query($con, $selQry);
                                while ($row = mysqli_fetch_assoc($data)) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row["programme_name"]; ?></td>
                                        <td><?php echo $row["sem_name"]; ?></td>
                                        <td><?php echo $row["courses_code"]; ?></td>
                                        <td><?php echo $row["courses_name"]; ?></td>
                                        <td><?php echo $row["teacher_name"]; ?></td>
                                        <td><?php echo $row["credits"]; ?></td>

                                        <td><a href="AssignTeacher.php?del=<?php echo $row["assign_id"]; ?>"><button class="btn btn-info btn-block mr-2">Delete</button></a></td>
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

        function getCourse(sid) {
            var pid = document.getElementById("programme").value;
            $.ajax({
                url: "../Assets/AjaxPages/AjaxAssignCourse.php?sid=" + sid + "&pid=" + pid,
                success: function(result) {
                    $("#course").html(result);
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