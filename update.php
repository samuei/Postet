<?php

// execution starts here
if(isset($_POST['update_note'])) {
	
	// External files
	require_once('functions.php');
	
	// If there's a note to be created, create
	$errorMsg = updatePostetNote($_POST);
	
	if (!$errorMsg) {
		// If everything went alright, redirect
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
	<title>Updating Note</title>
	<link rel='stylesheet' href='PostStyles.css'>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<body>

<?php
if(isset($errorMsg) && $errorMsg) {
	echo "<p style=\"color: red;\">* " . htmlspecialchars($errorMsg) . "</p>\n\n";
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	<input type="hidden" name="note_id" value="<?php if(isset($_POST['note_id'])) echo htmlspecialchars($_POST['note_id']); ?>" />
	<p><label>Short Name<br>
		<input type="text" size="48" name="short_name" required maxlength="50"
			value="<?php if(isset($_POST['short_name'])) echo htmlspecialchars($_POST['short_name']); ?>">
	</label></p>
	<p><label>Long Description<br>
		<textarea name="long_desc" cols="48" rows="8" required><?php 
			if(isset($_POST['long_desc'])) echo htmlspecialchars($_POST['long_desc']); 
		?></textarea>
	</label></p>
	<p><label>Creator Name<br>
		<input type="text" size="48" name="creator_name" required maxlength="20"
			value="<?php if(isset($_POST['creator_name'])) echo htmlspecialchars($_POST['creator_name']); ?>">
	</label></p>
	<p>
		<button type="button" onclick="history.back();">Cancel</button>
		<input type="submit" name="update_note" value="Update">
	</p>
</form>

</body>
</html>