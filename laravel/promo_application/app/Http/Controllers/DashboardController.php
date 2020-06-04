<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Input;
use App\Page;
use App\Post;

class DashboardController extends Controller
{
    public function getIndexPages() {

        $pages = Page::all();

        return view('dashboard.pages.index', [
            'pages' => $pages
        ]);
    }

    public function getEditPage(Page $page) {
        
        return view('dashboard.pages.edit', ['page' => $page]);
    }

    public function postEditPage(Page $page, Request $r) {

        // dd($r);

        if($r->id != $page->id) abort('403', 'Wrong page');
        
        $page->page_intro = $r->page_intro;
        $page->section_title = $r->section_title;
        $page->content = $r->page_content;
        $page->button_text = $r->button_text;

        $page->image = request()->image->store('uploads', 'public');
        $page->image = '/storage/'.$page->image;

        if($r->hasFile('image')) {
            $file = request()->image->store('uploads', 'public');
            $page->image = '/storage/'.$file;
        }

        $page->save();

        return redirect()->route('page.index');
       
    }

    public function getIndexBlog() {

        $posts = Post::all();

        // dd($posts);
        
        return view('dashboard.blog.index', [
            'posts' => $posts
        ]);
    }

    public function getEditBlog($id) {

        $post = Post::find($id);
        
        return view('dashboard.blog.edit', [
            'post' => $post
        ]);
    }

    public function postEditBlog(Request $r, $id) {

        // dd($r);

        $post = Post::find($id);

        $post->title = $r->post_title;
        $post->intro = $r->post_intro;
        $post->body = $r->post_body;
        $post->slug = $r->post_title;

        $post->save();

        return redirect()->route('blog.index');
    }

    public function postDeleteBlog($id) {

        // dd($r);

        $post = Post::find($id);
        $post-> delete();

        return redirect()->route('blog.index');
    }

    public function postCreateBlog() {

        return view('dashboard.blog.create');
    }

    public function postStoreBlog(Request $r) {

        // dd($r);

        $post = new Post();
        
        $post->title = request('post_title');
        $post->intro = request('post_intro');
        $post->body = request('post_body');
        $post->slug = Str::snake(request('post_title'));
        $post->alt = request('alt');
        $post->image = request()->image->store('uploads', 'public');
        $post->image = '/storage/'.$post->image;

        // dd($post);

        $post->save();

        return redirect()->route('blog.index');
    }

}
