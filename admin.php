<!DOCTYPE html>

<?php
session_start();
if(!(@$name = $_SESSION['name']))
{
    //die("Please Login To Continue");
    //echo "back";
    header('Location: logadmin');
}
    

?>
<html lang="en">
<head>
  <title>ADMIN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
    <script language = "javascript" type="text/javascript">
        function add_teacher()
        {
            window.location.href = "add_teacher";
        }
        function add_student()
        {

            window.location.href = "admin_add_student";
        }
        function change_routine()
        {
            window.location.href = "edit_routine";
        }
        function edit_teacher()
        {
            window.location.href = "view_teacher";
        }
        function edit_student()
        {
            window.location.href = "admin_view_student";
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
    Welcome <?php echo $name; ?>!<hr>
    <input type="button" value="ADD TEACHER" name="a_teacher" onclick="add_teacher()">
    <input type="button" value="ADD STUDENTs" name = "a_student"onclick="add_student()">
	<input type="button" value="VIEW STUDENT" name="e_student" onclick="edit_student()">
    <input type="button" value="VIEW TEACHER" name="e_teacher" onclick="edit_teacher()">
</body>
</html>