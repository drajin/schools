<?php

    function redirect_to($location) {
        header("Location: " . $location);
        exit;
    }

function display_errors($errors=array()) {
    $output = '';
    if(!empty($errors)) {
        $output .= "<div class=\"alert alert-danger\">";
        $output .= "Please fix the following errors:";
        $output .= "<ul>";
        foreach($errors as $error) {
            $output .= "<li>" . h($error) . "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}

// Sanitize for HTML output
function h($string) {
    return htmlspecialchars($string);
}

// Sanitize for JavaScript output
function j($string) {
    return json_encode($string);
}

// Sanitize for use in a URL
function u($string) {
    return urlencode($string);
}

function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request() {
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}