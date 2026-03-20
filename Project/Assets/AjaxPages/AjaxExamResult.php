<?php
include("../Connection/Connection.php");
session_start();
ob_start();

$exam_id = $_GET["pid"];
$i = 0;
$selsql = "SELECT * FROM tbl_exam_mark ex INNER JOIN tbl_student s ON s.student_id=ex.student_id INNER JOIN tbl_courses c ON c.courses_id=ex.courses_id INNER JOIN tbl_exam exam ON exam.exam_id=ex.exam_id INNER JOIN tbl_programme pro ON pro.programme_id=s.programme_id WHERE ex.student_id='" . $_SESSION["studentid"] . "' AND exam.exam_id=$exam_id";
$data = mysqli_query($con, $selsql);
if (mysqli_num_rows($data) > 0) {
    $real_row_num=mysqli_num_rows($data);
    $abc = mysqli_fetch_assoc($data);
    $semester_id=$abc["semester_id"];
    $programme_id=$abc["programme_id"];
    $selnum="SELECT * FROM tbl_courses WHERE programme_id=$programme_id AND semester_id=$semester_id";
    $course_data = mysqli_query($con, $selnum);
    if(mysqli_num_rows($course_data)==$real_row_num)
    {
        ?>
        <section id="pleasework">
            <?php
            $abc = mysqli_fetch_assoc($data);
            ?>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th>
                            <p style="font-size:large;" align="center"><?php echo $abc["exam_name"]; ?></p>
                        </th>
                    </tr>
                    <tr>
                        <th></th>
                    </tr>
                    <tr>
                        <th style="padding-left:40%;">Admission No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<?php echo $abc["student_admno"]; ?></td>
                    </tr>
                    <tr>
                        <th style="padding-left:40%;">Name of Student &nbsp;: &nbsp;<?php echo $abc["student_name"]; ?></td>
                    </tr>
                    <tr>
                        <th style="padding-left:40%;">Date of Birth &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<?php echo $abc["student_dob"]; ?></td>
                    </tr>
                    <tr>
                        <th style="padding-left:40%;">Programme &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<?php echo $abc["programme_name"]; ?></td>
                    </tr>
                    <tr>
                        <th></th>
                    </tr>
                </tbody>
            </table>
            <table class="table table-primary table-bordered">
                <thead>
                    <tr>
                        <th rowspan=2 style="vertical-align:middle;text-align:center;"> Course&nbsp;Code </th>
                        <th rowspan=2 style="vertical-align:middle;text-align:center;"> Course </th>
                        <th rowspan=2 style="vertical-align:middle;text-align:center;"> Credit </th>
                        <th colspan=2 style="vertical-align:middle;text-align:center;"> EXTERNAL </th>
                        <th colspan=2 style="vertical-align:middle;text-align:center;"> INTERNAL </th>
                        <th rowspan=2 style="vertical-align:middle;text-align:center;"> Total </th>
                        <th rowspan=2 style="vertical-align:middle;text-align:center;"> MAX </th>
                        <th rowspan=2 style="vertical-align:middle;text-align:center;"> Grade </th>
                        <th rowspan=2 style="vertical-align:middle;text-align:center;"> GP </th>
                        <th rowspan=2 style="vertical-align:middle;text-align:center;"> CP </th>
                        <th rowspan=2 style="vertical-align:middle;text-align:center;"> Result </th>
                    </tr>
                    <tr>
                        <th>ESA</th>
                        <th>MAX</th>
                        <th>ISA</th>
                        <th>MAX</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = mysqli_query($con, $selsql);
                    $total_credits = 0;
                    $total_mark = 0;
                    $total_cp = 0;
                    $status = 0;
                    while ($row = mysqli_fetch_assoc($data)) {
                        $i++;
                    ?>
                        <tr>
                            <td style="vertical-align:middle;text-align:center;"> <?php echo $row["courses_code"]; ?> </td>
                            <td> <?php echo $row["courses_name"]; ?> </td>
                            <td style="vertical-align:middle;text-align:center;">
                                <?php
                                $total_credits = $total_credits + $row["credits"];
                                echo $row["credits"];
                                ?>
                            </td>
                            <td style="vertical-align:middle;text-align:center;"> <?php echo $row["external_mark"]; ?> </td>
                            <td style="vertical-align:middle;text-align:center;"> <?php echo "80"; ?> </td>
                            <td style="vertical-align:middle;text-align:center;"> <?php echo $row["internal_mark"]; ?> </td>
                            <td style="vertical-align:middle;text-align:center;"> <?php echo "20"; ?> </td>
                            <?php
                            $total = $row["external_mark"] + $row["internal_mark"];
                            $total_mark = $total_mark + $total;
                            ?>
                            <td style="vertical-align:middle;text-align:center;">
                                <?php
                                if ($total >= 35) {
                                    echo $total;
                                } else {
                                    echo "---";
                                }
                                ?>
                            </td>
                            <td style="vertical-align:middle;text-align:center;"> <?php echo "100"; ?> </td>
                            <td style="vertical-align:middle;text-align:center;">
                                <?php
                                $result = "Passed";
                                if ($total >= 95) {
                                    echo "S";
                                    $gp = 10;
                                } else if ($total >= 85 && $total < 95) {
                                    echo "A+";
                                    $gp = 9;
                                } else if ($total >= 75 && $total < 85) {
                                    echo "A";
                                    $gp = 8;
                                } else if ($total >= 65 && $total < 75) {
                                    echo "B+";
                                    $gp = 7;
                                } else if ($total >= 55 && $total < 65) {
                                    echo "B";
                                    $gp = 6;
                                } else if ($total >= 45 && $total < 55) {
                                    echo "C";
                                    $gp = 5;
                                } else if ($total >= 35 && $total < 45) {
                                    echo "D";
                                    $gp = 4;
                                } else if ($total < 35) {
                                    echo "---";
                                    $result = "Failed";
                                }
                                ?>
                            </td>
                            <td style="vertical-align:middle;text-align:center;">
                                <?php
                                if ($total >= 35) {
                                    echo $gp;
                                } else {
                                    echo "---";
                                }
                                ?>
                            </td>
                            <td style="vertical-align:middle;text-align:center;">
                                <?php
                                if ($total >= 35) {
                                    $cp = $row["credits"] * $gp;
                                    $total_cp = $total_cp + $cp;
                                    echo $cp;
                                } else {
                                    echo "---";
                                }
                                ?>
                            </td>
                            <?php if ($result == "Passed") {
                            ?>
                                <td style="vertical-align:middle;text-align:center;color:green;"><?php echo $result; ?></td>
                            <?php
                            } else {
                                $status = -1;
                            ?>
                                <td style="vertical-align:middle;text-align:center;color:red;"><?php echo $result; ?></td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <th colspan=2 style="vertical-align:middle;text-align:center;">
                            SEMESTER RESULT
                        </th>
                        <th style="vertical-align:middle;text-align:center;"><?php echo $total_credits; ?></th>
                        <?php $scpa = $total_cp / $total_credits; ?>
                        <th colspan=4 style="vertical-align:middle;text-align:center;">
                            SCPA :
                            <?php
                            if ($status == -1) {
                                echo "---";
                            } else {
                                echo $scpa;
                            }
                            ?>
                        </th>
                        <th style="vertical-align:middle;text-align:center;">
                            <?php
                            if ($total_mark >= 210) {
                                echo $total_mark;
                            } else {
                                echo "---";
                            }
                            ?>
                        </th>
                        <th style="vertical-align:middle;text-align:center;">600</th>
                        <th style="vertical-align:middle;text-align:center;">
                            <?php
                            if ($status == -1) {
                                echo "---";
                            } else {
                                if ($scpa >= 9.5)
                                    echo "S";
                                else if ($scpa >= 8.5 && $scpa < 9.5)
                                    echo "A+";
                                else if ($scpa >= 7.5 && $scpa < 8.5)
                                    echo "A";
                                else if ($scpa >= 6.5 && $scpa < 7.5)
                                    echo "B+";
                                else if ($scpa >= 5.5 && $scpa < 6.5)
                                    echo "B";
                                else if ($scpa >= 4.5 && $scpa < 5.5)
                                    echo "C";
                                else if ($scpa >= 3.5 && $scpa < 4.5)
                                    echo "D";
                                else
                                    echo "";
                            }
                            ?>
                        </th>
                        <th></th>
                        <th style="vertical-align:middle;text-align:center;">
                            <?php
                            if ($status == -1) {
                                echo "---";
                            } else {
                                echo $total_cp;
                            }
                            ?>
                        </th>
                        <?php
                        if ($status == -1) {
                        ?><th style="vertical-align:middle;text-align:center;color:red;">
                                <?php echo "Failed"; ?>
                            </th>
                        <?php
                        } else {
                        ?>
                            <th style="vertical-align:middle;text-align:center;color:green;">
                                <?php echo "Passed"; ?>
                            </th>
                        <?php
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        </section>
        <?php
        if ($status == 0) {
        ?>
            <p>
            <p align="center">Congratulations!! You have passed</p>
            </p>
        <?php
        } else {
        ?>
            <p>
            <p align="center">Better luck next time</p>
            </p>
    <?php
        }
    }
    else {
        echo "0 results";
    }
} else {
    echo "0 results";
}
?>
<?php
ob_end_flush();
?>