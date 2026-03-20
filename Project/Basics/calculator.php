<?php
 $n1="";
 $n2="";
 $result="";
 if(isset($_POST["btn_add"]))
 {
	 $n1=$_POST["txt_no1"];
     $n2=$_POST["txt_no2"];
     $result=$n1 + $n2;
 }
 if(isset($_POST["btn_sub"]))
 {
	 $n1=$_POST["txt_no1"];
     $n2=$_POST["txt_no2"];
     $result=$n1 - $n2;
 }
 if(isset($_POST["btn_mul"]))
 {
	 $n1=$_POST["txt_no1"];
     $n2=$_POST["txt_no2"];
     $result=$n1 * $n2;
 }
 if(isset($_POST["btn_div"]))
 {
	 $n1=$_POST["txt_no1"];
     $n2=$_POST["txt_no2"];
     $result=$n1 / $n2;
 }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Calculator</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="5" align="center">
    <tr>
      <td>Number 1</td>
      <td>
        <label for="txt_no1"></label>
        <input type="text" name="txt_no1" id="txt_no1" value="<?php echo $n1; ?>" />
      </td>
    </tr>
    <tr>
      <td>Number 2</td>
      <td>
        <label for="txt_no2"></label>
        <input type="text" name="txt_no2" id="txt_no2" value="<?php echo $n2; ?>" />  
      </td>
    </tr>
    <tr>
      <td colspan="2">
       <input type="submit" name="btn_add" id="btn_add" value="Add" />
       <input type="submit" name="btn_sub" id="btn_sub" value="Subtract" />
       <input type="submit" name="btn_mul" id="btn_mul" value="Multiply" />
       <input type="submit" name="btn_div" id="btn_div" value="Divide" />
      </td>
    </tr>
    <tr>
      <td>Result</td>
      <td><?php echo $result; ?></td>
    </tr>
  </table>
</form>
</body>
</html>