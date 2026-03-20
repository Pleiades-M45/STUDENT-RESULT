<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
include('Head.php');
if (isset($_POST["btn_submit"])) {
    $exam_id = $_POST["exam_id"];
    $courses_id = $_POST["courses_id"];
    $student_id = $_POST["student_id"];
    $external_mark = $_POST["external_mark"];
    $internal_mark = $_POST["internal_mark"];

    $insQry = "INSERT INTO tbl_exam_mark(courses_id,teacher_id,student_id,exam_id,internal_mark,external_mark) VALUES($courses_id,'" . $_SESSION["teacherid"] . "',$student_id,$exam_id,$internal_mark,$external_mark)";
    if (mysqli_query($con, $insQry)) {
?>
    <?php
    } else {
    ?>
        <script>
            alert('Couldn\'t add marks!!');
        </script>
    <?php    }
}

if (isset($_GET["del"])) {
    $del = $_GET["del"];
    $delQry = "DELETE FROM tbl_exam_mark WHERE mark_id=$del";
    if (mysqli_query($con, $delQry)) {
    ?>
        <script>
            window.location = "ExamMark.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Couldn\'t delete marks!!');
            window.location = "ExamMark.php";
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
    <title>Teacher | ExamMark</title>
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
                        Add marks
                    </p>
                    <form action="" method="POST" class="forms-sample">
                        <div class="form-group">
                            <label for="programme">
                                <h4 class="card-title">Exam</h4>
                            </label>
                            <select class="form-control js-example-basic-single w-100" name="exam_id" id="exam_id" onchange="getSemester(this.value)" required>
                                <option value="">----select----</option>
                                <?php
                                $selQry = "select * from tbl_exam WHERE exam_status=0";
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
                            <label for="courses_id">
                                <h4 class="card-title">Course</h4>
                            </label>
                            <select class="form-control js-example-basic-single w-100" name="courses_id" id="courses_id" onchange="getStudent(this.value)" required>
                                <option value="">----select----</option>
                                <?php
                                $selQry = "SELECT * FROM tbl_teacher t INNER JOIN tbl_assign a ON a.teacher_id=t.teacher_id INNER JOIN tbl_courses c ON c.courses_id=a.courses_id WHERE t.teacher_id='" . $_SESSION["teacherid"] . "'";
                                $data = mysqli_query($con, $selQry);
                                while ($row = mysqli_fetch_assoc($data)) {
                                ?>
                                    <option value="<?php echo $row["courses_id"] ?>"><?php echo $row["courses_name"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="student_id">
                                <h4 class="card-title">Student</h4>
                            </label>
                            <select class="form-control js-example-basic-single w-100" name="student_id" id="student" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="internal_mark">
                                <h4 class="card-title">Internal Marks</h4>
                            </label>
                            <input type="number" class="form-control" name="internal_mark" size=5 min=0 max=20 required>
                        </div>
                        <div class="form-group">
                            <label for="external_mark">
                                <h4 class="card-title">External Marks</h4>
                            </label>
                            <input type="number" class="form-control" name="external_mark" size=5 min=0 max=80 required>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2" name="btn_submit">Add</button>
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
                    <h4 class="card-title">Marks</h4>
                    <p class="card-description">
                        Details of all marks
                    </p>
                    <?php
                    $i = 0;
                    $selsql = "SELECT * FROM tbl_exam_mark ex  INNER JOIN tbl_exam x ON x.exam_id=ex.exam_id INNER JOIN tbl_teacher t ON ex.teacher_id=t.teacher_id INNER JOIN tbl_courses c ON c.courses_id=ex.courses_id INNER JOIN tbl_programme p ON p.programme_id=c.programme_id INNER JOIN tbl_student s ON s.student_id=ex.student_id WHERE ex.teacher_id='" . $_SESSION["teacherid"] . "'";
                    $data = mysqli_query($con, $selsql);
                    if (mysqli_num_rows($data) > 0) {
                    ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th> SI.NO </th>
                                        <th> Exam&nbsp;Name </th>
                                        <th> Programme&nbsp;Name </th>
                                        <th> Course&nbsp;Name </th>
                                        <th> Student&nbsp;Name </th>
                                        <th> Internal&nbsp;Marks </th>
                                        <th> External&nbsp;Marks </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($data)) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td> <?php echo $i; ?> </td>
                                            <td> <?php echo $row["exam_name"]; ?> </td>
                                            <td> <?php echo $row["programme_name"]; ?> </td>
                                            <td> <?php echo $row["courses_name"]; ?> </td>
                                            <td> <?php echo $row["student_name"]; ?> </td>
                                            <td> <?php echo $row["internal_mark"]; ?> </td>
                                            <td> <?php echo $row["external_mark"]; ?> </td>
                                            <td> <a href="ExamMark.php?del=<?php echo $row["mark_id"]; ?>"><button class="btn btn-info btn-block mr-2">Delete</button></a></td>
                                        </tr>

                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    <?php
                    } else {
                        echo "0 results";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="../Assets/JQ/jQuery.js"></script>
    <script>
        function getStudent(pid) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxStudent.php?pid=" + pid,
                success: function(result) {
                    $("#student").html(result);
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