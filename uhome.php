<?php
$userid=$_GET["userid"];
$con=mysqli_connect("localhost","root","","online_shopping_portal");
$sn=0;
if(isset($_POST['submitp'])){
  header("Location: /onlineshoppingportal/usermain.php?userid=".$userid);
}
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>user home page</title>
        <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    .product-list {
      margin-bottom: 20px;
    }

    .product-list table {
      width: 100%;
      border-collapse: collapse;
    }

    .product-list th, .product-list td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    .product-list th {
      background-color: #f2f2f2;
    }

    .add-to-cart {
      display: flex;
      justify-content: flex-end;
    }

    .add-to-cart button {
      padding: 6px 12px;
      text-decoration: none;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    table, th, td {
                border: 1px solid;
                width: 50%;
                text-align: center;
                background-color:#99ccff;
            }
            .registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 10px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 15%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}
  </style>
    </head>
    <body >
        <div class="container">
            <form method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
            <button type="submit" name="submitk" class="registerbtn">profile</button>              <br><br>
            <h2>Welcome !!</h2> <br>
              Search: <input type="text" name="search" id="search" >
              <!-- <input type="submit" name="submit" value="submit"> -->
              <button type="submit" name="submit" class="registerbtn">Search</button>
            </form>
            <?php
                if(isset($_POST['submit'])){
                    $search=$_POST['search'];
                    if(isset($_POST['search'])){
                    header("Location: /onlineshoppingportal/pdtsearch.php?search=".$search."&userid=".$userid);
                }}
                if(isset($_POST['submitk'])){
                  header("Location: /onlineshoppingportal/usermain.php?userid=".$userid);
              }
            ?>
        </div>
        
        <br><br>
        <table ><tr>
            <td>
        <form method="post" action="pdtpage.php?snn=1&userid=".$userid enctype="multipart/form-data">
        <td style="text-align: center;"><input type="image" src="grocery.jpg" alt="pic" name="image" id="image"  width="200" height="200"></td>
        <td style="text-align: center;">grocery<br> </td>      
        </form> </td>
        <td>
        <form method="post" action="pdtpage.php?snn=2&userid=".$userid enctype="multipart/form-data">
        <td style="text-align: center;"><input type="image" src="realmecy.jpg" alt="pic" name="image" id="image"  width="200" height="200"></td>
        <td style="text-align: center;">mobiles <br> </td>      
        </form> </td>
        <td>
        <form method="post" action="pdtpage.php?snn=3&userid=".$userid enctype="multipart/form-data">
        <td style="text-align: center;"><input type="image" src="fashion.jpg" alt="pic" name="image" id="image"  width="200" height="200"></td>
        <td style="text-align: center;">fashion <br> </td>      
        </form> </td>
        <td>
        <form method="post" action="pdtpage.php?snn=4&userid=".$userid enctype="multipart/form-data">
        <td style="text-align: center;"><input type="image" src="home.jpg" alt="pic" name="image" id="image"  width="200" height="200"></td>
        <td style="text-align: center;">home<br> </td>      
        </form> </td>
        </tr>   
        <tr>            
        <td>
        <form method="post" action="pdtpage.php?snn=5&userid=".$userid enctype="multipart/form-data">
        <td style="text-align: center;"><input type="image" src="appliances.jpg" alt="pic" name="image" id="image"  width="200" height="200"></td>
        <td style="text-align: center;">appliances<br> </td>      
        </form> </td>
        <td>
        <form method="post" action="pdtpage.php?snn=6&userid=".$userid enctype="multipart/form-data">
        <td style="text-align: center;"><input type="image" src="btoys.jpg" alt="pic" name="image" id="image"  width="200" height="200"></td>
        <td style="text-align: center;">beauty,toys<br> </td>      
        </form> </td>
        <td>
        <form method="post" action="pdtpage.php?snn=7&userid=".$userid enctype="multipart/form-data">
        <td style="text-align: center;"><input type="image" src="vehicles.jpg" alt="pic" name="image" id="image"  width="200" height="200"></td>
        <td style="text-align: center;">vehicles <br> </td>      
        </form> </td>
        </tr>    
            
            
            
            <!-- <?php $sqlll="SELECT * from category";
            $resultll=mysqli_query($con,$sqlll); 
            if (mysqli_num_rows($resultll) > 0) {
                foreach((mysqli_fetch_all($resultll)) as $datall) {
                    $sn++;
                    $snn=$datall[0];
            ?> <td>
        <form method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
        <td style="text-align: center;"><input type="image" src="menstopwear.jpg" alt="pic" name="image" id="image"  width="200" height="200"></td>
        <td style="text-align: center;"><?php echo $datall[1];  ?> <br> </td>
        <?php  
        if($sn==3){ 
            $sn=0; ?>
            </tr><br><tr>
       <?php } ?>
        </form> </td>
        <?php
        } }  
            ?> -->
            </table>

            <br><br>

            
    </body>
</html>

