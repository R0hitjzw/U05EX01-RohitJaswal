<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Posts</title>
</head>
<body>
    <h1>Posts de l'API</h1>

    {{-- Secció de favorits --}}
    @if (count($favorits) > 0)
        <div style="background: #fff3cd; padding: 15px; margin-bottom: 20px;">
            <h2>⭐ Els meus favorits</h2>
            @foreach (Illuminate\Support\Facades\DB::table('favorits')->get() as $favorit)
                <p>{{ $favorit->post_id }}. {{ $favorit->title }}</p>
            @endforeach
        </div>
    @endif

    {{-- Llista de posts --}}
    @foreach ($posts as $post)
        <div style="border: 1px solid #ccc; margin: 10px; padding: 10px;">
            <h3>{{ $post['id'] }}. {{ $post['title'] }}</h3>
            <p>{{ $post['body'] }}</p>

            @if (in_array($post['id'], $favorits))
                <p>⭐ Ja és favorit</p>
                <form method="POST" action="/favorit/{{ $post['id'] }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar de favorits</button>
                </form>
            @else
                <form method="POST" action="/favorit">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post['id'] }}">
                    <input type="hidden" name="title" value="{{ $post['title'] }}">
                    <button type="submit">Afegir a favorits</button>
                </form>
            @endif
        </div>
    @endforeach
</body>
</html>