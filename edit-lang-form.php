<?php
// Load Twig setup
include("twig_setup.php"); 
// Connect to database
include("db.php");

// Get the ID from the URL
$id = $_GET['id'] ?? null;

// Basic validation: Redirect if no valid ID is provided
if (!$id || !is_numeric($id)) {
  header("location: index.php"); 
  exit;
}

// Fetch the single current record details using the ID
$sql = "SELECT * FROM programminglang WHERE lang_id = {$id}";
$rst = mysqli_query($mysqli, $sql);

// Check if a record was actually found
if (mysqli_num_rows($rst) === 0) {
    echo "<h2>Error: Language not found.</h2>";
    exit;
}

// Convert the single result row to a PHP array
$language = mysqli_fetch_assoc($rst);

// Render the template and pass the 'language' array
echo $twig->render('edit-lang-form.html.twig', [
    'language' => $language,
]);
?>