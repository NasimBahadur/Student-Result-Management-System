<?php
session_start();
?>
<!-- Bootstrap 4 uses HTML elements and CSS properties that require the HTML5 doctype. -->
<!DOCTYPE html>
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
    <script type="text/javascript" src="js/script.js"></script>
    <title>Admin Panel</title>
    <style>
        body{
            background-color: whitesmoke;
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
    <div class="my-2 mx-3" id="insert">
        <div class="row justify-content-center bg-white">
            <div class="col-auto my-5">

                <form action="crud.php" method="post" class="form">
                    <div class="form-group p-2 pb-4">
                        <h3 style="color: steelblue; text-align: center">Marks</h3>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-primary">Student Id :</span>
                        </div>
                        <input class="form-control" type="text" name="studentId" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-primary">Course Id :</span>
                        </div>
                        <input class="form-control" type="text" name="courseId" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Attendance :</span>
                        </div>
                        <input class="form-control" type="number" step="any" min="0" name="attendance">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Assignment :</span>
                        </div>
                        <input class="form-control" type="number" step="any" min="0" name="assignment">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Project :</span>
                        </div>
                        <input class="form-control" type="number" step="any" min="0" name="project">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Lab :</span>
                        </div>
                        <input class="form-control" type="number" step="any" min="0" name="lab">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Quiz :</span>
                        </div>
                        <input class="form-control" type="number"step="any" min="0" name="quiz">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Mid1 :</span>
                        </div>
                        <input class="form-control" type="number" step="any" min="0" name="mid1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Mid2 :</span>
                        </div>
                        <input class="form-control" type="number" step="any" min="0" name="mid2">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Final :</span>
                        </div>
                        <input class="form-control" type="number" step="any" min="0" name="final">
                    </div>
                    <div class="form-group float-right">
                        <button type="submit" class="btn btn-outline-primary" name="insert_mark" href="crud.php">Insert</button>
                        <button type="submit" class="btn btn-outline-info" name="update_mark" href="crud.php">Update</button>
                        <button type="submit" class="btn btn-outline-danger" name="delete_mark" href="crud.php">Delete</button>
                    </div>
                </form>
            </div>

            <div class="col-auto my-5">
                <form action="crud.php" method="post" class="form">
                    <div class="form-group p-2 pb-4">
                        <h3 style="color: steelblue; text-align: center">Grade</h3>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-primary">Student Id :</span>
                        </div>
                        <input class="form-control" type="text" name="studentId" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-primary">Course Id :</span>
                        </div>
                        <input class="form-control" type="text" name="courseId" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Semester :</span>
                        </div>
                        <input class="form-control" type="number" name="semester">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Credit :</span>
                        </div>
                        <input class="form-control" type="number" name="credit">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Grade :</span>
                        </div>
                        <input class="form-control" type="text" name="grade">
                    </div>
                    <div class="form-group float-right">
                        <button type="submit" class="btn btn-outline-primary" name="insert_grade" href="crud.php">Insert</button>
                        <button type="submit" class="btn btn-outline-info" name="update_grade" href="crud.php">Update</button>
                        <button type="submit" class="btn btn-outline-danger" name="delete_grade" href="crud.php ">Delete</button>
                    </div>
                </form>
            </div>

            <div class="col-auto my-5">
                <form action="crud.php" method="post" class="form">
                    <div class="form-group p-2 pb-4">
                        <h3 style="color: steelblue; text-align: center">CGPA</h3>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-primary">Student Id :</span>
                        </div>
                        <input class="form-control" type="text" name="studentId" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-primary">Semester :</span>
                        </div>
                        <input class="form-control" type="number" name="semester" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">GPA :</span>
                        </div>
                        <input class="form-control" type="number" step="any" min="0" name="gpa">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">CGPA :</span>
                        </div>
                        <input class="form-control" type="number" step="any" min="0" name="cgpa">
                    </div>
                    <div class="form-group float-right">
                        <button type="submit" class="btn btn-outline-primary" name="insert_gradepoint" href="crud.php">Insert</button>
                        <button type="submit" class="btn btn-outline-info" name="update_gradepoint" href="crud.php">Update</button>
                        <button type="submit" class="btn btn-outline-danger" name="delete_gradepoint" href="crud.php">Delete</button>
                    </div>
                </form>
            </div>

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