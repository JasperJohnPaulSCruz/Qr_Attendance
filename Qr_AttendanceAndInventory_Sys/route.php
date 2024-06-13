<?php

$request = $_SERVER["REQUEST_URI"];
$router = str_replace('/Qr_Attendance/Qr_AttendanceAndInventory_Sys/', '', $request);

if($router == '/' || $router == '' || $router == 'home'){
    include 'index.php';
}
else if($router == 'students'){
    include 'views/students.php';
}
else if($router == 'inventory'){
    include 'views/inventory.php';
}
else{
    include '404.php';
    exit;
}