<?php
$con=mysqli_connect("localhost","root","","online_shopping_portal");
if(isset($_POST['submit']))
{
$b=$_POST['password'];
$c=$_POST['email'];
$sql="SELECT * from regdetails where email='$c' and password='$b'";
$result = mysqli_query($con,$sql);
$data = mysqli_fetch_array($result);
$uid=$data['uid'];
if($result->num_rows != 0) {
    if($uid==2){
        header("Location: /onlineshoppingportal/usermain.php?id=".$data['id']);
    }
    else{
        header("Location: /onlineshoppingportal/ahome.php?id=".$data['id']);
    }
} 
echo mysqli_error($con);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>login page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
        body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: f1f1f1;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=email], input[type=password] {
  width: 100%;
  padding: 15px;
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
  padding: 16px 20px;
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
    <h1 >Login</h1>
    <form  method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">   
    <div class="container">
        <hr>     
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" id="email" required>
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>
    <button type="submit" name="submit" class="registerbtn">Login</button>
</div>
</form>
    </body>
</html>