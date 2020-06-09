<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
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

    // public function postEditPage(Page $page, Request $r) {

    //     if($r->id != $page->id) abort('403', 'Wrong page');
        
    //     $page->page_intro = $r->page_intro;
    //     $page->section_title = $r->section_title;
    //     $page->content = $r->page_content;
    //     $page->button_text = $r->button_text;
    //     $page->button_link = $r->button_link;
    //     $page->alt = $r->alt;
    //     $page->image = $r->image->store('uploads', 'public');
    //     $page->image = '/storage/'.$page->image;

    //     // if($r->hasFile('image')) {
    //         // dd($r->image);
    //         // $page->image = $r->image->store('uploads', 'public');
    //         // $page->image = '/storage/'.$page->image;
    //         // $file = request()->image->store('uploads', 'public');
    //         // $page->image = '/storage/'.$file;
    //     // }

    //     $page->save();

    //     return redirect()->route('page.index');
    // }


    public function postEditPage($id, Request $r) {

        // dd($r);

        $page_data = [
            'en' => [
                'page_title' => $r->input('en_page_title'),
                'page_intro' => $r->input('en_page_intro'),
                'section_title' => $r->input('en_section_title'),
                'content' => $r->input('en_content'),
                'button_text' => $r->input('en_button_text'),
                'button_link' => $r->input('en_button_link')
            ],
            'nl' => [
                'page_title' => $r->input('nl_page_title'),
                'page_intro' => $r->input('nl_page_intro'),
                'section_title' => $r->input('nl_section_title'),
                'content' => $r->input('nl_content'),
                'button_text' => $r->input('nl_button_text'),
                'button_link' => $r->input('nl_button_link')
            ],
         ];

         $page = Page::findOrFail($id);
         $page->update($page_data);

        // Redirect to the previous page successfully    
        return redirect()->route('page.index');

    }

    public function getIndexBlog() {

        $posts = Post::all();
        
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

        $post = Post::find($id);
        $image_path = $post->image;


        // dd($r->image);

        $post->title = $r->post_title;
        $post->intro = $r->post_intro;
        $post->body = $r->post_body;
        $post->slug = $r->post_title;
        $post->alt = $r->post_alt;
        $post->image = $r->image->store('uploads', 'public');
        $post->image = '/storage/'.$post->image;


        // if($r->hasFile('image')) {
        //     File::delete(public_path($image_path));
        //     $file = request()->image->store('uploads', 'public');
        //     $post->image = '/storage/'.$file;
        // }

        $post->save();

        return redirect()->route('blog.index');
    }

    public function postDeleteBlog($id) {

        $post = Post::find($id);
        $post-> delete();

        return redirect()->route('blog.index');
    }

    public function postCreateBlog() {

        return view('dashboard.blog.create');
    }

    public function postStoreBlog(Request $r) {

        $post = new Post();
        
        $post->title = request('post_title');
        $post->intro = request('post_intro');
        $post->body = request('post_body');
        $post->slug = Str::snake(request('post_title'));
        $post->alt = request('alt');
        $post->image = request()->image->store('uploads', 'public');
        $post->image = '/storage/'.$post->image;

        $post->save();

        return redirect()->route('blog.index');
    }

}
