<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update Result</title>
    
	<link rel="stylesheet" type="text/css" href="adminmain.css" />	
</head>
<script>

function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value; 
self.location='upd_stud_result.php?cat=' + val ;
}
function reload3(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value; 
var val2=form.subcat.options[form.subcat.options.selectedIndex].value; 

self.location='upd_stud_result.php?cat=' + val + '&subcat=' + val2 ;
}
function reload4(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
var val1=form.subcat.options[form.subcat.options.selectedIndex].value; 
var val2=form.subcat3.options[form.subcat3.options.selectedIndex].value; 

self.location='upd_stud_result.php?cat=' + val + '&subcat=' + val1 + '&subcat3=' + val2 ;
}
function reload5(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
var val1=form.subcat.options[form.subcat.options.selectedIndex].value; 
var val2=form.subcat3.options[form.subcat3.options.selectedIndex].value; 
var val3=form.subcat4.options[form.subcat3.options.selectedIndex].value;
self.location='upd_stud_result.php?cat=' + val + '&subcat=' + val1 + '&subcat3=' + val2 +'&subcat4=' + val3 ;
}

function vis(){
document.getElementById("th").style.visibility="visible";
}

function repots(){
if(document.getElementById("thisone").style.visibility=="visible")
{
document.getElementById("thisone").style.visibility="hidden";
document.getElementById("thisone1").style.backgroundColor="transparent";
}
else
{
document.getElementById("thisone").style.visibility="visible";
document.getElementById("thisone1").style.backgroundColor="#E3DFD5";
}



}
</script>
<body>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="adminmain.js"></script>

<div id="lefttab">
<div id="thelogo">
<a class="theimage" href="http://www.somaiya.edu"><img src="svv_logo.jpg" style="width:100%;position:absolute;" alt="somaiya" ></a>
<!-- https://www.somaiya.edu/styles/images/SVV_logo_LHS.jpg-->
</div>
<div id="thetab">
<nav id="a35">
<ul id="a351" class="collapsible">
<li class="waves-effect waves-som_color"><a href="addadmin.php">Add Admin</a></li>

<li class="waves-effect waves-som_color"><a href="KT form.php">KT Form</a></li>
<li class="waves-effect waves-som_color"><a  href="upd_stud_result.php">Update</a></li>
<li class="waves-effect waves-som_color" ><a href="upload.php">Upload</a></li>
<li class="waves-effect waves-som_color" ><a href="subjects.php" >Subjects</a></li>
<li>
	<span class="collapsible-header">Reports</span>
	 <ul class="collapsible-body">
<li class="waves-effect waves-som_color"><a href="cleanpass.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspClean Pass</a></li>
<li class="waves-effect waves-som_color"><a href="succpass.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSuccessful Pass</a></li>
<li class="waves-effect waves-som_color"><a href="topper.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTopper</a></li>
<li class="waves-effect waves-som_color"><a href="dropouts.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDrop-outs</a></li>
<li class="waves-effect waves-som_color"><a href="passstud.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPass</a></li>
<li class="waves-effect waves-som_color"><a href="failstud.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspFail</a></li>
  </ul>
  </li> 
</ul>
</nav>
</div>
</div>


<div id="righttab">

<p id="theheader" style="text-align:center">Result Analysis</p>
<div id="thebody">
<div>
<a href ="adminmain.php" id="topbuttons" style="margin-left:20px;float:left"><span>Home</span></a>
<a href ="adminlogout.php" id="topbuttons" style="float:right"><span>Logout</span></a>
</div>

<?php
if(!isset($_GET['stu_results']) && !isset($_GET['update']))
{
?>
<div style="margin-left:10%;">

</div>
<div style="clear:both;margin-left:15%;">
<form action="upd_stud_result.php" method="get">




<?php
//***************************************
// This is downloaded from www.plus2net.com //
/// You can distribute this code with the link to www.plus2net.com ///
//  Please don't  remove the link to www.plus2net.com ///
// This is for your learning only not for commercial use. ///////
//The author is not responsible for any type of loss or problem or damage on using this script.//
/// You can use it at your own risk. /////
//****************************************
/////// Update your database login details here /////
$dbhost_name = "localhost"; // Your host name 
$database = "results";       // Your database name
$username = "root";            // Your login userid 
$password = "";            // Your password 
//////// End of database details of your server //////

//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host='.$dbhost_name.';dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
} // Your Database details 
?>

<?Php

///////// Getting the data from Mysql table for first list box//////////
$quer2="SELECT DISTINCT year,engg_year FROM student_year order by engg_year"; 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
$cat=@$_GET['cat']; // This line is added to take care if your global variable is off
if(isset($cat) and strlen($cat) > 0){
$quer="SELECT DISTINCT sem_no FROM semester where engg_year=$cat order by sem_no"; 
}else{$quer="SELECT DISTINCT sem_no FROM semester order by sem_no"; } 
////////// end of query for second subcategory drop down list box ///////////////////////////


/////// for Third drop down list we will check if sub category is selected else we will display all the subcategory3///// 
$cat3=@$_GET['subcat']; // This line is added to take care if your global variable is off
if(isset($cat3) and strlen($cat3) > 0){
$quer3="SELECT DISTINCT subject_name,subject_code FROM subjects where sem_no=$cat3 order by subject_code"; 
}else{$quer3="SELECT DISTINCT subject_name,subject_code FROM subjects order by subject_code"; } 
////////// end of query for third subcategory drop down list box ///////////////////////////


$subcat3=@$_GET['subcat3']; // This line is added to take care if your global variable is off
if(isset($subcat3) and strlen($subcat3) > 0){
$quer4="SELECT DISTINCT roll_no FROM student_result where sem_no=$cat3 and subject_code=$subcat3 order by roll_no"; 
}else{$quer4="SELECT DISTINCT roll_no FROM student_result order by roll_no"; } 

echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEngineering year :";
//////////        Starting of first drop downlist /////////
echo "<center><select name='cat' id='round12' style='float:right;margin-right:40%' onchange=\"reload(this.form)\"><option value='0'>Select one</option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['engg_year']==@$cat){echo "<option selected value='$noticia2[engg_year]'>$noticia2[year]</option>"."<br>";}
else{echo  "<option value='$noticia2[engg_year]'>$noticia2[year]</option>";}
}
echo "</select>";
//////////////////  This will end the first drop down list ///////////

echo "<br><br><br>Sem number : &nbsp;";
//////////        Starting of second drop downlist /////////
echo "<select name='subcat' id='round12' style='float:right;margin-right:40%' onchange=\"reload3(this.form)\"><option value='0'>Select one</option>";
foreach ($dbo->query($quer) as $noticia) {
if($noticia['sem_no']==@$cat3){echo "<option selected value='$noticia[sem_no]'>$noticia[sem_no]</option>"."<BR>";}
else{echo  "<option value='$noticia[sem_no]'>$noticia[sem_no]</option>";}
}
echo "</select><br>";
//////////////////  This will end the second drop down list ///////////

echo "<br><br>Subject name : &nbsp;";
//////////        Starting of third drop downlist /////////
echo "<select name='subcat3' id='round12' style='float:right;margin-right:40%' onchange=\"reload4(this.form)\"><option value='0'>Select one</option>";
foreach ($dbo->query($quer3) as $noticia) {
if($noticia['subject_code']==@$subcat3){echo "<option selected value='$noticia[subject_code]'>$noticia[subject_name]</option>"."<BR>";}
else
{
echo  "<option value='$noticia[subject_code]'>$noticia[subject_name]</option>";}
}
echo "</select>";
//////////////////  This will end the third drop down list ///////////

echo "<br><br><br>Roll no : &nbsp;";
//////////        Starting of fourth drop downlist /////////
echo "<select name='subcat4' id='round12' style='float:right;margin-right:40%' \><option value='0'>Select one</option>";
foreach ($dbo->query($quer4) as $noticia) {
echo  "<option value='$noticia[roll_no]'>$noticia[roll_no]</option>";
}
echo "</select>";


?><br><br><br>
<input id="ro" type="submit" name="stu_results" style="float:right;margin-right:37%"  value="Submit" />
</form>
</div>

<?php
}
else
{
$dbhost_name = "localhost"; // Your host name 
$database = "results";       // Your database name
$username = "root";            // Your login userid 
$password = "";            // Your password 
//////// End of database details of your server //////

//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host='.$dbhost_name.';dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
} // Your Database details 

$cat3=$_GET['subcat'];
$subcat3=$_GET['subcat3'];
$subcat4=$_GET['subcat4'];
if($_GET['subcat4']!=0){

$sql=$dbo->prepare("SELECT * FROM student_result where sem_no=$cat3 and subject_code=$subcat3 and roll_no=$subcat4");
$result=$sql->execute();
$row = $sql->fetch(PDO::FETCH_ASSOC);
echo "<table border=5 cellspacing=5 cellpadding=5>";
echo "<tr><td>SEMESTER</td><td>SUBJECT CODE</td><td>ROLL NO</td><td>SEAT NO</td><td>THEORY MARKS</td><td> GRACE</td><td>IA</td><td>THEORY TOTAL</td><td>THEORY GP</td><td>TERM WORK MARKS</td><td>PRAC MARKS</td><td>TOTAL</td><td>GARDE</td><td>ENGG YEAR</td><td>EXAM YEAR</td></tr>";
echo "<tr><td>".$row['sem_no']."</td><td>".$row['subject_code']."</td><td>".$row['roll_no']."</td><td>".$row['seat_no']."</td><td>".$row['th_marks']."</td><td>".$row['gr_marks']."</td><td>".$row['int_marks']."</td><td>".$row['th_total']."</td><td>".$row['th_gp']."</td><td>".$row['tw_marks']."</td><td>".$row['prac_marks']."</td><td>".$row['tp_total']."</td><td>".$row['tp_gp']."</td><td>".$row['engg_year']."</td><td>".$row['exam_year']."</td></tr>";
}
?>
<br>
<form action="update.php" method="post">
Student Data Selected :<br>
Sem no.:&nbsp;
<input type="text" name="subcat" value="<?php echo $cat3;?>" >
Subject code:&nbsp;<input type="text" name="subcat3" value="<?php echo $subcat3;?>" >
Roll no.:&nbsp;<input type="text" name="subcat4" value="<?php echo $subcat4;?>" >
<br>
Select column to edit : &nbsp;
<select id="round12" name="column_edit">
     <option value="sem_no">Sem_no</option>
     <option value="subject_code">Subject_code</option>
     <option value="roll_no">roll_no</option>
     <option value="seat_no">Seat_no</option>
     <option value="th_marks">theory marks</option>
     <option value="gr_marks">grace marks</option>
      <option value="int_marks">IA marks</option>
      <option value="th_total">theory total</option>
      <option value="th_gp">theory gp</option>
      <option value="tw_marks">term work marks</option>
      <option value="prac_marks">practical marks</option>
      <option value="tp_total">total</option>
      <option value="tp_gp">grade point</option>
     <option value="engg_year"> Engineering year</option>
      <option value="exam_year">Exam year</option>
      
   </select><br><br>
   Enter new value : &nbsp;&nbsp; <input type="text" name="new_value" />
   
   <br><br /><input id="ro" type="submit" name="update"  value="Submit" />
   </form>
<?php
}
?>

</div>
</div>
</body>
</html>