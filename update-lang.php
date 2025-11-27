<?php
  
  include("db.php"); // connect the database with php

  // Read values from the form (using $_POST) 
  // The ID is essential to know WHICH record to update
  $lang_id = $_POST['LangID'] ?? null; // id is not nullable
  $lang_name = $_POST['LangName'] ?? '';
  $lang_description = $_POST['LangDescription'] ?? '';
  $lang_release_date = $_POST['DateReleased'] ?? '';
  $lang_rating = floatval($_POST['LangRating'] ?? 0);

  // Simple check to ensure we have an ID
  if (!$lang_id) {
    echo("<h4>Error: Language ID is missing for update.</h4>");
    exit;
  }
  
  // SECURITY: Escape inputs before using them in the query string
  // This is vital to prevent SQL Injection, especially for strings (name, description, date).
  $lang_id_safe = mysqli_real_escape_string($mysqli, $lang_id);
  $lang_name_safe = mysqli_real_escape_string($mysqli, $lang_name);
  $lang_description_safe = mysqli_real_escape_string($mysqli, $lang_description);
  $lang_release_date_safe = mysqli_real_escape_string($mysqli, $lang_release_date);

  // Build SQL UPDATE statement 
  $sql = "UPDATE programminglang
          SET lang_name = '{$lang_name_safe}',
              lang_description = '{$lang_description_safe}',
              released_date = '{$lang_release_date_safe}',
              rating = '{$lang_rating}'
          WHERE lang_id = {$lang_id_safe}"; // CRUCIAL: Only update the selected record
  
  // Run SQL statement and report errors
  if(!$mysqli -> query($sql)) {  
      echo("<h4>SQL error description: " . $mysqli -> error . "</h4>");
    }
  
  // Redirect to list on success 
  header("location: index.php");
?>