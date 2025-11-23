<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>add a lang</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
crossorigin="anonymous">
</head>
<body>
<div class="container">
<h1>Add a Programming language name</h1>
<form action="add-lang.php" method="post">
<div class="mb-3">
<label for="LangName" class="form-label">Lang name</label>
<input type="text" class="form-control" id="LangName" name="LangName">
</div>
<div class="mb-3">
<label for="LangDescription" class="form-label">Description</label>
<textarea class="form-control" id="LangDescription" name="LangDescription" rows="5"></textarea>
</div>
<div class="mb-3">
<label for="DateReleased" class="form-label">Date released</label>
<input type="date" class="form-control" id="DateReleased" name="DateReleased">
</div>
<div class="mb-3">
<label for="LangRating" class="form-label">Rating</label>
<input type="number" class="form-control" id="LangRating" name="LangRating" step="0.1" 
    min="0"
    max="5">
</div>
<input type="submit" class="btn btn-primary" value="Add Langugae">
</form>
</div>
</body>
</html>