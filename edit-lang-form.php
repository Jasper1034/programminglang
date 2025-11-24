<?php
  // Connect to database
  include("db.php");

  // Get the ID from the URL (e.g., ?id=5)
  // Use null coalescing operator (??) for safety
  $id = $_GET['id'] ?? null;

  // Basic validation: Redirect if no valid ID is provided
  if (!$id || !is_numeric($id)) {
    header("location: index.php"); 
    exit;
  }
  
  // Fetch the current record details using the ID
  $sql = "SELECT * FROM programminglang WHERE lang_id = {$id}";
  $rst = mysqli_query($mysqli, $sql);
  
  // Check if a record was actually found
  if (mysqli_num_rows($rst) === 0) {
      echo "<h2>Error: Language not found.</h2>";
      // Optional: Add a link back to index.php here
      exit;
  }

  $a_row = mysqli_fetch_assoc($rst);
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edit <?=$a_row['lang_name']?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
crossorigin="anonymous">
</head>
<body>
<div class="container">
<h1>Edit Programming Language: <?=$a_row['lang_name']?></h1>
<hr>

<form action="update-lang.php" method="post">
    <input type="hidden" name="LangID" value="<?=$a_row['lang_id']?>">

    <div class="mb-3">
        <label for="LangName" class="form-label">Lang name</label>
        <input type="text" class="form-control" id="LangName" name="LangName" value="<?=$a_row['lang_name']?>" required>
    </div>
    <div class="mb-3">
        <label for="LangDescription" class="form-label">Description</label>
        <textarea class="form-control" id="LangDescription" name="LangDescription" rows="5" required><?=$a_row['lang_description']?></textarea>
    </div>
    <div class="mb-3">
        <label for="DateReleased" class="form-label">Date released</label>
        <input type="date" class="form-control" id="DateReleased" name="DateReleased" value="<?=$a_row['released_date']?>">
    </div>
    <div class="mb-3">
        <label for="LangRating" class="form-label">Rating</label>
        <input type="number" class="form-control" id="LangRating" name="LangRating" step="0.1" 
            min="0"
            max="5"
            value="<?=$a_row['rating']?>">
    </div>
    <input type="submit" class="btn btn-warning" value="Save Changes">
    <a href="index.php" class="btn btn-secondary">Cancel</a>
</form>
</div>
</body>
</html>