<?php

$url = $_SERVER['REQUEST_URI'];
$action = getUrlParameter($url, "r");
$addParam = getUrlParameter($url, "add");
$editParam = getUrlParameter($url, "edit");

switch ($action) {
    case "office":
        if (isset($addParam)) {
            include 'add/index.php';
        } elseif (isset($editParam)) {
            include 'edit/index.php';
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
