<?php 
	session_start();
	include 'files/functions.php'; 
	$artist_id = $_GET['artist_id'];
	$artist = get_artist_by_artist_id($conn,$artist_id);
	$artist_photo = "uploads/".$artist['artist_photo'];
	
	//deleting an artist photo
	if(file_exists($artist_photo)){ // checking if a file exists before I delete
		unlink($artist_photo); //Delete a file
	}

	
	$sql_songs = "DELETE FROM songs WHERE aritst_id = '$artist_id'";
	$conn->query($sql_songs);

	$sql_artist = "DELETE FROM artist WHERE artist_id = '$artist_id'";
	$conn->query($sql_artist);

	if($conn->query($sql)){
		message("The artist was deleted successfully.","success"); 
	}else{ 
		message("Something went wrong while deleting the artist.","danger");
	}
 
 	header("Location: admin_artist.php");
 	die();
 ?>
