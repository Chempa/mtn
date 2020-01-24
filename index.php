<?php
include 'db.php';
include 'users.php';
$phone = "";
$_ = new Users();

if(isset($_GET["confirm"])){
  $phone = $_GET["phone"];
  $_->confirm($con,$phone);
}


$A = $_->getall($con);   

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,  shrink-to-fit=no">
<!-- <meta name="viewport" content="width=device-width"> -->
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
<div class="container-fluid m-0 p-0">
      
    <table class="table ">
      <thead >
        <tr class="bg-warning text-light"> 
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Phone</th>
          <th scope="col">Edit</th>
          <th scope="col">Confirmed</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          for ($i=0; $i < count($A); $i++) { 
            $u = $A[$i];
            $bg = "";
            if($u->phone == $phone){
              $bg = "bg-light";
            }
        ?>

        <tr class="<?php echo $bg ?>" id="<?php echo $u->phone; ?>"> 
          <td><?php echo $i+1; ?></td>
          <td><?php echo $u->name; ?></td>
          <td><?php echo $u->phone; ?></td> 
          <td><a href="edit.php?phone=<?php echo $u->phone; ?>" class="btn btn-warning text-white">Edit <i class="fa fa-edit"></i></a></td>
          <?php
          if(intval($u->confirmed) == 1){
          ?>

          <td><a href="#" class="btn btn-success text-white">Yes <i class="fa fa-check"></i></a></td>

          <?php
          }else{
          ?>
          <td><a href="index.php?confirm=1&phone=<?php echo $u->phone; ?>#<?php echo $u->phone; ?>" class="btn btn-warning text-white">Confirm</a></td>
          <?php
          }
          ?>
        </tr>

        <?php
          }
        ?> 
      </tbody>
    </table>
</div>
</body>
</html>                            