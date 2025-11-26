<?php
include("twig_setup.php");
include("db.php");

// 1. Get keyword
$keywords = $_POST['keywords'] ?? '';
// SECURITY: Escape the keyword before using it in the query
$keywords_safe = mysqli_real_escape_string($mysqli, $keywords);

// 2. Run query
$sql = "SELECT * FROM programminglang WHERE lang_name LIKE '%{$keywords_safe}%' ORDER BY released_date";
$results = mysqli_query($mysqli, $sql);

// 3. Convert results
$languages = mysqli_fetch_all($results, MYSQLI_ASSOC);
$count = count($languages);

// 4. Render
echo $twig->render('search-lang.html.twig', [
    'languages' => $languages,
    'keyword' => $keywords,
    'count' => $count
]);
?>

