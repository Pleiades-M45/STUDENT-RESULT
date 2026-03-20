<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
include('Head.php');
$selQry = "SELECT * FROM tbl_student s INNER JOIN tbl_programme p ON s.programme_id=p.programme_id  INNER JOIN tbl_parent pa ON pa.parent_id=s.parent_id WHERE s.student_id='" . $_SESSION["studentid"] . "'";
$data = mysqli_query($con, $selQry);
$row = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student | MyProfile</title>
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
                                            <img src="../Assets/Files/<?php echo $row["student_photo"]; ?>" width="200" height="200">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Name : </th>
                                    <td><?php echo $row["student_name"]; ?></td>
                                </tr>
                                <tr>
                                    <th>Email :</th>
                                    <td><?php echo $row["student_email"]; ?></td>
                                </tr>
                                <tr>
                                    <th>Date of Birth :</th>
                                    <td><?php
                                        if ($row["student_dob"] == '0000-00-00') {
                                            echo "";
                                        } else {
                                            echo date('d-m-Y', strtotime($row["student_dob"]));
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Programme :</th>
                                    <td><?php echo $row["programme_name"]; ?></td>
                                </tr>
                                <tr>
                                    <th>Admission No :</th>
                                    <td><?php echo $row["student_admno"]; ?></td>
                                </tr>
                                <tr>
                                    <th>Parent :</th>
                                    <td><?php echo $row["parent_name"]; ?></td>
                                </tr>
                                <tr>
                                    <th>Contact :</th>
                                    <td><?php echo $row["student_contact"]; ?></td>
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