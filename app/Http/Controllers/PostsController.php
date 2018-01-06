<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Posts;
use App\User;
use Redirect;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // this functions just we used for front end
     // i'll create new controllers on Auth directory for back end
    public function index()
    {
        //fetch 5 posts from database which are active and latest
        $posts = Posts::where('active',1)->orderBy('created_at')->paginate(1);
        // page Heading
        $title = 'Latest Post';
        // return to our view (home.blade.php)
        return view('home')->withPosts($posts)->withTitle($title);
    }

    // index dashboard
    public function indexDashboard(){
        return view('admin/index');
    }

    // we need to show the single page of our Posts
    public function show($slug){
        $post = Posts::where('slug', $slug)->first();
        if (!$post){
            return redirect('/')->withErrors('requested page not found');
        }
        $comments = $post->comments;
        return view('posts.show')->withPost($post)->withComments($comments);
    }

}
