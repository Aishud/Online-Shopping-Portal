<!-- <link rel="stylesheet" href="./css/style.css"> -->
<?php
$userid=$_GET["userid"];
$id=$_GET["id"];
$con=mysqli_connect("localhost","root","","online_shopping_portal");
if(isset($id)){
    $query="select * from product where id=$id";
    $value=mysqli_query($con,$query);
    $result=mysqli_fetch_array($value);
}
echo mysqli_error($con); 
if(isset($_POST["submit"])){
    // $id=$_POST['id'];
    $name=$_POST['name'];
  $brand=$_POST['brand'];
  $description=$_POST['description'];
  $price=$_POST['price'];
  $categoryno=$_POST['categoryno'];
  $stock=$_POST['stock'];
  $target_dir="images/products/";
  $target_file=$target_dir.basename($_FILES["Image"]["name"]);
  move_uploaded_file($_FILES["Image"]["tmp_name"],$target_file);
    $sql="UPDATE product set name='$name',brand='$brand',description='$description',price='$price',categoryno='$categoryno',image='$target_file',stock='$stock' where id=$id";
    mysqli_query($con,$sql);
    header("Location:/onlineshoppingportal/ahome.php?userid=".$userid);
    echo mysqli_error($con);
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>edit product details</title>
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
<label> product id  :   </label>         
<?php echo $result["id"] ?><br>
<label> name  :   </label>         
<input type="text" id="name" name="name" size="250" value="<?php echo $result["name"] ?>" required/> <br>  
brand: <input type="text" id="brand" name="brand" size="250" value="<?php echo $result["brand"] ?>" required/> <br>  
description: <input type="text" id="description" name="description" size="250" value="<?php echo $result["description"] ?>" required/> <br>  
price: <input type="number" id="price" name="price" size="250" value="<?php echo $result["price"] ?>" required/> <br>  
category number:<input type="number" id="categoryno" name="categoryno" size="250" value="<?php echo $result["categoryno"] ?>" required/> <br>  
image: <input type="file" id="image" name="image" value="<?php echo $result["image"] ?>" required/> <br>  
stock: <input type="number" id="stock" name="stock" size="250" value="<?php echo $result["stock"] ?>" required/> <br>  
<button type="submit"  name="submit" class="registerbtn">save</button></td> 
</form>
</body>
</html>
