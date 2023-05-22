<?php
$userid=$_GET["userid"];
$id=$_GET["id"];
$con=mysqli_connect("localhost","root","","online_shopping_portal");
$url = "http://localhost/onlineshoppingportal/ahome.php?userid=".$userid;
if(isset($id)){
    $query="DELETE from regdetails where id=$id";
    $value=mysqli_query($con,$query);
    echo "<script>window.location.href='{$url}';</script>";
}
echo mysqli_error($con); 

?>