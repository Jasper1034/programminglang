<?php
// 1. Load Composer's autoloader. The path might need to be adjusted based on where you place this file.
// Assuming your 'vendor' folder is right next to your PHP files:
require_once 'vendor/autoload.php';

// 2. Set up the Twig Loader. This tells Twig where to find your .html.twig files.
// We use '.' (current directory) because the templates are in the same folder as the PHP script running the render call.
$loader = new \Twig\Loader\FilesystemLoader('.');

// 3. Create the Twig Environment. This initializes the $twig object.
// Make sure this is in the global scope if you are using 'include()'.
$twig = new \Twig\Environment($loader, [
]);
?>

