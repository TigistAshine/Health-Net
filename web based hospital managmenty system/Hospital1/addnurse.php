<?php
session_start();
include("headers.php");
include("dbconnection.php");
if(isset($_POST['submit']))
{
	if(isset($_GET[editid]))
	{
			$sql ="UPDATE nurse SET nursename='$_POST[nursename]',mobileno='$_POST[mobileno]',departmentid='$_POST[departmentid]',loginid='$_POST[loginid]',password='$_POST[password]',status='$_POST[status]',education='$_POST[education]',experience='$_POST[experience]' WHERE nurseid='$_GET[editid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('Nurse record updated successfully...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
	$sql ="INSERT INTO nurse(nursename,mobileno,departmentid,loginid,password,status,education,experience) values('$_POST[nursename]','$_POST[mobileno]','$_POST[departmentid]','$_POST[loginid]','$_POST[password]','Active','$_POST[education]','$_POST[experience]')";
	if($qsql = mysqli_query($con,$sql))
	{
		echo "<script>alert('nurse record inserted successfully...');</script>";
		$insid= mysqli_insert_id($con);
		if(isset($_SESSION['adminid']))
		{
		
		}
		else
		{
		echo "<script>window.location='nurselogin.php';</script>";	
		}		
	}
	else
	{
		echo mysqli_error($con);
	}
}
}
if(isset($_GET['editid']))
{
	$sql="SELECT * FROM nurse WHERE nurseid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>

<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">Add New nurse</li></ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">
    <h1>nurse profile Registration Panel</h1>
    <form method="post" action="" name="frmnurse" onSubmit="return validateform()">
    <table width="200" border="3">
      <tbody>
        <tr>
          <td width="34%">nurse Name</td>
          <td width="66%"><input type="text" name="nursename" id="nursename"  value="<?php echo $rsedit[nursename]; ?>"/></td>
        </tr>

        <tr>
          <td>Mobile Number</td>
          <td><input type="text" name="mobileno" id="mobileno" value="<?php echo $rsedit[mobileno]; ?>"  /></td>
        </tr>
        <tr>
          <td>Department Id</td>
          <td><input type="number" name="departmentid" id="departmentid" value="<?php echo $rsedit[departmentid]; ?>"  /></td>
        </tr>

        <tr>
          <td>Login Id</td>
          <td><input type="text" name="loginid" id="loginid" value="<?php echo $rsedit[loginid]; ?>"  /></td>
        </tr>
        <tr>
		<tr>
          <td>Password</td>
          <td><input type="password" name="password" id="password" value="<?php echo $rsedit[password]; ?>" /></td>
        </tr>
        <tr>
          <td>Confirm Password</td>
          <td><input type="password" name="confirmpassword" id="confirmpassword"  value="<?php echo $rsedit[confirmpassword]; ?>"/></td>
        </tr>
        <tr>
          <td>Education</td>
          <td><input type="text" name="education" id="education" value="<?php echo $rsedit[education]; ?>" /></td>
        </tr>
        <tr>
          <td>Experience</td>
          <td><input type="text" name="experience" id="experience" value="<?php echo $rsedit[experience]; ?>" /></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Submit" /></td>
        </tr>
      </tbody>
    </table>
    </form>
    <p>&nbsp;</p>
  </div>
</div>
</div>
 <div class="clear"></div>
  </div>
</div>
<?php
include("footers.php");
?>
<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
	if(document.frmnurse.nursename.value == "")
	{
		alert("nurse name should not be empty..");
		document.frmnurse.nursename.focus();
		return false;
	}
else if(!document.frmnurse.nursename.value.match(alphaspaceExp))
	{
		alert("nurse name not valid..");
		document.frmnurse.nursename.focus();
		return false;
	}
	else if(document.frmnurse.mobileno.value == "")
	{
		alert("Mobile number should not be empty..");
		document.frmnurse.mobileno.focus();
		return false;
	}
	else if(!document.frmnurse.mobileno.value.match(numericExpression))
	{
		alert("Mobile number not valid..");
		document.frmnurse.mobileno.focus();
		return false;
	}
	else if(document.frmnurse.departmentid.value == "")
	{
		alert("Department Id should not be empty..");
		document.frmnurse.departmentid.focus();
		return false;
	}
	else if(document.frmnurse.loginid.value == "")
	{
		alert("Login ID should not be empty..");
		document.frmnurse.loginid.focus();
		return false;
	}
	else if(!document.frmnurse.loginid.value.match(alphanumericExp))
	{
		alert("Login ID not valid..");
		document.frmnurse.loginid.focus();
		return false;
	}
	else if(document.frmnurse.password.value == "")
	{
		alert("Password should not be empty..");
		document.frmnurse.password.focus();
		return false;
	}
	else if(document.frmnurse.password.value.length < 8)
	{
		alert("Password length should be more than 8 characters...");
		document.frmnurse.password.focus();
		return false;
	}
	else if(document.frmnurse.password.value != document.frmnurse.confirmpassword.value )
	{
		alert("Password and confirm password should be equal..");
		document.frmnurse.confirmpassword.focus();
		return false;
	}
	else if(document.frmnurse.select.value == "" )
	{
		alert("Select the status..");
		document.frmnurse.select.focus();
		return false;
	}
	else if(document.frmnurse.education.value == "")
	{
		alert("Education should not be empty..");
		document.frmnurse.education.focus();
		return false;
	}
	
	else if(document.frmnurse.experience.value == "")
	{
		alert("experience should not be empty..");
		document.frmnurse.experience.focus();
		return false;
	}
	
	else
	{
		return true;
	}
}

</script>