<?php
 if(isset($_POST["btn_submit"]))
 {
	 $fname=$_POST["fname"];
	 $lname=$_POST["lname"];
	 $btn_gen=$_POST["btn_gen"];
	 $btn_mar=$_POST["btn_mar"];
	 $btn_dep=$_POST["btn_dep"];
	 $salary=$_POST["salary"];
	 if($salary>=10000)
	 {
		 $ta=($salary*40)/100;
		 $da=($salary*35)/100;
		 $hra=($salary*30)/100;
		 $lic=($salary*25)/100;
		 $pf=($salary*20)/100;
	 }
	 else if($salary>=5000 && $salary<10000)
	 {
		 $ta=($salary*35)/100;
		 $da=($salary*30)/100;
		 $hra=($salary*25)/100;
		 $lic=($salary*20)/100;
		 $pf=($salary*15)/100;
	 }
	 else
	 {
		 $ta=($salary*30)/100;
		 $da=($salary*25)/100;
		 $hra=($salary*20)/100;
		 $lic=($salary*15)/100;
		 $pf=($salary*10)/100;
	 }
	 $deduction=$lic+$pf;
	 $net=$salary+$ta+$da+$hra-($lic+$pf);
	 if($btn_gen=="Male")
		$add_gen="Mr. ".$fname." ".$lname;
	 else
	 {
		if($btn_mar=="Single")
			$add_gen="Ms. ".$fname." ".$lname;
		else
			$add_gen="Mrs. ".$fname." ".$lname;
	 }
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Salary Calculation</title>
</head>

<body>
  <form action="" method="post">
			<table border="1" align="center">
				<tr>
					<th>First Name</th>
					<td width=200><input type="text" name="fname" value="<?php echo $fname;?>"></td>
				</tr>
				<tr>
					<th>Last Name</th>
					<td><input type="text" name="lname" value="<?php echo $lname;?>"></td>
				</tr>
				<tr>
					<th>Gender</th>
					<td>
						<input type="radio" name="btn_gen" value="Male" <?php if($btn_gen=="Male") echo "checked";?> >Male
						<input type="radio" name="btn_gen" value="Female" <?php if($btn_gen=="Female") echo "checked";?> >Female
					</td>
				</tr>
				<tr>
					<th>Marital</th>
					<td>
						<input type="radio" name="btn_mar" value="Single" <?php if($btn_mar=="Single") echo "checked";?> >Single
						<input type="radio" name="btn_mar" value="Married" <?php if($btn_mar=="Married") echo "checked";?> >Married
					</td>
				</tr>
				<tr>
					<th>Department</th>
					<td>
						<select name="btn_dep">
							<option value="">--select--</option>
							<option value="BCA">BCA</option>
							<option value="BTTM">BTTM</option>
							<option value="BCOM">BCOM</option>
                            <option value="Data Science">Data Science</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Basic Salary</th>
					<td><input type="number" name="salary"  value="<?php echo $salary;?>"></td>
				</tr>
				<tr>
					<td colspan=2 align="center">
						<input type="submit" name="btn_submit" value="Submit">
						<input type="reset" name="btn_cancel" value="Cancel">
					</td>
				</tr>
			</table>
			<table border="1" align="center">
				<tr>
					<th>Name</th>
					<td width=200>
					  <?php echo $add_gen; ?>
                    </td>
				</tr>
				<tr>
					<th>Gender</th>
					<td><?php echo $btn_gen; ?></td>
				</tr>
				<tr>
					<th>Marital</th>
					<td><?php echo $btn_mar; ?></td>
				</tr>
				<tr>
					<th>Department</th>
					<td><?php echo $btn_dep; ?></td>
				</tr>
				<tr>
					<th>Basic Salary</th>
					<td><?php echo $salary; ?></td>
				</tr>
				<tr>
					<th>T.A</th>
					<td><?php echo $ta; ?></td>
				</tr>
				<tr>
					<th>D.A</th>
					<td><?php echo $da; ?></td>
				</tr>
				<tr>
					<th>HRA</th>
					<td><?php echo $hra; ?></td>
				</tr>
				<tr>
					<th>LIC</th>
					<td><?php echo $lic; ?></td>
				</tr>
				<tr>
					<th>P.F</th>
					<td><?php echo $pf; ?></td>
				</tr>
				<tr>
					<th>Deduction</th>
					<td><?php echo $deduction; ?></td>
				</tr>
				<tr>
					<th>NET</th>
					<td><?php echo $net; ?></td>
				</tr>
			</table>
		</form>
</body>
</html>