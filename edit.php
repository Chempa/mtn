<?php
include 'db.php';
include 'users.php';
$phone = "";
$u = new Users();

if(isset($_POST["phone"])){
  $prevphone = $_GET["phone"];
  $phone = $_POST["phone"];
  $ret = $u->setPhone($con,$prevphone,$phone);
  if($ret == 0){
    $url = 'Location: index.php#' . $prevphone; 
  }else{
    $url = 'Location: index.php#' . $phone;
  } 
  header($url);
  return;
}

if(isset($_GET["phone"])){
  $phone = $_GET["phone"]; 
  $u = $u->get($con,$phone);
}{

} 


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap 4 List Group with Linked Items</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
    .bs-example{
        margin: 20px;        
    }
</style>
</head>
<body>
<form class="p-5" method="post" action="edit.php?phone=<?php echo $u->phone ?>">
  <h3 class="mb-3">Edit Phone</h3>
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input class="form-control" type="text"  name="name"  value="<?php echo $u->name ?>" readonly>
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Phone</label>
    <input type="text" name="phone" class="form-control" id="password" value="<?php echo $u->phone ?>">
  </div>
  <div class="text-center">
  <button type="submit" class="btn btn-warning text-light">Submit</button>
  </div>
</form>
</body>
</html>