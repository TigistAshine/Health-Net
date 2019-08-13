<?php
session_start();
include("headers.php");
include("dbconnection.php");
if(isset($_GET[selectid]))
{
	$sql ="SELECT FROM patient WHERE patientid='$_GET[selectid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('patient record select successfully..');</script>";
	}
}
?>

<div class="wrapper col2">
  <div id="breadcrumb">View patient Information</div>
</div>
<div class="wrapper col4">
  <div id="container">
  
  <section class="container">
<h2>Search patient<input type="search" class="light-table-filter" data-table="order-table" placeholder="Filtrer" /></h2>
    <table class="order-table">
      <thead>
        <tr>
          <td width="12%" height="40">Patient ID</td>
          <td width="12%" height="40">Patient Name</td>
          <td width="11%">Admission Date</td>
          <td width="11%">Mobile Number</td>
          <td width="12%">Gender</td>
          <td width="12%">DOB</td>
          <td width="34%">Action</td>
        </tr>
        </thead>
       <tbody>
       <?php
		$sql ="SELECT * FROM patient";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
        echo "<tr>
          <td>&nbsp;$rs[patientid]</td>
          <td>&nbsp;$rs[patientname]</td>
          <td>&nbsp;$rs[admissiondate]</td>
          <td>&nbsp;$rs[mobileno]</td>
          <td>&nbsp;$rs[gender]</td>
          <td>&nbsp;$rs[dob]</td>
          <td>&nbsp;
		  <a href='fillpatientstatus.php?fillid=$rs[adminid]'>Fill</a>| <a href='fillpatientstatus.php?selectid=$rs[adminid]'>Send</a> </td>
        </tr>";
		}
		?>
      </tbody>
    </table>
    </section>
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