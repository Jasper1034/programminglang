<?php
include("twig_setup.php");
include("db.php");

// Get keyword
$keywords = $_POST['keywords'] ?? '';
// SECURITY: Escape the keyword before using it in the query
$keywords_safe = mysqli_real_escape_string($mysqli, $keywords);

// Run query
$sql = "SELECT * FROM programminglang WHERE lang_name LIKE '%{$keywords_safe}%' ORDER BY released_date";
$results = mysqli_query($mysqli, $sql);

// Convert results to json
$languages = mysqli_fetch_all($results, MYSQLI_ASSOC);
$count = count($languages);

// Render
echo $twig->render('search-lang.twig', [
    'languages' => $languages,
    'keyword' => $keywords,
    'count' => $count
]);
?>

