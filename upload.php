<?php

$officerName = $_POST["name-of-officer"];
$officerID = $_POST["id-of-officer"];
$incidentDate = $_POST["date-of-incident"];
$incidentTime = $_POST["appt"];
$report = $_POST["comment"];

echo "<h2>Incident Report Received</h2>";

echo "Officer Name: $officerName <br>";
echo "Officer ID: $officerID <br>";
echo "Incident Date: $incidentDate <br>";
echo "Incident Time: $incidentTime <br>";
echo "Report: $report <br>";

?>