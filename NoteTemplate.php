<?php

require_once('functions.php');

function NoteTemplate($in_array) {
	extract($in_array);
	$output = '<div class="noteBox">';
	
	$output .= '<span class="noteID">#' . htmlspecialchars($note_id, ENT_HTML5, 'UTF-8') . '</span>';
	
	$output .= '<span class=floatButtons">';
		// Update mark
		$output .= '<form action="update.php" method="post">';
		foreach ($in_array as $attr => $val) {
			$output .= '<input type="hidden" name="' . $attr . 
				'" value="' . htmlspecialchars($val, ENT_HTML5, 'UTF-8') . '" />';
		}
		$output .= '<input name="update" type="submit" value="✎" class="updateMark" />';
		$output .= '</form>';
		
		// Delete mark
		$output .= '<form action="" method="post">';
		$output .= '<input type="hidden" name="note_id" value="' . $note_id . '" />';
		$output .= '<input name="delete" type="submit" value="✘" class="deleteMark" />';
		$output .= '</form>';
	$output .= '</span>';
	
	$output .= '<br>';
	$output .= '<span class="noteShortName">' . htmlspecialchars($short_name, ENT_HTML5, 'UTF-8') . '</span>';
    $output .= '<br>';
	$output .= '<span class="noteLongDesc">' . htmlspecialchars($long_desc, ENT_HTML5, 'UTF-8') . '</span>';
    $output .= '<br>';
	$output .= '<span class="noteCreatorName">-' . htmlspecialchars($creator_name, ENT_HTML5, 'UTF-8') . '</span>';
	
	$output .= '</div>';
	return $output;
}
