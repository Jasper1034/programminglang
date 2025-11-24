<h1>Search results</h1>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php
// Connect to database and run SQL query
include("db.php");
// Read value from form
$keywords = $_POST['keywords'];
// Run SQL query
$sql = "SELECT * FROM programminglang
WHERE lang_name LIKE '%{$keywords}%'
ORDER BY released_date";
$results = mysqli_query($mysqli, $sql);
?>
<table class="table table-dark table-striped table-hover">
    <tr class="table-light">
        <th>Lang ID</th>
        <th>Lang Name</th>
        <th>Ratings</th>
        <th>Released Date</th>
    </tr>
    <?php while($a_row = mysqli_fetch_assoc($results)):?>
    
    <tr>
        <td><?=$a_row['lang_id']?></td>
        <td><?=$a_row['lang_name']?></td>
        <td><?=$a_row['rating']?></td>
        <td><?=$a_row['released_date']?></td>
    </tr>
    <?php endwhile;?>
</table>
