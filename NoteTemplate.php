<?php

require_once('functions.php');

function NoteTemplate($in_array) {
	$output = '<div class="noteBox">';
	
	$output .= '<span class="noteID">#' . htmlspecialchars($in_array['note_id'], ENT_HTML5, 'UTF-8') . '</span>';
	
	// Delete Mark 
	$output .= '<form action="" method="post">';
	$output .= '<input type="hidden" name="note_id" value="' . $in_array['note_id'] . '" />';
	$output .= '<input type="submit" value="X" class="deleteMark" />';
	$output .= '</form>';
	
	$output .= '<br>';
	$output .= '<span class="noteShortName">' . htmlspecialchars($in_array['short_name'], ENT_HTML5, 'UTF-8') . '</span>';
    $output .= '<br>';
	$output .= '<span class="noteLongDesc">' . htmlspecialchars($in_array['long_desc'], ENT_HTML5, 'UTF-8') . '</span>';
    $output .= '<br>';
	$output .= '<span class="noteCreatorName">-' . htmlspecialchars($in_array['creator_name'], ENT_HTML5, 'UTF-8') . '</span>';
	
	$output .= '</div>';
	return $output;
}
