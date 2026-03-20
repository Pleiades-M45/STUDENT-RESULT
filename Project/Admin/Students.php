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
    <title>Admin | Students</title>
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
                    <h4 class="card-title">Student List</h4>
                    <p class="card-description">
                        Details of all students
                    </p>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>S.I&nbsp;NO</th>
                                    <th>Image</th>
                                    <th>Admission&nbsp;Number</th>
                                    <th>Programme</th>
                                    <th>Student&nbsp;Name</th>
                                    <th>Student&nbsp;Email</th>
                                    <th>Student&nbsp;DOB</th>
                                    <th>Student&nbsp;Contact</th>
                                    <th>Parent&nbsp;Name</th>
                                    <th>Parent&nbsp;Email</th>
                                    <th>Parent&nbsp;Contact</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $selQry = "select * from tbl_student s inner join tbl_parent p on s.parent_id=p.parent_id inner join tbl_programme pro on pro.programme_id=s.programme_id";
                                $data = mysqli_query($con, $selQry);
                                while ($row = mysqli_fetch_assoc($data)) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><img style="width: 100px;height: 100px;" src="../Assets/Files/<?php echo $row["student_photo"]; ?>" ></td>
                                        <td><?php echo $row["student_admno"]; ?></td>
                                        <td><?php echo $row["programme_name"]; ?></td>
                                        <td><?php echo $row["student_name"]; ?></td>
                                        <td><?php echo $row["student_email"]; ?></td>
                                        <td><?php echo $row["student_dob"]; ?></td>
                                        <td><?php echo $row["student_contact"]; ?></td>
                                        <td><?php echo $row["parent_name"]; ?></td>
                                        <td><?php echo $row["parent_email"]; ?></td>
                                        <td><?php echo $row["parent_contact"]; ?></td>
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