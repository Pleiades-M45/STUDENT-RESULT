<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
include('Head.php');
$selQry = "SELECT * FROM tbl_teacher WHERE teacher_id='" . $_SESSION["teacherid"] . "'";
$data = mysqli_query($con, $selQry);
$row = mysqli_fetch_array($data);


if (isset($_POST["btn_submit"])) {
  $from_email = $_POST["from_email"];
  $name = $_POST["name"];
  $title = $_POST["title"];
  $message = $_POST["message"];
  $date_time=date('Y-m-d h:i:s A');

  $insql = "INSERT INTO tbl_complaints (complaint_name,complaint_email,complaint_title,complaint_message,complaint_date) VALUES ('$name','$from_email','$title','$message','$date_time')";
  if (mysqli_query($con, $insql)) {
?>
    
  <?php
  } else {
  ?>
    <script>
      alert('Couldn\'t send message!!');
    </script>
<?php
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Contact Us Form</title>
  <link rel="stylesheet" href="../Assets/CSS/contact.css">
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
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
        <h4 class="card-title">Send complaint to admin</h4>
          <div class="bye">
            <div class="complaintbox">
              <div class="image-box">
                <img src="../Assets/Images/contact-us_image.jpg" alt="contact us image" style="border-radius:0;" />
              </div>
              <form action="" method="POST">
                <div class="topic">Send us a message</div>
                <div class="input-box nochange">
                  <input type="text" required value="<?php echo $row["teacher_email"]; ?>" readonly name="from_email">
                  <label>Your email</label>
                </div>

                <div class="input-box nochange">
                  <input type="text" required value="<?php echo $row["teacher_name"]; ?>" readonly name="name">
                  <label>Name</label>
                </div>

                <div class="input-box">
                  <input type="text" required name="title" pattern="^[a-zA-Z]+[a-zA-Z0-9\.\+\-\' ]*$"/>
                  <label>Enter the title</label>
                </div>

                <div class="message-box">
                  <textarea name="message" required></textarea>
                  <label>Enter your message</label>
                </div>
                <div class="input-box">
                  <input type="submit" value="Send Message" name="btn_submit" />
                </div>
              </form>
            </div>
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