<?php

$conn = new mysqli('localhost' , 'root','', 'druc')OR die("Error: " . mysqli_error($conn)); 

 session_start();

if(isset($_POST['save'])){

	if(!empty($_POST['Name']) && !empty($_POST['Location']) &&  !empty($_POST['Email']) && !empty($_POST['Phone']) ){
			$Name=$_POST['Name'];
			$Location=$_POST['Location'];
			$Email=$_POST['Email'];
			$Phone=$_POST['Phone'];

	$iQuery="INSERT INTO data(Name , Location , Email , Phone ) VALUES('$Name','$Location','$Email','$Phone')";
	
	$stmt =$conn->prepare($iQuery);
	$stmt->bind_param("sssd",$Name,$Location,$Email,$Phone);
     if ($stmt->execute()) {
     	$_SESSION['msg']="New record is successfully inserted.";
     	$_SESSION['alert']="alert alert-success";
     }

     	$stmt->close();
     	$conn->close();
     }
     else{
     	$_SESSION['msg']="New record is successfully inserted.";
     	$_SESSION['alert']="alert alert-warning";

     }
     header("location:task1.php");
}
if (isset($_POST ['delete']))
{
	       $id=$_POST['delete'];


			$dQuery ="DELETE FROM data WHERE ID=?";
			$stmt=$conn->prepare($dQuery);
			$stmt->bind_param('i', $id);
			if($stmt->execute()){
				$_SESSION['msg']="selected record is deleted.";
				$_SESSION['alert']="alert alert-danger";

}
$stmt->close();
$conn->close();
header("location: task1.php");
}
if(isset($_POST['edit'])){
	if(!empty($_POST['Name']) && !empty($_POST['Location']) &&  !empty($_POST['Email']) && !empty($_POST['Phone']) ){
			$Name=$_POST['Name'];
			$Location=$_POST['Location'];
			$Email=$_POST['Email'];
			$Phone=$_POST['Phone'];
			$ID=$_POST['edit'];
			
			$uQuery="UPDATE data SET Name=?,Location=?,Email=?,Phone=? WHERE ID=?";
			$stmt=$conn->prepare($uQuery);
			$stmt->bind_param('ssssd',$Name,$Location,$Email,$Phone,$ID);
			if ($stmt->execute()){
				$_SESSION['msg']="updated";
				$_SESSION['alert']="success";
			}
			$stmt->close();
            $conn->close();
	}
	else{
		$_SESSION['msg']="not updated";
				$_SESSION['alert']="warning";
	}
	header("location: task1.php");
}
?>