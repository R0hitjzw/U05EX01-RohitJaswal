<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Posts de l'API</title>
</head>
<body>
    <h1>Posts de JSONPlaceholder</h1>

    @foreach ($posts as $post)
        <div style="border: 1px solid #ccc; margin: 10px; padding: 10px;">
            <h3>{{ $post['id'] }}. {{ $post['title'] }}</h3>
            <p>{{ $post['body'] }}</p>
        </div>
    @endforeach
</body>
</html>