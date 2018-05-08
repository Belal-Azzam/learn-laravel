<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Post;

Route::get('/', function () {

    return view('welcome');
});
//Route::get('/post/{id}', 'PostsController@index');

Route::resource('posts', 'PostsController');

Route::get('/contact', 'PostsController@contact');


Route::get('post/{id}', 'PostsController@show_post');

Route::get('/insert',function ()
{
    DB::insert('INSERT INTO posts (title, body) VALUES(?, ?)', ['php with laralvel2', 'Laravel is the best thing to h222appen']);
});
//Route::get('/read',function ()
//{
//    $results = DB::select('select * from posts where id = ?', [1]);
//    foreach($results as $post){
//        return $post->title;
//    }
//});

//Route::get('/update',function ()
//{
//    $updated = DB::update('update posts set title= "updated title" where id = ?', [1]);
//        return $updated;
//});

Route::get('/delete',function ()
{
    $deleted = DB::delete('delete from posts  where id = ?', [1]);
        return $deleted;
});


Route::get('/read2',function ()
{
    $posts = Post::all();

    return $posts;
});


Route::get('/find',function ()
{
    $post = Post::find(1);

//    foreach($posts as $post){
        return $post;
//    }
});


Route::get('/findwhere',function ()
{
    $post = Post::where('id',2)->orderBy('id','desc')->take(1)->get();

//    foreach($posts as $post){
        return $post;
//    }
});

Route::get('/findmore',function ()
{
//    $post = Post::findOrFail(1);
    $post = Post::where('users_count', '<', 50)->firstOrFail();

//    foreach($posts as $post){
        return $post;
//    }
});


Route::get('/basicinsert',function ()
{
//    $post = Post::findOrFail(1);
    $post = new Post;
    $post->title = 'new orm title';
    $post->body = 'wow eloquent is realy kook';
    $post->save();

});

Route::get('/basicinsert',function ()
{
//    $post = Post::findOrFail(1);
    $post = new Post;
    $post->title = 'new orm title';
    $post->body = 'wow eloquent is realy kook';
    $post->save();

});

Route::get('/create',function ()
{
//    $post = Post::findOrFail(1);
    Post::create([ 'title' => 'the create method', 'body' => 'bery long body man' ]);

});

Route::get('/update',function ()
{
//    $post = Post::findOrFail(1);
    Post::where('id',2)->where('is_admin',0)->update(['title' => 'updated title']);

});

Route::get('/delete',function ()
{
//    $post = Post::findOrFail(1);
    $post = Post::find(1);
    $post->delete();

});


Route::get('/delete2',function ()
{
//    $post = Post::findOrFail(1);
    Post::destroy([4,5]);
    Post::where(['is_adming',true])->delete();
});




Route::get('/softdelete',function ()
{
        Post::find(3)->delete();

    });


Route::get('/readsoftdelete',function ()
{
        $post = Post::withTrashed()->where('id',3)->get();
        return $post;

    });


Route::get('/restore',function ()
{
        Post::withTrashed()->where('is_admin',0)->restore();


    });

Route::get('/forcedelete',function ()
{
    Post::onlyTrashed()->where('is_admin',0)->forceDelete();


});

//Route::get('/about', function () {
//    return view('welcome');
//});
//Route::get('/contact', function () {
//    return view('welcome');
//});Route::get('/post/{id}/{name}', function ($id) {
//    return view('welcome');
//});
//
//Route::get('admin/posts/example',array('as' => 'admin.home',function (){
//    $url = route('admin.home');
//
//    return 'this url is '. $url;
//}));