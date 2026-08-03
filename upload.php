<?php
require_once "database.php";

$officerName = $_POST["name-of-officer"];
$officerID = $_POST["id-of-officer"];
$incidentDate = $_POST["date-of-incident"];
$incidentTime = $_POST["appt"];
$report = $_POST["comment"];
$image = $_FILES["image"];

echo "<h2>Incident Report Received</h2>";

echo "Officer Name: $officerName <br>";
echo "Officer ID: $officerID <br>";
echo "Incident Date: $incidentDate <br>";
echo "Incident Time: $incidentTime <br>";
echo "Report: $report <br>";

$image = $_FILES["image"];

$source = $image["tmp_name"];

$originalName = $image["name"];

$fileExtension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

$uniqueName = uniqid("incident_", true) . "." . $fileExtension;

$destination = "Uploads/" . $uniqueName;

$allowedExtensions = ["jpg", "jpeg", "png", "gif"];

$maxSize = 2 * 1024 * 1024;

$imageInfo = getimagesize($source);

if (!in_array($fileExtension, $allowedExtensions)) {

    die("Only JPG, JPEG, PNG and GIF images are allowed.");

}

if ($image["size"] > $maxSize) {

    die("Image must be less than 2 MB.");

}

if ($imageInfo === false) {

    die("Uploaded file is not a valid image.");

}

if (move_uploaded_file($source, $destination)) {

    echo "Image uploaded successfully!";
    $sql = "INSERT INTO incidents
        (
            officer_name,
            officer_id,
            incident_date,
            incident_time,
            report,
            image
        )
        VALUES
        (
            '$officerName',
            '$officerID',
            '$incidentDate',
            '$incidentTime',
            '$report',
            '$uniqueName'
        )";
         // Execute the query
    if ($conn->query($sql)) {
        echo "<br>Incident saved successfully!";
    } else {
        echo "<br>Database Error: " . $conn->error;
    }
} else {

    echo "Image upload failed.";

}

echo "<img src='$destination' width='300'>";

?>