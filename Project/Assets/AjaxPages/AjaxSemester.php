<option value="">----select----</option>
<?php      
    include("../Connection/Connection.php");
    
    $programme_id=$_GET["pid"];     
    $selQry="select * from tbl_semester s INNER JOIN tbl_sem sem ON sem.sem_id=s.semester_name where s.programme_id = $programme_id ORDER BY sem_id";
    $data=mysqli_query($con,$selQry);
    while($row=mysqli_fetch_assoc($data))
    {
?>
        <option value="<?php echo $row["semester_name"]; ?> ">
            <?php echo $row["sem_name"]; ?>
        </option>
<?php
    }
?>