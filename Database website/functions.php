<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>db connect</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
    
<?php

session_start();
function prebuilt(){
  
  $sql = "SELECT * FROM computer";
  $result1 = $_SESSION['dbCon']->query($sql);
  while($row=mysqli_fetch_array($result1)){
  
    echo'<li style="list-style-type:none;"><div class="col-sm-4">';
    
    echo'<li style="list-style-type:none;"><div class="col-sm-4">';
    echo'<div class="panel panel-primary">
      <div class="panel-heading">'.$row['Name'].'</div>
      <div class="panel-body"><img src="'.$row['Image'].'" class="img-responsive" style="width:100%" alt="Image"></div>
      <div class="panel-footer">'.$row['Description'].'</div>'
      .'<div class="panel-footer">'.$row['Price'].'</div>'
     .'<div class="panel-footer"><button type="button" class="btn btn-primary">Add to cart</button></div></li>' ;
      

  }

}
  
?>

</body>
</html>