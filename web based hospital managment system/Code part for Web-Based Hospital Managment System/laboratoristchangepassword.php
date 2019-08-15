<?php
session_start();
include("laboratoristheader.php");
include("dbconnection.php");
if(isset($_POST[submit]))
{
	$sql = "UPDATE account SET password='$_POST[newpassword]' WHERE  accountid='$_SESSION[laboratoristid]'";
	$qsql= mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Password has been updated successfully..');</script>";
	}
	else
	{
		echo "<script>alert('Failed to update password...');</script>";		
	}
}
?>

<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first"> Change Password</li></ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">
      <form method="post" action="" name="frmlaboratoristchange" onSubmit="return validateform1()">
    <table width="200" border="3">
      <tbody>
        <tr>
          <td width="34%">Old Password</td>
          <td width="66%"><input type="password" name="oldpassword" id="oldpassword" /></td>
        </tr>
        <tr>
          <td>New Password</td>
          <td><input type="password" name="newpassword" id="newpassword" /></td>
        </tr>
        <tr>
          <td>Confirm Password</td>
          <td><input type="password" name="password" id="password" /></td>
        </tr>
        <tr>
          <td height="36" colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Submit" /></td>
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
function validateform1()
{
	if(document.frmlaboratoristchange.oldpassword.value == "")
	{
		alert("Old password should not be empty..");
		document.frmlaboratoristchange.oldpassword.focus();
		return false;
	}
	else if(document.frmlaboratoristchange.newpassword.value == "")
	{
		alert("New Password should not be empty..");
		document.frmlaboratoristchange.newpassword.focus();
		return false;
	}
	else if(document.frmlaboratoristchange.newpassword.value.length < 8)
	{
		alert("New Password length should be more than 8 characters...");
		document.frmlaboratoristchange.newpassword.focus();
		return false;
	}
	else if(document.frmlaboratoristchange.newpassword.value != document.frmlaboratoristchange.password.value )
	{
		alert(" New Password and confirm password should be equal..");
		document.frmlaboratoristchange.password.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>
