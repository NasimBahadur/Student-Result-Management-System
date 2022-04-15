<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "project480" );
if(!$conn){
    die("Connection Failed: ". mysqli_connect_error());
}

$mark=1;
$gradesheet=array(array());
$sql = "SELECT * FROM gradesheet where studentId = '$_SESSION[studentId]'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $i = 0;
    while($row = mysqli_fetch_assoc($result)) {
        $gradesheet[$i++]=array(
            'semester'=> $row["semester"],
            'courseId'=> $row["courseId"],
            'credit'=> $row["credit"],
            'grade'=> $row["grade"]);
    }
    sort($gradesheet);
}
else {
    $mark=0;
    echo "<script>alert('Nothing found.');</script>";
}

$grade=array('A+'=>'4.00','A'=>'4.00','A-'=>'3.70','B+'=>'3.30','B'=>'3.00','B-'=>'2.70','C+'=>'2.50','C'=>'2.30','C-'=>'2.00','D'=>'1.70','F'=>'0.00','W'=>'Withdraw');

$gradepoint=array(array());
$sql = "SELECT * FROM gradepoint where studentId = '$_SESSION[studentId]'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $i = 0;
    while($row = mysqli_fetch_assoc($result)) {
        $gradepoint[$i++]=array(
            'semester'=> $row["semester"],
            'cgpa'=> $row["cgpa"],
            'gpa'=> $row["gpa"]);
    }
    //sort($gradepoint);
}
else {
    $mark=0;
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

    <div class="my-2 mx-3" id="grade">
        <div class="row justify-content-center bg-white">
            <div class="col-auto">
                <h5 class="text-center text-dark mt-5"><u>GRADE REPORT</u></h5>
                <table class="table table-responsive p-5">
                    <tr>
                        <th>Semester</th>
                        <th>Course Id</th>
                        <th>Credit</th>
                        <th>Grade</th>
                        <th>Point</th>
                    </tr>
                    <?php
                    if($mark){
                        $flag=0;
                        for($i = 0; $i < sizeof($gradesheet); $i++) {
                            echo'<tr>'.'<td>';
                            if($gradesheet[$i]["semester"]!=$flag){
                                $flag=$gradesheet[$i]["semester"];
                                $cnt=0;$count=0;$credit=0;$sum=0;
                                for($j = $i; $j < sizeof($gradesheet); $j++) {
                                    if($gradesheet[$j]["semester"]==$flag) {
                                        $cnt++;
                                        //$sum+=$grade['$gradesheet[$j]["grade"]']*$gradesheet[$j]["credit"];
                                        //$credit+=$gradesheet[$j]["credit"];
                                        //echo $sum/$credit;
                                    }
                                    else {
                                        $count=$cnt+$i;
                                        break;
                                    }
                                }
                                if($gradesheet[$i]["semester"]==1)echo'1st'.'</td>';
                                else if($gradesheet[$i]["semester"]==2)echo'2nd'.'</td>';
                                else if($gradesheet[$i]["semester"]==3)echo'3rd'.'</td>';
                                else echo $gradesheet[$i]["semester"].'th'.'</td>';
                            } else echo'</td>';
                            echo'<td>'.$gradesheet[$i]["courseId"].'</td>';
                            echo'<td>'.$gradesheet[$i]["credit"].'</td>';
                            echo'<td>'.$gradesheet[$i]["grade"].'</td>';
                            echo'<td>'.$gradesheet[$i]["credit"]*$grade[$gradesheet[$i]["grade"]].'</td>'.'</tr>';
                            if($i==$count-1||$i==sizeof($gradesheet)-1){
                                echo'<tr><td></td>';
                                echo'<th>'.'CGPA : '.'</th>';
                                echo'<td>'.$gradepoint[$flag-1]["cgpa"].'</td>';
                                echo'<th>'.'Term GPA : '.'</th>';
                                echo'<td>'.$gradepoint[$flag-1]["gpa"].'</td>';
                                echo'</tr>';
                            }
                        }
                    }
                    ?>
                </table>
                <table class="table table-responsive p-5">
                    <tr>
                        <th>Grade</th>
                        <th>GPACR</th>
                        <th>|</th>
                        <th>Grade</th>
                        <th>GPACR</th>
                        <th>|</th>
                        <th>Grade</th>
                        <th>GPACR</th>
                    </tr>
                    <tr>
                        <th>A+</th>
                        <td><?php echo $grade['A+']?></td>
                        <th>|</th>
                        <th>A</th>
                        <td><?php echo $grade['A']?></td>
                        <th>|</th>
                        <th>A-</th>
                        <td><?php echo $grade['A-']?></td>
                    </tr>
                    <tr>
                        <th>B+</th>
                        <td><?php echo $grade['B+']?></td>
                        <th>|</th>
                        <th>B</th>
                        <td><?php echo $grade['B']?></td>
                        <th>|</th>
                        <th>B-</th>
                        <td><?php echo $grade['B-']?></td>
                    </tr>
                    <tr>
                        <th>C+</th>
                        <td><?php echo $grade['C+']?></td>
                        <th>|</th>
                        <th>C</th>
                        <td><?php echo $grade['C']?></td>
                        <th>|</th>
                        <th>C-</th>
                        <td><?php echo $grade['C-']?></td>
                    </tr>
                    <tr>
                        <th>D</th>
                        <td><?php echo $grade['D']?></td>
                        <th>|</th>
                        <th>F</th>
                        <td><?php echo $grade['F']?></td>
                        <th>|</th>
                        <th>W</th>
                        <td><?php echo $grade['W']?></td>
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
