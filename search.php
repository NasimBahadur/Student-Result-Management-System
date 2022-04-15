<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "project480" );
if(!$conn){
    die("Connection Failed: ". mysqli_connect_error());
}

$check=0;
$info=array();
$sql = "SELECT * FROM signup where studentId = '$_POST[studentId]'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $i = 0;
    while($row = mysqli_fetch_assoc($result)) {
        $info =array('studentId'=> $row["studentId"],
            'firstName'=> $row["firstName"],
            'lastName'=> $row["lastName"],
            'email'=> $row["email"],
            'phone'=> $row["phone"],
            'birthdate'=> $row["birthdate"],
            'gender'=> $row["gender"]);
    }
}
else {
    $check=1;
    echo "<script>alert('Nothing found.');</script>";
}

$check1=0;
$mark=array(array());
$sql = "SELECT * FROM marks where studentId = '$_POST[studentId]'";
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
    $check1=1;
    echo "<script>alert('Nothing found.');</script>";
}

$check2=0;
$gradesheet=array(array());
$sql = "SELECT * FROM gradesheet where studentId = '$_POST[studentId]'";
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
    $check2=1;
    echo "<script>alert('Nothing found.');</script>";
}

$grade=array('A+'=>'4.00','A'=>'4.00','A-'=>'3.70','B+'=>'3.30','B'=>'3.00','B-'=>'2.70','C+'=>'2.50','C'=>'2.30','C-'=>'2.00','D'=>'1.70','F'=>'0.00','W'=>'Withdraw');

$check3=0;
$gradepoint=array(array());
$sql = "SELECT * FROM gradepoint where studentId = '$_POST[studentId]'";
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
    $check3=1;
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
            height: 700px;
        }
    </style>
</head>

<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-white border ">
        <a class="nav-link h6 text-dark">ADMIN <p class="h5 text-primary">(<?php echo $_SESSION['firstName']." ".$_SESSION['lastName'].')'?></p></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="nav nav-fill">
                <li class="nav-item mx-3">
                    <a class="nav-link h6 btn btn-outline-primary" href="admin.php">Home</a>
                </li>
                <li class="nav-item mx-3">
                    <form action="search.php" method="post" class="input-group">
                        <input type="text" class="form-control" name="studentId" placeholder="Enter Student Id">
                        <div class="input-group-append">
                            <button class="btn btn-outline-info" type="submit">Search</button>
                        </div>
                    </form>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link h6 btn btn-outline-danger" href="logout.php">Log out</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="mt-1 mx-3" id="personinfo">
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
                        <td><?php echo ":  ".$info['firstName']." ".$info['lastName']?></td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <td><?php echo ":  ".$info['studentId']?></td>
                    </tr>
                    <tr>
                        <th>Birthdate</th>
                        <td><?php echo ":  ".$info['birthdate']?></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td><?php echo ":  ".$info['gender']?></td>
                    </tr>
                    <tr>
                        <th>Mobile No</th>
                        <td><?php echo ":  ".$info['phone']?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo ":  ".$info['email']?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="mx-3" id="marks">
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
                    if(!$check1=0){
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

    <div class="mx-3" id="grade">
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
                    if(!$check2||!$check3){
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
