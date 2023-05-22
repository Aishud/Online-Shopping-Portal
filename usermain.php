<?php
$userid=$_GET["userid"];
$p=0;
// $id=$_GET["id"];
$con=mysqli_connect("localhost","root","","online_shopping_portal");
if(isset($userid)){
    $sql="SELECT * FROM regdetails where id='$userid'";
    $value=mysqli_query($con,$sql);
    $result=mysqli_fetch_array($value);
// $name=$result['name'];
// $email=$result['email'];
// $age=$result['age'];
// $password=$result['password'];
}
$sqll="SELECT pdtid from cartdata where userid='$userid'";
$resultl=mysqli_query($con,$sqll);
$datal=mysqli_fetch_all($resultl);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
 table, th, td {
                border: 1px solid;
                width: 50%;
                text-align: center;
                background-color:#99ccff;
            }
body {
  font-family: Arial, sans-serif;
  /* font-family: Arial, Helvetica, sans-serif; */
  background-color: white;
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
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
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
<h1>profile</h1>
<form  method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
  <!-- <div class="container"> -->
    Name: <?php echo $result["name"] ?> <br><br>
    phone number: <?php echo $result["phnno"] ?> <br><br>
    Email: <?php echo $result["email"] ?> <br><br>
    address: <?php echo $result["address"] ?> <br><br>
    Password: <?php echo $result["password"] ?> <br><br>
    <input type="submit" name="submit" value="edit details">
<h2>orders till now</h2>
<table>
    <tr>
    <th>sl no.</th>
    <th>product</th>
    <th>date</th>
    </tr>
    <tr>
    <?php
        if (mysqli_num_rows($resultl) > 0) {
            foreach($datal as $rowl){
                $sqlp="SELECT * from product where id='$resultl'";
                $resultp=mysqli_query($con,$sqlp);
                $datap=mysqli_fetch_all($resultp);
                if (mysqli_num_rows($resultp) > 0) {
                    foreach($datap as $rowp){
        ?>
        <div >
            <img height="180px" width="180px" src="<?php echo $rowp[6] ?>">
            <p>name : <?php echo $rowp[1]?></p>
            <p>brand : <?php echo $rowp[2]?></p>
            <p>description : <?php echo $rowp[3]?></p>
            <p>price :  Rs.<?php echo $rowp[4]?></p>
            <p>available : <?php echo $rowp[7] ?></p>
        </div>
        <?php
            }}else{ echo "no products found";  }}}
        ?>
    </tr>
</table>
<!-- </div> -->
    </body>
</html>
<?php
if(isset($_POST['submit'])){
    header("Location: /onlineshoppingportal/editprofile.php?userid=".$userid);
}
?>