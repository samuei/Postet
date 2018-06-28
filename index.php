<?php

// External files
require_once('functions.php');
require('NoteTemplate.php');

if (isset($_POST['note_id']) and is_numeric($_POST['note_id'])) {
	// If there's a note to be deleted, delete
	$errorMsg = deletePostetNote($_POST);
	
	if (!$errorMsg) {
		// If everything went alright, refresh
		$host = $_SERVER['HTTP_HOST'];
		$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = 'index.php';
		header("Location: http://$host$uri/$extra");
		exit;
	}

}

?> 

<!doctype html>
<html>
<head>
	<meta charset='UTF-8'>
	<title>Postet Notes</title>
	<link rel='stylesheet' href='PostStyles.css'>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<body>

<a href="/create.php" class="create">Create</a>
<br><br>

<?php

if(isset($errorMsg) && $errorMsg) {
	echo "<p style=\"color: red;\">* " . htmlspecialchars($errorMsg) . "</p>\n\n";
}

$res = getPostetNotes();

if (is_string($res)) {
	echo $res;
	exit;
}
	
// Arrange notes
while ($result = $res->fetch_assoc()) {
    echo NoteTemplate($result);
}

?>

</body>
</html>