<!DOCTYPE html>
<?php
$error = "";
require 'connect.php';
session_start();
if(!(@$name = $_SESSION['t_name']))
{
    //die("Please Login To Continue");
    //echo "back";
    header('Location: index.php');
}
function mysql_get_var($query,$y=0){
       $res = mysql_query($query);
       $row = mysql_fetch_array($res);
       mysql_free_result($res);
       $rec = $row[$y];
       return $rec;
}

?>
<html lang="en">
<head>
    <title>Student List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="table.css">
	<script type="text/javascript">
	function deff()
	{		
		document.getElementById('txta').value="---------------Defaulter Message ------";
			
	}
	function clcc()
	{	
		document.getElementById('txta').value="";
		
			
	}
	function empt()
	{		
		if(document.getElementById('txta').value=="")
		{
			alert("Message Field is empty");
-		}
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
    Welcome <?php echo $name; ?>!!<br>
    <a href="teacher"><-back</a>
    <hr>
    <div class="container">
        <div  style="width: 50%;margin: 0 auto; ">
            <form action="sms_student" method = "post" name="smsform">
            Department : <select id='dept' name='dept'>
			<option value="CSE">CSE</option>
			<option value="MECH">MECH</option>
			<option value="CIVIL">CIVIL</option>
			<option value="EE">EE</option>
			<option value="ETC">ETC</option>
			</select>
		&nbsp &nbsp &nbsp 
		Year: <select id='year' name='year'>
			<option value="FE">FE</option>
			<option value="SE">SE</option>
			<option value="TE">TE</option>
			<option value="BE">BE</option>
			</select><br><br>
                <div  style="width: 50%;margin: 0 auto; ">
                    <input type="submit" value="View" style="padding:6px; "><br><br>
                </div>
            
        </div>
    </div>
    <hr>
    <div class="container">
    <table border = "1" style="width:80%; pading:15px; text-align:left;">
        <?php
        
        if(isset($_POST['dept']) && isset($_POST['year']))
        {
            $dept = $_POST['dept'];
			$year = $_POST['year'];
            if(!empty($dept) && !empty($year))
            {
                $query = "select sname,rollno,dept,year,contact_no,parent_contact_no FROM student WHERE dept = '$dept' and year = '$year' order by rollno";
                if($query_run = mysql_query($query))
                {
                     $query_num_rows = mysql_num_rows($query_run);
                     if($query_num_rows == 0)
                     {
                         $error = "NO records found!!";
                         echo $error;
                     }
                    else
                    {	echo "Stduent Details :<br><br> ";
                        echo "<tr><td>ROLL_NO</td><td>NAME</td><td>CLASS</td><td>CONTACT_NO</td><td>PARENTS_NO</td><td>SELECT</td></tr>"; 
                        for($x = 0; $x < $query_num_rows; $x++)
                        {
                            echo "<tr>";
                            $rollno = mysql_result($query_run, $x, 'rollno');
                            $sname = mysql_result($query_run, $x, 'sname');
							$dept = mysql_result($query_run, $x, 'dept');
							$year = mysql_result($query_run, $x, 'year');
							$cno = mysql_result($query_run, $x, 'contact_no');
							$pcno = mysql_result($query_run, $x, 'parent_contact_no');
                            
                            echo "<td>".$rollno."</td>";
                            echo "<td>".$sname."</td>";
							echo "<td>".$dept."-".$year."</td>";
							echo "<td>".$cno."</td>";
							echo "<td>".$pcno."</td>";
							
							?>
							<td><input type="checkbox" name="employees[]" value="<?php echo $pcno; ?>" />
							
						<?php
								echo "</tr>";
                        }
                        
                    }
                }
            }
        }
		
		if(isset($_POST['sms']))
{
	{
		$message=$_POST['txta'];
			$i=0;
		$scno="";
		foreach($_POST['employees'] as $selected)
		{	$scno=$selected;
			$i=$i+1;
			$mobile=$selected;
$json = json_decode(file_get_contents("https://smsapi.engineeringtgr.com/send/?&Mobile=7030153936&Password=Shubham@123&Message=".urlencode($message)."&To=".urlencode($mobile)."&Key=kedarFBoPxISYsTJrUWc6") ,true);
if ($json["status"]==="success") {
    #echo $json["msg"];
	
    //your code when send success
}else{
   # echo $json["msg"];
    //your code when not send
}

		$date = date('Y-m-d H:i:s',time());
		$abc = mysql_get_var("select sname from student where parent_contact_no='$scno'");
		$qry = "insert into smshistory values('$abc','$scno','$date','$message')";
		if($query_run = mysql_query($qry))
        {
            $success = "....";
        }
		}
		
		echo $i." message Sent Successfully";
	}
}
        ?>
    </table>
	<br><br>
	
	<textarea cols="50" rows="5" name="txta" value='' placeholder="Enter Message..."/></textarea> &nbsp &nbsp &nbsp &nbsp
	<input type="button" name="def" value="Defaulter Msg" onclick="deff()"/>&nbsp &nbsp &nbsp
	<input type="button" name="clc" value="Clear" onclick="clcc()"/><br><br>
	
	<input type="submit" name="sms" value="Send_SMS" onclick="empt()"/>
	</form>
        </div>
</body>
</html>