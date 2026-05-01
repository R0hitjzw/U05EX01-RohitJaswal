<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // afegit propi

class ApiController extends Controller
{
    // GET - lista tots posts
    public function index()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $posts = array_slice($response->json(), 0, 5);
        return view('posts', compact('posts'));
    }

    // GET - post per ID
    public function show($id)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts/' . $id);
        return response()->json($response->json());
    }

    // POST - crear post
    public function store(Request $request)
    {
        $response = Http::post('https://jsonplaceholder.typicode.com/posts', [
            'title'  => $request->title,
            'body'   => $request->body,
            'userId' => $request->userId,
        ]);
        return response()->json($response->json());
    }

    // PUT - actualitzar post
    public function update(Request $request, $id)
    {
        $response = Http::put('https://jsonplaceholder.typicode.com/posts/' . $id, [
            'title'  => $request->title,
            'body'   => $request->body,
            'userId' => $request->userId,
        ]);
        return response()->json($response->json());
    }

    // DELETE - eliminar post per id
    public function destroy($id)
    {
        $response = Http::delete('https://jsonplaceholder.typicode.com/posts/' . $id);
        return response()->json(['status' => 'eliminat', 'code' => $response->status()]);
    }
}