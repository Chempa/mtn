<?php
include 'db.php';
include 'users.php';

$_ = new Users();
$a = $_->confirm($con,"0547932705"); 
print_r($a);
?>