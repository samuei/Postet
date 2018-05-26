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

require('NoteTemplate.php');
require('config.php');

/*
CREATE TABLE `notes` (
  `note_id` INT NOT NULL AUTO_INCREMENT,
  `short_name` VARCHAR(50),
  `long_desc` TEXT,
  `creator_name` VARCHAR(20),
  PRIMARY KEY  (`note_id`)
);
*/

$res = $mysqli->query('SELECT note_id, short_name, long_desc, creator_name FROM notes');

while($result = $res->fetch_assoc()) {
    echo NoteTemplate($result);
}

?>

</body>
</html>