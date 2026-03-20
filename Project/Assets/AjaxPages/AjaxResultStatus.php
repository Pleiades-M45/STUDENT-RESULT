<?php
include("../Connection/Connection.php");
session_start();

$exam_id = $_GET["exid"];
$programme_id = $_GET["pid"];
$i = 0;
$selsql = "SELECT * FROM tbl_student stud INNER JOIN tbl_exam_status exsta ON exsta.student_id=stud.student_id WHERE stud.programme_id=$programme_id AND exsta.exam_id=$exam_id";
$data = mysqli_query($con, $selsql);
if (mysqli_num_rows($data) > 0) {
?>
    <table class="table table-primary table-bordered" >
        <thead>
            <tr>
                <th width=300> SI.NO </th>
                <th width=300> Student Name </th>
                <th width=300> Status </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $total_students = 0;
            $pass_status=0;
            $pass_percentage=0;
            while ($row = mysqli_fetch_assoc($data)) {
                $i++;
                $total_students++;
            ?>
                <tr>
                    <td> <?php echo $i; ?> </td>
                    <td> <?php echo $row["student_name"]; ?> </td>
                    <?php
                    if ($row["result_status"] == 0) {
                        $pass_status++;
                    ?>
                        <td style="color:green;"> <?php echo "Passed"; ?> </td>
                    <?php
                    } else {
                    ?>
                        <td style="color:red;"> <?php echo "Failed"; ?> </td>
                
    <?php
                    }
                }
                $pass_percentage=($pass_status/$total_students)*100;

                ?>
</tr>
                <tr>
                    <th colspan="3" style="vertical-align:middle;text-align:center;">Pass Percentage : <?php echo $pass_percentage; ?>% </th>
                </tr>
                <?php
            } else {
                echo "0 results";
            }
    ?>
        </tbody>
    </table>