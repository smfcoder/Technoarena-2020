<?php  
	include("../db/conn.php");
	$id = $_GET['id'];
	
	$se="SELECT * FROM parent where id=$id;";
	$ese=mysqli_query($sql,$se);
	$r=mysqli_fetch_array($ese);
	$pslug=$r['slug'];
	
	
	$sevent="SELECT * FROM events where pslug='$pslug';";
	$esevent=mysqli_query($sql,$sevent);
	$no=mysqli_num_rows($esevent);
	
	while($no!=0)
	{
	    $q = "DELETE FROM events where pslug='$pslug';";
	    $eq=mysqli_query($sql, $q);
	    $no=$no-1;
	}
	
	
	
	$query = "DELETE FROM parent WHERE id =$id;";
	if(mysqli_query($sql, $query))  
	{
	    $e=mysqli_query($sql,$q);
		header("location:/admin/marque.php");
	}  
 ?>