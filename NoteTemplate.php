<?php

function NoteTemplate($in_array) {
	$output = '<div class="noteBox">';
	
	$output .= '<span class="noteID">#' . $in_array['note_id'] . '</span>';
	$output .= '&nbsp;';
	$output .= '<span class="noteShortName">' . $in_array['short_name'] . '</span>';
    $output .= '<br>';
	$output .= '<span class="noteLongDesc">' . $in_array['long_desc'] . '</span>';
    $output .= '<br>';
	$output .= '<span class="noteCreatorName">-' . $in_array['creator_name'] . '</span>';
	
	$output .= '</div>';
	return $output;
}

?>