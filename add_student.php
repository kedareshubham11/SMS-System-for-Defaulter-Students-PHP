<!DOCTYPE html>
<?php

require 'connect.php';
session_start();
if(!(@$name = $_SESSION['t_name']))
{
    //die("Please Login To Continue");
    //echo "back";
    header('Location: index');
}
    $error = "";
$success = "";
if(isset($_POST['sname']) && isset($_POST['gender']) && isset($_POST['dob']) && isset($_POST['rollno']) && isset($_POST['dept']) && isset($_POST['year']) && isset($_POST['cno']) && isset($_POST['pcno']))
{
    $sname = $_POST['sname'];
    $rollno = $_POST['rollno'];
    $gender= $_POST['gender'];
    $dob= $_POST['dob'];	
	$dept=$_POST['dept'];
	$year=$_POST['year'];
	$cno=$_POST['cno'];
	$pcno=$_POST['pcno'];
    if(!empty($sname)  && !empty($dob) && !empty($rollno) && !empty($gender) && !empty($dept) && !empty($year) && !empty($cno) && !empty($pcno))
    {
        $query = "INSERT INTO student(rollno, sname, dob, dept, year, gender, contact_no,parent_contact_no) VALUES('$rollno','$sname','$dob','$dept','$year','$gender','$cno','$pcno')";
        if($query_run = mysql_query($query))
        {
            $success = "Data inserted Successfully. Fill to add New!!<br><br>";
        }
        else
        {
            $error = "Entry cannot be added.. Some problem in server";
        }

    }
    else
    {
        $error = "*ALL fields MUST be FILLED<br><br>";
    }
}
?>
<head>
  <title>Add Student</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script language="JavaScript" src="js/student.js"></script>
</head>
<body style="margin:10px;">
    <div  style="width: 50%;margin: 0 auto; ">
        <h1> MIT COLLEGE OF ENGINEERING</h1>
    </div>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><a href = "index">Home</a>
                <li><a href="logadmin">admin login</a></li>
                <li><a href="logteacher">Teacher login</a></li> 
				<li><a href="logout">logout</a></li>
            </ul>
        </div>
    </nav>
    Welcome <?php echo $name; ?>!!<br>
    <a href="teacher"><-back</a>
    <hr>
    <div class = "container">
    <h2>Add Student</h2>
        <?php echo $success; ?>	
    <form name="student_add" action="add_student" method="post" onsubmit="return registerValidate(this)">
	<table style="width:40%; align='left'; text-align:'right'; border-collapse:separate; border-spacing:15px;"><tr><td>
        Name : </td><td><input type="text" name="sname" maxlength="15"></td></tr>
       <tr><td> Date of Birth :</td> <td><input type="date" name="dob" maxlength="15"></td></tr>
       <tr><td> Roll_no : </td><td><input type="text" name="rollno" maxlength="5"></td></tr>
		<tr><td>Gender :</td><td><input type="radio" name="gender" value="male"> Male &nbsp &nbsp
				<input type="radio" name="gender" value="female"> Female</td></tr>
           <tr><td> Branch : </td><td><select id='dept' name='dept'>
			<option value="CSE">CSE</option>
			<option value="MECH">MECH</option>
			<option value="CIVIL">CIVIL</option>
			<option value="EE">EE</option>
			<option value="ETC">ETC</option>
			</select></td></tr>
		<tr><td>Year: </td><td>
		<select id='year' name='year'>
			<option value="FE">FE</option>
			<option value="SE">SE</option>
			<option value="TE">TE</option>
			<option value="BE">BE</option>
			</select></td>
			</tr>
		<tr><td>Contact_Number :</td><td><input type="number" name="cno" maxlength="10"></td></tr>
		<tr><td>Parent's Contact Number :</td><td><input type="number" name="pcno" maxlength="10"></td></tr>
		<tr><td><?php echo $error; ?></td></tr>
        <tr><td><input type="submit" value="ADD" onclick="return registerValidate(this)"></td></tr>
		</table>
    </form>
    </div>
</body>
</html>