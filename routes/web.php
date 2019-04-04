<?php

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

use Illuminate\Http\Request;

Route::get('/', function () {
    $links = \App\Link::latest()->paginate(10);
//echo '<pre>'; print_r($links);
    return view('welcome', ['links' => $links]);
//    return view('welcome');
});

Auth::routes();

Route::get('/home', function() {
    return redirect('/user');
})->name('home');

Route::get('/submit', function() {
    return view('submit');
});



Route::post('/submit', function(Request $request) {
    $validator = Validator::make($request->all(), [
                'title' => 'required|max:255',
                'url' => 'required|max:255',
                'description' => 'required|max:255',
    ]);
    if ($validator->fails()) {
        return back()
                        ->withInput()
                        ->withErrors($validator);
    }
    $link = new \App\Link;
    $link->title = $request->title;
    $link->url = $request->url;
    $link->description = $request->description;
    $link->save();
    return redirect('/');
});


Route::get('/form', function() {
    return view('form');
});

Route::post('/processform', function(Request $request) {

    $formdata = $request->all();
    echo $formdata['email'];
    echo $request->input('email');
    $multi = $request->get('multipleselect');

    echo'<pre>';
    print_r($multi);
    print_r($formdata);
});


Route::get('localization/{locale}', 'LocalizationController@index');

Route::get('role', [
    'middleware' => 'Role:editor',
    'uses' => 'TestController@index',
]);

Route::get('terminate', [
    'middleware' => 'terminate',
    'uses' => 'TestTerminateMiddleWController@index',
]);

Route::get('testcustommiddleware', function() {
    
})->middleware('Age');


Route::get('/account/register1', [
    'as' => 'register1',
    'uses' => 'TestTerminateMiddleWController@index'
]);

Route::view('admin', 'form')->name('admin');

Route::get('/table/{number?}', 'TableController@create')->where('number', '[0-9]+');

//The best part is that you do not need to define all the CRUD routes individually in the web.php file.Just define the resource route for the controller in web.php file:
//This single declaration will create several routes to handle BooksController requests. 
Route::resource('book', 'BookController');

//Route::resource('book', 'BookController', ['only' => [
//        'index', 'show'
//]]);
//Route::resource('book', 'BookController', ['except' => [
//        'create', 'store', 'update', 'destroy'
//]]);

Route::get('/testmiddle/path', [
    'middleware' => 'First',
    'uses' => 'TestMiddleController@showPath'
]);



//Route::resource('test', 'ImplicitController');
Route::resource('user', 'UserController');
Route::post('/usersubmit', 'UserController@store');

//Route::get('/', function() {
//    return View::make('pages.home');
//});
//Route::get('/about', function() {
//    return View('pages.about');
//});



Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles', 'RoleController');

    Route::resource('users', 'UserController');

    Route::resource('products', 'ProductController');

    Route::resource('permissions', 'PermissionController');
});


Route::get('/blade', function() {
    return view('bladetemplate');
});

Route::delete('/user/ajax/{id}', 'UserController@destroyajax')->name('users.destroyajax');
Route::get('/role/ajaxShow/{id}', 'RoleController@ajaxShow')->name('roles.ajaxShow');


Route::get('/db', 'UseOfEloquentModelController@index');
