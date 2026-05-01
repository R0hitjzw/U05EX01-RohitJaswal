<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Favorit;

class PostController extends Controller
{
    // Mostrar posts de l'API + favorits de la BD
    public function index()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $posts = array_slice($response->json(), 0, 10);
        $favorits = Favorit::pluck('post_id')->toArray();
        return view('posts.index', compact('posts', 'favorits'));
    }

    // Guardar favorit a la BD
    public function store(Request $request)
    {
        Favorit::create([
            'post_id' => $request->post_id,
            'title'   => $request->title,
        ]);
        return redirect('/posts');
    }

    // Eliminar favorit de la BD
    public function destroy($id)
    {
        Favorit::where('post_id', $id)->delete();
        return redirect('/posts');
    }
}