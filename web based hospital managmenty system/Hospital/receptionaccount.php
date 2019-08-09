<?php
session_start();
if(!isset($_SESSION['receptionid']))
{
	echo "<script>window.location='receptionlogin.php';</script>";
}
include("dbconnection.php");
include("receptionheader.php");
?>
<div class="wrapper col2">
  <div id="breadcrumb">

<div class="dropdown">
<strong>reception Dashboard</strong>
</div>


  </div>
</div>
<div class="wrapper col4">
  <div id="container">
  <!-- <p><form method="get" action=""><strong>Date -</strong> <input type="date" name="date" value="<?php echo $_GET[date]; ?>" ><input type="submit" name="submit" value="Submit"></form></p> -->
   
    <h1>Number of Patient Records : 
    <?php
	$sql = "SELECT * FROM patient WHERE status='Active'";
	if(isset($_GET[date]))
	{
		$sql = $sql . " AND admissiondate ='$_GET[date]'";
	}
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?>
    </h1>    
   
  </div>
</div>

    <div class="clear"></div>
  </div>
</div>
