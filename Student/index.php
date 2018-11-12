<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
.loginpage{
font-famiy:verdana;
position:absolute;
padding:15px; 
width:300px;
height:280px;
line-height:7px;
left:170px;
top:260px;

}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>My Result</title>
    
	<link rel="stylesheet" type="text/css" href="adminmain.css" />	
</head>
<body>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="adminmain.js"></script>
<script>function print_result() {
window.print();
}</script>
<div id="lefttab">
<div id="thelogo">
<a class="theimage" href="http://www.somaiya.edu"><img src="svv_logo.jpg" style="width:100%;position:absolute;" alt="somaiya" ></a>
<!-- https://www.somaiya.edu/styles/images/SVV_logo_LHS.jpg-->
</div>
<div id="thetab">
<nav id="a35">
<ul id="a351" class="collapsible">
<li class="waves-effect waves-som_color"><a href="index.php">My Results</a></li>
<li class="waves-effect waves-som_color"><a href="student_main.php">Topper</a></li>

</ul>
</nav>
</div>
</div>


<div id="righttab">

<p id="theheader" style="text-align:center">Result Analysis</p>
<div id="thebody">
<div>
<a href ="my_result.php" id="topbuttons" style="margin-left:20px;float:left"><span>Home</span></a>
<a href ="logout.php" id="topbuttons" style="float:right"><span>Logout</span></a>
</div>
<?php
if(!isset($_POST['submit']))
{
?>
</div>

<div style="width:37%;height:80%;padding-left:40%;">

<form action="index.php" method="post">

<div class="row">
        <div class="input-field col s12">
<input id="roll_no" type="text" name="roll_no">
<label for="roll_no">Roll Number</label>
</div></div>

<div class="row">
    <div class="input-field col s12">
       <input id="sem" type="text" name="sem">
       <label for="sem">Semester</label>
    </div>
</div>

      


<input id="ro" type="submit" name="submit" value="Submit">

</form>

</div>
</div>
<?php
}
else
{
	/////// Update your database login details here /////
$dbhost_name = "localhost"; // Your host name 
$database = "results";       // Your database name
$username = "root";            // Your login userid 
$password = "";            // Your password 
//////// End of database details of your server //////

//////// Do not Edit below /////////
$link  = mysql_connect("$dbhost_name", "$username", "$password")or die("cannot connect");
mysql_select_db("$database")or die("cannot select DB");



$sql= "SELECT * FROM student_result where roll_no='" . $_POST['roll_no'] . "' AND sem_no='" . $_POST['sem'] . "'";
$result=mysql_query($sql);
?>
<table id="Sem topper"><tr>
<th>Semester</th>

<th><?php echo $_POST['sem'];?>
</th>
</tr>
</table>
<table id="Sem topper" align="center" cellspacing="30">
  <tr>
   
   <th>Roll No</th>
   <th>Subject name</th>
   <th>Theory marks</th>
   <th>Internal marks</th>
     <th>Theory total</th>
   <th>Term work</th>
   <th>Practical marks</th>
   <th>Practical total</th>
   
   
   
   <th>Exam year</th>
    </tr>
	<?php
	while ($row = mysql_fetch_array($result))
{ $query="select subject_name FROM SUBJECTS where subject_code='".$row['subject_code']."' ";
	$result1=mysql_query($query);
	$row_subject=mysql_fetch_array($result1);
 ?>
   <tr>
   	
   	
   	<td align="center"><?php echo $row['roll_no'];?></td>

   	<td align="center"><?php echo $row_subject['subject_name'];?></td>
    <td align="center"><?php echo $row['th_marks'];?></td>
    <td align="center"><?php echo $row['int_marks'];?></td>
    <td align="center"><?php echo $row['th_total'];?></td>
    <td align="center"><?php echo $row['tw_marks'];?></td>
    <td align="center"><?php echo $row['prac_marks'];?></td>
    <td align="center"><?php echo $row['tp_total'];?></td>
    <td align="center"><?php echo $row['exam_year'];?></td>
  
  </tr>

<?php
}
 ?> <tr><button id ="topbuttons"onclick="print_result()">Print</button></tr>
<?php
}
?>
</table>
</body>
</html>