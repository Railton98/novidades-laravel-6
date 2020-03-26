<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post->orderBy('id', 'DESC')->paginate(10);

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->post->create($request->all());

            flash('Post criado com sucesso!')->success();
            return redirect()->route('posts.index');
        } catch(\Exception $e) {
            if(env('APP_DEBUG')) {
                flash($e->getMessage())->warning();

                return redirect()->back();
            }

            flash('Post não foi criada com sucesso!')->warning();
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        try {
            return view('posts.show', compact('post'));
        } catch(\Exception $e) {
            if(env('APP_DEBUG')) {
                flash($e->getMessage())->warning();
                return redirect()->back();
            }

            flash('Post não encontrado...')->warning();
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        try {
            return view('posts.edit', compact('post'));
        } catch(\Exception $e) {
            if(env('APP_DEBUG')) {
                flash($e->getMessage())->warning();
                return redirect()->back();
            }

            flash('Post não encontrado...')->warning();
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        try {
            $post->update($request->all());

            flash('Post atualizado com sucesso!')->success();
            return redirect()->route('posts.index');
        } catch(\Exception $e) {
            if(env('APP_DEBUG')) {
                flash($e->getMessage())->warning();
                return redirect()->back();
            }
            flash('Post não foi atualizado...')->warning();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try {
            $post->delete();

            flash('Post removido com sucesso!')->success();
            return redirect()->route('posts.index');
        } catch(\Exception $e) {
            if(env('APP_DEBUG')) {
                flash($e->getMessage())->warning();
                return redirect()->back();
            }

            flash('Post não pode ser removido...')->warning();
            return redirect()->back();
        }

    }
}
