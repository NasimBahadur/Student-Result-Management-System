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

// empty() & isset() are same.
if(empty($_POST['studentId']) || empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['email']) || empty($_POST['birthdate']) || empty($_POST['phone']) || empty($_POST['gender']) || empty($_POST['password']))
{
    die("All input field is required.");
}

if (!preg_match("/^((2015)|(2016)|(2017)|(2018)|(2019)|(2020))-[1-3]{1}-[0-9]{2}-[0-9]{3}/",$_POST['studentId']) && strlen($_POST['studentId'])!=13) {
    die("Invalid Student Id ! Length of student id must be 13 characters long and as like as this format : 0000-0-00-000.");
}

if (!preg_match("/(-?([A-Z].\s)?([A-Z][a-z]+)\s?)+([A-Z]'([A-Z][a-z]+))?/",$_POST['firstName']) && strlen($_POST['firstName'])<3) {
    die("Length of first-name must be greater than equal 3 characters long.");
}

if (!preg_match("/^([A-Z][a-z]+([ ]?[a-z]?['-]?[A-Z][a-z]+)*)$/",$_POST['lastName']) && strlen($_POST['lastName'])<3) {
    die("Length of first-name must be greater than equal 3 characters long.");
}

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
{
    die("Invalid Email! Must have a valid Email.");
}

if (!preg_match("/^(\+88)?((011)|(015)|(016)|(017)|(018)|(019))\d{8,8}$/",$_POST['phone']) && (strlen($_POST['phone'])!=11 || strlen($_POST['phone'])!=14)) {
    die("Length of first-name must be contain 11 characters or 14 characters (if you use +88 before the phone no.)");
}

if(floor((time() - strtotime($_POST['birthdate'])) / 31556926) <= 18)
{
    die("Invalid age! Age at least 18 to register in the website.");
}

if($_POST['gender']!="male" && $_POST['gender']!="female")
{
    die("Gender must be checked.");
}

if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,20}$/",$_POST['password']) && (strlen($_POST['password'])>=8 && strlen($_POST['password'])<=20)) {
    die("Invalid Password! Password must contain 8-20 digits and minimum an uppercase, a lowercase, a number, a special character.");
}

$studentId=$_POST['studentId'];
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$birthdate=$_POST['birthdate'];
$gender=$_POST['gender'];
$password=$_POST['password'];

$sql = "SELECT studentId,email FROM signup where studentId = '$studentId' OR email= '$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Already you have an account and you have used this student id & email.');</script>";
    /*while($row = mysqli_fetch_assoc($result)) {
        echo "<p>" .$row["studentId"] ."<br>" .$row["email"]. "</p>";
    }*/
    include("sign_in.php");
}
else{
    $sql = "INSERT INTO signup (studentId, firstName, lastName, email, phone, birthdate, gender, password) 
       VALUES ('$studentId', '$firstName', '$lastName', '$email', '$phone', '$birthdate', '$gender', '$password')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Successfully Submitted.');</script>";
        include('sign_in.php');
    }
    else {
        echo "Error inserting value: " . mysqli_error($conn);
    }
}

mysqli_close($conn);