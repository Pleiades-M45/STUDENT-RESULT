<?php
session_start();
ob_start();
include('Head.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | MyProfile</title>
    <link rel="stylesheet" href="../Assets/CSS/Font.css">
    <style>
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
                    <div class="table-responsive">
                        <table class="table table-dark table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th colspan=2 style="vertical-align:middle;text-align:center;">
                                            <img src="../Assets/Files/<?php echo $_SESSION["adminpic"]; ?>" width="200" height="200">
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        Name :
                                    </th>
                                    <td><?php echo $_SESSION["adminname"]; ?></td>
                                </tr>
                                <tr>
                                    <th>Email :</th>
                                    <td><?php echo $_SESSION["adminemail"] ?></td>
                                </tr>
                            </thead>
                        </table>
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