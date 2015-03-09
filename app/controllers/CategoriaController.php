<?php

    use Illuminate\Support\Facades\View;

    class CategoriaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $categorias = Categoria::all();

		Return View::make('categorias.index')->with('categorias', $categorias);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('categorias.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
    {
        $data = Input::all();

        $reglas = array(
            'nombre' => 'required|unique:categorias|min:5',
            'descripcion' => 'required|min:15',
        );

        $mensajes = array(
            'required' => 'El campo :attribute es requerido',
            'min' => 'El campo :attribute requiere un mínimo de :min caracteres',
            'unique' => 'El campo :attribute debe ser único',
        );

        $validator = Validator::make($data, $reglas, $mensajes);

        if ($validator->fails()){
            return Redirect::to('categorias/create')->withErrors($validator)->withInput();
        }

        $categoria = new Categoria();
        $categoria->nombre = Input::get('nombre');
        $categoria->descripcion = Input::get('descripcion');
        $categoria->save();

        $id = $categoria->id;

        return Redirect::to('categorias')->with('mensaje', 'Categoría creada con éxito!');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $categorias = Categoria::find($id);

        Return View::make('categorias.view')->with('categoria', $categorias);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $categorias = Categoria::find($id);
        Return View::make('categorias.edit')->with('categoria', $categorias);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
