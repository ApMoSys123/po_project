<?php
/*
* iTech Empires:  Export Data from MySQL to CSV Script
* Version: 1.0.0
* Page: Export
*/
// Database Connection
require("db_connection.php");

// get Client List
$query = "SELECT * FROM client_list";
if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}

$client_list = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $client_list[] = $row;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=clientdetails.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('Id', 'Name', 'Status', 'Date Created'));

if (count($client_list) > 0) {
    foreach ($client_list as $row) {
        fputcsv($output, $row);
    }
}
?>