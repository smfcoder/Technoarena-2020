<?php  
	include("../db/conn.php");
	$id = $_GET['id'];
	$query = "DELETE FROM team WHERE id =$id";
	if(mysqli_query($sql, $query))  
	{
	    $e=mysqli_query($sql,$q);
		header("location:/admin/team.php");
	}  
 ?>