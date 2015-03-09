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
/*
Route::get('/', function()
{
	return View::make('hello');
});*/

// Rutas RestFul
Route::resource('/', 'IndexController');

// Rutas closure
Route::get('acercade', function(){
	return View::make('acercade');
});

Route::post('contacto', function(){

    $data = Input::all();


    $reglas =  array(
        'nombre' => 'required',
        'email' => 'required|email',
        'comentarios' => 'required|min:50',

    );

    $mensajes = array(
        'required' => 'Este campo es requerido',
        'min' => 'Has introducido pocos caracteres',
        'email' => 'debe ser un email valido'
    );




    $validacion = Validator::make($data, $reglas, $mensajes);

    if($validacion->fails()){
        //return $validacion->messages();

        return Redirect::to('acercade')->withErrors($validacion);
            //->with('mensaje', $mensaje)->withInput();
    }
    else{
        $mensaje = "Mensaje procesado con éxito!";

        return Redirect::to('acercade')
            ->with('mensaje', $mensaje)->withInput();
    }

});

/*Route::get('categoria', function(){
    return "Estás en Categorías";
});*/
Route::resource('categoria', 'CategoriaController');


Route::get('/admin', 'AdminController@index');

Route::resource('admin/usuarios', 'UsuarioController');
Route::resource('admin/categorias', 'CategoriaController');

