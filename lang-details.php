

<?php
// Load Twig setup
include("twig_setup.php"); 
// Connect to database
include("db.php");

// 1. Get the ID from the URL
$id = $_GET['id'] ?? null;

// 2. Fetch the single record
$sql = "SELECT * FROM programminglang WHERE lang_id = {$id}";
$rst = mysqli_query($mysqli, $sql);
$language = mysqli_fetch_assoc($rst);

// 3. Render template
echo $twig->render('lang-details.html.twig', [
    'language' => $language,
]);
?>