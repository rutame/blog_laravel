<?php

    use Faker\Provider\File;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Input;
    use Illuminate\Support\Facades\Redirect;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\View;
    use Intervention\Image\Facades\Image;

    class UsuarioController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $usuarios = Usuario::all();

		return View::make('usuarios.index')->with('usuarios', $usuarios);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('usuarios.create');
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
            'nombre' => 'required|min:10',
            'telefono' => 'required|min:9',
            'email' => 'required|unique:usuarios,email|email',
            'foto' => 'required',
            'username' => 'required|unique:usuarios,username|min:5',
            'password' => 'required|unique:usuarios,password|between:5,8',
            'confirm_password' =>'same:password',
        );

        $mensajes = array(
            'required' => 'El campo :attribute es requerido',
            'min' => 'El campo :attribute debe tener :min caracteres',
            'between' => 'El campo :attribute debe estar entre :min y :max caracteres',
            'email' => 'El campo :attribute debe ser :email valido',
            'required' => 'El campo :attribute es obligatorio',
            'unique' => 'El :attribute ya está registrado',
            'same' => 'El campo :attribute debe ser igual',
        );

        $validator = Validator::make($data, $reglas, $mensajes);

        if ($validator->fails()){
            return Redirect::to('usuarios/create')
                ->withInput()->withErrors($validator);
        }

        $usuario = new Usuario();
        /*$usuario->fill($data);*/

        $rutafotoperfil = 'images/perfiles/'.Input::get('username').'/';
        if(!\Illuminate\Support\Facades\File::isDirectory($rutafotoperfil)){
            \Illuminate\Support\Facades\File::makeDirectory($rutafotoperfil, 0755, true);
        }
        //$foto_name = uniqid().'.jpg';

        //Input::file('foto')->move($rutafotoperfil, $foto_name);

        $foto_name = Input::get('username').'.jpg';

        Image::make(Input::file('foto'))->fit(30, 30)->save($rutafotoperfil.$foto_name);

        $usuario = Usuario::create(Input::all());
        //$usuario->nombre = Input::get('nombre');
        //$usuario->telefono = Input::get('telefono');
        $usuario->foto = $rutafotoperfil.$foto_name;
        $usuario->rol = 'admin';
        //$usuario->email = Input::get('email');
        //$usuario->username = Input::get('username');
        $usuario->password = Hash::make(Input::get('password'));

        // Guardarlo
        $usuario->save();
        /*Auth::attempt(array(
            'username' => $usuario->username,
            'password' => $usuario->password),true);*/
        Auth::loginUsingId($usuario->id);
        return Redirect::to('usuarios')->with('mensaje', 'Usuario creado');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$usuario = Usuario::findOrFail($id);
        return View::make('usuario.ver', compact('usuario'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $usuario = Usuario::findOrFail($id);

        return View::make('usuarios.edit', compact('usuario'));
    }


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$usuario = Usuario::findOrFail($id);


        if(Input::hasFile('foto')):
            if( Input::file('foto')->isValid()):
                $rutafotoperfil = 'images/perfiles/'.Input::get('username').'/';
                $foto_name = Input::get('username').'.jpg';
                \Illuminate\Support\Facades\File::delete($usuario->foto);
                Image::make(Input::file('foto'))->fit(30, 30)->save($rutafotoperfil.$foto_name);
            endif;
        endif;
        if(strlen(Input::get('password')) >= 5):
            $usuario->password = Hash::make(Input::get('password'));
        endif;
        $usuario->fill(Input::all());

        return Redirect::to('usuarios')->withMessage('mensaje', 'Usuario actualizado!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$usuario = Usuario::find($id);
        $usuario->delete();
        File::delete($usuario->foto);
        return Redirect::to('usuarios')->withMessage('mensaje', 'Usuario borrado');
	}


}
