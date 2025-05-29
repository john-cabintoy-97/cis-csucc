<?php

$url = $_SERVER['REQUEST_URI'];
$action = getUrlParameter($url, "r");
$ranges = getUrlParameter($url, "ranges");
$monthly = getUrlParameter($url, "monthly");
$semester = getUrlParameter($url, "semester");


switch ($action) {
    case "health":
        if (isset($ranges)) {
            include 'ranges/index.php';
        } elseif (isset($monthly)) {
            include 'monthly/index.php';
        } elseif (isset($semester)) {
            include 'semester/index.php';
        } else {
            include 'main/index.php';
        }
        break;
    default:
        include 'main/index.php';
        break;
}

function getUrlParameter($url, $parameter)
{
    $parsedUrl = parse_url($url);
    parse_str($parsedUrl['query'], $queryParameters);

    if (isset($queryParameters[$parameter])) {
        return $queryParameters[$parameter];
    } else {
        return null;
    }
}
