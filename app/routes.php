<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

    use Illuminate\Support\Facades\Input;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\View;



  // Publica un comentario
    Route::post('comentario', function ()
    {
        $post = new Post();
        $comentario = new Comentario();
        $comentario->nombre = Input::get('nombre');
        $comentario->comentario = Input::get('comentario');
        $comentario->save();
        $comentario->post()->save($post);
    });

Route::get('contacto', function(){
    return View::make('contacto.index');
});
/*
Route::get('/', function(){
    //$posts = Post::get();
    /*$post = new Post();*/

    /*return $post->categoria()->get();*/
    //return View::make('posts.publico', compact('posts'));

    // Mas pruebas
    /*foreach(Post::with('categoria')->get() as $post)
    {
        echo $post->categoria->nombre;

    }*/

/*    $posts = Post::with('categoria')->get();
    $categorias = Categoria::get(array('id', 'nombre'));

    return View::make('posts.publico', compact('posts'))->with('categorias', $categorias);
});*/

    // Públicas
   // Route::controller('/', 'IndexController');
    Route::controller('index', 'IndexController');


    /*Route::resource('contacto', 'ContactoController');*/
    Route::resource('acercade', 'AcercadeController');


// Hacer login
    Route::get('login', 'LoginController@index');
    Route::post('login', 'LoginController@comprueba');
    Route::get('logout', 'LoginController@logout');

// Administracion
Route::group(array('before' => 'auth'), function(){
    Route::resource('categorias', 'CategoriaController');
    Route::resource('posts', 'PostController');
});
    Route::resource('usuarios', 'UsuarioController');

    /*Route::resource('usuarios/create', 'UsuarioController',
        array('except'=>array('index')));*/




