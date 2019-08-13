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
          <td width="12%" height="40">MRN</td>
          <td width="12%" height="40">Phone No</td>
          <td width="11%">Temprature</td>
          <td width="11%">BP</td>
          <td width="12%">Pulse Rate</td>
          <td width="12%">Respiratory Rate</td>
          <td width="12%">Sao2</td>
          <td width="12%">Spo21</td>
          <td width="12%">Height</td>
          <td width="12%">Weight</td>
          <td width="12%">RBS</td>
          <td width="12%">FBS</td>
          <td width="12%">HT/LI</td>
          <td width="12%">MUAS</td>
          <td width="12%">Cigarette</td>
          <td width="12%">WT/AGE</td>
          <td width="12%">WT/HT</td>
          <td width="12%">BMI</td>
          <td width="12%">BMI/AGE</td>
          <td width="12%">MUAS/AGE</td>
          <td width="12%">HC/AGE</td>
          <td width="12%">BP_AGE_HT</td>
          <td width="12%">Note</td>


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
          <td>&nbsp;$rs[mrn]</td>
          <td>&nbsp;$rs[temprature]</td>
          <td>&nbsp;$rs[bp]</td>
          <td>&nbsp;$rs[pulse_rate]</td>
          <td>&nbsp;$rs[respiratory_rate]</td>
          <td>&nbsp;$rs[sao2]</td>
          <td>&nbsp;$rs[spo2]</td>
          <td>&nbsp;$rs[spo21]</td>
          <td>&nbsp;$rs[height]</td>
          <td>&nbsp;$rs[weight]</td>
          <td>&nbsp;$rs[rbs]</td>
          <td>&nbsp;$rs[fbs]</td>
          <td>&nbsp;$rs[ht_li]</td>
          <td>&nbsp;$rs[muast]</td>
          <td>&nbsp;$rs[cigarette]</td>
          <td>&nbsp;$rs[wt_age]</td>
          <td>&nbsp;$rs[wt_ht]</td>
          <td>&nbsp;$rs[bmi]</td>
          <td>&nbsp;$rs[bmi_age]</td>
          <td>&nbsp;$rs[muas_age]</td>
          <td>&nbsp;$rs[hc_age]</td>
          <td>&nbsp;$rs[bp_age_ht]</td>
          <td>&nbsp;$rs[note]</td>
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