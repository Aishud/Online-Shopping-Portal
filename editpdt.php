<!-- <link rel="stylesheet" href="./css/style.css"> -->
<?php
$id=$_GET["id"];
$con=mysqli_connect("localhost","root","","online_shopping_portal");
if(isset($id)){
    $query="select * from pdtcategory where id='".$id."'";
    $value=mysqli_query($con,$query);
    $result=mysqli_fetch_array($value);
}
echo mysqli_error($con); 
if(isset($_POST["submit"])){
    // $id=$_POST['id'];
    $name=$_POST['name'];
    $sql="UPDATE category set name='$name' where id='".$id."' ";
    mysqli_query($con,$sql);
    header("Location:/onlineshoppingportal/ahome.php");
    echo mysqli_error($con);
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>edit</title>
<style>
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
</style>
</head>
<h1 style="text-align:center;"> Edit details </h1> <br> 
<body>
<form  method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
<label> id  :   </label>         
<?php echo $result["id"] ?><br>
<label> name  :   </label>         
<input type="text" id="name" name="name" size="250" value="<?php echo $result["name"] ?>" required/> <br>  
<button type="submit"  name="submit" class="registerbtn">save</button></td> 
</form>
</body>
</html>
