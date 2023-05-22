<!-- <link rel="stylesheet" href="./css/style.css"> -->
<?php
$userid=$_GET["userid"];
$id=$_GET["id"];
$con=mysqli_connect("localhost","root","","online_shopping_portal");
if(isset($userid)){
    $query="select * from regdetails where id=$id";
    $value=mysqli_query($con,$query);
    $result=mysqli_fetch_array($value);
}
echo mysqli_error($con); 

?>
<!DOCTYPE html>
<html>
<head>
<title>edit details</title>
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
.container {
  padding: 16px;
  background-color: white;
}
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
    body {
      font-family: Arial, sans-serif;
    }
</style>
</head>
<body>
    <h1 style="text-align:center;"> edit user details </h1> <br> 
    <div class="container">
<form  method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">

<label> name  :   </label>         
<input type="text" id="name" name="name" size="20" value="<?php echo $result["name"] ?>" pattern="[A-Za-z]{3,10}" required/> <br>
<label> phone no.: </label>         
<input type="number" id="phnno" name="phnno" size="10" value="<?php echo $result["phnno"] ?>" required/> <br> 
<label> email  :   </label>         
<input type="email" id="email" name="email" size="20" value="<?php echo $result["email"] ?>" required/> <br>  
<label> user id: </label>         
<input type="number" id="uid" name="uid"  value="<?php echo $result["uid"] ?>" required /> <br>
Address: <textarea name="address" value="<?php echo $result["address"] ?>"  required></textarea><br>
<label> password  :   </label>         
<input type="password" id="password" name="password" size="16" value="<?php echo $result["password"]?>" required/> <br>

<input type="submit"  name="submit"></td> 
</form>
</div>
</body>

</html>
<?php
    if(isset($_POST["submit"])){
        $name=$_POST['name'];
        $phnno=$_POST['phnno'];
        $email=$_POST['email'];
        $uid=$_POST['uid'];
        $address=$_POST['address'];
        $password=$_POST['password']; 
        $sql="update regdetails set name='$name',phnno='$phnno',email='$email',uid='$uid',address='$address',password='$password' where id=$id.";
        mysqli_query($con,$sql);
        header("Location:/onlineshoppingportal/ahome.php?userid=".$userid);
        echo mysqli_error($con);
        }
?>