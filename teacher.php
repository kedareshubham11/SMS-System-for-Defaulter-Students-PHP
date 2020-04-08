<!DOCTYPE html>
<?php 
    require 'connect.php'; 
    session_start();
    $subjects = array();
    if(!(@$name = $_SESSION['t_name'] && $_SESSION['d_name']))
    {
        //die("Please Login To Continue");
        //echo "back";
        header('Location: logteacher');
    }

?>
<html lang="en">
<head>
  <title>TEACHER</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
    <script language = "javascript" type="text/javascript">
        function view_student()
        {
            window.location.href = "view_student";
        }
        function add_student()
        {
            window.location.href = "add_student";
        }
        function sms_student()
        {
            window.location.href = "sms_student";
        }
		function sms_history()
        {
            window.location.href = "sms_history";
        }
       
    </script>
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
    Welcome <?php echo $_SESSION['t_name']; ?>!<hr>
    <input type="button" value="ADD STUDENTs" name = "a_student"onclick="add_student()">
	<input type="button" value="VIEW STUDENT" name="e_student" onclick="view_student()">
	<input type="button" value="SEND_SMS" name="s_sms" onclick="sms_student()">
	<input type="button" value="SMS_HISTORY" name="h_sms" onclick="sms_history()">
</body>
</html>