<?php

// External files
require_once('config.php');

function createPostetNote($arr) {
	extract($arr);
	global $mysqli;
	
	if(!isset($short_name, $long_desc, $creator_name)) {
		return "An error occurred. Please make sure you have submitted acceptable values. \n Function Error " . __LINE__;
	}
		
	if(!$short_name) {
		return "Please enter a short name";
	} elseif(!$long_desc) {
		return "Please enter a long description";
	} elseif(!$creator_name) {
		return "Please enter your name";
	} 

	// Check connection
	if ($mysqli->connect_error) {
		return "An error occurred. Your submission was not saved. \n " . $mysqli->connect_error;
	}

	// prepare and bind
	$stmt = $mysqli->prepare("INSERT INTO notes (short_name, long_desc, creator_name) VALUES (?, ?, ?)");
	
	if($stmt == false)
		return "An error occurred. Your submission was not saved. \n Query Error " . __LINE__;
	
	$stmt->bind_param("sss", $short_name, $long_desc, $creator_name);

	$stmt->execute();
	
	$stmt->close();
	
	return;
}

function getPostetNotes($arr) {
	extract($arr);
	global $mysqli;
	
	// Check connection
	if ($mysqli->connect_error) {
		return "An error occurred while connecting to the database. \n " . $mysqli->connect_error;
	}
	
	// Gather info from db
	$res = $mysqli->query('SELECT note_id, short_name, long_desc, creator_name FROM notes');
	
	if($res == false) {
		return "An error occurred. \n Query Error " . __LINE__;
	}
	
	return $res;
}

function deletePostetNote($arr) {
	extract($arr);
	global $mysqli;
	
	if(!isset($note_id) || !ctype_digit($note_id)) {
		return "An error occurred. Please make sure you have submitted acceptable values. \n Function Error " . __LINE__;
	}
	
	// Check connection
	if ($mysqli->connect_error) {
		return "An error occurred while connecting to the database. \n " . $mysqli->connect_error;
	}
	
	// prepare and bind
	$stmt = $mysqli->prepare("DELETE FROM notes WHERE note_id = ?");
	
	if($stmt == false)
		return "An error occurred. Your submission was not saved. \n Query Error " . __LINE__;
	
	$stmt->bind_param("i", $note_id);

	$stmt->execute();
	
	$stmt->close();
	
	return;
}
