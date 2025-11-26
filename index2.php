<?php
// Load Twig setup
include("twig_setup.php"); 

// 1. Render template. No data needs to be passed, as the client-side JS (AJAX) handles the data.
echo $twig->render('index2.html.twig', []);
?>

