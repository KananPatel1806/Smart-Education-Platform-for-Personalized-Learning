<?php
// Handle file upload
$targetDir = "uploads/"; // Directory to store uploaded files
$assignmentTitle = $_POST['assignmentTitle'];
$assignmentDescription = $_POST['assignmentDescription'];

// Validate and move uploaded file
$fileName = basename($_FILES["assignmentFile"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

// Check if file is a valid document type (example for PDF)
if($fileType != "pdf") {
    echo json_encode(array("error" => "Only PDF files are allowed."));
    exit();
}

// Upload file
if (move_uploaded_file($_FILES["assignmentFile"]["tmp_name"], $targetFilePath)) {
    // Store assignment details in database or file
    // Example: Store $assignmentTitle, $assignmentDescription, $targetFilePath in database

    echo json_encode(array("success" => "Assignment uploaded successfully."));
} else {
    echo json_encode(array("error" => "Error uploading file."));
}
?>
