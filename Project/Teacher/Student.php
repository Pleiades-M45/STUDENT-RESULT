<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
include('Head.php');
if (isset($_POST["btn_submit"])) {
    $student_dob = $_POST["student_dob"];
    $student_admno = $_POST["student_admno"];
    $student_name = $_POST["student_name"];
    $student_email = $_POST["student_email"];
    $student_password = 'Student123';
    $student_contact = $_POST["student_contact"];
    $programme = $_POST["programme"];
    $parent = $_POST["parent"];

    $insql = "INSERT INTO tbl_student (student_dob,student_admno,student_name,student_email,student_password,student_contact,programme_id,parent_id) VALUES ('$student_dob','$student_admno','$student_name','$student_email','$student_password','$student_contact',$programme,$parent)";
    if (mysqli_query($con, $insql)) {
?>

    <?php
    } else {
    ?>
        <script>
            alert('Couldn\'t add student !!');
        </script>
    <?php
    }
}
if (isset($_GET["del"])) {
    $del = $_GET["del"];
    $delsql = "DELETE FROM tbl_student WHERE student_id='$del'";
    if (mysqli_query($con, $delsql)) {
    ?>
        <script>
            window.location = "Student.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Couldn\'t delete student!!');
            window.location = "Student.php";
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
    <title>Teacher | Student</title>
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
                        Add a student
                    </p>
                    <form action="" method="POST" class="forms-sample">
                        <div class="form-group">
                            <label for="student_admno">
                                <h4 class="card-title">Admission No</h4>
                            </label>
                            <input type="text" class="form-control" name="student_admno" placeholder="Admission number" required title="Allows Only Uppercase Alphabets and Numbers" pattern="^[A-Z0-9]*$">
                        </div>
                        <div class="form-group">
                            <label for="programme">
                                <h4 class="card-title">Programme</h4>
                            </label>

                            <select class="form-control js-example-basic-single w-100" name="programme" required>
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
                            <label for="parent">
                                <h4 class="card-title">Parent</h4>
                            </label>

                            <select class="form-control js-example-basic-single w-100" name="parent" required>
                                <option value="">----select----</option>
                                <?php
                                $selQry = "select * from tbl_parent";
                                $data = mysqli_query($con, $selQry);
                                while ($row = mysqli_fetch_assoc($data)) {
                                ?>
                                    <option value="<?php echo $row["parent_id"] ?>"><?php echo $row["parent_email"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="student_name">
                                <h4 class="card-title">Name</h4>
                            </label>
                            <input type="text" class="form-control" name="student_name" placeholder="Student name" required title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$">
                        </div>
                        <div class="form-group">
                            <label for="student_email">
                                <h4 class="card-title">Email</h4>
                            </label>
                            <input type="email" class="form-control" name="student_email" placeholder="Student email" required>
                        </div>
                        <div class="form-group">
                            <label for="student_dob">
                                <h4 class="card-title">Date of Birth</h4>
                            </label>
                            <input type="date" class="form-control" name="student_dob"  required >
                        </div>
                        <div class="form-group">
                            <label for="student_contact">
                                <h4 class="card-title">Contact</h4>
                            </label>
                            <input type="text" class="form-control" name="student_contact" maxlength=10 placeholder="Contact number" required pattern="[7-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaing 9 digit with 0-9">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2" name="btn_submit">Add Student</button>
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
                                    <th>Action</th>
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
                                        <td><a href="Student.php?del=<?php echo $row["student_id"]; ?>"><button class="btn btn-info btn-block mr-2">Delete</button></a></td>
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