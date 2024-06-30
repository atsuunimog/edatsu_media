<?php 


function get_days_left($deadline) {
    $deadline_timestamp = strtotime($deadline);
    $now_timestamp = time();
    $seconds_left = $deadline_timestamp - $now_timestamp;
    if ($seconds_left <= 0) {
        return "<span style='color: #c1121f;'>Expired</span>";
    } else {
      $days_left = floor($seconds_left / (60 * 60 * 24));
        if ($days_left == 0) {
        return "<span style='color: #c1121f;'>Last day</span>";
    } elseif ($days_left == 1) {
        return "<span style='color: #c1121f;'>1 Day Left</span>";
    } else {
        $days_text = $days_left . ' day' . ($days_left > 1 ? 's' : '');
        if ($days_left > 7) {
            return "<span style='color: #2a9d8f;'>$days_text Left</span>";
        } else {
            return "<span style='color: #c1121f;'>$days_text Left</span>";
        }
    }
}
}

/**truncate text */
function truncateText($text, $char){
    if(strlen($text) > 10){
        $truncated_text = substr($text, 0, $char);
        return $truncated_text.'...';
    }else{
        return $text;
    }
}


/**truncate per words */
function truncateTextByWords($text, $maxWords) {
    // Remove extra spaces and trim the text
    $cleanedText = trim(preg_replace('/\s+/', ' ', $text));

    // Split the cleaned text into an array of words
    $words = explode(' ', $cleanedText);

    // Check if the word count exceeds the maximum allowed words
    if (count($words) > $maxWords) {
        // Slice the array to keep only the first $maxWords words
        $truncatedWords = array_slice($words, 0, $maxWords);

        // Join the truncated words back together with spaces
        $truncatedText = implode(' ', $truncatedWords);

        return $truncatedText . '...';
    } else {
        return $text;
    }
}





function getHighlightClass($targetPath, $active_style, $default_style) {
    $currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    return ($currentPath === $targetPath) ? $active_style : $default_style;
}

//format to readable text
function convertToTitleCase($inputString) {
    // Split the input string by underscores
    $words = explode('_', $inputString);

    // Capitalize the first letter of each word
    $titleCaseWords = array_map('ucfirst', $words);

    // Join the words back together with spaces
    $titleCaseString = implode(' ', $titleCaseWords);

    return $titleCaseString;
}


?>