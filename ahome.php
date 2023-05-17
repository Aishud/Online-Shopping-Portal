<?php
$con=mysqli_connect("localhost","root","","online_shopping_portal");
$sql="SELECT * from category ";
$result=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <style>
    
    body {
      font-family: Arial, sans-serif;
    }
    .dropbtn {
      padding: 8px 16px;
      background-color: #f2f2f2;
      color: black;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

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
      max-width: 400px;
      margin-bottom: 20px;
    }

    .add-product-form input, .add-product-form textarea {
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
          <!-- <th>Price</th>
          <th>Actions</th> -->
        </tr>
        <?php
          if (mysqli_num_rows($result) > 0) {
            //$sn=1;
            foreach(($datak = mysqli_fetch_all($result)) as $data) { ?>
              <tr>
                <!-- <td><?php echo $sn; ?> </td> -->
                <td><?php echo $data[0]; ?> </td>
                <td><?php echo $data[1]; ?> </td>
                <?php
                $idl=$data[0];
                $sqll="SELECT pdtcategory.id,pdtcategory.name,pdtcategory.categoryno from pdtcategory,category where pdtcategory.categoryno=category.id and pdtcategory.categoryno='$idl'";
                $resultl=mysqli_query($con,$sqll);
                if (mysqli_num_rows($resultl) > 0) {
                foreach(($datalk = mysqli_fetch_all($resultl)) as $datal) { ?>
                  <td>
                  <div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn"> V</button>
                  <div id="myDropdown" class="dropdown-content">
                    <table><tr>
                  <td><a href="#home"><?php echo $datal[1]; ?></a></td>
                  <td><a href="editpdt.php?id=<?php echo $datal[0] ?>">Edit</a> </td>
                  <td><a href="deletepdt.php?id=<?php echo $datal[0] ?>">Delete</a></td>
                  </tr></table>
                  </div>
                  </div>
                  <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
                    function myFunction() {
                      document.getElementById("myDropdown").classList.toggle("show");
                    }
// Close the dropdown if the user clicks outside of it
                    window.onclick = function(event) {
                      if (!event.target.matches('.dropbtn')) {
                        var dropdowns = document.getElementsByClassName("dropdown-content");
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
                  </td>
               <?php }
              }else{ ?>
                  <td> </td>
             <?php }
                ?>
                <td>  </td>
                <td><a href="editcategory.php?id=<?php echo $data[0] ?>">Edit</a> </td>
                <td><a href="deletecategory.php?id=<?php echo $data[0] ?>">Delete</a></td>
              <tr>
              <?php  
              //$sn++; 
            }
          } else { ?>
            <tr>
              <td colspan="8">No data found</td>
            </tr>
            <?php } ?>
        <!-- <tr>
          <td>1</td>
          <td>Product 1</td>
          <td>$10</td>
          <td class="product-actions">
            <a href="#">Edit</a>
            <a href="#">Delete</a>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>Product 2</td>
          <td>$20</td>
          <td class="product-actions">
            <a href="#">Edit</a>
            <a href="#">Delete</a>
          </td>
        </tr> -->
      </table>
    </div>

    <div class="add-product-form">
      <h2>Add Product</h2>
      <form>
        <input type="text" name="product_name" placeholder="Product Name" required>
        <input type="number" name="product_price" placeholder="Product Price" required>
        <textarea name="product_description" placeholder="Product Description" required></textarea>
        <button type="submit" name="submit" >Add Product</button>
      </form>
    </div>
  </div>
</body>
</html>
<?php
if(isset["submit"]){
  header("Location: /onlineshoppingportal/addpdt.php");
}

?>