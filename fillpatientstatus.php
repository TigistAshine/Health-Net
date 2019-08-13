<?php
session_start();
include("nurseheader.php");
include("dbconnection.php");
if(isset($_POST['submit']))
{
  
	if(isset($_GET['editmrn']))
	{
			$sql ="UPDATE patient_test SET phone='$_POST[phone]',temprature='$_POST[temprature]',bp='$_POST[bp]',pulse_rate='$_POST[pulse_rate]',respiratory_rate='$_POST[respiratory_rate]',sao2='$_POST[sao2]',spo2='$_POST[spo2]',spo21='$_POST[spo21]',height='$_POST[height]',weight='$_POST[weight]',rbs='$_POST[rbs]',fbs='$_POST[fbs]',ht_li='$_POST[ht_li]',,muas='$_POST[muas]',cigarette='$_POST[cigarette]',wt_age='$_POST[wt_age]',wt_ht='$_POST[wt_ht]',bmi='$_POST[bmi]',bmi_age='$_POST[bmi_age]',muas_age='$_POST[muas_age]',hc_age='$_POST[hc_age]',bp_age_ht='$_POST[bp_age_ht]',note='$_POST[note]' WHERE mrn='$_GET[editmrn]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('patient record updated successfully...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
	$sql ="INSERT INTO patient_test(phone,temprature,bp,pulse_rate,respiratory_rate,sao2,spo2,spo21,height,weight,rbs,fbs,ht_li,muas,cigarette,wt_age,wt_ht,bmi,bmi_age,muas_age,hc_age,bp_age_ht,note) values('$_POST[phone]','$_POST[temprature]','$_POST[bp]','$_POST[pulse_rate]','$_POST[respiratory_rate]','$_POST[sao2]','$_POST[spo2]','$_POST[spo21]','$_POST[height]','$_POST[weight]','$_POST[rbs]','$_POST[fbs]','$_POST[ht_li]','$_POST[muas]','$_POST[cigarette]','$_POST[wt_age]','$_POST[wt_ht]','$_POST[bmi]','$_POST[bmi_age]','$_POST[muas_age]','$_POST[hc_age]','$_POST[bp_age_ht]','$_POST[note]')";
	if($qsql = mysqli_query($con,$sql))
	{
		echo "<script>alert('patients Test inserted successfully...');</script>";
		$insid= mysqli_insert_id($con);
		if(isset($_SESSION[nurseid]))
		{
			
		}
		else
		{
		echo "<script>window.location='patientlogin.php';</script>";	
		}		
	}
	else
	{
		echo mysqli_error($con);
	}
}
}
if(isset($_GET['editmrn']))
{
	$sql="SELECT * FROM patient_test WHERE mrn='$_GET[editmrn]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>

<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">Fill The Neccessary Info</li></ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">
    <!-- <h1>Patient Test Panel</h1>
    <form method="post" action="" name="frmpatient_test" onSubmit="return validateform()"> -->
    <!-- <table width="200" border="3">
      <tbody>  -->
      
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <form method="post" action="./fillpatientstatus.php" name="frmpatient_test" onSubmit="return validateform()">
        <!-- Date time
        <input type="number"  name="date time"><form class="form-inline mr-auto"><br> -->
        Phone No
        <input type="text"  name="phone"><br><br>
  <!-- <button class="btn btn-outline-success btn-rounded btn-sm my-0" type="submit">Search</button> -->

        Temprature
        <input type="text"  name="temprature"> 0C<br><br>
       BP(S/D)
       <input type="text"  name="bp" > mmHg<br><br>
       <!-- <input type="text"  name=" BP(S/D)">mmHg<br><br> -->
         
         Pulse Rate
         <input type="text"  name="pulse_rate">beats/min<br><br>
         
         Respiratory Rate
         <input type="text"  name="respiratory_rate">breaths/min<br><br>
         SaO2
         <input type="text"  name="sao2"><br><br>
          SpO2
         <input type="text"  name="spo2">% on RA<br><br>
        <input type="text"  name="spo21">l/mm<br><br>
         Height
         <input type="text"  name="height">cm<br><br>
          weight
         <input type="text"  name="weight">kg<br><br>
         RBS
         <input type="text"  name="rbs"><br><br>
         FBS
         <input type="text"  name="fbs"><br><br>
          Ht/Li
         <input type="text"  name="ht_li">cm<br><br>
          MUAS
         <input type="int"  name="muas">cm<br><br>
         <div class="form-radio-group">            
                                        Cigarette<div class="form-radio-item">
                                            <input type="radio" name="cigarette" checked>
                                            <label for="cash">smoking</label>
                                            <span class="check"></span>
                                        </div>
                                        <div class="form-radio-item">
                                            <input type="radio" name="cigarette" >
                                            <label for="cheque">non smoking</label>
                                            <span class="check"></span>
                                        </div>
         Interpretation
         
         Wt/Age
         <input type="text"  name="wt_age"><br><br>
          
         Wt/Ht
         <input type="text"  name="wt_ht"><br><br>
        BMI
         <input type="text"  name="bmi"><br><br>
         BMI/AGE
         <input type="text"  name="bmi_age"><br><br>
         MUAS/AGE
         <input type="text"  name="muas_age"><br><br>
          HC/Age
         <input type="text"  name="hc_age"><br><br>
          Bp for age and ht
         <input type="text"  name="bp_age_ht"><br><br>
          note
         <input type="text"  name="note"><br><br>
        
        
        
           <button class="btn btn-primary btn-sm btn-rounded" type="submit" name="submit">Submit</button>

           </form>
    </body>
</html>

      <!-- </tbody>
    </table>
    </form> -->
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
var alphaExp = /^[a-zA-Z]+$+%/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$+%/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$+%/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$+%/; //Variable to validate numbers and alphabets
// var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$+%/; //Variable to validate Email ID 

function validateform()
{
 if(!document.frmpatient_test.phone.value.match(numericExpression))
	{
		alert("Patient phone not valid..");
		document.frmpatient_test.phone.focus();
		return false;
	}
	else if(!document.frmpatient_test.temprature.value.match(numericExpression))
	{
		alert("Patient temprature havenot valid unit..");
		document.frmpatient_test.temprature.focus();
		return false;
	}
	}
	else
	{
		return true;
	}
}
</script>