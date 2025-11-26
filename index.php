<?php
// --- 1. SETUP: Include the Twig setup first ---
// This guarantees the $twig object is created BEFORE it is used.
include("twig_setup.php"); 

// --- 2. LOGIC: Connect to database and fetch data ---
include("db.php");
$sql = "SELECT * FROM programminglang ORDER BY lang_id";
$results = mysqli_query($mysqli, $sql);

// Convert results to a PHP array for Twig to use
$languages = mysqli_fetch_all($results, MYSQLI_ASSOC);

// --- 3. RENDER: Pass data to the template ---
echo $twig->render('index.html.twig', [
    'languages' => $languages,
]);

// Note: The rest of the original HTML (head, body, table structure, etc.)
// is now contained entirely in layout.html.twig and index.html.twig.

?>