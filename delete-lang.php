<?php
// Read values from the URL
$lang_id = $_GET['id'] ?? null;

// Connect to database
include("db.php");

// SECURITY: Validate and sanitize the ID 
// Escape the string input first (safer practice)
$lang_id_safe_string = mysqli_real_escape_string($mysqli, $lang_id);
// Then convert it to an integer to enforce it's a number
$lang_id_safe = intval($lang_id_safe_string);

// Define SQL query using the SAFE integer variable
// Since it's a number, quotes are not needed.
$sql = "DELETE FROM programminglang WHERE lang_id = " . $lang_id_safe;

// Run SQL statement and report errors
if(!$mysqli -> query($sql)) {
    echo("<h4>SQL error description: " . $mysqli -> error . "</h4>");
}

// Redirect to list
header("location: index.php");  
exit; 
?>
