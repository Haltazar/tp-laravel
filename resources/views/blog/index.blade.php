<!-- resources/views/blog/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des blogs</title>
</head>
<body>
    <h1>Liste des blogs</h1>
    <ul>
        @foreach ($blogs as $blog)
            <li>{{ $blog->title }}</li>
        @endforeach
    </ul>
</body>
</html>
