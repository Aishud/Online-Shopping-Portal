<?php
$userid=$_GET["a"];
//$nn=0;
$con=mysqli_connect("localhost","root","","online_shopping_portal");
if(isset($_GET['a'])){
    $snn=$_GET['a'];
    $sql="SELECT pdtid from cartdata where userid='$snn'";
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
                $sqlp="SELECT * from product where id='$result'";
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
            <?php
            $pp=$row[7];
            if(($pp>0)){
             ?>
            <p>available : <?php echo $rowp[7] ?></p>
            <input type="submit" name="submit" value="add to cart">
            <input type="submit" name="submit1" value="view cart">
            <input type="submit" name="submit2" value="buy now">

        </div>
        <?php
            }
            else{?>
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
            }}else{ echo "no products found";  }}}
        ?>
    </div>
</body>
</html>