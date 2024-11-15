<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Gumilar','title' => 'About Page']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog Page', 'posts'=>[
        ['id' => '1',
        'slug' => 'artikel-1',
        'title' => 'Artikel 1',
        'author' => 'Gumilar',
        'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero eaque autem voluptate ipsum corrupti maxime odio ipsam ipsa esse quae dolor debitis quis magnam asperiores, deleniti accusantium dolorem consequuntur soluta!'],

        ['id' => '2',
        'slug' => 'artikel-2',
        'title' => 'Artikel 2',
        'author' => 'Gumilar',
        'body' => 'SIUU alakekln newk amet consectetur adipisicing elit. Libero eaque autem voluptate ipsum corrupti maxime odio ipsam ipsa esse quae dolor debitis quis magnam asperiores, deleniti accusantium dolorem consequuntur soluta!'],
    ]]);
});

Route::get('/contact', function () {
    return view('contact', ['name' => 'Gumilar','title' => 'Contact Page']);
});

Route::get('/posts/{slug}', function ($slug) {
   $posts = [ 
        [
        'id' => '1',
        'slug' => 'artikel-1',
        'title' => 'Artikel 1',
        'author' => 'Gumilar',
        'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero eaque autem voluptate ipsum corrupti maxime odio ipsam ipsa esse quae dolor debitis quis magnam asperiores, deleniti accusantium dolorem consequuntur soluta!'],

    [
        'id' => '2',
        'title' => 'Artikel 2',
        'slug' => 'artikel-2',
        'author' => 'Gumilar',
        'body' => 'SIUU alakekln newk amet consectetur adipisicing elit. Libero eaque autem voluptate ipsum corrupti maxime odio ipsam ipsa esse quae dolor debitis quis magnam asperiores, deleniti accusantium dolorem consequuntur soluta!']
    ];

    $post = Arr::first($posts, function($post) use ($slug){
        return $post['slug'] == $slug;
    });

    return view('post', ['title' => 'single post', 'post' => $post]);
});
