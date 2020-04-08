//function to handle register-form validation
function registerValidate(student){
var validationVerified=true;
var errorMessage="";
var okayMessage="click OK to process registration";

if (student.sname.value=="")
{
errorMessage+="Name not filled!\n";
validationVerified=false;
}
if(student.dob.value=="")
{
errorMessage+="Date Of Birth not filled!\n";
validationVerified=false;
}
if (student.rollno.value=="")
{
errorMessage+="Roll_no not filled!\n";
validationVerified=false;
}
if(student.gender.value=="")
{
errorMessage+="gender not provided!\n";
validationVerified=false;
}
if(student.dept.value=="")
{
errorMessage+="Branch not filled!\n";
validationVerified=false;
}
if(student.year.value=="")
{
errorMessage+="year not filled!\n";
validationVerified=false;
}
if(student.cno.value=="")
{
errorMessage+="Contact not provided!\n";
validationVerified=false;
}
if(student.pcno.value=="")
{
errorMessage+="Parents Contact not filled!\n";
validationVerified=false;
}
var phoneno = /^\d{10}$/;
  if((student.cno.value.match(phoneno))
        {
      
        }
      else
        {
        errorMessage+="Parents Contact no should number and 10 digits!\n";
validationVerified=false;
        }
if(!validationVerified)
{
alert(errorMessage);
}
if(validationVerified)
{
alert(okayMessage);
}
return validationVerified;
}


//teacher
//function to handle register-form validation
function registerValidatet(teacher){
var validationVerified=true;
var errorMessage="";
var okayMessage="click OK to process registration";

if (teacher.tname.value=="")
{
errorMessage+="Name not filled!\n";
validationVerified=false;
}
if(teacher.dob.value=="")
{
errorMessage+="Date Of Birth not filled!\n";
validationVerified=false;
}
if (teacher.sex.value=="")
{
errorMessage+="Gender not Provided!\n";
validationVerified=false;
}
if(teacher.dept.value=="")
{
errorMessage+="Department not selected!\n";
validationVerified=false;
}
if(teacher.email.value=="")
{
errorMessage+="Email not provided.!\n";
validationVerified=false;
}
if(teacher.tid.value=="")
{
errorMessage+="Teacher ID not provided!\n";
validationVerified=false;
}
if(teacher.password.value=="")
{
errorMessage+="Password not filled!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
if(validationVerified)
{
alert(okayMessage);
}
return validationVerified;
}

