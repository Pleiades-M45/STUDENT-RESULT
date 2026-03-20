<?php
include("../Assets/Connection/Connection.php");
session_start();
ob_start();
include('Head.php');
$selQry = "SELECT * FROM tbl_parent WHERE parent_id='" . $_SESSION["parentid"] . "'";
$data = mysqli_query($con, $selQry);
$row = mysqli_fetch_array($data);

if (isset($_POST["btn_submit"])) {
    $name = $_POST["name"];
    $contact = $_POST["contact"];

    $image = $_FILES['image']['name'];
    $tempPath = $_FILES['image']['tmp_name'];

    $uploadTo = "../Assets/Files/";
    $allowedImageType = array('jpg', 'png', 'jpeg', 'gif', 'pdf', 'doc');
    $basename = basename($image);
    $originalPath = $uploadTo . $basename;
    $imageType = pathinfo($originalPath, PATHINFO_EXTENSION);
    if (!empty($image)) {
        if (in_array($imageType, $allowedImageType)) {
            if (move_uploaded_file($tempPath, $originalPath)) {
                $insqry = "UPDATE tbl_parent SET parent_name= '$name', parent_contact=$contact, parent_photo='$image' WHERE parent_id='" . $_SESSION["parentid"] . "'";
                if (mysqli_query($con, $insqry)) {
                    $_SESSION["parentname"] = $name;
                    $_SESSION["parentpic"] = $image;

?>
                    <script>
                        window.location = "EditProfile.php";
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        alert('Couldn\'t Update Profile !!');
                    </script>
                <?php
                }
            } else {
                ?>
                <script>
                    alert('Image should not exceed more than 2 MB');
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert('File type not allowed !');
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            alert('Please select an image');
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
    <title>Parent | EditProfile</title>
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
        <div class="col-xl-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="table-responsive">
                            <table class="table table-primary table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <th colspan=2 id="preview" style="vertical-align:middle;text-align:center;">
                                            <img src="../Assets/Files/<?php echo $row["parent_photo"]; ?>" width="200" height="200">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td><input type="text" class="form-control" name="name" value="<?php echo $_SESSION["parentname"]; ?>" required pattern="^[A-Z]+[a-zA-Z ]*$" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter"></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?php echo $row["parent_email"]; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Contact</th>
                                        <td><input type="text" class="form-control" name="contact" value="<?php echo $row["parent_contact"]; ?>" maxlength=10 required pattern="[7-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaing 9 digit with 0-9"></td>
                                    </tr>
                                    <tr>
                                        <th>Photo</th>
                                        <td><input type="file" class="form-control" name="image" id="image" required></td>
                                    </tr>
                                    <tr>
                                        <td colspan=2 align="center">
                                            <button type="submit" class="btn btn-primary mr-2" name="btn_submit">Update Profile</button>
                                            <button type="reset" class="btn btn-dark">Cancel</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../Assets/JQ/jQuery.js"></script>
    <script>
        function imagePreview(fileInput) {
            if (fileInput.files && fileInput.files[0]) {
                var fileReader = new FileReader();
                fileReader.onload = function(event) {
                    $('#preview').html('<img src="' + event.target.result + '" width="200" height="200"/>');
                };
                fileReader.readAsDataURL(fileInput.files[0]);
            }
        }
        $("#image").change(function() {
            imagePreview(this);
        });
    </script>

</body>
<?php
ob_end_flush();
include('Foot.php');
?>

</html>