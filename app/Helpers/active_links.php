<?php
function getHighlightClass($targetPath, $active_style, $default_style) {
    $currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    return ($currentPath === $targetPath) ? $active_style : $default_style;
}
?>
