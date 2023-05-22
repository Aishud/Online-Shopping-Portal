<?php
$n1=0;
$n2=0;
$userid=$_GET["userid"];
$con=mysqli_connect("localhost","root","","online_shopping_portal");
$sql="SELECT * from category ";
$result=mysqli_query($con,$sql);
$sqlk="SELECT * FROM regdetails where uid=2";
$resultk=mysqli_query($con,$sqlk);
$sqlkk="SELECT * FROM orders";
$resultkk=mysqli_query($con,$sqlkk);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <style>
    input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
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
    body {
      font-family: Arial, sans-serif;
    }
     .dropbtn {
      padding: 8px 16px;
      /* background-color: #f2f2f2; */
      color: black;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

.dropbtn:hover, .dropbtn:focus {
  background-color: #f1f1f1;
} 

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: relative;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  /* box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); */
  z-index: 1;
}

/* .dropdown:hover .dropdown-content {
  display: block;
} */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    /* h1 {
      text-align: center;
    } */

    /* .product-list {
      margin-bottom: 20px;
    } */

    /* .product-list table {
      width: 100%;
      border-collapse: collapse;
    } */

    table,th,td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
      background-color: #f2f2f2;
    }

    /* .product-list th {
      background-color: #f2f2f2;
    } */

    .product-actions {
      display: flex;
      justify-content: flex-end;
    }

    .product-actions a {
      padding: 6px 12px;
      margin-left: 10px;
      text-decoration: none;
      background-color: #4CAF50;
      color: white;
      border-radius: 4px;
    }

    .add-product-form {
      font-family: Arial, sans-serif;
      max-width: 400px;
      margin-bottom: 20px;
    }

    .add-product-form input, .add-product-form textarea {
      font-family: Arial, sans-serif;
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
    }

    .add-product-form button {
      padding: 8px 16px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1    style=" text-align: center;">Admin Dashboard</h1>
    <div style=" margin-bottom: 20px;" >
      <h2>Product List</h2>
      <table style="width: 100%; border-collapse: collapse;">
        <tr>
          <th>ID</th>
          <th>Category Name</th>
          <th>  </th>
          <th> </th>
          <th style="text-align:right;">Actions</th>
          <th> </th>
        </tr>
        <?php
          if (mysqli_num_rows($result) > 0) {
            //$sn=1;
            foreach(($datak = mysqli_fetch_all($result)) as $key => $data) { 
              $id = "myDropdown".$key;
              ?>
              <tr>
                <!-- <td><?php echo $sn; ?> </td> -->
                <td><?php echo $data[0]; ?> </td>
                <td><?php echo $data[1]; ?> </td>
                <?php
                $idl=$data[0];
                $sqll="SELECT id,name from product where categoryno='$idl'";
                $resultl=mysqli_query($con,$sqll);              
                if (mysqli_num_rows($resultl) > 0) {?>
                  <td  >
                  <input type="image" onclick="myFunction(<?php echo $key ?>)" class="dropbtn"src="OIP.jpg" alt="dropdown"  height="26" width="26">  

                  <div class="dropdown">
                  <!-- <span><img src="OIP.jpg" alt="dropdown"  height="26" width="26"> </span> -->
                  <div  id="<?php echo $id ?>" class="dropdown-content">
                  <table style="border:2px solid white; border-collapse: collapse;">
                    <?php
                foreach(($datalk = mysqli_fetch_all($resultl)) as $datal) {?>
                    <tr>
                  <td style="border:2px solid whit; border-collapse: collapse;"><a href="#"><?php echo $datal[1]; ?></a></td>
                  <td style="border:2px solid white; border-collapse: collapse;"><a href="editpdt.php?id=<?php echo $datal[0] ?>&userid=".$userid>Edit</a> </td>
                  <td style="border:2px solid white; border-collapse: collapse;"><a href="deletepdt.php?id=<?php echo $datal[0] ?>&userid=".$userid>Delete</a></td>
                  </tr>
                  
                  <?php
                }
                ?>
                </table>
                  </div>
                  </div>
                  
                  </td>
               <?php
              }else{ ?>
                  <td></td>
             <?php }
                ?>
                
                <td>  </td>
                <td><a href="editcategory.php?id=<?php echo $data[0] ?>&userid=".$userid>Edit</a> </td>
                <td><a href="deletecategory.php?id=<?php echo $data[0] ?>&userid=".$userid>Delete</a></td>
              <tr>
              <?php  
              //$sn++; 
            }
          } else { ?>
            <tr>
              <td colspan="8">No data found</td>
            </tr>
            <?php } ?>
      </table>
    </div>

    <div class="add-product-form">
      <h2>Add Product</h2>
      <form method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
        <input type="text" name="product_name" placeholder="Product Name" autocomplete="off" required>
        <input type="text" name="brand_name" placeholder="brand Name" autocomplete="off" required>
        <textarea name="product_description" placeholder="Product Description" autocomplete="off" required></textarea>
        <input type="number" name="product_price" placeholder="Product Price" autocomplete="off" required>
        <input type="number" name="categoryno" placeholder="Category Number" autocomplete="off" required>
        <input type="file" name="Image" id="img" required>
        <input type="number" name="stock" placeholder="stock" autocomplete="off" required>
        <button type="submit" name="submit" id="submit" class="registerbtn">Add Product</button>
        <!-- <input type="submit" value="submit" name="submit" id="submit"> -->

      </form>
    </div>
    <div class="add-product-form">
      <h2>Add Product-stock</h2>
      <form method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
        <input type="text" name="product_namel" placeholder="Product Name" autocomplete="off" required>
        <input type="number" name="stock" placeholder="stock" autocomplete="off" required>
        <button type="submit" name="submitl" id="submitl" class="registerbtn" >Add Product stock</button>
        <!-- <input type="submit" value="submit" name="submitl" id="submitl"> -->

      </form>
    </div>
    
  </div>
<div class="container">
  <h2>registered users information</h2>
  <table >
        <tr>
            <th>Sl.no</th>
            <th>name</th>
            <th>phone number</th>
            <th>email</th>
            <th>registration id</th>
            <th>address</th>
            <th>password</th>
            <th> </th>
            <th>  </th>
        </tr>
        <?php
            while($rowk=mysqli_fetch_array($resultk)) {
        ?>
        <tr>

            <td><?php echo $n1 ?></td>
            <td><?php echo $rowk["name"]?></td>
            <td><?php echo $rowk["phnno"] ?></td>
            <td><?php echo $rowk["email"] ?></td>
            <td><?php echo $rowk["id"] ?></td>
            <td><?php echo $rowk["address"] ?></td>
            <td><?php echo $rowk["password"] ?></td>
            <td> <a href="reg.php?id=<?php echo $rowk["id"] ?>&userid=".$userid>edit</a> </td>
            <!-- <td><button name="delete" id="delete" onclick="ddelete(this)" ></button></td> -->
            <td><a href="delete.php?id=<?php echo $rowk["id"] ?>&userid=".$userid>DELETE</a> </td>
        </tr>
        <?php
           $n1++;
            }    

        ?>
    </table>
          </div>
          <div class="container">
            <h2>orders till now</h2>
  <table >
        <tr>
            <th>order id</th>
            <th>user id</th>
            <th>product id</th>
            <th>date</th>
            <th> </th>
        </tr>
        <?php
            while($rowkk=mysqli_fetch_array($resultkk)) {
        ?>
        <tr>

            <td><?php echo $rowkk["id"] ?></td>
            <td><?php echo $rowkk["userid"]?></td>
            <td><?php echo $rowkk["pdtid"] ?></td>
            <td><?php echo $rowkk["date"] ?></td>
            <td><a href="deleteo.php ?id=<?php echo $rowkk["id"] ?>&userid=".$userid>DELETE</a> </td>
        </tr>
        <?php
           
            }    

        ?>
    </table>
          </div>
</body>
</html>
<?php
if(isset($_POST["submit"])){
 
  $product_name=$_POST['product_name'];
  $brand_name=$_POST['brand_name'];
  $product_description=$_POST['product_description'];
  $product_price=$_POST['product_price'];
  $categoryno=$_POST['categoryno'];
  $stock=$_POST['stock'];
  $target_dir="images/products/";
  $target_file=$target_dir.basename($_FILES["Image"]["name"]);
  move_uploaded_file($_FILES["Image"]["tmp_name"],$target_file);
 // $t="INSERT into product(name,brand,description,price,categoryno,image) values('$product_name','$brand_name','$product_description','$product_price','$categoryno','$target_file'";
 // echo $t;
  //exit;
  mysqli_query($con,"INSERT into product(name,brand,description,price,categoryno,image,stock) values('$product_name','$brand_name','$product_description','$product_price','$categoryno','$target_file','$stock')");
 // header("Location: /onlineshoppingportal/ahome.php");
}

    if(isset($_POST['submitl'])){
      $aaa=$_POST["product_namel"];
      $sss=$_POST["stockl"];
      mysqli_query($con,"update product set stock=stockl where name=product_namel");
    }

?>
<script>
                    function myFunction(id) {
                      var idd = "myDropdown"+id;
                      document.getElementById(idd).classList.toggle("show");
                    }
                    window.onclick = function(event) {
                      if (!event.target.matches('.dropbtn')) {
                        var dropdowns = document.getElementsByClassName("dropdown-content");
                      // alert(dropdowns);
                        var i;
                        for (i = 0; i < dropdowns.length; i++) {
                          var openDropdown = dropdowns[i];
                          if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                          }
                        }
                      }
                    }
                  </script>