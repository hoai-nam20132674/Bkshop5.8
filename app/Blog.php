<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Blog extends Model
{
    //
    protected $table = 'blogs';




    public function addBlog($request) {
    	$file_name = $request->file('image')->getClientOriginalName();
    	$blog = new Blog;
    	$blog->users_id = Auth::user()->id;
    	$blog->url = $request->url;
    	$blog->seo_description = $request->seo_description;
    	$blog->seo_keyword = $request->seo_keyword;
    	$blog->content = $request->content;
    	$blog->title = $request->title;
    	$blog->share_image = $file_name;
    	$request->file('image')->move('uploads/images/blogs/',$file_name);
    	$blog->display = $request->display;
    	$blog->views = 0;
    	$blog->save();

    }
}
