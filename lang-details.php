

<?php
// Load Twig setup
include("twig_setup.php"); 
// Connect to database
include("db.php");

$id = $_GET['id'] ?? null;

// Fetch the single record
$sql = "SELECT * FROM programminglang WHERE lang_id = {$id}";
$rst = mysqli_query($mysqli, $sql);
$language = mysqli_fetch_assoc($rst);

// Render template
echo $twig->render('lang-details.twig', [
    'language' => $language,
]);
?>