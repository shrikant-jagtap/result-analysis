<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Topper</title>
    
	<link rel="stylesheet" type="text/css" href="adminmain.css" />	
</head>
<script>
function print_result(){
  window.print();
}

function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value; 
self.location='topper.php?cat=' + val ;
}
function reload3(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value; 
var val2=form.subcat.options[form.subcat.options.selectedIndex].value; 

self.location='topper.php?cat=' + val + '&cat3=' + val2 ;
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

</div>




<h1 style="text-align:center">Topper</h1>
<?php

if(!isset($_GET['topper']))
{
?>
<form action="topper.php" method="get">

<fieldset>


<br>
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
$cat3=@$_GET['cat3']; // This line is added to take care if your global variable is off
if(isset($cat3) and strlen($cat3) > 0){
$quer3="SELECT DISTINCT subject_name,subject_code FROM subjects where sem_no=$cat3 order by subject_code"; 
}else{$quer3="SELECT DISTINCT subject_name,subject_code FROM subjects order by subject_code"; } 
////////// end of query for third subcategory drop down list box ///////////////////////////


//////////        Starting of first drop downlist /////////
?>
<br>
<?php
echo "Select Year :<select id='round12' name='cat' onchange=\"reload(this.form)\"><option value='0'>Select one</option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['engg_year']==@$cat){echo "<option selected value='$noticia2[engg_year]'>$noticia2[year]</option>"."";}
else{echo  "<option value='$noticia2[engg_year]'>$noticia2[year]</option>";}
}
echo "</select>&nbsp&nbsp<br><br>";

//////////////////  This will end the first drop down list ///////////
?>
<?php
//////////        Starting of second drop downlist /////////
echo "Select Sem:<select id='round12' name='subcat' onchange=\"reload3(this.form)\"><option value='0'>Select one</option>";
foreach ($dbo->query($quer) as $noticia) {
if($noticia['sem_no']==@$cat3){echo "<option selected value='$noticia[sem_no]'>$noticia[sem_no]</option>"."";}
else{echo  "<option value='$noticia[sem_no]'>$noticia[sem_no]</option>";}
}
echo "</select>&nbsp&nbsp<br><br>";
//////////////////  This will end the second drop down list ///////////

?>
<?php
//////////        Starting of third drop downlist /////////
echo "Select subject name:<select id='round12' name='subcat3' ><option value='0'>Select one</option>";
foreach ($dbo->query($quer3) as $noticia) {
echo  "<option value='$noticia[subject_code]'>$noticia[subject_name]</option>";
}
echo "</select>";
//////////////////  This will end the third drop down list ///////////


?>
<br><br>
Academic Year

  <?php echo('<select id="round12" name="year">');
    for ( $i = 2010; $i < date("Y"); $i++ )
    {$j=$i-1999;
      echo'<option value='.$i.'-'.$j.'>'.$i.'-'.$j.'</option>';
     
    }
    echo('</select>');

?>

<br>
<br><input id="ro" type="submit" name="topper" value="Show">

</fieldset></form>

<br><br>




</fieldset>
 








<?php
}
/////// Update your database login details here /////
$dbhost_name = "localhost"; // Your host name 
$database = "results";       // Your database name
$username = "root";            // Your login userid 
$password = "";            // Your password 
//////// End of database details of your server //////

//////// Do not Edit below /////////
$link  = mysql_connect("$dbhost_name", "$username", "$password")or die("cannot connect");
mysql_select_db("$database")or die("cannot select DB");
 
if(isset($_GET['topper']))
{

///year topper
if($_GET['cat']!="0" && $_GET['subcat']=="0" && $_GET['subcat3']=="0")
{
//$sql = "select * from student where roll_no = (select DISTINCT roll_no from student_exam where sgp = (select max(t.avg_sgp) from ((SELECT (AVG(sgp)) avg_sgp FROM student_exam WHERE exam_year='".$_GET['year']."' AND engg_year=".$_GET['cat']." GROUP BY roll_no) AS t)))";
$sql= "SELECT s.roll_no,p.name,s.engg_year,s.exam_year,AVG(s.sgp) AS 'avg_sgp' FROM student_exam AS s INNER JOIN student AS p ON s.roll_no=p.roll_no WHERE s.exam_year='".$_GET['year']."' AND s.engg_year=".$_GET['cat']." GROUP BY s.roll_no ORDER BY avg_sgp DESC LIMIT 5";
$result=mysql_query($sql);
?>

<table id="Sem topper" align="center" cellspacing="30">
  <tr>
   <th>Name</th>
   <th>Roll No</th>
   <th>ENGG YEAR</th>
   <th>YEAR</th>
   <th>SGP</th>
    </tr>
	<?php
	while ($row = mysql_fetch_array($result))
{
 ?>
   <tr>
   	<td align="center"><?php echo $row['name'];?></td>
   	<td align="center"><?php echo $row['roll_no'];?></td>
    <td align="center"><?php echo $row['engg_year'];?></td>
    <td align="center"><?php echo $row['exam_year'];?></td>
    <td align="center"><?php echo $row['avg_sgp'];?></td>
  </tr>

<?php

}
}
///sem topper
if($_GET['cat']!="0" && $_GET['subcat']!="0" && $_GET['subcat3']=="0")
{
$sql1 = "SELECT DISTINCT s.roll_no,p.name,s.sem_no,s.sgp FROM student_exam AS s INNER JOIN student AS p ON s.roll_no=p.roll_no WHERE s.exam_year='".$_GET['year']."' AND s.engg_year=".$_GET['cat']." AND s.sem_no=".$_GET['subcat']." ORDER BY s.sgp DESC LIMIT 5";
$result=mysql_query($sql1);
?>

<table id="Sem topper" cellspacing="30" align="center">
  <tr>
   <th>Name</th>
   <th>Roll No</th>
   <th>SEM NUMBER</th>
   <th>SGP</th>
    </tr>
	<?php
	while ($row = mysql_fetch_array($result))
{
 ?>
   <tr>
   	<td align="center" ><?php echo $row['name'];?></td>
   	<td align="center"><?php echo $row['roll_no'];?></td>
    <td align="center"><?php echo $row['sem_no'];?></td>
    <td align="center"><?php echo $row['sgp'];?></td>
  </tr>

<?php 
   
}


}
///subject topper
if($_GET['cat']!="0" && $_GET['subcat']!="0" && $_GET['subcat3']!="0")
{
$sql = "SELECT DISTINCT s.roll_no,p.name,s.sem_no,s.subject_code,j.subject_name,s.th_marks FROM student_result AS s INNER JOIN student AS p ON s.roll_no=p.roll_no INNER JOIN subjects AS j ON s.subject_code=j.subject_code WHERE s.exam_year='".$_GET['year']."' AND s.engg_year=".$_GET['cat']." AND s.sem_no=".$_GET['subcat']." AND s.subject_code='".$_GET['subcat3']."' ORDER BY s.th_marks DESC  LIMIT 5";
$result=mysql_query($sql);
?>
<table align="center" id="Subject topper" cellspacing="30">
  <col width="180">
  <tr>
   <th>Name</th>
   <th>Roll No</th>
   <th>SEM NUMBER</th>
   <th>SUBJECT</th>
   <th>THEORY MARKS</th>
    </tr>
	<?php
	while ($row = mysql_fetch_assoc($result))
{
 ?>
   <tr>
   	<td align="center"><?php echo $row['name'];?></td>
   	<td align="center"><?php echo $row['roll_no'];?></td>
    <td align="center"><?php echo $row['sem_no'];?></td>
    <td align="center"><?php echo $row['subject_name'];?></td>
    <td align="center"><?php echo $row['th_marks'];?></td> 
 </tr>

<?php 



}
}
//not selected any of the three
if($_GET['cat']=="0" && $_GET['subcat']=="0" && $_GET['subcat3']=="0")
{
  echo 'Invalid selection';
}
}

?>
<button id="topbuttons" onclick="print_result()">Print</button>

</div></body>
</html>