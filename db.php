<?php
// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost.
$con = mysqli_connect("remotemysql.com","v3gqhsXaLK","GXTkIdRlxa","v3gqhsXaLK");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }else{
  	// echo "Connected";
  }
?>