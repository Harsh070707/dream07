<?php
$fname= val($_POST["fname"]);
$lname= val($_POST["lname"]);
$lemail= val($_POST["lemail"]);

function val($data){
      $data=trim($data);
      $data=stripslashes($data);
      $data=htmlspecialchars($data); 
       return $data;         
}

  $servername="localhost";
  $username="root";
  $password="";
  $dbname="tutorial";
  
    $conn=new mysqli($servername,$username,$password,$dbname);
     $sql="INSERT INTO lec1 (firstname, lastname, email) VALUES ('fname','lname','lemail') ";
	 $conn->close();

?>

