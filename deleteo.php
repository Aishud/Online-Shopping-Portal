<?php
$userid=$_GET["userid"];
$id=$_GET['$id'];
$con=mysqli_connect("localhost","root","","online_shopping_portal");
$rr=mysqli_query($con,"SELECT pdtid from orders where id=$id");
mysqli_query($con,"UPDATE product set stock=stock+1 where id=$rr");
$sql="DELETE from orders where id='.$id'";
mysqli_query($con,$sql);
header("Location: /onlineshoppingportal/ahome.php?userid=".$userid);
?>