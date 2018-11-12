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
<script>
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
<a href ="adminlogout.php" id="topbuttons" style="float:right"><span>Logout</span></a>
</div>
</div>
</div>







<?php
if(!isset($_POST['login']))
{
?>
<?php
}
else
{
mysql_connect("localhost", "root", "") or die(mysql_error());
		mysql_select_db("somaiya");
		$query = "SELECT * FROM admin WHERE username='" . $_POST['username'] . "' AND password='" . $_POST['pass'] . "'";
		$result = mysql_query($query);
		$count = mysql_num_rows($result);
		if($count != 0)
		{
			echo "<meta http-equiv='refresh' content='2;url=adminmain.php' />";
			$_SESSION['abc_username']=$_POST['username'];
			
		}
		else
		{
			echo "Invalid Credentials..";
			echo "<a href='adminindex.php'>Click Here to login again</a>";
		}
	}



?>
</body>
</html>