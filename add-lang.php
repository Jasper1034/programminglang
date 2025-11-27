<?php
// Connect to database
include("db.php"); 

// --- 1. Read values from the form ---
$lang_name = $_POST['LangName'] ?? '';
$lang_description = $_POST['LangDescription'] ?? '';
$lang_release_date = $_POST['DateReleased'] ?? '';
// floatval() makes rating safe as it forces a number
$lang_rating = floatval($_POST['LangRating'] ?? 0); 

// --- 2. SECURITY: Escape all string inputs ---
// This is the CRUCIAL STEP for SQL Injection prevention
$lang_name_safe = mysqli_real_escape_string($mysqli, $lang_name);
$lang_description_safe = mysqli_real_escape_string($mysqli, $lang_description);
$lang_release_date_safe = mysqli_real_escape_string($mysqli, $lang_release_date);

// --- 3. Build SQL statement using SAFE variables ---
$sql = "INSERT INTO programminglang(lang_name, lang_description, released_date, rating)
        VALUE('{$lang_name_safe}', '{$lang_description_safe}', '{$lang_release_date_safe}', '{$lang_rating}')";

// --- 4. Run SQL statement and report errors ---
if(!$mysqli -> query($sql)) {  
    echo("<h4>SQL error description: " . $mysqli -> error . "</h4>");
}

// --- 5. Redirect to list ---
header("location: index.php");
exit; 
?>