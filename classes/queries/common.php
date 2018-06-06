<?php
include __DIR__ . "/../dbase.php";

$common = new Database();

// group types
$common->query("SELECT * FROM testtable");
$records = $common->resultset();


?>