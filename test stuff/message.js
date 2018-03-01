function formdata() 
{
var firstnamevar = document.getElementById("firstname").value;
var lastnamevar = document.getElementById("lastname").value;
document.writeln("<h1>Confirmation Page</h1><br>");
document.writeln("Thank you for completing this form.<br><br>");
alert("Test! First name was: " + firstnamevar);
document.writeln("The first name you entered is " + firstnamevar + "<br>");
document.writeln("The last name you entered is " + lastnamevar);
}
