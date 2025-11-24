<html lang="en">
    <head>
        <title>
            Programming Languages
        </title>
        <style>
            *{
                text-align: center;

            }
            table {
        width: 75%;
        margin-top: 20;
        margin-left: 15;
        margin-right: 15;
    }
    th, td {
        text-align: center;
        vertical-align: middle; 
    }
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>
<body>
<h1>List of ALL my Languages!!!</h1>
<?php
// Connect to database
include("db.php");
// Run SQL query
$sql = "SELECT * FROM programminglang ORDER BY lang_id";
$results = mysqli_query($mysqli, $sql);
?>






<form action="search-lang.php" method="post">
    
<div class="Search-button">
    <input type="text" class name="keywords" placeholder="Search">

    <input type="submit" class="btn btn-primary" value="Go!">
</div>

</form>







<table class="table table-dark table-striped table-hover">
    <tr class="table-light">
        <th>Lang ID</th>
        <th>Lang Name</th>
        <th>Ratings</th>
        <th>Released Date</th>
        <th></th> <th></th>
    </tr>
    <?php while($a_row = mysqli_fetch_assoc($results)):?>
    
    <tr>
        <td><?=$a_row['lang_id']?></td>
        <td><a href="lang-details.php?id=<?=$a_row['lang_id']?>"><?=$a_row['lang_name']?></a></td>
        <td><?=$a_row['rating']?></td>
        <td><?=$a_row['released_date']?></td>
        <td><a class="btn btn-outline-danger" href="delete-lang.php?id=<?=$a_row['lang_id']?>" role="button">Delete</a></td>
        <td><a class="btn btn-outline-warning" href="edit-lang-form.php?id=<?=$a_row['lang_id']?>" role="button">Edit</a></td>
    </tr>
    <?php endwhile;?>
</table>



<a href="add-lang-form.php" class="btn btn-primary">Add a Lang</a>
</body>
</html>