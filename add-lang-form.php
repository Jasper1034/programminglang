<?php
include("twig_setup.php");
// No database connection needed for the form, just render it.
echo $twig->render('add-lang-form.twig', []);
?>

