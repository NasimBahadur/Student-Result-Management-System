<?php
session_start();
?>
<!-- Bootstrap 4 uses HTML elements and CSS properties that require the HTML5 doctype. -->
<!doctype html>
<!-- Always include the HTML5 doctype at the beginning of the page, along with the lang attribute and the correct character set -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- To ensure proper rendering and touch zooming for all devices, add the responsive viewport meta tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- My CSS-File Link -->
    <link rel="stylesheet" href="css/style.css">
    <title>Student Panel</title>
    <style>
        body{
            background-color: whitesmoke;
        }
    </style>
</head>

<body>
<div class="container mt-2">
    <nav class="navbar navbar-expand-lg navbar-light bg-white border ">
        <a class="nav-link h5 text-dark">Hi ! <p class="h5 text-primary">(<?php echo $_SESSION['firstName']." ".$_SESSION['lastName'].')'?></p></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end mt-1" id="navbarSupportedContent">
            <ul class="nav nav-fill">
                <li class="nav-item mx-2">
                    <a class="nav-link h6 btn btn-outline-dark " href="profile.php">Personal Info</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link h6 btn btn-outline-dark" href="marks.php">Mark Distribution</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link h6 btn btn-outline-dark" href="grade.php">Grade Report</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link h6 btn btn-outline-danger" href="logout.php">Log out</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="my-2 mx-3" id="personinfo">
        <div class="row justify-content-center bg-white">
            <div class="col-auto p-5">
                <img alt="profile picture" src="image\profile.png"
                     style="height:180px; width:180px;border: 5px solid rgba(0,0,0,.08);border-radius: 100%;">
            </div>
        </div>
        <div class="row justify-content-center bg-white">
            <div class="col-auto">
                <table class="table table-responsive p-5">
                    <h5 class="text-center text-dark "><u>PROFILE</u></h5>
                    <tr>
                        <th>Name</th>
                        <td><?php echo ":  ".$_SESSION['firstName']." ".$_SESSION['lastName']?></td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <td><?php echo ":  ".$_SESSION['studentId']?></td>
                    </tr>
                    <tr>
                        <th>Birthdate</th>
                        <td><?php echo ":  ".$_SESSION['birthdate']?></td>
                    </tr>
                    <tr>
                        <th>Mobile No</th>
                        <td><?php echo ":  ".$_SESSION['phone']?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo ":  ".$_SESSION['email']?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
