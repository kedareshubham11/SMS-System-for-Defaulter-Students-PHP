e<!DOCTYPE html>
<?php

require 'connect.php';
session_start();
if(!(@$name = $_SESSION['name']))
{
    //die("Please Login To Continue");
    //echo "back";
    header('Location: index');
}
    $error = "";
$success = "";
if(isset($_POST['tname']) && isset($_POST['password']) && isset($_POST['tid']) && isset($_POST['sex'])&& isset($_POST['dob'])&& isset($_POST['dept'])&& isset($_POST['email']) )
{
    $password = $_POST['password'];
    $tname = $_POST['tname'];
    $tid = $_POST['tid'];
    $sex= $_POST['sex'];
    $dob= $_POST['dob'];
    $dept= $_POST['dept'];
	$email=$_POST['email'];
    if(!empty($tname) && !empty($password) && !empty($tid) && !empty($dob) && !empty($dept) && !empty($sex) && !empty($email))
    {
        $query = "INSERT INTO teacher VALUES('$tid','$tname','$dept','$password','$dob','$sex','$email')";
        if($query_run = mysql_query($query))
        {
            $success = "Database inserted. Fill to add New!!<br><br>";
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
  <title>Add Teacher</title>
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
    <a href="admin"><-back</a>
    <hr>
    <div class = "container">
    <h2>Add Teacher</h2>
        <?php echo $success; ?>
    <form action="add_teacher" method="post" onsubmit="return registerValidatet(this)">
	<table style="width:40%; align='left'; text-align:'right'; border-collapse:separate; border-spacing:15px;"><tr><td>
        Name : </td><td><input type="text" name="tname"></td></tr>
     <tr><td>   Date of Birth : </td><td><input type="date" name="dob"></td></tr>
	<tr><td> Gender :</td><td><input type="radio" name="sex" value="male"> Male &nbsp &nbsp &nbsp
				<input type="radio" name="sex" value="female"> Female</td></tr>
    <tr><td> Department :</td><td><select id='dept' name='dept'>
			<option value="CSE">CSE</option>
			<option value="MECH">MECH</option>
			<option value="CIVIL">CIVIL</option>
			<option value="EE">EE</option>
			<option value="ETC">ETC</option>
			</select></td></tr>
			<tr><td>Email : </td><td><input type="text" name="email"></td></tr>
       <tr><td>TID :</td><td> <input type="text" name="tid"></td></tr>
        <tr><td>Password : </td><td><input type="password" name="password"></td></tr>
        <tr><?php echo $error; ?></tr>
       <tr><td></td><td> <input type="submit" value="ADD"></td></tr>
	   </table>
    </form>
    
    </div>
    
</body>
</html>