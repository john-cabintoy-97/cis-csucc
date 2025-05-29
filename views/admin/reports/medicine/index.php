<?php

$url = $_SERVER['REQUEST_URI'];
$action = getUrlParameter($url, "r");
$inventory = getUrlParameter($url, "inventory");
$per_student = getUrlParameter($url, "per_student");
$per_faculty = getUrlParameter($url, "per_faculty");
$per_employee = getUrlParameter($url, "per_employee");
$sum_daily = getUrlParameter($url, "sum_daily");
$sum_month = getUrlParameter($url, "sum_month");
$sum_semester = getUrlParameter($url, "sum_semester");

switch ($action) {
    case "medicine":
        if (isset($inventory)) {
            include 'inventory/index.php';
        } elseif (isset($per_student)) {
            include 'per_student/index.php';
        } elseif (isset($per_faculty)) {
            include 'per_faculty/index.php';
        } elseif (isset($per_employee)) {
            include 'per_employee/index.php';
        } elseif (isset($sum_daily)) {
            include 'sum_daily/index.php';
        } elseif (isset($sum_month)) {
            include 'sum_monthly/index.php';
        } elseif (isset($sum_semester)) {
            include 'sum_semester/index.php';
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
