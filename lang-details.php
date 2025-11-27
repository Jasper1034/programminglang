<?php
  // Connect to database
  include("db.php");

  // Grabs id value from URL
  $id = $_GET['id'] ?? null;
  
  // --- 1. SECURITY: Escape and validate the ID ---
  // Escape the string input first
  $id_safe_string = mysqli_real_escape_string($mysqli, $id);
  // Convert it to an integer to enforce it's a number
  $id_safe = intval($id_safe_string); 

  // Basic validation: Check if a positive ID exists
  if ($id_safe <= 0) {
      header("location: index.php"); 
      exit;
  }
  
  // --- 2. Define SQL query using the SAFE integer variable ---
  $sql = "SELECT * FROM programminglang WHERE lang_id = {$id_safe}";
  
  $rst = mysqli_query($mysqli, $sql);
  
  // Check if a record was actually found
  if (mysqli_num_rows($rst) === 0) {
      echo "<h2>Error: Language not found.</h2>";
      exit;
  }

  $a_row = mysqli_fetch_assoc($rst);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$a_row['lang_name']?> Details</title>
    </head>
<body>
<div class="container">

<h1><?=$a_row['lang_name']?></h1>
<p><strong>Description:</strong> <?=$a_row['lang_description']?></p>
<p><strong>Released:</strong> <?=$a_row['released_date']?></p>
<p><strong>Rating:</strong> <?=$a_row['rating']?></p>

<a href="index.php"> Back to list</a>

</div>
</body>
</html>