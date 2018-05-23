<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		require 'connect.php';
		$query = "DELETE FROM imenik WHERE ID = {$id}";
		mysqli_query($conn, $query);
		header("Location: remove.php");
		
	}