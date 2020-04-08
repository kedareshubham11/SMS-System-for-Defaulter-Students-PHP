<!DOCTYPE html>
<?php
        $error = "";
        require 'connect.php';
        session_start();
        if(!(@$name = $_SESSION['name']))
        {
            //die("Please Login To Continue");
            //echo "back";
            header('Location: index');
        }    
?>
<html lang="en">
<head>
  <title>Teacher List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
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
    <div class="container">
        <div  style="width: 50%;margin: 0 auto; ">
            <form action="view_teacher" method = "post">
                Select Department : <select id='dept' name='dept'>
			<option value="CSE">CSE</option>
			<option value="MECH">MECH</option>
			<option value="CIVIL">CIVIL</option>
			<option value="EE">EE</option>
			<option value="ETC">ETC</option>
			</select><br><br>
                <div  style="width: 50%;margin: 0 auto; ">
                    <input type="submit" value="View" style="padding:6px; "><br><br>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="container">
    <table border = "1" style="width:40%; pading:15px; text-align:center;">
        <?php
        if(isset($_POST['dept']))
        {
            $dept = $_POST['dept'];
            if(!empty($dept))
            {
                $query = "select tname,tid,dept FROM teacher WHERE dept = '$dept'";
                if($query_run = mysql_query($query))
                {
                     $query_num_rows = mysql_num_rows($query_run);
                     if($query_num_rows == 0)
                     {
                         $error = "NO records found!!";
                         echo $error;
                     }
                    else
                    {
                        echo "Teacher Details :<br><br> ";
                        echo "<tr><td>T_ID</td><td>Name</td><td>DEPARTMENT</TD></tr>"; 
                        for($x = 0; $x < $query_num_rows; $x++)
                        {
                            echo "<tr>";
                            $tid = mysql_result($query_run, $x, 'tid');
                            $name = mysql_result($query_run, $x, 'tname');
							$dept = mysql_result($query_run, $x, 'dept');
                            
                            echo "<td>".$tid."</td>";
                            echo "<td>".$name."</td>";
							echo "<td>".$dept."</td>";
                            echo "</tr>";
                        }
                        
                    }
                }
            }
        }
        ?>
    </table>
    </div>
</body>
</html>