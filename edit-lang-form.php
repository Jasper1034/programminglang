<?php
// Load Twig setup
include("twig_setup.php"); 
// Connect to database
include("db.php");

// 1. Get the ID from the URL (e.g., ?id=5)
$id = $_GET['id'] ?? null;

// Basic validation: Redirect if no valid ID is provided
if (!$id || !is_numeric($id)) {
  header("location: index.php"); 
  exit;
}

// 2. Fetch the single current record details using the ID
$sql = "SELECT * FROM programminglang WHERE lang_id = {$id}";
$rst = mysqli_query($mysqli, $sql);

// Check if a record was actually found
if (mysqli_num_rows($rst) === 0) {
    // Instead of echoing HTML error, render a simple error template or redirect
    // For now, we'll keep your original simple error message:
    echo "<h2>Error: Language not found.</h2>";
    exit;
}

// 3. Convert the single result row to a PHP array
$language = mysqli_fetch_assoc($rst);

// 4. Render the template and pass the 'language' array
echo $twig->render('edit-lang-form.html.twig', [
    'language' => $language,
]);
?>