<?php
$userid=$_GET["userid"];
$pdtid=$_GET['pdtid'];
$con=mysqli_connect("localhost","root","","online_shopping_portal");
if(isset($_GET['pdtid'])){
    // $snn=$_GET['pdtid'];
    $sql="SELECT * from product where categoryno=$pdtid";
    $result=mysqli_query($con,$sql);
    $data=mysqli_fetch_all($result);
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>purchase</title>
<style>
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      /* background-color: #fff; */
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
</style>
</head>
<body>

    <div class="container" style="background-color: #04AA6D;">
        <h1>products</h1>
        <?php
            foreach($data as $row){
                $a=$userid;
        ?>
        <div class="container" style="background-color: #fff;" ><form method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
            <img height="180px" width="180px" src="<?php echo $row[6] ?>">
            <p>name : <?php echo $row[1]?></p>
            <p>brand : <?php echo $row[2]?></p>
            <p>description : <?php echo $row[3]?></p>
            <p>price :  Rs.<?php echo $row[4]?></p>
            
            <input type="submit" name="submit" value="continue with the purchase">
            

            </form></div>
        <?php
            
            if(isset($_POST['submit'])){
                ?>
                <script>alert("product was purchased successfully...");</script>
                <?php
            }
        }
        ?>
    </div>
</body>
</html>