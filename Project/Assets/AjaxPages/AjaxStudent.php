<option value="">----select----</option>
<?php      
    include("../Connection/Connection.php");
    
    $courses_id=$_GET["pid"];     
    $selQry="SELECT * FROM tbl_student s  INNER JOIN tbl_courses c ON c.programme_id=s.programme_id WHERE c.courses_id = $courses_id ";
    $data=mysqli_query($con,$selQry);
    while($row=mysqli_fetch_assoc($data))
    {
?>
        <option value="<?php echo $row["student_id"]; ?> ">
            <?php echo $row["student_name"]; ?>
        </option>
<?php
    }
?>