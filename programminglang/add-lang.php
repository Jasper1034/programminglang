<?php
  
  // Read values from the form
  $lang_name = $_POST['LangName'];
  $lang_description = $_POST['LangDescription'];
  $lang_release_date = $_POST['DateReleased'];
  $lang_rating = $_POST['LangRating'];
  
  // Connect to database
  include("db.php");
  
  // Build SQL statement
  $sql = "INSERT INTO programminglang(lang_name, lang_description, released_date, rating)
          VALUE('{$lang_name}', '{$lang_description}', '{$lang_release_date}', '{$lang_rating}')";
  
  // Run SQL statement and report errors
  if(!$mysqli -> query($sql)) {  
      echo("<h4>SQL error description: " . $mysqli -> error . "</h4>");
    }
  
  // Redirect to list
  header("location: index.php");
?>
