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

<ul id="a351">

<li>Update</li>
<li>Upload</li>
<li><a href="this2.php" style="cursor:pointer; text-decoration:none;color:inherit;">Subjects</a></li>

<li id="thisone1"> <a onclick="repots()" style="cursor:pointer">Reports</a></li>
<ul id="thisone">
<li>Clean Pass</li>

<li>Successful Pass</li>
<li>Topper</li>
<li>Drop-outs</li>
<li>Pass</li>
<li>Fail</li>
</ul>
</ul>
</nav>
</div>
</div>


<div id="righttab">

<p id="theheader" style="text-align:center">Result Analysis</p>
<div id="thebody">

</div>
</div>








</body>
</html>