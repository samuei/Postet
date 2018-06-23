<?php

function NoteTemplate($in_array) {
	$output = '<div class="noteBox">';
	
	$output .= '<span class="noteID">#' . htmlspecialchars($in_array['note_id'], ENT_HTML5, 'UTF-8') . '</span>';
	$output .= '&nbsp;';
	$output .= '<span class="noteShortName">' . htmlspecialchars($in_array['short_name'], ENT_HTML5, 'UTF-8') . '</span>';
    $output .= '<br>';
	$output .= '<span class="noteLongDesc">' . htmlspecialchars($in_array['long_desc'], ENT_HTML5, 'UTF-8') . '</span>';
    $output .= '<br>';
	$output .= '<span class="noteCreatorName">-' . htmlspecialchars($in_array['creator_name'], ENT_HTML5, 'UTF-8') . '</span>';
	
	$output .= '</div>';
	return $output;
}

?>