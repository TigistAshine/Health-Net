<?php
session_start();
include("headers.php");
$db = new mysqli('localhost','root','','hospital');
if(isset($_POST["submit"])){
	$hematologhyarr=$_POST["hematology"];
	$urinearr=$_POST["urine_analysis"];
	$chemistryarr=$_POST["chemistry"];
	$serologyarr=$_POST["serology"];
	$hormonearr=$_POST["hormone_analysis"];
	// $value = implode(",", $urinearr);
	$hematologyvalue=  implode(",", $hematologhyarr);
	$urinevalue=  implode(",", $urinearr);
	$chemistryvalue = implode(",", $chemistryarr);
	$serologyvalue = implode(",", $serologyarr);
	$hormonevalue = implode(",", $hormonearr);
	$insert="Insert into lab_test (hematology,urine_analysis,chemistry,serology,hormone_analysis) values ('$hematologyvalue','$urinevalue','$chemistryvalue','$serologyvalue','$hormonevalue')";
	$result=$db->query($insert) or die($db->error);
	if($result){
		echo "<h2 class='text-success'>Updated</h2>";
	}
	else
	{
		echo "<h2 class='text-danger'>Not updated</h2>";
	}
}

?>

<!DOCType html>
<html>
<div class="wrapper col2">
</div>
<div class="wrapper col4">
  <div id="container">
    <h1>Laboratory Reporting Form</h1>
    <form  action="./labtest" method="post">
    <table width="200">
	<tr>
	<th>Hematology</th>
	<th>Urine Analysis</th>
	<th>Chemistry</th>
	<th>Serology</th>
	<th>Hormone Analysis</th>
	</tr>
      <tbody>
        <tr>
          <td width="66%"><input type="checkbox" id="hematology" name="hematology[]" value= "WBC">WBC</td>
		  <td width="66%"><input type="checkbox" name="urine_analysis[]" value="Cooler">Cooler</td>
		  <td width="66%"><input type="checkbox" name="chemistry[]" value="FBS/RBS">FBS/RBS</td>
		  <td width="66%"><input type="checkbox" name="serology[]" value="VDRL">VDRL</td>
		  <td width="66%"><input type="checkbox" name="hormone_analysis[]" value="T3">T3</td>
		</tr>
		<tr>
          <td width="66%"><input type="checkbox" name="hematology[]" value="Hgb">Hgb</td>
		  <td width="66%"><input type="checkbox" name="urine_analysis[]" value="PH">PH</td>
		  <td width="66%"><input type="checkbox" name="chemistry[]" value="SGPT">SGPT</td>
		  <td width="66%"><input type="checkbox" name="serology[]" value="Widal HO">Widal HO</td>
		  <td width="66%"><input type="checkbox" name="hormone_analysis[]" value="T4">T4</td>
		</tr>
		<tr>
          <td width="66%"><input type="checkbox" name="hematology[]" value="HCI">HCI</td>
		  <td width="66%"><input type="checkbox" name="urine_analysis[]" value="SG">SG</td>
		  <td width="66%"><input type="checkbox" name="chemistry[]" value="Alk.Phos">Alk.Phos</td>
		  <td width="66%"><input type="checkbox" name="serology[]" value="Weil Felix">Weil Felix</td>
		  <td width="66%"><input type="checkbox" name="hormone_analysis[]" value="TSH">TSH</td>
		</tr>
		<tr>
          <td width="66%"><input type="checkbox" name="hematology[]" value="ESR">ESR</td>
		  <td width="66%"><input type="checkbox" name="urine_analysis[]" value="Protein">Protein</td>
		  <td width="66%"><input type="checkbox" name="chemistry[]" value="Bilirubin/T">Bilirubin/T</td>
		  <td width="66%"><input type="checkbox" name="serology[]" value="HBSAG">HBSAg</td>
		  <td width="66%"><input type="checkbox" name="hormone_analysis[]"value="FSH">FSH</td>
		</tr>
		<tr>
          <td width="66%"><input type="checkbox" name="hematology[]" value="RBC">RBC</td>
		  <td width="66%"><input type="checkbox" name="urine_analysis[]" value="Sugar">Sugar</td>
		  <td width="66%"><input type="checkbox" name="chemistry[]" value="Bilirubin/D">Bilirubin/D</td>
		  <td width="66%"><input type="checkbox" name="serology[]" value="HCV">HCV</td>
		  <td width="66%"><input type="checkbox" name="hormone_analysis[]" value="LH">LH</td>
		</tr>
		<tr>
          <td width="66%"><input type="checkbox" name="hematology[]" value="Platelete">Platelete</td>
		  <td width="66%"><input type="checkbox" name="urine_analysis[]" value="Kitone">Kitone</td>
		  <td width="66%"><input type="checkbox" name="chemistry[]" value="BUN">BUN</td>
		  <td width="66%"><input type="checkbox" name="serology[]" value="H.PYSORL">H.PYSORL</td>
		  <td width="66%"><input type="checkbox" name="hormone_analysis[]" value="proclatin">Proclatin</td>
		</tr>
		<tr>
          <td width="66%"><input type="checkbox" name="hematology[]" value="Blood Group">Blood Group Rh</td>
		  <td width="66%"><input type="checkbox" name="urine_analysis[]" value="Bilirubin">Bilirubin</td>
		  <td width="66%"><input type="checkbox" name="chemistry[]" value="Urea">Urea</td>
		  <td width="66%"><input type="checkbox" name="serology[]" value="BACTERIOLOGY">BACTERIOLOGY</td>
		  <td width="66%"><input type="checkbox" name="hormone_analysis[]" value="PSA">PSA</td>
		</tr>
		<tr>
          <td width="66%"><input type="checkbox" name="hematology[]" value="Blood film">Blood film</td>
		  <td width="66%"><input type="checkbox" name="urine_analysis[]" value="Urobilinogen">Urobilinogen</td>
		  <td width="66%"><input type="checkbox" name="chemistry[]" value="Creatinie">Creatinie</td>
		  <td width="66%"><input type="checkbox" name="serology[]" value="Gram Stain">Gram Stain</td>
		  <td width="66%"></td>
		</tr>
		<tr>
          <td width="66%"><input type="checkbox" name="hematology[]" value="STOOL TEST">STOOL TEST</td>
		  <td width="66%"><input type="checkbox" name="urine_analysis[]" value="Blood">Blood</td>
		  <td width="66%"><input type="checkbox" name="chemistry[]" value="Uric Acid">Uric Acid</td>
		  <td width="66%"><input type="checkbox" name="serology[]" value="Wet film">Wet film</td>
		  <td width="66%"></td>
		</tr>
		<tr>
          <td width="66%"><input type="checkbox" name="hematology[]" value="Consistency">Consistency</td>
		  <td width="66%"><input type="checkbox" name="urine_analysis[]" value="Microscopy">Microscopy</td>
		  <td width="66%"><input type="checkbox" name="chemistry[]" value="T.protein">T.Protein</td>
		  <td width="66%"><input type="checkbox" name="serology[]" value="KOH">KOH</td>
		  <td width="66%"></td>
		</tr>
		<tr>
          <td width="66%"><input type="checkbox" name="hematology[]" value="o/p">O/P</td>
		  <td width="66%"><input type="checkbox" name="urine_analysis[]" value="Epit.cells">Epit.cells</td>
		  <td width="66%"><input type="checkbox" name="chemistry[]" value="Cholestrol">Cholestrol</td>
		  <td width="66%"><input type="checkbox" name="serology[]" value="AFB">AFB</td>
		  <td width="66%"></td>
		</tr>
		<tr>
          <td width="66%"><input type="checkbox" name="hematology[]" value="concentration">Concentration</td>
		  <td width="66%"><input type="checkbox" name="urine_analysis[]" value="WBC">WBC</td>
		  <td width="66%"><input type="checkbox" name="chemistry[]" value="HDL">HDL</td>
		  <td width="66%"><input type="checkbox" name="serology[]" value="culture">Culture</td>
		  <td width="66%"></td>
		</tr>
		<tr>
          <td width="66%"><input type="checkbox" name="hematology[]" value="Occuit">Occuit Blood</td>
		  <td width="66%"><input type="checkbox" name="urine_analysis[]" value="RBC">RBC</td>
		  <td width="66%"><input type="checkbox" name="chemistry[]" value="Sodium">Sodium</td>
		  <td width="66%"></td>
		  <td width="66%"></td>
		</tr>
		<tr>
          <td width="66%"></td>
		  <td width="66%"><input type="checkbox" name="urine_analysis[]" value="CASTS">CASTS</td>
		  <td width="66%"><input type="checkbox" name="chemistry[]" value="Potassium">Potassium</td>
		  <td width="66%"></td>
		  <td width="66%"></td>
		</tr>
		<tr>
          <td width="66%"></td>
		  <td width="66%"><input type="checkbox" name="urine_analysis[]" value="HCG Test">HCG Test</td>
		  <td width="66%"><input type="checkbox" name="chemistry[]" value="LDH">LDH</td>
		  <td width="66%"></td>
		  <td width="66%"></td>
		</tr>  
      </tbody>
    </table>
	<input type="submit" id="submit" name="submit"  value="Submit Values" class="btn btn-primary">  
    </form>
  </div>
</div>
</div>
 <div class="clear"></div>
  </div>
</div>
<?php
include("footers.php");
?>
