<!-- <link rel="stylesheet" href="./css/style.css"> -->
<?php
$userid=$_GET["userid"];
//$id=$_GET["id"];
$today = new DateTime('now'); 
$today = $today->format('Y-m-d');
$con=mysqli_connect("localhost","root","","online_shopping_portal");
if(isset($userid)){
    $query="select * from regdetails where id=$userid";
    $value=mysqli_query($con,$query);
    $result=mysqli_fetch_array($value);
}
echo mysqli_error($con); 

?>
<!DOCTYPE html>
<html>
<head>
<title>edit profile</title>
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}</style>
</head>
<h1 style="text-align:center;"> Registeration Page </h1> <br> 
<body>
<form  method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">

<label> name  :   </label>         
<input type="text" id="name" name="name" size="20" value="<?php echo $result["name"] ?>" pattern="[A-Za-z]{3,10}" required/> <br>
<label> phone number: </label>         
<input type="number" id="phnno" name="phnno" size="10" value="<?php echo $result["phnno"] ?>" pattern="[0-9]{10}" required/> <br> 
<label> email  :   </label>         
<input type="email" id="email" name="email" size="20" value="<?php echo $result["email"] ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}" required/> <br>  
<label> address  :   </label>         
<textarea name="address" id="address" placeholder="Address" size="200"  value="<?php echo $result["address"] ?>"  required></textarea><br>
<label> password  :   </label>         
<input type="password" id="password" name="password" size="16" value="<?php echo $result["password"]?>" required/> <br>

<input type="submit"  name="submit"></td> 
</form>
</body>

</html>
<?php
    if(isset($_POST["submit"])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password']; 
        $phnno=$_POST['phnno'];
        $address=$_POST['address'];
        $sql="update regdetails set name='$name',phnno='$phnno',email='$email',address='$address',password='$password' where id=$userid ";
        mysqli_query($con,$sql);
        header("Location:/onlineshoppingportal/usermain.php?userid=".$userid);
        echo mysqli_error($con);
        }
?>