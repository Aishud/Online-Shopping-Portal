<?php
    $con=mysqli_connect("localhost","root","","online_shopping_portal");
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $phnno=$_POST['phnno'];
        $email=$_POST['email'];
        $uid=$_POST['uid'];
        $address=$_POST['address'];
        $password=$_POST['password']; 
        $rr=mysqli_query($con,"SELECT * from regdetails where phnno='$phnno' ");
        $rr1=mysqli_query($con,"SELECT * from regdetails where email='$email'");
        if($rr->num_rows != 0) { ?>
            <script> alert("registration failed....change your phone number"); </script>
        <?php }else{
            if($rr1->num_rows != 0) { ?>
                <script> alert("registration failed....change your email"); </script>
            <?php }else{
                $sql="INSERT INTO regdetails(name , phnno, email , `uid` , address , password) VALUES('$name','$phnno','$email','$uid','$address','$password') ";
                mysqli_query($con,$sql);
                echo mysqli_error($con);
                header("Location:/onlineshoppingportal/login.php");
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  
  input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
body {
  font-family: Arial, sans-serif;
  /* font-family: Arial, Helvetica, sans-serif; */
  background-color: black;
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
input[type=text], input[type=password], input[type=email], input[type=number] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus, input[type=email]:focus, input[type=number]:focus {
  background-color: #f1f1f1;
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

<form  method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="uid" > <b> Registering as: </b> </label>  
    <input type="radio" value="1"  name="uid" checked/> Admin  
    <input type="radio" value="2" name="uid"/> User  <br><br>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter name" name="name" id="name" pattern="[A-Za-z]{3,10}" autocomplete="off" required>

    <label for="address"><b>Address</b></label>
    <input type="text" placeholder="Enter your address" name="address" id="address" autocomplete="off" required>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" id="email" autocomplete="off" required>

    <label for="phnno"><b>Phone Number</b></label>
    <input type="number" size="10" placeholder="Enter contact number" name="phnno" id="phnno" autocomplete="off" required>

    
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" autocomplete="off" minlength="8" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
    <input type="checkbox" onclick="myFunction()">Show Password <br><br>
    <label for="cpassword"><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm Password" name="cpassword" autocomplete="off" id="cpassword" required>
    <input type="checkbox" onclick="myFunctionl()">Show Password
<!-- <label for="uid"><b>age</b></label>
    <input type="number" placeholder="Enter age" name="age" id="age" required> -->
    
        <hr>
  <!-- <input type="submit" name="submit" value="submit"> -->
    <button type="submit" name="submit" onclick="ssubmit(this)" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form>
</body>
<script>
  function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function myFunctionl() {
  var x = document.getElementById("cpassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function ssubmit(e){
  var name=document.getElementById("name").value;
  if(!name){
    alert("please enter a name");
  } else{
    if(name.match("[A-Za-z]{3,38}")){
      var phnno=document.getElementById("phnno").value;
      if(!phnno){
        alert("please enter a phone number");
      } else{
        if(!phnno.match("[0-9]{10}")){ 
          alert("enter a valid phone number");
        }else{
        var email=document.getElementById("email").value;
        if(!email){
          alert("please enter an email");
        } else{
          if(email.match("[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}")){
            var password=document.getElementById("password").value;
            if(!password){
              alert("please enter a password");
            } else{
              if(!password.value.length >= 8){      
                      // (?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,} )
                alert("please enter a valid password");
              } else{
                var cpassword=document.getElementById("cpassword").value;
                if(!cpassword){
                  alert("please re-enter your password");
                } else{
                  if(cpassword!=password){
                    alert("please re-enter your password correctly");
                  }else{
                    var address=document.getElementById("address").value;
                    if(!address){
                      alert("please enter your address");
                    } else{
                      console.log("successfull");
                    }
                  }
                }
              }
            }
          }else{
            alert("enter valid email");
          }
        } 
       } }
    } 
  }
}
</script>
</html>
