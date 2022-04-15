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
	<title>Sign in</title>
	<style>
		body{
			background-color: whitesmoke;
		}
		.form{
			background-color: white;
			padding: 30px;
			border: 1px solid lightskyblue;
			border-radius: 5px;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="row my-5">
		<div class="col-lg-3"></div>
		<div class="col-lg-6">
			<form action="login.php" method="post" class="form">
				<div class="form-group p-2">
					<h3 style="color: steelblue; text-align: center">Login your account</h3>
				</div>
				<div class="form-group">
					Student Id:<p style="color: red; display:inline">*</p>
					<input class="form-control" type="text" name="studentId" id="studentId" placeholder="Enter Student Id" required>
				</div>
				<div class="form-group">
					Password:<p style="color: red; display:inline">*</p>
					<input class="form-control" type="password" name="password" id="password" placeholder="Enter Password" required>
				</div>
				<div class="form-check">
					<input type="checkbox" class="form-check-input" name="remember">Remember Me
				</div>
				<div class="form-group float-right">
					<button type="submit" class="btn btn-primary">Login</button>
				</div>
				<div class="form-group">
					<a href="index.php"><u>Forgot Password</u></a>
					<p>Don't have an account? <a href="register.html"> <u>Register Here</u> </a> </p>
				</div>
			</form>
			<?php
				if(isset($_COOKIE['studentId']) and isset($_COOKIE['password'])){
    				$studentId=$_COOKIE['studentId'];
    				$password=$_COOKIE['password'];
    				echo "<script>
						document.getElementById('studentId').value='$studentId';
						document.getElementById('password').value='$password';
					</script>";
				}
			?>
		</div>
		<div class="col-lg-3"></div>
	</div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
