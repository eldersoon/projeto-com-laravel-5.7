<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePostFormRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;

        $this->middleware('auth')
                    ->except([
                        'index', 'show'
                    ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post->with('user')->latest()->paginate();   
         /* 
        $listaNoticias = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select('posts.id', 'posts.title', 'posts.body', 'users.name', 'posts.image', 'posts.created_at')
            ->whereNull('deleted_at')
            ->whereNull('deleted_at');

        $listaNoticias = Post::listaNoticias();
        */

        return view('posts.index', compact('posts'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatePostFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePostFormRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $name = kebab_case($request->title);
            $extension = $request->image->extension();
            $nameImage = "{$name}.$extension";
            $data['image'] = $nameImage;

            $upload = $request->image->storeAs('img', $nameImage);

            if (!$upload)
                return redirect()
                            ->back()
                            ->with('errors', ['Falha no Upload'])
                            ->withInput();
        }

        $post = $request->user()
                            ->posts()
                            ->create($data);

        return redirect()
                    ->route('posts.index')
                    ->withSuccess('Notícia criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$post = $this->post->find($id))
            return redirect()->back();

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$post = $this->post->find($id))
            return redirect()->back();

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatePostFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePostFormRequest $request, $id)
    {
        if (!$post = $this->post->find($id))
            return redirect()->back();

        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Remove image if exists
            if ($post->image) {
                if (Storage::exists("posts/{$post->image}"))
                    Storage::delete("posts/{$post->image}");
            }
            
            $name = kebab_case($request->title);
            $extension = $request->image->extension();
            $nameImage = "{$name}.$extension";
            $data['image'] = $nameImage;

            $upload = $request->image->storeAs('posts', $nameImage);

            if (!$upload)
                return redirect()
                            ->back()
                            ->with('errors', ['Falha no Upload'])
                            ->withInput();
        }

        $post->update($data);

        return redirect()
                    ->route('posts.index')
                    ->withSuccess('Notícia atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$post = $this->post->find($id))
            return redirect()->back();

        $post->delete();

        return redirect()
                    ->route('posts.index')
                    ->withSuccess('Post deletado com sucesso!');
    }
}
