<option value="">----select----</option>
<?php            
    include("../Connection/Connection.php");
    $programme_id=$_GET["pid"];     
    $semester_id=$_GET["sid"];
    $selQry="select * from tbl_courses where semester_id = $semester_id AND programme_id=$programme_id";
    $data=mysqli_query($con,$selQry);
    while($row=mysqli_fetch_assoc($data))
    {
?>
        <option value="<?php echo $row["courses_id"]; ?> ">
            <?php echo $row["courses_name"]; ?>
        </option>
<?php
    }
?>