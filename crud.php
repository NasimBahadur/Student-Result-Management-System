<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project480";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection Failed: ". mysqli_connect_error());
}
//echo 'Connected successfully.<br>';

if(isset($_POST['insert_mark']))
{
    $sql = "SELECT studentId FROM signup where studentId = '$_POST[studentId]'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $sql = "SELECT studentId,courseId FROM marks where studentId = '$_POST[studentId]' AND courseId='$_POST[courseId]'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) echo "<script>alert('Already Exist.');</script>";
        else{
            $sql = "INSERT INTO marks (studentId, courseId, attendance, assignment, project, lab, quiz, mid1, mid2, final)
            VALUES ('$_POST[studentId]','$_POST[courseId]','$_POST[attendance]','$_POST[assignment]','$_POST[project]','$_POST[lab]','$_POST[quiz]','$_POST[mid1]','$_POST[mid2]','$_POST[final]')";
            if (mysqli_query($conn, $sql)) echo "<script>alert('Successfully Inserted.');</script>";
            else echo "Error inserting value: " . mysqli_error($conn);
        }
    }
    else echo "<script>alert('Id Not Found.');</script>";
    include "admin.php";
}

if(isset($_POST['insert_grade']))
{
    $sql = "SELECT studentId FROM signup where studentId = '$_POST[studentId]'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $sql = "SELECT studentId,courseId,semester FROM gradesheet where studentId = '$_POST[studentId]' AND courseId='$_POST[courseId]'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) echo "<script>alert('Already Exist.');</script>";
        else{
            $sql = "INSERT INTO gradesheet (studentId, semester, courseId, credit, grade)
            VALUES ('$_POST[studentId]','$_POST[semester]','$_POST[courseId]','$_POST[credit]','$_POST[grade]')";
            if (mysqli_query($conn, $sql)) echo "<script>alert('Successfully Inserted.');</script>";
            else echo "Error inserting value: " . mysqli_error($conn);
        }
    }
    else echo "<script>alert('Id Not Found.');</script>";
    include "admin.php";
}

if(isset($_POST['insert_gradepoint']))
{
    $sql = "SELECT studentId FROM signup where studentId = '$_POST[studentId]'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $sql = "SELECT studentId,semester FROM gradepoint where studentId = '$_POST[studentId]' AND semester='$_POST[semester]'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) echo "<script>alert('Already Exist.');</script>";
        else{
            $sql = "INSERT INTO gradepoint(studentId, semester, cgpa, gpa)
            VALUES ('$_POST[studentId]','$_POST[semester]','$_POST[cgpa]','$_POST[gpa]')";
            if (mysqli_query($conn, $sql)) echo "<script>alert('Successfully Inserted.');</script>";
            else echo "Error inserting value: " . mysqli_error($conn);
        }
    }
    else echo "<script>alert('Id Not Found.');</script>";
    include "admin.php";
}

if(isset($_POST['update_mark'])){
    if(!empty($_POST['attendance'])){
        $sql = "UPDATE marks SET attendance='$_POST[attendance]' where studentId = '$_POST[studentId]' AND courseId='$_POST[courseId]'";
        if (mysqli_query($conn, $sql)) echo "<script>alert('Successfully Updated.');</script>";
        else echo "Error inserting value: " . mysqli_error($conn);
    }
    if(!empty($_POST['assignment'])){
        $sql = "UPDATE marks SET assignment='$_POST[assignment]' where studentId = '$_POST[studentId]' AND courseId='$_POST[courseId]'";
        if (mysqli_query($conn, $sql)) echo "<script>alert('Successfully Updated.');</script>";
        else echo "Error inserting value: " . mysqli_error($conn);
    }
    if(!empty($_POST['project'])){
        $sql = "UPDATE marks SET project='$_POST[project]' where studentId = '$_POST[studentId]' AND courseId='$_POST[courseId]'";
        if (mysqli_query($conn, $sql)) echo "<script>alert('Successfully Updated.');</script>";
        else echo "Error inserting value: " . mysqli_error($conn);
    }
    if(!empty($_POST['lab'])){
        $sql = "UPDATE marks SET lab='$_POST[lab]' where studentId = '$_POST[studentId]' AND courseId='$_POST[courseId]'";
        if (mysqli_query($conn, $sql)) echo "<script>alert('Successfully Updated.');</script>";
        else echo "Error inserting value: " . mysqli_error($conn);
    }
    if(!empty($_POST['quiz'])){
        $sql = "UPDATE marks SET quiz='$_POST[quiz]' where studentId = '$_POST[studentId]' AND courseId='$_POST[courseId]'";
        if (mysqli_query($conn, $sql)) echo "<script>alert('Successfully Updated.');</script>";
        else echo "Error inserting value: " . mysqli_error($conn);
    }
    if(!empty($_POST['mid1'])){
        $sql = "UPDATE marks SET mid1='$_POST[mid1]' where studentId = '$_POST[studentId]' AND courseId='$_POST[courseId]'";
        if (mysqli_query($conn, $sql)) echo "<script>alert('Successfully Updated.');</script>";
        else echo "Error inserting value: " . mysqli_error($conn);
    }
    if(!empty($_POST['mid2'])){
        $sql = "UPDATE marks SET mid2='$_POST[mid2]' where studentId = '$_POST[studentId]' AND courseId='$_POST[courseId]'";
        if (mysqli_query($conn, $sql)) echo "<script>alert('Successfully Updated.');</script>";
        else echo "Error inserting value: " . mysqli_error($conn);
    }
    if(!empty($_POST['final'])){
        $sql = "UPDATE marks SET final='$_POST[final]' where studentId = '$_POST[studentId]' AND courseId='$_POST[courseId]'";
        if (mysqli_query($conn, $sql)) echo "<script>alert('Successfully Updated.');</script>";
        else echo "Error inserting value: " . mysqli_error($conn);
    }
    include "admin.php";
}

if(isset($_POST['update_grade'])){
    if(!empty($_POST['semester'])){
        $sql = "UPDATE gradesheet SET semester='$_POST[semester]' where studentId = '$_POST[studentId]' AND courseId='$_POST[courseId]'";
        if (mysqli_query($conn, $sql)) echo "<script>alert('Successfully Updated.');</script>";
        else echo "Error inserting value: " . mysqli_error($conn);
    }
    if(!empty($_POST['credit'])){
        $sql = "UPDATE gradesheet SET credit='$_POST[credit]' where studentId = '$_POST[studentId]' AND courseId='$_POST[courseId]'";
        if (mysqli_query($conn, $sql)) echo "<script>alert('Successfully Updated.');</script>";
        else echo "Error inserting value: " . mysqli_error($conn);
    }
    if(!empty($_POST['grade'])){
        $sql = "UPDATE gradesheet SET grade='$_POST[grade]' where studentId = '$_POST[studentId]' AND courseId='$_POST[courseId]'";
        if (mysqli_query($conn, $sql)) echo "<script>alert('Successfully Updated.');</script>";
        else echo "Error inserting value: " . mysqli_error($conn);
    }
    include "admin.php";
}

if(isset($_POST['update_gradepoint'])){
    if(!empty($_POST['cgpa'])){
        $sql = "UPDATE gradepoint SET cgpa='$_POST[cgpa]' where studentId = '$_POST[studentId]' AND semester='$_POST[semester]'";
        if (mysqli_query($conn, $sql)) echo "<script>alert('Successfully Updated.');</script>";
        else echo "Error inserting value: " . mysqli_error($conn);
    }
    if(!empty($_POST['gpa'])){
        $sql = "UPDATE gradepoint SET gpa='$_POST[gpa]' where studentId = '$_POST[studentId]' AND semester='$_POST[semester]'";
        if (mysqli_query($conn, $sql)) echo "<script>alert('Successfully Updated.');</script>";
        else echo "Error inserting value: " . mysqli_error($conn);
    }
    include "admin.php";
}

if(isset($_POST['delete_mark'])){
    if(!empty($_POST['studentId']) && !empty($_POST['courseId'])){
        $sql = "SELECT studentId,courseId FROM marks where studentId = '$_POST[studentId]' AND courseId='$_POST[courseId]'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $sql = "DELETE FROM marks where studentId = '$_POST[studentId]' AND courseId='$_POST[courseId]'";
            if (mysqli_query($conn, $sql)) echo "<script>alert('Successfully Deleted.');</script>";
            else echo "Error inserting value: " . mysqli_error($conn);
        }
        else echo "<script>alert('Not Found.');</script>";
    }
    include "admin.php";
}

if(isset($_POST['delete_grade'])){
    if(!empty($_POST['studentId']) && !empty($_POST['courseId'])){
        $sql = "SELECT studentId,courseId,semester FROM gradesheet where studentId = '$_POST[studentId]' AND courseId='$_POST[courseId]'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $sql = "DELETE FROM gradesheet where studentId = '$_POST[studentId]' AND courseId='$_POST[courseId]'";
            if (mysqli_query($conn, $sql)) echo "<script>alert('Successfully Deleted.');</script>";
            else echo "Error inserting value: " . mysqli_error($conn);
        }
        else echo "<script>alert('Not Found.');</script>";
    }
    include "admin.php";
}

if(isset($_POST['delete_gradepoint'])){
    if(!empty($_POST['studentId']) && !empty($_POST['semester'])){
        $sql = "SELECT studentId,semester FROM gradepoint where studentId = '$_POST[studentId]' AND semester='$_POST[semester]'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $sql = "DELETE FROM gradepoint where studentId = '$_POST[studentId]' AND semester='$_POST[semester]'";
            if (mysqli_query($conn, $sql)) echo "<script>alert('Successfully Deleted.');</script>";
            else echo "Error inserting value: " . mysqli_error($conn);
        }
        else echo "<script>alert('Not Found.');</script>";
    }
    include "admin.php";
}

mysqli_close($conn);
