<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'market';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];
$searchTerm="%".$searchTerm."%";
//get matched data from skills table
$query = $db->query("SELECT * FROM customer WHERE cust_first LIKE '$searchTerm' or cust_last LIKE '$searchTerm'");
while ($row = $query->fetch_assoc()) {
    $data[] = utf8_decode(strtoupper($row['cust_first'].' '. $row['cust_last']));
}
//return json data
echo json_encode($data);
?>