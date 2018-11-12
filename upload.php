<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Upload Result</title>
    
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
<div style="clear:both;margin:10px;">
<br><br><br>
<form enctype="multipart/form-data" class="collapsible" action="upload.php"  method="post"> 
	<span style="margin-left:25%;font-size:200%">Enter sem no:</span>
	
<br>
	<select  id="round12" style="float:right;margin-right:25%;" name="sem_no">
	<div class="collapsible-body">
	<option value="1">1</option>
    <option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>	
	</div>
	</select>
	<br>
	<br><br><br><br>
		<span style="margin-left:25%;font-size:200%;">Enter year:<br></span>
	<?php echo('<select id="round12" style="float:right;margin-right:25%;" name="year">');
 for ( $i = 2010; $i < date("Y"); $i++ )
    {$j=$i-1999;
      echo'<option value='.$i.'-'.$j.'>'.$i.'-'.$j.'</option>';
     
    }
    echo('</select>');
//	?>
<br><br><br>
	<br><br><br>
	<input  type="file" name="file" style="margin-left:25%" id="file">
	<input id="ro" style="float:right;margin-right:25%;font-size:200%" type="submit" name="Next" value=Submit>
</form>

<?php 
if(isset($_POST['Next']))
{  $sem_no = $_POST["sem_no"];
   if($sem_no==1|| $sem_no==2)
     $engg_year=1;
   else if($sem_no==3|| $sem_no==4)
     $engg_year=2;
   else if($sem_no==5|| $sem_no==6)
     $engg_year=3;
   else if($sem_no==7|| $sem_no==8)
     $engg_year=4;		 
//database connection details
$connect = mysql_connect('localhost','root','');

if (!$connect) {
 die('Could not connect to MySQL: ' . mysql_error());
 }

//your database name
$cid =mysql_select_db('results',$connect);
$destination_path = getcwd().DIRECTORY_SEPARATOR."uploads\ ";
$target_path = $destination_path . basename( $_FILES["file"]["name"]);
move_uploaded_file($_FILES['file']['tmp_name'], $target_path);


// Name of your CSV file

if (($getfile = fopen($target_path, "r")) !== FALSE) {                           //to open a csv file
        $data = fgetcsv($getfile, 10000, ",");                                  //accept a row with parsing
         for($c=1;$c<4;$c++)
         {
             $data = fgetcsv($getfile, 10000, ",");
         }	
      $point= fgetcsv($getfile, 10000, ",");
	   $str = implode(",", $point);                                    // string to array
       $slice = explode(",", $str); 
      $l=count($slice);
	 
       for($c=0;$c<$l;$c++)
			{
			
			  if(strcmp($slice[$c],"exam1")==0)
			  { 
			     $c11=$c;
			  }
			  else if(strcmp($slice[$c],"exam2")==0)
			  {    
			     $c12=$c;
			  }
			  else if(strcmp($slice[$c],"exam3")==0)
			  {  
			     $c13=$c;
			  }
			  else if(strcmp($slice[$c],"GP3")==0)
			  {
			     $c14=$c;
			  }
			  else if(strcmp($slice[$c],"exam4")==0)
			  {
			     $c21=$c;
			  }
			  else if(strcmp($slice[$c],"exam5")==0)
			  {
			     $c22=$c;
			  }
			  else if(strcmp($slice[$c],"exam6")==0)
			  {
			     $c23=$c;
			  }
			  else if(strcmp($slice[$c],"GP6")==0)
			  {
			     $c24=$c;
			  }
			  else if(strcmp($slice[$c],"exam7")==0)
			  {
			     $c31=$c;
			  }
			  else if(strcmp($slice[$c],"exam8")==0)
			  {
			     $c32=$c;
			  }
			  else if(strcmp($slice[$c],"exam9")==0)
			  {
			     $c33=$c;
			  }
			  else if(strcmp($slice[$c],"GP9")==0)
			  {
			     $c34=$c;
			  }
			  else if(strcmp($slice[$c],"exam10")==0)
			  {
			     $c41=$c;
			  }
			  else if(strcmp($slice[$c],"exam11")==0)
			  {
			     $c42=$c;
			  }
			  else if(strcmp($slice[$c],"exam12")==0)
			  {
			     $c43=$c;
			  }
			  else if(strcmp($slice[$c],"GP12")==0)
			  {
			     $c44=$c;
			  }
			  else if(strcmp($slice[$c],"exam13")==0)
			  {
			     $c51=$c;
			  }
			  else if(strcmp($slice[$c],"exam14")==0)
			  {
			     $c52=$c;
			  }
			  else if(strcmp($slice[$c],"exam15")==0)
			  {
			     $c53=$c;
			  }
			  else if(strcmp($slice[$c],"GP15")==0)
			  {
			     $c54=$c;
			  }
			  else if(strcmp($slice[$c],"exam16")==0)
			  {
			     $c61=$c;
			  }
			  else if(strcmp($slice[$c],"exam17")==0)
			  {
			     $c62=$c;
			  }
			  else if(strcmp($slice[$c],"exam18")==0)
			  {
			     $c63=$c;
			  }
			  else if(strcmp($slice[$c],"GP18")==0)
			  {
			     $c64=$c;
			  }
			  // practicals
			  else if(strcmp($slice[$c],"exam37")==0)
			  {
			     $c71=$c;
			  }
			  else if(strcmp($slice[$c],"exam38")==0 ||strcmp($slice[$c],"exam39")==0)
			  {
			     $c72=$c;
			  }
			  else if(strcmp($slice[$c],"exam40")==0)
			  {
			     $c73=$c;
			  }
			  else if(strcmp($slice[$c],"GP40")==0)
			  {
			     $c74=$c;
			  }
			  else if(strcmp($slice[$c],"exam41")==0)
			  {
			     $c81=$c;
			  }
			  else if(strcmp($slice[$c],"exam42")==0 ||strcmp($slice[$c],"exam43")==0)
			  {
			     $c82=$c;
			  }
			  else if(strcmp($slice[$c],"exam44")==0)
			  {
			     $c83=$c;
			  }
			  else if(strcmp($slice[$c],"GP44")==0)
			  {
			     $c84=$c;
			  }
			  else if(strcmp($slice[$c],"exam45")==0)
			  {
			     $c91=$c;
			  }
			  else if(strcmp($slice[$c],"exam46")==0 ||strcmp($slice[$c],"exam47")==0)
			  {
			     $c92=$c;
			  }
			  else if(strcmp($slice[$c],"exam48")==0)
			  {
			     $c93=$c;
			  }
			  else if(strcmp($slice[$c],"GP48")==0)
			  {
			     $c94=$c;
			  }
			  else if(strcmp($slice[$c],"exam49")==0)
			  {
			     $c101=$c;
			  }
			  else if(strcmp($slice[$c],"exam50")==0 ||strcmp($slice[$c],"exam51")==0)
			  {
			     $c102=$c;
			  }
			  else if(strcmp($slice[$c],"exam52")==0)
			  {
			     $c103=$c;
			  }
			  else if(strcmp($slice[$c],"GP52")==0)
			  {
			     $c104=$c;
			  }
			  else if(strcmp($slice[$c],"exam53")==0)
			  {
			     $c111=$c;
			  }
			  else if(strcmp($slice[$c],"exam54")==0 ||strcmp($slice[$c],"exam55")==0)
			  {
			     $c112=$c;
			  }
			  else if(strcmp($slice[$c],"exam56")==0)
			  {
			     $c113=$c;
			  }
			  else if(strcmp($slice[$c],"GP56")==0)
			  {
			     $c114=$c;
			  }
			  else if(strcmp($slice[$c],"exam57")==0)
			  {
			     $c121=$c;
			  }
			  else if(strcmp($slice[$c],"exam58")==0 ||strcmp($slice[$c],"exam59")==0)
			  {
			     $c122=$c;
			  }
			  else if(strcmp($slice[$c],"exam60")==0)
			  {
			     $c123=$c;
			  }
			  else if(strcmp($slice[$c],"GP60")==0)
			  {
			     $c124=$c;
			  }
			  // GPA and result
			  else if(strcmp($slice[$c],"GPA")==0)
			  {
			     $gp=$c;
			  }
			  else if(strcmp($slice[$c],"Remark")==0)
			  {
			     $remark=$c;
			  }
			  
			}
			for($c=1;$c<5;$c++)
         {
             $data = fgetcsv($getfile, 10000, ",");
         }	
        while (($data = fgetcsv($getfile, 10000, ",")) !== FALSE) {
        
             $result = $data; 
             $str = implode(",", $result);                                    // string to array
             $slice = explode(",", $str);                                     // array to string
             $col2 = $slice[2]; 
             $col4 = $slice[4];
			 
          
// SQL Query to insert data into DataBase


$query1= "Select subject_code FROM subjects where (sem_no=$sem_no and exam_year='".$_POST['year']."')";
$sc=mysql_query($query1, $connect);
$n=mysql_num_rows($sc);
//echo $n;
$i=1;
$sub_code=array();
$c=0;
 while($sub=mysql_fetch_array($sc))
{
    $sub_code[$c]=$sub['subject_code'];
	$c++;
}
/*if($i<=$n){
$query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[0]."','".$col2."',$slice[$c11],0,$slice[$c12],$slice[$c13],$slice[$c14],$slice[$c71],$slice[$c72],$slice[$c73],$slice[$c74],'".$_POST['year']."')";

$s=mysql_query($query, $connect );
$i++;
} 
if($i<=$n){
$query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[1]."','".$col2."',$slice[$c21],0,$slice[$c22],$slice[$c23],$slice[$c24],$slice[$c81],$slice[$c82],$slice[$c83],$slice[$c84],'".$_POST['year']."')";

$s=mysql_query($query, $connect ); 
$i++;
} 
if($i<=$n){

$query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[2]."','".$col2."',$slice[$c31],0,$slice[$c32],$slice[$c33],$slice[$c34],$slice[$c91],$slice[$c92],$slice[$c93],$slice[$c94],'".$_POST['year']."')";

$s=mysql_query($query, $connect ); 
$i++;
} 
if($i<=$n){
$query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[3]."','".$col2."',$slice[$c41],0,$slice[$c42],$slice[$c43],$slice[$c44],$slice[$c101],$slice[$c102],$slice[$c103],$slice[$c104],'".$_POST['year']."')";

$s=mysql_query($query, $connect );
$i++;
} 
if($i<=$n){ 
$query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[4]."','".$col2."',$slice[$c51],0,$slice[$c52],$slice[$c53],$slice[$c54],$slice[$c111],$slice[$c112],$slice[$c113],$slice[$c114],'".$_POST['year']."')";

$s=mysql_query($query, $connect ); 
$i++;
} 
if($i<=$n){
$query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[5]."','".$col2."',$slice[$c61],0,$slice[$c62],$slice[$c63],$slice[$c64],$slice[$c121],$slice[$c122],$slice[$c123],$slice[$c124],'".$_POST['year']."')";

$s=mysql_query($query, $connect );
$i++;
}  
*/

// Student exam values

$query5 = "INSERT INTO student_exam(engg_year,roll_no,sem_no,sgp,result,exam_year) VALUES ('".$engg_year."','".$col4."',".$sem_no.",'".$slice[$gp]."','".$slice[$remark]."','".$_POST['year']."')";
$s=mysql_query($query5, $connect );



 /// Student result and KT subject
 $i=1;
  
 
 //subject 1
 if($i<=$n){
  $query=" select theory , practical , term_work from subjects where subject_code='".$sub_code[0]."' and sem_no=$sem_no and exam_year='".$_POST['year']."'";
  $sub=mysql_query($query, $connect );
  $s=mysql_fetch_assoc($sub);
  
   
 if($s['theory']==1&&$s['term_work']==1)
 {
   if($s['practical']==1){
   
   $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[0]."','".$col2."','".$slice[$c11]."',0,'".$slice[$c12]."',$slice[$c13],'".$slice[$c14]."','".$slice[$c71]."','".$slice[$c72]."',$slice[$c73],'".$slice[$c74]."','".$_POST['year']."')";
   $s=mysql_query($query, $connect );
   }  
   
   else
   {  
     
     $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[0]."','".$col2."','".$slice[$c11]."',0,'".$slice[$c12]."',$slice[$c13],'".$slice[$c14]."','".$slice[$c71]."',0,$slice[$c73],'".$slice[$c74]."','".$_POST['year']."')";
     $s=mysql_query($query, $connect );
   }
 if($slice[$c14]==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[0]."','".$col4."','theory')";
	 $s=mysql_query($query, $connect );
 
 } 
 if($slice[$c74]==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[0]."','".$col4."','practical')";
	 $s=mysql_query($query, $connect );
 
 } 
 }
 else if( $s['theory']==1&&$s['term_work']==0) 
 {
     $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[0]."','".$col2."','".$slice[$c11]."',0,'".$slice[$c12]."',$slice[$c13],'".$slice[$c14]."',0,0,0,0,'".$_POST['year']."')";
     $s=mysql_query($query, $connect );
     if($slice[$c14]==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[0]."','".$col4."','theory')";
	 $s=mysql_query($query, $connect );
 }
 }
  else if( $s['theory']==0&&$s['term_work']==1)
  {
    if($s['practical']==1){
   $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[0]."','".$col2."',0,0,0,0,0,'".$slice[$c71]."','".$slice[$c72]."',$slice[$c73],'".$slice[$c74]."','".$_POST['year']."')";
   $s=mysql_query($query, $connect );
   }
   else
   {
     $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[0]."','".$col2."',0,0,0,0,0,'".$slice[$c71]."',0,$slice[$c73],'".$slice[$c74]."','".$_POST['year']."')";
     $s=mysql_query($query, $connect );
   }
   if($slice[$c74]==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[0]."','".$col4."','practical')";
	 $s=mysql_query($query, $connect );
 
 } 
  }
 $i++;
}

//subject 2
 if($i<=$n){
  $query=" select theory , practical,term_work from subjects where subject_code='".$sub_code[1]."' and sem_no=$sem_no and exam_year='".$_POST['year']."'";
  $sub=mysql_query($query, $connect );
  $s=mysql_fetch_assoc($sub);
 if($s['theory']==1&&$s['term_work']==1)
 {
   if($s['practical']==1){
   $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[1]."','".$col2."','".$slice[$c21]."',0,'".$slice[$c22]."',$slice[$c23],'".$slice[$c24]."','".$slice[$c81]."','".$slice[$c82]."',$slice[$c83],'".$slice[$c84]."','".$_POST['year']."')";
   $s=mysql_query($query, $connect );
   }
   else
   {
     $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[1]."','".$col2."','".$slice[$c21]."',0,'".$slice[$c22]."',$slice[$c23],'".$slice[$c24]."','".$slice[$c81]."',0,$slice[$c83],'".$slice[$c84]."','".$_POST['year']."')";
     $s=mysql_query($query, $connect );
   }
 if($slice[$c24]==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[1]."','".$col4."','theory')";
	 $s=mysql_query($query, $connect );
 
 } 
 if($slice[$c84]==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[1]."','".$col4."','practical')";
	 $s=mysql_query($query, $connect );
 
 } 
} 
 else if( $s['theory']==1&&$s['term_work']==0) 
 {
     $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[1]."','".$col2."','".$slice[$c21]."',0,'".$slice[$c22]."',$slice[$c23],'".$slice[$c24]."',0,0,0,0,'".$_POST['year']."')";
     $s=mysql_query($query, $connect );
     if($slice[$c24]==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[1]."','".$col4."','theory')";
	 $s=mysql_query($query, $connect );
 }
 }
  else if( $s['theory']==0&&$s['term_work']==1)
  {
    if($s['practical']==1){
   $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[1]."','".$col2."',0,0,0,0,0,'".$slice[$c81]."','".$slice[$c82]."',$slice[$c83],'".$slice[$c84]."','".$_POST['year']."')";
   $s=mysql_query($query, $connect );
   }
   else
   {
     $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[1]."','".$col2."',0,0,0,0,0,'".$slice[$c81]."',0,$slice[$c83],'".$slice[$c84]."','".$_POST['year']."')";
     $s=mysql_query($query, $connect );
   }
   if($slice[$c84]==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[1]."','".$col4."','practical')";
	 $s=mysql_query($query, $connect );
 
 } 
  }
 $i++;
}

//subject 3
 if($i<=$n){
  $query=" select theory , practical, term_work from subjects where subject_code='".$sub_code[2]."' and sem_no=$sem_no and exam_year='".$_POST['year']."'";
  $sub=mysql_query($query, $connect );
  $s=mysql_fetch_assoc($sub);
 if($s['theory']==1&&$s['term_work']==1)
 {
   if($s['practical']==1){
   $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[2]."','".$col2."','".$slice[$c31]."',0,'".$slice[$c32]."',$slice[$c33],'".$slice[$c34]."','".$slice[$c91]."','".$slice[$c92]."',$slice[$c93],'".$slice[$c94]."','".$_POST['year']."')";
   $s=mysql_query($query, $connect );
   }
   else
   {
     $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[2]."','".$col2."','".$slice[$c31]."',0,'".$slice[$c32]."',$slice[$c33],'".$slice[$c34]."','".$slice[$c91]."',0,$slice[$c93],'".$slice[$c94]."','".$_POST['year']."')";
     $s=mysql_query($query, $connect );
   }
 if($slice[$c34]==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[2]."','".$col4."','theory')";
	 $s=mysql_query($query, $connect );
 
 } 
 if($slice[$c94]==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[2]."','".$col4."','practical')";
	 $s=mysql_query($query, $connect );
 
 } 
 }
 else if( $s['theory']==1&&$s['term_work']==0) 
 {
     $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[2]."','".$col2."','".$slice[$c31]."',0,'".$slice[$c32]."',$slice[$c33],'".$slice[$c34]."',0,0,0,0,'".$_POST['year']."')";
     $s=mysql_query($query, $connect );
     if($slice[$c34]==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[2]."','".$col4."','theory')";
	 $s=mysql_query($query, $connect );
 }
 }
  else if( $s['theory']==0&&$s['term_work']==1)
  {
    if($s['practical']==1){
   $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[2]."','".$col2."',0,0,0,0,0,'".$slice[$c91]."','".$slice[$c92]."',$slice[$c93],'".$slice[$c94]."','".$_POST['year']."')";
   $s=mysql_query($query, $connect );
   }
   else
   {
     $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[2]."','".$col2."',0,0,0,0,0,'".$slice[$c91]."',0,'".$slice[$c93]."','".$slice[$c94]."','".$_POST['year']."')";
     $s=mysql_query($query, $connect );
   }
   if($slice[$c94]==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[2]."','".$col4."','practical')";
	 $s=mysql_query($query, $connect );
 
 } 
  }
 $i++;
}

//subject 4
 if($i<=$n){
  $query=" select theory, practical,term_work from subjects where subject_code='".$sub_code[3]."' and sem_no=$sem_no and exam_year='".$_POST['year']."'";
  $sub=mysql_query($query, $connect );
  $s=mysql_fetch_assoc($sub);
 if($s['theory']==1&&$s['term_work']==1)
 {
   if($s['practical']==1){
   $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[3]."','".$col2."','".$slice[$c41]."',0,'".$slice[$c42]."',$slice[$c43],'".$slice[$c44]."','".$slice[$c101]."','".$slice[$c102]."',$slice[$c103],'".$slice[$c104]."','".$_POST['year']."')";
   $s=mysql_query($query, $connect );
   }
   else
   {
     $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[3]."','".$col2."','".$slice[$c41]."',0,'".$slice[$c42]."',$slice[$c43],'".$slice[$c44]."','".$slice[$c101]."',0,$slice[$c103],'".$slice[$c104]."','".$_POST['year']."')";
     $s=mysql_query($query, $connect );
   }
 if($slice[$c44]==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[3]."','".$col4."','theory')";
	 $s=mysql_query($query, $connect );
 
 } 
 if($slice[$c104]==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[3]."','".$col4."','practical')";
	 $s=mysql_query($query, $connect );
 
 } 
 }
 else if( $s['theory']==1&&$s['term_work']==0) 
 {
     $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[3]."','".$col2."','".$slice[$c41]."',0,'".$slice[$c42]."',$slice[$c43],'".$slice[$c44]."',0,0,0,0,'".$_POST['year']."')";
     $s=mysql_query($query, $connect );
     if($slice[$c44]==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[3]."','".$col4."','theory')";
	 $s=mysql_query($query, $connect );
 }
 }
  else if( $s['theory']==0&&$s['term_work']==1)
  {
    if($s['practical']==1){
   $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[3]."','".$col2."',0,0,0,0,0,'".$slice[$c101]."','".$slice[$c102]."',$slice[$c103],'".$slice[$c104]."','".$_POST['year']."')";
   $s=mysql_query($query, $connect );
   }
   else
   {
     $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[3]."','".$col2."',0,0,0,0,0,'".$slice[$c101]."',0,$slice[$c103],'".$slice[$c104]."','".$_POST['year']."')";
     $s=mysql_query($query, $connect );
   }
   if($slice[$c104]==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[3]."','".$col4."','practical')";
	 $s=mysql_query($query, $connect );
 
 } 
  }
 $i++;
}


// subject 5
 if($i<=$n){
  $query=" select theory , practical,term_work from subjects where subject_code='".$sub_code[4]."' and sem_no=$sem_no and exam_year='".$_POST['year']."'";
  $sub=mysql_query($query, $connect );
  $s=mysql_fetch_assoc($sub);
 if($s['theory']==1&&$s['term_work']==1)
 {
   if($s['practical']==1){
   $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[4]."','".$col2."','".$slice[$c51]."',0,'".$slice[$c52]."',$slice[$c53],'".$slice[$c54]."','".$slice[$c111]."','".$slice[$c112]."',$slice[$c113],'".$slice[$c114]."','".$_POST['year']."')";
   $s=mysql_query($query, $connect );
   }
   else
   {
     $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[4]."','".$col2."','".$slice[$c51]."',0,'".$slice[$c52]."',$slice[$c53],'".$slice[$c54]."','".$slice[$c111]."',0,$slice[$c113],'".$slice[$c114]."','".$_POST['year']."')";
     $s=mysql_query($query, $connect );
   }
 if($slice[$c54]==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[4]."','".$col4."','theory')";
	 $s=mysql_query($query, $connect );
 
 } 
 if($slice[$c114]==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[4]."','".$col4."','practical')";
	 $s=mysql_query($query, $connect );
 
 } 
 }
 else if( $s['theory']==1&&$s['term_work']==0) 
 {
     $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[4]."','".$col2."','".$slice[$c51]."',0,'".$slice[$c52]."',$slice[$c53],'".$slice[$c54]."',0,0,0,0,'".$_POST['year']."')";
     $s=mysql_query($query, $connect );
     if($slice[$c54]==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[4]."','".$col4."','theory')";
	 $s=mysql_query($query, $connect );
 }
 }
  else if( $s['theory']==0&&$s['term_work']==1)
  {
    if($s['practical']==1){
   $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[4]."','".$col2."',0,0,0,0,0,'".$slice[$c111]."','".$slice[$c112]."',$slice[$c113],'".$slice[$c114]."','".$_POST['year']."')";
   $s=mysql_query($query, $connect );
   }
   else
   {
     $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[4]."','".$col2."',0,0,0,0,0,'".$slice[$c111]."',0,$slice[$c113],'".$slice[$c114]."','".$_POST['year']."')";
     $s=mysql_query($query, $connect );
   }
   if($slice[$c114]==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[4]."','".$col4."','practical')";
	 $s=mysql_query($query, $connect );
 
 } 
  }
 $i++;
}

// subject 6

 if($i<=$n){
  $query=" select theory, practical,term_work from subjects where subject_code=$sub_code[5] and sem_no=$sem_no and exam_year='".$_POST['year']."'";
  $sub=mysql_query($query, $connect );
  $s=mysql_fetch_assoc($sub);
 if($s['theory']==1&&$s['term_work']==1)
 {
   if($s['practical']==1){
   $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[5]."','".$col2."','".$slice[$c61]."',0,'".$slice[$c62]."',$slice[$c63],'".$slice[$c64]."','".$slice[$c121]."','".$slice[$c122]."',$slice[$c123],'".$slice[$c124]."','".$_POST['year']."')";
   $s=mysql_query($query, $connect );
   }
   else
   {
     $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[5]."','".$col2."','".$slice[$c61]."',0,'".$slice[$c62]."',$slice[$c63],'".$slice[$c64]."','".$slice[$c121]."',0,$slice[$c123],'".$slice[$c124]."','".$_POST['year']."')";
     $s=mysql_query($query, $connect );
   }
 if($slice[$c64]==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[5]."','".$col4."','theory')";
	 $s=mysql_query($query, $connect );
 
 } 
 if($slice[$c124]==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[5]."','".$col4."','practical')";
	 $s=mysql_query($query, $connect );
 
 } 
 }
 else if( $s['theory']==1&&$s['term_work']==0) 
 {
     $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[5]."','".$col2."','".$slice[$c61]."',0,'".$slice[$c62]."',$slice[$c63],'".$slice[$c64]."',0,0,0,0,'".$_POST['year']."')";
     $s=mysql_query($query, $connect );
     if($slice[$c64]==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[5]."','".$col4."','theory')";
	 $s=mysql_query($query, $connect );
 }
 }
  else if( $s['theory']==0&&$s['term_work']==1)
  {
    if($s['practical']==1){
   $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[5]."','".$col2."',0,0,0,0,0,'".$slice[$c121]."','".$slice[$c122]."',$slice[$c123],'".$slice[$c124]."','".$_POST['year']."')";
   $s=mysql_query($query, $connect );
   }
   else
   {
     $query = "INSERT INTO student_result(engg_year,sem_no,roll_no,subject_code,seat_no,th_marks,gr_marks,int_marks,th_total,th_gp,tw_marks,prac_marks,tp_total,tp_gp,exam_year) VALUES($engg_year,$sem_no,'".$col4."','".$sub_code[5]."','".$col2."',0,0,0,0,0,'".$slice[$c121]."',0,$slice[$c123],'".$slice[$c124]."','".$_POST['year']."')";
     $s=mysql_query($query, $connect );
   }
   if($slice[$c124]==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[5]."','".$col4."','practical')";
	 $s=mysql_query($query, $connect );
 
 } 
  }
 $i++;
}

/* if($i<=$n){
   $query=" select theory from subjects where subject_code=$sub_code[1]";
  $sub=mysql_query($query, $connect );
  $s=mysql_fetch_assoc($sub);
 if($s['theory']==1)
 {
 if($col26==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[1]."','".$col4."','theory')";
	 $s=mysql_query($query, $connect );
 
 } 
 }
 $i++;
}
 if($i<=$n){
   $query=" select theory from subjects where subject_code=$sub_code[2]";
 $sub=mysql_query($query, $connect );
  $s=mysql_fetch_assoc($sub);
 if($s['theory']==1)
 {
 if($col35==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[2]."','".$col4."','theory')";
	 $s=mysql_query($query, $connect );
 
 } 
 }
 $i++;
}
 if($i<=$n){
   $query="select theory from subjects where subject_code=$sub_code[3]";
   $sub=mysql_query($query, $connect );
  $s=mysql_fetch_assoc($sub);
 if($s['theory']==1)
 {
 if($col44==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[3]."','".$col4."','theory')";
	 $s=mysql_query($query, $connect );
 
 } 
 }
 $i++;
}
 if($i<=$n){
   $query=" select theory from subjects where subject_code=$sub_code[4]";
   $sub=mysql_query($query, $connect );
  $s=mysql_fetch_assoc($sub);
 if($s['theory']==1)
 {
 if($col53==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[4]."','".$col4."','theory')";
	 $s=mysql_query($query, $connect );
 
 } 
 }
 $i++;
}
 if($i<=$n){
   $query=" select theory from subjects where subject_code=$sub_code[5]";
  $sub=mysql_query($query, $connect );
  $s=mysql_fetch_assoc($sub);
 if($s['theory']==1)
 {
 if($col62==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[5]."','".$col4."','theory')";
	 $s=mysql_query($query, $connect );
 
 } 
 }
 $i++;
}
 // practicals
 $i=1;
 if($i<=$n){
  $query=" select practical from subjects where subject_code=$sub_code[0]";
   $sub=mysql_query($query, $connect );
  $s=mysql_fetch_assoc($sub);
 if($s['practical']==1)
 {
 if($col127==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[0]."','".$col4."','practical')";
	 $s=mysql_query($query, $connect );
 
 } 
 }
 $i++;
}
 if($i<=$n){
   $query=" select practical from subjects where subject_code=$sub_code[1]";
  $sub=mysql_query($query, $connect );
  $s=mysql_fetch_assoc($sub);
 if($s['practical']==1)
 {
 if($col138==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[1]."','".$col4."','practical')";
	 $s=mysql_query($query, $connect );
 }
 } 
 $i++;
}
 
 if($i<=$n){
   $query=" select practical from subjects where subject_code=$sub_code[2]";
   $sub=mysql_query($query, $connect );
  $s=mysql_fetch_assoc($sub);
 if($s['practical']==1)
 {
 if($col149==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[2]."','".$col4."','practical')";
	 $s=mysql_query($query, $connect );
 
 } 
 }
 $i++;
}
 
 if($i<=$n){
   $query=" select practical from subjects where subject_code=$sub_code[3]";
   $sub=mysql_query($query, $connect );
  $s=mysql_fetch_assoc($sub);
 if($s['practical']==1)
 {
 if($col160==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[3]."','".$col4."','practical')";
	 $s=mysql_query($query, $connect );
 
 } 
 }
 $i++;
}
 if($i<=$n){
   $query=" select practical from subjects where subject_code=$sub_code[4]";
   $sub=mysql_query($query, $connect );
  $s=mysql_fetch_assoc($sub);
 if($s['practical']==1)
 {
 if($col171==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[4]."','".$col4."','practical')";
	 $s=mysql_query($query, $connect );
 
 } 
 }
 $i++;
}
 if($i<=$n){
   $query=" select practical from subjects where subject_code=$sub_code[5]";
   $sub=mysql_query($query, $connect );
  $s=mysql_fetch_assoc($sub);
 if($s['practical']==1)
 {
 if($col182==0 )//$col127==0)
  {
     $query = "INSERT INTO kt_subject(sem_no,subject_code,roll_no,type) VALUES ($sem_no,'".$sub_code[5]."','".$col4."','practical')";
	 $s=mysql_query($query, $connect );
 
 } }
 $i++;
}
 */
   } 
   
  }

echo "File data successfully imported to database!!"; 
mysql_close($connect); 
}
?>

</div>
</div>
</div>
</body>
</html>