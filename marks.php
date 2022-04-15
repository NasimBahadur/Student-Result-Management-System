<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "project480" );
if(!$conn){
    die("Connection Failed: ". mysqli_connect_error());
}

$valid=1;
$mark=array(array());
$sql = "SELECT * FROM marks where studentId = '$_SESSION[studentId]'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $i = 0;
    while($row = mysqli_fetch_assoc($result)) {
        $mark[$i++]=array('courseId'=> $row["courseId"],
            'attendance'=> $row["attendance"],
            'assignment'=> $row["assignment"],
            'project'=> $row["project"],
            'lab'=> $row["lab"],
            'quiz'=> $row["quiz"],
            'mid1'=> $row["mid1"],
            'mid2'=> $row["mid2"],
            'final'=> $row["final"]);
    }
}
else {
    $valid=0;
    echo "<script>alert('Nothing found.');</script>";
}

mysqli_close($conn);
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
        .row{
            height: 600px;
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
                    <a class="nav-link h6 btn btn-outline-dark" href="profile.php">Personal Info</a>
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

    <div class="my-2 mx-3" id="marks">
        <div class="row justify-content-center bg-white">
            <div class="col-auto">
                <h5 class="text-center text-dark mt-5"><u>MARKS DISTRIBUTION</u></h5>
                <table class="table table-responsive p-5">
                    <tr>
                        <th>Course Id</th>
                        <th>Attendance</th>
                        <th>Assignment</th>
                        <th>Project</th>
                        <th>Lab</th>
                        <th>Quiz</th>
                        <th>Mid1</th>
                        <th>Mid2</th>
                        <th>Final</th>
                    </tr>
                    <?php
                    if($valid){
                        for($i = 0; $i < sizeof($mark); $i++) {
                            echo'<tr>';
                            echo'<td>'.$mark[$i]["courseId"].'</td>';
                            echo'<td>'.$mark[$i]["attendance"].'</td>';
                            echo'<td>'.$mark[$i]["assignment"].'</td>';
                            echo'<td>'.$mark[$i]["project"].'</td>';
                            echo'<td>'.$mark[$i]["lab"].'</td>';
                            echo'<td>'.$mark[$i]["quiz"].'</td>';
                            echo'<td>'.$mark[$i]["mid1"].'</td>';
                            echo'<td>'.$mark[$i]["mid2"].'</td>';
                            echo'<td>'.$mark[$i]["final"].'</td>';
                            echo'</tr>';
                        }
                    }
                    ?>
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
