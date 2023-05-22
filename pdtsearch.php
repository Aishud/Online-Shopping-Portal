<?php
$userid=$_GET["userid"];
$a=$userid;
//$nn=0;
$con=mysqli_connect("localhost","root","","online_shopping_portal");
if(isset($_GET['search'])){
    $snn=$_GET['search'];
    $sql="SELECT * from product where name='$snn'";
    $result=mysqli_query($con,$sql);
    $data=mysqli_fetch_all($result);
    $sqlc="SELECT * from product,category where category.name='$snn' and product.categoryno=category.id ";
    $resultc=mysqli_query($con,$sqlc);
    $datac=mysqli_fetch_all($resultc);  
    //print_r($resultc);die;
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
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
</style>
</head>
<body>
    <div class="container">
        <h1>products</h1>
        <?php
        if (mysqli_num_rows($result) > 0) {
            foreach($data as $row){
                $pdtid=$row[0];
        ?>
        <div >
            <img height="180px" width="180px" src="<?php echo $row[6] ?>">
            <p>name : <?php echo $row[1]?></p>
            <p>brand : <?php echo $row[2]?></p>
            <p>description : <?php echo $row[3]?></p>
            <p>price :  Rs.<?php echo $row[4]?></p>
            <p>available : <?php echo $row[7] ?></p>
            <input type="submit" name="submit" value="add to cart">
            <input type="submit" name="submit1" value="view cart">
            <input type="submit" name="submit2" value="buy now"><br><br><br>
        </div>
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
        }else{ echo "no such products was found";  }
        ?>
    </div><br><br>

    <div class="container">
        <h1>related products</h1>
        <?php
        if (mysqli_num_rows($resultc) > 0) {
            foreach($datac as $rowc){
        ?>
        <div >
            <img height="180px" width="180px" src="<?php echo $rowc[6] ?>">
            <p>name : <?php echo $rowc[1]?></p>
            <p>brand : <?php echo $rowc[2]?></p>
            <p>description : <?php echo $rowc[3]?></p>
            <p>price :  Rs.<?php echo $rowc[4]?></p>
            <?php
            $pp=$row[7];
            if(($pp>0)){
             ?>
            <p>available : <?php echo $rowc[7] ?></p>
            <input type="submit" name="submit3" value="add to cart">
            <input type="submit" name="submit4" value="view cart">
            <input type="submit" name="submit5" value="buy now"><br><br><br>
        </div>
        <?php
        }else{?>
            <p>not available at the moment..</p>
             <?php
         }
            if(isset($_POST['submit3'])){
                $sqll="insert into cartdata(userid,pdtid,date) values('$userid','$a','$today') ";
                ?>
                <script>alert("product added to cart successfully...");</script>
                <?php
                mysqli_query($con,$sqll);
            }
            if(isset($_POST['submit4'])){
                header("Location: /onlineshoppingportal/viewcart.php?userid=".$a);
            }
            if(isset($_POST['submit5'])){
                $sqlll="insert into orders(userid,pdtid,date) values('$userid','$a','$today') ";
                mysqli_query($con,$sqlll);
                mysqli_query($con,"update product set stock=stock-1 where id='$row[0]'");
                header("Location: /onlineshoppingportal/buynow.php?userid=".$userid."&id=".$pdtid);
            }
        }
    }
        ?>
    </div>
</body>
</html>