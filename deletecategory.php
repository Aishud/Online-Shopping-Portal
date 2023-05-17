<?php
$id=$_GET['$id'];
$con=mysqli_connect("localhost","root","","online_shopping_portal");
$sql="DELETE from pdtcategory where categoryno='.$id'";
$sqll="DELETE from category where id='.$id'";
mysqli_query($con,$sql);
mysqli_query($con,$sqll);
header("Location: /onlineshoppingportal/ahome.php");
?>