<?php
$userid=$_GET["userid"];
//$nn=0
// $uid=1;
$today = new DateTime('now'); 
$today = $today->format('Y-m-d');
$con=mysqli_connect("localhost","root","","online_shopping_portal");
if(isset($_GET['snn'])){
    $snn=$_GET['snn'];
    $sql="SELECT * from product where categoryno='$snn'";
    $result=mysqli_query($con,$sql);
    $data=mysqli_fetch_all($result);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>products</title>
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
            <?php
            $pp=$row[7];
            if(($pp>0)){
             ?>
            <p>available : <?php echo $row[7] ?></p>
            <input type="submit" name="submit" value="add to cart">
            <input type="submit" name="submit1" value="view cart">
            <input type="submit" name="submit2" value="buy now">

            </form></div>
        <?php
            }else{?>
               <p>not available at the moment..</p>
                <?php
            }
            if(isset($_POST['submit'])){
                $sqll="insert into cartdata(userid,pdtid,date) values('$userid','$a','$today') ";
                ?>
                <script>alert("product added to cart successfully...");</script>
                <?php
                mysqli_query($con,$sqll);
            }
            if(isset($_POST['submit1'])){
                header("Location: /onlineshoppingportal/viewcart.php?userid=".$a);
            }
            if(isset($_POST['submit2'])){
                $sqlll="insert into orders(userid,pdtid,date) values('$userid','$a','$today') ";
                mysqli_query($con,$sqlll);
                mysqli_query($con,"update product set stock=stock-1 where id='$row[0]'");
                header("Location: /onlineshoppingportal/buynow.php?userid=".$userid."&id=".$pdtid);
            }
        }
        ?>
    </div>
</body>
</html>