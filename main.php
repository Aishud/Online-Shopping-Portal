<?php
$con=mysqli_connect("localhost","root","","online_shopping_portal");
if(isset($_POST['submit']))
{

        header("Location: /onlineshoppingportal/registrationpage.php");
}
if(isset($_POST['submitl']))
{

        header("Location: /onlineshoppingportal/login.php");
}
echo mysqli_error($con);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Main page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
        body {
          font-family: Arial, sans-serif;
  /* font-family: Arial, Helvetica, sans-serif; */
  background-color: f1f1f1;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 40px;
  background-color: white;
}

/* Full-width input fields */
input[type=email], input[type=password] {
  width: 80%;
  padding: 40px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=email]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 26px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
    </head>
    <body>
    <form  method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">   
    <div class="container">
        <hr>     
        <br><br><br>
        <button type="submit" name="submit" class="registerbtn">Register</button>
        <br><br><br>
    <button type="submit" name="submitl" class="registerbtn">Login</button>
</div>
</form>
    </body>
</html>