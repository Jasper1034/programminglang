<html lang="en">
<body>
<h1>List of ALL my Languages!!!</h1>
<?php
// Connect to database
include("db.php");
// Run SQL query
$sql = "SELECT * FROM programminglang ORDER BY released_date";
$results = mysqli_query($mysqli, $sql);
?>
<table>
<?php while($a_row = mysqli_fetch_assoc($results)):?>
<tr>
<td><?=$a_row['lang_name']?></td>
<td><?=$a_row['rating']?></td>
</tr>
<?php endwhile;?>
</table>



<a href="add-lang-form.php" class="btn btn-primary">Add a Lang</a>
</body>
</html>