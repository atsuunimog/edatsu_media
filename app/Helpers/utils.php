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
    }
        return $truncated_text.'...';
}



function getHighlightClass($targetPath, $active_style, $default_style) {
    $currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    return ($currentPath === $targetPath) ? $active_style : $default_style;
}


?>