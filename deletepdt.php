<?php
$id=$_GET['$id'];
$con=mysqli_connect("localhost","root","","online_shopping_portal");
$sql="DELETE from pdtcategory where categoryno='.$id'";
mysqli_query($con,$sql);
header("Location: /onlineshoppingportal/ahome.php");
?>