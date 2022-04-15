<?php
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "project480";

// Create connection :
//$conn = mysqli_connect($servername, $username, $password, $dbname);
//or
$conn = mysqli_connect("localhost", "root", "");
// Check connection :
if(!$conn){
    die("Connection Failed: ". mysqli_connect_error());
}


// Create Database :
$sql = "CREATE DATABASE IF NOT EXISTS project480";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("error creating database<br>");
}


$conn = mysqli_connect("localhost", "root", "","project480");
// Check connection :
if(!$conn){
    die("Connection Failed: ". mysqli_connect_error());
}


//Create signup Table :
$sql = "CREATE TABLE IF NOT EXISTS signup
(
studentId varchar(13),
firstName varchar(20) NOT NULL,
lastName varchar(20) NOT NULL,
email varchar(30) NOT NULL,
phone varchar(14) NOT NULL,
birthdate date,
gender varchar(10) NOT NULL,
password varchar(20) NOT NULL,
PRIMARY KEY(studentId)
)";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("error creating table<br>");
}

$sql = "INSERT INTO signup (studentId, firstName, lastName, email, phone, birthdate, gender, password) 
       VALUES ('2018-1-60-073', 'Nasim', 'Bahadur', '2018-1-60-073@std.ewubd.edu', '01800001111', '1998-04-12', 'male', '12345'),
       ('2018-1-60-066', 'Abdullah Abdur', 'Rahman', '2018-1-60-066@std.ewubd.edu', '01811110000', '1997-02-10', 'male', '23456'),
       ('Admin1', 'Abdur', 'Rahman', 'admin1@ewubd.edu', '01711110000', '1987-12-11', 'male', '3456'),
       ('Admin2', 'Sakirul', 'Islam', 'admin2@ewubd.edu', '01700001111', '1977-11-112', 'male', '4567')";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Successfully Submitted.');</script>";
}
else {
    echo "Error inserting value: " . mysqli_error($conn);
}


//Create marks Table :
$sql = "CREATE TABLE marks(studentId varchar(13) NOT NULL,courseId varchar(10) NOT NULL,attendance float,assignment float,project float,lab float,quiz float,mid1 float,mid2 float,final float)";
if (mysqli_query($conn, $sql)) {
    echo "Table created successfully";
}
else {
    echo "Error creating database: " . mysqli_error($conn);
}

$sql = "INSERT INTO marks (studentId, courseId, attendance, assignment, project, lab, quiz, mid1, mid2, final)
       VALUES ('2018-1-60-066', 'CSE365', '5', 'Null', '10', '10', '15', '20', '20', '20'),
       ('2018-1-60-066', 'CSE360', '5', 'Null', '10', '10', '15', '20', '20', '20'),
       ('2018-1-60-066', 'CSE350', '5', '5', '5', '10', '15', '20', '20', '20'),
       ('2018-1-60-073', 'CSE365', '5', 'Null', '10', '10', '15', '20', '20', '20'),
       ('2018-1-60-073', 'CSE360', '5', 'Null', '10', '10', '15', '20', '20', '20'),
       ('2018-1-60-073', 'CSE350', '5', '5', '5', '10', '15', '20', '20', '20'),
       ('2018-1-60-073', 'CSE345', '5', 'Null', '10', '10', '15', '20', '20', '20')";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Successfully Submitted.');</script>";
}
else {
   echo "Error inserting value: " . mysqli_error($conn);
}


//Create gradesheet Table
$sql = "CREATE TABLE gradesheet(studentId varchar(13) NOT NULL,semester int NOT NULL,courseId varchar(10) NOT NULL,credit float,grade varchar(2))";
if (mysqli_query($conn, $sql)) {
    echo "Table created successfully";
}
else {
    echo "Error creating database: " . mysqli_error($conn);
}
$sql = "INSERT INTO gradesheet (studentId, semester, courseId, credit, grade)
       VALUES ('2018-1-60-066', '1', 'CSE251', '4', 'A-'),
       ('2018-1-60-066', '2', 'CSE245', '4', 'A'),
       ('2018-1-60-066', '1', 'CSE360', '3', 'A-'),
       ('2018-1-60-066', '2', 'PHY209', '3', 'B-'),
       ('2018-1-60-066', '2', 'CSE365', '4', 'A+'),
       ('2018-1-60-066', '1', 'CSE350', '3', 'A-'),      
       ('2018-1-60-073', '2', 'CSE345', '4', 'A'),
       ('2018-1-60-073', '2', 'CSE360', '3', 'A-'),
       ('2018-1-60-073', '1', 'CSE251', '4', 'B-'),
       ('2018-1-60-073', '1', 'CSE245', '4', 'B+'),
       ('2018-1-60-073', '2', 'CSE365', '4', 'A'),
       ('2018-1-60-073', '2', 'CSE350', '3', 'A-'),
       ('2018-1-60-073', '1', 'ECO102', '3', 'A-')";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Successfully Submitted.');</script>";
}
else {
    echo "Error inserting value: " . mysqli_error($conn);
}


//Create gradepoint Table :
$sql = "CREATE TABLE gradepoint(studentId varchar(13)NOT NULL,semester int NOT NULL,cgpa float,gpa float)";
if (mysqli_query($conn, $sql)) {
    echo "Table created successfully";
}
else {
    echo "Error creating database: " . mysqli_error($conn);
}

$sql = "INSERT INTO gradepoint(studentId, semester, cgpa, gpa)
       VALUES ('2018-1-60-066', '1', '3.75', '3.75'),
       ('2018-1-60-066', '2', '3.61', '3.59'),
       ('2018-1-60-073', '2', '3.61', '3.75'),
       ('2018-1-60-073', '1', '3.81', '3.81')";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Successfully Submitted.');</script>";
}
else {
   echo "Error inserting value: " . mysqli_error($conn);
}


mysqli_close($conn);