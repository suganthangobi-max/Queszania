<?php
// Assuming your file is named 'report.docx' and located in 'files' directory
$file=$_GET['file'];
$filePath = '../nota/'.$file;

// Check if file exists
if (file_exists($filePath)) {
  // Set content type header (adjust based on file type)
  header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); // For docx
  // Set content disposition header with attachment and filename
  header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
  // Optional: Set content length header (encourages progress bar)
  header('Content-Length: ' . filesize($filePath));

  // Read file content and send it to the browser
  readfile($filePath);
  exit; // Stop further script execution
} else {
  // Handle file not found scenario (e.g., display error message)
  echo "File not found!";
}
?>