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

if($_POST['studentId']=='admin1'||$_POST['studentId']=='admin2')
{
    $sql = "SELECT * FROM signup where studentId = '$_POST[studentId]' AND password='$_POST[password]'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Password matched.');</script>";
        while($row = mysqli_fetch_assoc($result)) {
            //session
            session_start();
            $_SESSION['studentId']=$row['studentId'];
            $_SESSION['firstName']=$row['firstName'];
            $_SESSION['lastName']=$row['lastName'];
            $_SESSION['email']=$row['email'];
            $_SESSION['phone']=$row['phone'];
            $_SESSION['birthdate']=$row['birthdate'];
            //cookie
            if($_POST['studentId']=$row['studentId'] and $_POST['password']=$row['password'] and isset($_POST['remember']))
            {
                setcookie('studentId',$row['studentId'],time()+3600);
                setcookie('password',$row['password'],time()+3600);
            }
        }
        mysqli_close($conn);
    }
    else {
        echo "<script>alert('Password is not matched.');</script>";
        include("sign_in.php");
    }
//include ('index.php');
    header('Location: admin.php');
}
else{
    $sql = "SELECT * FROM signup where studentId = '$_POST[studentId]' AND password='$_POST[password]'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Password matched.');</script>";
        while($row = mysqli_fetch_assoc($result)) {
            //session
            session_start();
            $_SESSION['studentId']=$row['studentId'];
            $_SESSION['firstName']=$row['firstName'];
            $_SESSION['lastName']=$row['lastName'];
            $_SESSION['email']=$row['email'];
            $_SESSION['phone']=$row['phone'];
            $_SESSION['birthdate']=$row['birthdate'];
            //cookie
            if($_POST['studentId']=$row['studentId'] and $_POST['password']=$row['password'] and isset($_POST['remember']))
            {
                setcookie('studentId',$row['studentId'],time()+3600);
                setcookie('password',$row['password'],time()+3600);
            }
        }
        mysqli_close($conn);
    }
    else {
        echo "<script>alert('Password is not matched.');</script>";
        include("sign_in.php");
    }
//include ('index.php');
    header('Location: profile.php');
}
