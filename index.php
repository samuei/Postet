<!doctype html>
<html>
<head>
	<title>Postet Notes</title>
	<link rel='stylesheet' href='PostStyles.css'>
	<meta charset='UTF-8'>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<body>

<?php

// External files
require('config.php');
require('NoteTemplate.php');

// Gather info from db
$res = $mysqli->query('SELECT note_id, short_name, long_desc, creator_name FROM notes');

// Arrange notes
while($result = $res->fetch_assoc()) {
    echo NoteTemplate($result);
}

?>

</body>
</html>