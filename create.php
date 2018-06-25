<?php

// form handler
function validateCreateForm($arr) {
	extract($arr);
	
	if(!isset($short_name, $long_desc, $creator_name)) 
		return;
		
	if(!$short_name) {
		return "Please enter a short name";
	} elseif(!$long_desc) {
		return "Please enter a long description";
	} elseif(!$creator_name) {
		return "Please enter your name";
	} 
	
	// External files
	require_once('config.php');
	
	// Check connection
	if ($mysqli->connect_error) {
		die("Connection failed: " . $mysqli->connect_error);
	}

	// prepare and bind
	$stmt = $mysqli->prepare("INSERT INTO notes (short_name, long_desc, creator_name) VALUES (?, ?, ?)");
	if($stmt == false)
		die("Secured");
	
	$stmt->bind_param("sss", $short_name, $long_desc, $creator_name);

	$stmt->execute();
	
	$stmt->close();
	
	// redirect
	$host = $_SERVER['HTTP_HOST'];
	$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'index.php';
	header("Location: http://$host$uri/$extra");
	exit;

}

// execution starts here
if(isset($_POST['create_note'])) {
	// call form handler
	$errorMsg = validateCreateForm($_POST);
}

?>

<!doctype html>
<html>
<head>
	<meta charset='UTF-8'>
	<title>New Note</title>
	<link rel='stylesheet' href='PostStyles.css'>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<body>

<?php
if(isset($errorMsg) && $errorMsg) {
	echo "<p style=\"color: red;\">*" . htmlspecialchars($errorMsg) . "</p>\n\n";
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	<p><label>Short Name<strong>*</strong><br>
		<input type="text" size="48" name="short_name" 
			value="<?php if(isset($_POST['short_name'])) echo htmlspecialchars($_POST['short_name']); ?>">
	</label></p>
	<p><label>Long Description<strong>*</strong><br>
		<textarea name="long_desc" cols="48" rows="8"><?php 
			if(isset($_POST['long_desc'])) echo htmlspecialchars($_POST['long_desc']); 
		?></textarea>
	</label></p>
	<p><label>Creator Name<strong>*</strong><br>
		<input type="text" size="48" name="creator_name" 
			value="<?php if(isset($_POST['creator_name'])) echo htmlspecialchars($_POST['creator_name']); ?>">
	</label></p>
	<p>
		<button type="button" onclick="history.back();">Cancel</button>
		<input type="submit" name="create_note" value="Create">
	</p>
</form>

</body>
</html>