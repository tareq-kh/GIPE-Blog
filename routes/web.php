<?php
use App\Http\Controllers;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlogPostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/',[\App\Http\Controllers\InternalAreaController::class, 'home'])->name('home.index');

//Route::get('/contact',[InternalAreaController::class, 'contact'])->name('home.contact');



//Route::get('/posts', function () use($posts){

//    return view('posts.index', ['posts'=> $posts]);
//})->name('posts.index');


//Route::get('/posts/{id}', function ($id) use($posts){

 //   abort_if(!isset($posts[$id]),404);

 //   return view('posts.show', ['post'=> $posts[$id]]);
//})->name('posts.show');

//Route::get('/recent-posts/{days_ago?}', function ($days_ago = 20) {
//   return 'posts from ' .$days_ago . ' days ago';
//})->name('posts.recent.index');
//Route::resource('blogposts',\App\Http\Controllers\BlogPostController::class)->only('createComment');


Route::get('/',[Controllers\HomeController::class, 'home'])->name('home.index');
Route::get('/home',[Controllers\HomeController::class, 'index'])->name('home.home');
Route::get('/contact',[Controllers\HomeController::class, 'contact'])->name('home.contact');
Route::resource('blogposts',BlogPostController::Class);//->only('index', 'show','create');
Route::resource('author',AuthorController::class);//->only('index', 'show','create');
Route::resource('comment',Controllers\CommentController::Class);
Auth::routes();
