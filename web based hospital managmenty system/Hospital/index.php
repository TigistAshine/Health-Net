<?php
$output = "";
include("dbconnection.php");
session_start();
if(isset($_SESSION['adminid'])){
  header('Location: adminaccount.php');
}
if(isset($_SESSION['doctorid'])){
  header('Location: doctoraccount.php');
}
if(isset($_SESSION['nurseid'])){
	header('Location: nurseaccount.php');
  }
  if(isset($_SESSION['receptionid'])){
	header('Location: receptionaccount.php');
  }
if(isset($_POST['submit']))
{
	$sql = "SELECT * FROM account WHERE username='$_POST[username]' AND password='$_POST[password]' AND status='Active'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_num_rows($qsql) == 1)
	{
		$rslogin = mysqli_fetch_array($qsql);
    $role =  $rslogin['role'];
    if($role == "Admin"){
        $_SESSION['adminid'] = $rslogin['accountId'];
        header('Location: adminaccount.php');
    }
    else if($role == "Doctor"){
      $_SESSION['doctorid'] = $rslogin['accountId'];
      header('Location: doctoraccount.php');
	}
	else if($role == "Nurse"){
		$_SESSION['nurseid'] = $rslogin['accountId'];
		header('Location: nurseaccount.php');
	  }
	// else{
    //   header('Location: nurseaccount.php');
	// }
	else if($role == "Reception"){
		$_SESSION['receptionid'] = $rslogin['accountId'];
		header('Location: receptionaccount.php');
	  }
	// else{
    //   header('Location: receptionaccount.php');
    // }
	}
	 else
	{
		$output = "Invalid Input";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	</head>
	<body class="login">
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
					<h2> WBHMS | Login</h2>
				</div>

				<div class="box-login">
					<form class="form-login" method="post">
						<fieldset>
							<legend>
								Sign in to your account
							</legend>
							<p>
								Please enter your loginid and password to log in.<br />
							</p>
              <div class="form-group text-center">
                <small class="form-text text-danger "><?php echo $output; ?></small>
              </div>
							<div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control" name="username" id="username" placeholder="username">
									<i class="fa fa-user"></i> </span>
							</div>
							<div class="form-group form-actions">
								<span class="input-icon">
									<input type="password" class="form-control password" name="password" placeholder="password" placeholder="Password">
									<i class="fa fa-lock"></i>
									 </span>
							</div>
							<div class="form-actions">
								
								<button type="submit" class="btn btn-primary pull-right" name="submit">
									Login <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
							
						</fieldset>
					</form>
				</div>

			</div>
		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
	
		<script src="assets/js/main.js"></script>

		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
	
	</body>
	<!-- end: BODY -->
</html>
<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
	if(document.frmdoctorlogin.loginid.value == "")
	{
		alert("Login ID should not be empty..");
		document.frmdoctorlogin.loginid.focus();
		return false;
	}
	else if(!document.frmdoctorlogin.loginid.value.match(alphanumericExp))
	{
		alert("Login ID not valid..");
		document.frmdoctorlogin.loginid.focus();
		return false;
	}
	else if(document.frmdoctorlogin.password.value == "")
	{
		alert("Password should not be empty..");
		document.frmdoctorlogin.password.focus();
		return false;
	}
	else if(document.frmdoctorlogin.password.value.length < 8)
	{
		alert("Password length should be more than 8 characters...");
		document.frmdoctorlogin.password.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>
</html>
