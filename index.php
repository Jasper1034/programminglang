<?php
include("twig_setup.php"); 

// LOGIC: Connect to database and fetch data 
include("db.php");
$sql = "SELECT * FROM programminglang ORDER BY lang_id";
$results = mysqli_query($mysqli, $sql);

// Convert results to a PHP array for Twig to use
$languages = mysqli_fetch_all($results, MYSQLI_ASSOC);

// RENDER: Pass data to the template
echo $twig->render('index.twig', [
    'languages' => $languages,
]);
?>