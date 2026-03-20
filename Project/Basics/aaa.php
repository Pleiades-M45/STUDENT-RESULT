<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
    
}
if(isset($_GET["del"]))
	{
		$del=$_GET["del"];
		$delsql="DELETE FROM tbl_courses WHERE courses_id=$del";
		mysqli_query($con,$delsql);
	}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Dropdown</title>
    </head>
    <body>
        <form action="" method="post">
    	    <table border="1" align="center">
        	    <tr>
            	    <th>Programme</th>
                    <td width=200>
                	    <select name="programme" id="programme" onchange="getSemester(this.value)">
                    	    <option value="">----select----</option>
						        <?php
								    $selQry="select * from tbl_programme";
								    $data=mysqli_query($con,$selQry);
								    while($row=mysqli_fetch_assoc($data))
							    	{
								?>
                                        <option value = "<?php echo $row["programme_id"]; ?>" >
                                        <?php echo $row["programme_name"]; ?>
                                        </option>
                                    <?php
							    	}
						    	    ?>
                        </select>
                    </td>
                </tr>
                <tr>
            	    <th>Semester</th>
                    <td>
                	    <select name="semester" id="semester" onchange="getCourse(this.value)">
                        </select>
                    </td>
                </tr>
                <tr>
            	    <th>Course</th>
                    <td>
                	    <select name="course" id="course">
                        </select>
                    </td>
                </tr>
                <tr>
            	    <td colspan=2 align="center"><input type="submit" name="btn_submit" value="Submit"></td>
                </tr>
            </table> 
            <table border="1" align="center">
        	<tr width=200>
            	<th>S.I NO</th>
                <th>Programme</th>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Credits</th>
                <th>Semester</th>
                <th>Action</th>
            </tr>
             <?php
				$i=0;
				$selQry="select * from tbl_programme p inner join tbl_semester s on p.programme_id=s.programme_id inner join tbl_courses co on s.semester_id=co.semester_id";
				$data=mysqli_query($con,$selQry);
				while($row=mysqli_fetch_assoc($data))
				{
					$i++;
			?>
            <tr>
            	<td><?php echo $i; ?></td>
                <td><?php echo $row["programme_name"]; ?></td>
                <td><?php echo $row["courses_code"]; ?></td>
                <td><?php echo $row["courses_name"]; ?></td>
                <td><?php echo $row["credits"]; ?></td>
                <td><?php echo $row["semester_name"]; ?></td>
                <td><a href="aaa.php?del=<?php echo $row["courses_id"]; ?>" >Delete</a></td>
            </tr>
            <?php
			  }
		?>
    </table>
        </form>
        <script src="../Assets/JQ/jQuery.js"></script>
        <script>
        function getSemester(pid) 
        {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxSemester.php?pid="+pid,
                success: function(result){
                    $("#semester").html(result); 
                }
            });
        }
        function getCourse(sid) 
        {
            //var pid=document.getElementById("programme").value;
            //var sid=document.getElementById("semester").value;

            $.ajax({
                url: "../Assets/AjaxPages/AjaxCourse.php?sid="+sid,
                success: function(result){
                    $("#course").html(result); 
                }
            });
        }
        </script>
    </body>
</html>