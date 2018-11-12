<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
    
	<link rel="stylesheet" type="text/css" href="adminmain.css" />	
</head>
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
if(!isset($_POST['submit']))
{
?>

<form action="addadmin.php" method="post">
<center>Enter following details to create new user </center>
<br>
<div style="width:50%;height:100%;margin-left:25%;">
<div style="padding-left:20%;">
 <div class="row">
        <div class="input-field col s12">

<input id="username" type="text" name="username">
<label for="username">Username</label>
</div></div>
 <div class="row">
        <div class="input-field col s12">

<input id="name" type="text" name="name">
<label for="name">Name</label>
</div></div>
 <div class="row">
        <div class="input-field col s12">
<input id="middlename" type="text" name="middlename">
<label for="middlename">Middle Name</label>
</div></div>

 <div class="row">
        <div class="input-field col s12">

<input id="surname" type="text" name="surname">
<label for="surname">Surname</label>
</div></div>
 <div class="row">
        <div class="input-field col s12">

<input id="emailid" type="text" name="emailid">
<label for="emailid">Email ID</label>
</div></div>
 <div class="row">
        <div class="input-field col s12">
<input id="password" type="password" name="pass">
<label for="password">Password</label>
</div></div>
 <div class="row">
        <div class="input-field col s12">


<input id="cpassword" type="password" name="pass2">
<label for="cpassword">Confirm Password</label>
</div></div>

 <div class="row">
        <div class="input-field col s12">
<input id="mobileno" type="text" name="mobileno" maxlength="10">
<label for="mobileno">Mobile No</label>
</div></div>

 <div class="row">
        <div class="input-field col s12">

<input id="cur_adm_pass" id="passw" type="password" name="pass3" >
<label for="cur_adm_pass">Your Password</label>
</div></div>
</div>
 <div class="row">
        <div class="input-field col s12">

<input id="ro" type="submit" name="submit" value="Submit">

<input id="ro" type="reset" name="cancel" value="Cancel">
</div></div>




<?php
}
else
	{	
	
	
	mysql_connect("localhost","root","") or die(mysql_error());
    mysql_select_db("results");
	
$query = "SELECT * FROM admin WHERE username='". $_SESSION['abc_username'] ."'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
if($_POST['pass3']!=$row['password'])
{
echo "Invalid user.";
echo "<meta http-equiv='refresh' content='2;url=adminlogout.php' />";
}
else
{

	if(preg_match("/^[0-9]{10}/",$_POST['mobileno']) && $_POST['pass']==$_POST['pass2'] && preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $_POST['emailid']) )
		{

			$query1 ="INSERT INTO admin(username,name,middlename,surname,mobile,email,password) VALUES ('".$_POST['username']."','". $_POST['name'] ."','". $_POST['middlename'] ."','".$_POST['surname'] ."','". $_POST['mobileno'] ."','". $_POST['emailid'] ."','". $_POST['pass'] ."')";
			mysql_query($query1);
			echo "<meta http-equiv='refresh' content='2;url=adminmain.php' />";
		}
			else
				{
					mysql_error();
					echo "<b>Invalid email or cell phone no.</b>";
				}

	}
}
?>
</div>
</div>

</div>






</body>
</html>