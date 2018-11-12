<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Successful Pass</title>
    
	<link rel="stylesheet" type="text/css" href="adminmain.css" />	
</head>
<script>
function print_result(){
  window.print();
}

function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value; 
self.location='Reports.php?cat=' + val ;
}
function reload3(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value; 
var val2=form.subcat.options[form.subcat.options.selectedIndex].value; 

self.location='Reports.php?cat=' + val + '&cat3=' + val2 ;
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






<h1 style="">Successful Pass</h1>
<?php
if(!isset($_POST['show_successful']))
{
?>
<form action="succpass.php" method="post">

<fieldset style="margin-left:25%;width:50%;border:none;color:#972021;">


<center>Academic Year</center>

<br>

  <?php echo('<center><select id="round12" name="year"></center>');
    for ( $i = 2010; $i < date("Y"); $i++ )
    {$j=$i-1999;
      echo'<option value='.$i.'-'.$j.'>'.$i.'-'.$j.'</option>';
     
    }
    echo('</select>');

?>
<br><br>

<center><select id="round12" name="engg_year"></center>

<option value="1">F.E.</option>

<option value="2">S.E.</option>

<option value="3">T.E.</option>

<option value="4">B.E.</option>

</select>
<br><br>

<center><input type="submit" id="ro" name="show_successful" value="Show"></center>

</fieldset></form>

<br><br>
 






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
 
if(isset($_POST['show_successful']))
{
$query= "SELECT * FROM student where roll_no IN (SELECT DISTINCT roll_no FROM student_exam WHERE exam_year='".$_POST['year']."' AND engg_year=".$_POST['engg_year']." AND roll_no NOT IN(SELECT roll_no FROM student_exam WHERE result='F' AND exam_year='".$_POST['year']."' AND engg_year=".$_POST['engg_year']."))";

$result= mysql_query($query);
?>
<table id="Successfull Pass" cellspacing="30">
  <tr>
   <th>Name</th>
   <th>Roll No</th>
    </tr>
	<?php
	while ($row = mysql_fetch_array($result))
{
 ?>
   <tr>
   	<td><?php echo $row['name'];?></td>
   	<td><?php echo $row['roll_no'];?></td>
  </tr>


<?php 
   
}
$count = mysql_num_rows($result);
echo $count;

}
?>

<button id="topbuttons" onclick="print_result()">Print</button>

</div>
</body>
</html>