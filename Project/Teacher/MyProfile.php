<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
include('Head.php');
$selQry = "SELECT * FROM tbl_teacher t INNER JOIN tbl_assign a ON t.teacher_id=a.teacher_id INNER JOIN tbl_courses c ON c.courses_id=a.courses_id WHERE t.teacher_id='" . $_SESSION["teacherid"] . "'";
$data = mysqli_query($con, $selQry);
$row = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher | MyProfile</title>
    <link rel="stylesheet" href="../Assets/CSS/Font.css">
    <style>
        a:hover {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-xl-3 grid-margin stretch-card">
        </div>
        <div class="col-xl-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-dark table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th colspan=2 style="vertical-align:middle;text-align:center;">
                                            <img src="../Assets/Files/<?php echo $row["teacher_photo"]; ?>" width="200" height="200">
                                        </th>
                                </tr>
                                <tr>
                                    <th>Name : </th>
                                    <td><?php echo $row["teacher_name"]; ?></td>
                                </tr>
                                <tr>
                                    <th>Email :</th>
                                    <td><?php echo $row["teacher_email"]; ?></td>
                                </tr>
                                <tr>
                                    <th style="vertical-align:middle;">Assigned&nbsp;Courses&nbsp;:</th>
                                    <td>
                                        <?php
                                        $data = mysqli_query($con, $selQry);
                                        while ($abc = mysqli_fetch_assoc($data))
                                            echo ($abc["courses_name"]) . "<br><br>";
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Contact :</th>
                                    <td><?php echo $row["teacher_contact"]; ?></td>
                                </tr>
                            </thead>
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