<!DOCTYPE html>
<html lang="en">

<head>
  <title> </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="index1.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script>
    function js() {
      document.getElementById("parts").style.color = "yellow";
    }
  </script>

  <?php
  include 'db.php';

  ?>


</head>

<body>

  <?php

  ?>



  <nav class="navbar navbar-inverse">

    <div class="navbar-Logo">

      <a class="navbar-brand"><img src="Images/Logo.png" class="img-fluid" href="#"></a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">

      <li><button class="button button" onclick="addUrlParameter('category', 'pre-built')">Prebuilts</button></li>
      <li><button class="button button" onclick="addUrlParameter('category', 'warranties')">Warranties</button></li>
      <li><button class="button button" onclick="addUrlParameter('category', 'parts')">Parts</button></li>
        <!-- <form action="index.php" method="post">
          <input type="submit" name="pre-built" value="Pre-Built Computers">
          <input type="submit" name="computer-parts" value="Computer Parts">
          <input type="submit" name="maintenance" value="Maintainance">
        </form> -->

      </ul>

    </div>

    <div class="searchbar collapse navbar-collapse">
      <form action="index.php" method="post">
        <li style="list-style-type:none;">
          <input type="text" name="search" id="s-bar" class="btn rounded" placeholder="Search here" aria-label="Search"
            aria-describedby="search-addon" />
          <input type="submit" name="search_button" value="search">
        </li>
      </form>
    </div>

    <div class="icons dropdown show collapse navbar-collapse">



      <li style="list-style-type:none;"><a href="#">

          <!-- //cart trial -->
          <!-- Button trigger modal -->
          <button type="button" name="shopping-cart" class="btn btn-primary glyphicon glyphicon-shopping-cart"
            data-toggle="modal" data-target="#exampleModalLong"></button>

          <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Your Cart.</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  ...
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>

          <!-- cart trial -->



          <a class="glyphicon glyphicon-sort btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort
          </a>
          <script>
            function addUrlParameter(name, value) {
              var searchParams = new URLSearchParams(window.location.search)
              searchParams.set(name, value)
              window.location.search = searchParams.toString()
            }
          </script>
          <!-- Sort -->
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" onclick="addUrlParameter('price', 'ASC')">Price: Low-High</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" onclick="addUrlParameter('price', 'DESC')">Price: High-Low</a>
            <div class="dropdown-divider"></div>
            <!-- <a class="dropdown-item" href="#">Something else here</a> -->
          </div>

          <!-- 
          <a class="glyphicon glyphicon-filter" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">Filter
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="#">Price:</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Price: High-Low</a>
            <div class="dropdown-divider"></div>
          </div> -->



      </li>



    </div>



  </nav>



  <?php
  $current;
  $w = 0;
  $cartarray = array();
  $shoppingCart = array();
  $x = 0;
  function prebuilt()
  {
    global $current;

    //$current="computer";
    $sql = "SELECT * FROM computer";
    if (isset($_GET['price'])) {
      $dir = $_GET['price'];
      $sql = "$sql ORDER BY price $dir";
    }
    // echo $sql;
    $result1 = $_SESSION['dbCon']->query($sql);
    while ($row = mysqli_fetch_array($result1)) {


      echo '<li style="list-style-type:none;"><div class="col-sm-4">';
      echo '<div class="panel panel-primary">
      <div class="panel-heading">' . $row['Name'] . '</div>
      
      <div class="panel-footer">' . $row['Description'] . '</div>'
        . '<div class="panel-footer">' . $row['Price'] . '</div>'

        . '<form action="index.php" method="post">'
        . '<div class="panel-footer">'
        . '<input type="submit" name="cart" value="Add To Cart" class="btn btn-primary" >
     </form></div>
     </li>';


    }

  }


  function parts()
  {
    global $current;

    //$current="product";
    $sql = "SELECT * FROM product";
    if (isset($_GET['price'])) {
      $dir = $_GET['price'];
      $sql = "$sql ORDER BY price $dir";
    }
    $result1 = $_SESSION['dbCon']->query($sql);
    while ($row = mysqli_fetch_array($result1)) {


      echo '<li style="list-style-type:none;"><div class="col-sm-4">';
      echo '<div class="panel panel-primary">
      <div class="panel-heading">' . $row['Name'] . '</div>
      <div class="panel-body"><img src="' . $row['Image'] . '" class="img-responsive" style="width:100%" alt="Image"></div>
      <div class="panel-footer">' . $row['Description'] . '</div>'
        . '<div class="panel-footer">' . $row['Price'] . '</div>'

        . '<form action="index.php" method="post">'
        . '<div class="panel-footer">'
        . '<input type="submit" name="cart" value="Add To Cart" class="btn btn-primary" >
      </form></div>
      </li>';


    }

  }

  function maintenance()
  {
    global $cartarray;
    global $current;

    //$current="warranty";
    $sql = "SELECT * FROM warranty";

    if (isset($_GET['price'])) {
      $dir = $_GET['price'];
      $sql = "$sql ORDER BY price $dir";
    }
    $result1 = $_SESSION['dbCon']->query($sql);
    while ($row = mysqli_fetch_array($result1)) {

      echo '<li style="list-style-type:none;"><div class="col-sm-4">';
      echo '<div class="panel panel-primary">
      <div class="panel-heading">' . $row["Name"] . '</div>
      <div class="panel-body">Valid for: ' . $row['Years'] . ' years.</div>
      <div class="panel-footer">' . $row['Description'] . '</div>'
        . '<div class="panel-footer">' . $row['Price'] . '</div>'

        . '<form action="index.php" method="post">'
        . '<div class="panel-footer">'
        . '<input type="submit" name="cart" value="Add To Cart" class="btn btn-primary" >
     </form></div>
     </li>';

      $cartarray[$row["Name"]] = $row['Price'];
    }
    // print_r($cartarray);
  
  }

  // function search(){
  
  //   global $current;
//   //$current="warranty";
  
  //   global $w;
  
  //   if ($w == 1) {
//     $current = "computer";
//   } elseif ($w == 2) {
//     $current = "product";
//   }elseif ($w == 3) {
//     $current = "warranty";
//   }
  
  //   $search = trim($_POST['search']);
  

  //   if ($search !="") 
//   {
  
  //     $sql="select * from $current where Name like '%$search%'";
  
  //   $result1 = $_SESSION['dbCon']->query($sql);
  
  //   while($row=mysqli_fetch_array($result1)){
  
  //     echo'<li style="list-style-type:none;"><div class="col-sm-4">';
//     echo'<div class="panel panel-primary">
//       <div class="panel-heading">'.$row["Name"].'</div>
//       <div class="panel-footer">'.$row['Description'].'</div>'
//       .'<div class="panel-footer">'.$row['Price'].'</div>'
  
  //       .'<form action="index.php" method="post">'
//       .'<div class="panel-footer">'
//       .'<input type="submit" name="cart" value="Add To Cart" class="btn btn-primary" >
//       </form></div>
//       </li>';
  
  //   }
  
  //   }
  

  // }
  
  function AddToCart()
  {

    global $cartarray;
    global $shoppingCart;


  }

  if (isset($_GET['category']) && $_GET['category'] == 'warranties') {
    maintenance();
    AddToCart();
  }



  if (isset($_GET['category'])&& $_GET['category'] == 'pre-built') {
    $w = 1;
    prebuilt();
    $current = "computer";

  } elseif (isset($_GET['category'])&& $_GET['category'] == 'parts') {
    $w = 2;
    parts();
    $current = "product";
  } elseif (isset($_GET['maintenance'])) {
    $w = 3;
    maintenance();
    $current = "warrenty";
  }








  function search()
  {



    $search = trim($_POST['search']);


    if ($search != "") {

      $sql = "select product from product where Name like '%$search%'";

      $result1 = $_SESSION['dbCon']->query($sql);

      while ($row = mysqli_fetch_array($result1)) {

        echo '<li style="list-style-type:none;"><div class="col-sm-4">';
        echo '<div class="panel panel-primary">
      <div class="panel-heading">' . $row["Name"] . '</div>
      <div class="panel-footer">' . $row['Description'] . '</div>'
          . '<div class="panel-footer">' . $row['Price'] . '</div>'

          . '<form action="index.php" method="post">'
          . '<div class="panel-footer">'
          . '<input type="submit" name="cart" value="Add To Cart" class="btn btn-primary" >
      </form></div>
      </li>';

      }

    }


  }













  if (isset($_POST['search_button'])) {
    search();
  }



  // if ($w == 1) {
//   $current = "computer";
// } elseif ($w == 2) {
//   $current = "product";
// }elseif ($w == 3) {
//   $current = "warranty";
// }
  



  // else{
// $sql = "SELECT * FROM product";
  
  // $result1 = $_SESSION['dbCon']->query($sql);
  
  // while($row=mysqli_fetch_array($result1)){
  
  //   echo'<li style="list-style-type:none;"><div class="col-sm-4">';
//   echo'<div class="panel panel-primary">
//     <div class="panel-heading">'.$row['Name'].'</div>
//     <div class="panel-body"><img src="'.$row['Image'].'" class="img-responsive" style="width:100%" alt="Image"></div>
//     <div class="panel-footer">'.$row['Description'].'</div>'
//     .'<div class="panel-footer">'.$row['Price'].'</div>'
//    .'<div class="panel-footer"><button type="button" class="btn btn-primary">Add to cart</button></div></li>' ;
  
  //   }
  
  // }
  






  ?>


  <!-- <footer class="container-fluid text-center">
    <p class="text-light">Online Store Copyright></p>  
  </footer> -->

</body>

</html>