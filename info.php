<?php
session_start();

header("Access-Control-Allow-Origin: *");  // Allow all domains 
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Content-Type: application/json");

// If the request is an OPTIONS request, respond with a 200 status to pass the preflight check
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('HTTP/1.1 200 OK');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    header('HTTP/1.1 400 OK');
    exit();
}

// Get date 
$datetime = new DateTime("now", new DateTimeZone("UTC"));
$current_datetime = $datetime->format("Y-m-d\TH:i:s\Z"); // ISO 8601 with "Z" suffix


// Response
$response = [
    "email" => "samuelayomide0705@gmail.com", // HNG12 Slack-registered email
    "current_datetime" => $current_datetime,
    "github_url" => "https://github.com/sam-uel-ayo/HNG12_Task1" // Repository URL
];

// Return the response as JSON
echo json_encode($response);


