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

//add dynamic keyword
function dynamicKeyword($keyword = ''){
    $default_keyword = "entrepreneur funding, business grants, startup events, entrepreneurship resources, business growth opportunities, startup financing, networking events, small business grants, entrepreneur community, business development resources, startup accelerators, venture capital connections, business pitch events, innovation funding, entrepreneur workshops";
    if(empty($keyword )){
        return $default_keyword;
    }else{
        return $keyword;
    }
}

//add dynamic desription
function dynamicDescription($desc = ''){
    $default_desc = "Discover funding opportunities, grants, and growth-focused events for entrepreneurs. Your one-stop platform to connect with resources that accelerate business success and innovation";
    if(empty($desc)){
        return $default_desc;
    }else{
        return $desc;
    }
}

//add dynamic path canon
function dynamicCanon($canon = ''){
    $default_canon = "https://media.edatsu.com/";
    if(empty($canon)){
        return $default_canon;
    }else{
        return $canon;
    }
}

function processCountries($countriesString) {
    $countries = explode(',', $countriesString);
    $cleanedCountries = array_map('trim', $countries);

    if (count($cleanedCountries) === 1) {
        echo"
            <li class=''>
                        <span class='data-labels'>
                            ".ucwords(str_replace("_", " ", $cleanedCountries[0]))."
                        </span>
            </li>";
    } else {
        foreach ($cleanedCountries as $country) {
            echo"
            <li class=''>
                        <span class='data-labels'>
                            ".ucwords(str_replace("_", " ", $country))."
                        </span>
            </li>";
        }
    }
}

?>