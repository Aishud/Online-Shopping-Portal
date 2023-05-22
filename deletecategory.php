<?php
$userid=$_GET["userid"];
$id=$_GET["id"];
$con=mysqli_connect("localhost","root","","online_shopping_portal");
if(isset($_GET["id"])){
$sql="DELETE from product where categoryno=$id";
$sqll="DELETE from category where id=$id";
mysqli_query($con,$sql);
mysqli_query($con,$sqll);
header("Location: /onlineshoppingportal/ahome.php?userid=".$userid);
}
?>