<?php

    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Input;
    use Illuminate\Support\Facades\Redirect;
    use Illuminate\Support\Facades\View;
    use Intervention\Image\Facades\Image;

    class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::orderBy('created_at', 'desc')->paginate(5);

        return View::make('posts.index')->with('posts', $posts);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $categorias = Categoria::lists('nombre', 'id');

		return View::make('posts.create')
            ->with('categorias', $categorias);
	}


	/**
	 * Store a newly created resource in storage.
	 * Manipulación de imágenes con Intervention
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();

        $reglas = array(
            'titulo' => 'required',
            'resumen' => 'required',
            'tag' => 'required',
            'cuerpo' => 'required|min:20',
            'fecha' => 'required|date_format: d/m/Y',
            'foto' => 'required');
        $mensajes = array(
            'required' => 'El campo :attribute es requerido',
            'min' => 'El campo :attribute debe tener un mínimo de :min caracteres',
            'date' => 'El campo :attribute debe tener el formato :date_format');


        $validator = Validator::make($input, $reglas, $mensajes);

        if($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }

		$post = new Post();

        $tags = Input::get('tags');

        $etiquetas = explode(',', $tags);




        $post->titulo = Input::get('titulo');
        $post->resumen = Input::get('resumen');
        $post->fecha = Input::get('fecha');
        $post->cuerpo = Input::get('cuerpo');

        $post->usuario_id = Auth::user()->id;
        $post->username = Auth::user()->username;

        $post->categoria_id = Input::get('categoria');

        // Manipulación de imagenes
        if(Input::hasFile('foto'))
        {
            $imagen = Input::file('foto');
            $ruta = 'images/posts/';

            if (!File::isDirectory($ruta)):
                File::makeDirectory($ruta, 0775, true); // Recursivo
            endif;


            // Regla de validación: required: serían todos o required|mimetyps
            $rules = array('file' => 'required|image');
            $validator = Validator::make(array('file' => $imagen), $rules);

            if ($validator->passes())
            {
                $tipo = $imagen->getMimeType();
                $real_path = $imagen->getRealPath();

                switch ($tipo)
                {
                    case 'image/jpg':
                    case 'image/jpeg':
                        $ext = '.jpg';
                        break;
                    case 'image/png':
                    case 'image/pneg':
                        $ext = '.png';
                        break;
                    case 'image/gif':
                        $ext = '.gif';
                        break;
                }

                $foto_name = uniqid() . $ext;
                //$imagen->move($ruta, $foto_name);

                /*
                Resize intervention
                 Crop comienza desde el centro width, height, X del top-left (opcional), Y top-left(opcional)
                */
                $ancho_in = Image::make($imagen)->width();
                $alto_in = Image::make($imagen)->height();

                if ($ancho_in > 800)
                {
                    $ancho_out = 800;
                    $prop = $ancho_in / $ancho_out;
                    $alto_out = $alto_in / $prop;
                    $alto_out = (int)$alto_out;


                    Image::make($real_path)->resize($ancho_out, $alto_out)->save($ruta.$foto_name);

                    //Image::make($real_path)->crop($ancho_out, $alto_out)->insert($ruta . '_crop_'.$foto_name);
                    /*Image::make($real_path)->crop($ancho_out, 200)->save($ruta.$foto_name);*/
                }

                $post->foto = $ruta . $foto_name;

            } else
            {
                return Redirect::to('posts/create')
                    ->withInput()->withErrors($validator);
            }

        }
        // Usando un helper associate
        //$usuario = new Usuario();
        //$post->usuario()->associate($usuario);

        $post->save();

        foreach($etiquetas as $etiqueta):
            $tag = new Tag();
            $tag->nombre = $etiqueta;
            $tag->save();
            $post->tags()->attach($post->id);
        endforeach;

        return Redirect::to('posts')->with('mensaje', 'Post creado!');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $categorias = Categoria::lists('nombre', 'id');
        $post = Post::findOrFail($id);

		return View::make('posts.edit', compact('post'))->with('categorias',$categorias);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

        // aqui validacion
        $post = Post::findOrFail($id);
//        $post->fill(Input::all());


        $usuario = Auth::user()->username;

        $tags = Input::get('tags');

        $etiquetas = explode(',', $tags);


        foreach($etiquetas as $etiqueta):
            $tag = new Tag();
            $tag->nombre = $etiqueta;
            $tag->save();
//            $tag->posts()->save($post);
            $post->tags()->attach($id);
        endforeach;



            /*$post->tags()->attach($id);*/




        $post->titulo = Input::get('titulo');
        $post->resumen = Input::get('resumen');
        $post->cuerpo = Input::get('cuerpo');
        $post->usuario_id = Auth::user()->id;
        $post->username = $usuario;
        $post->categoria_id = Input::get('categoria_id');

        // Foto
        if(Input::hasFile('foto'))
        {
        $imagen = Input::file('foto');
        $real_path = $imagen->getRealPath();
        $tipo = Input::file('foto')->getMimeType();

            switch($tipo)
            {
                case 'image/jpg': case 'image/jpeg': $ext = '.jpg'; break;
                case 'image/png': case 'image/pneg': $ext = '.png'; break;
                case 'image/gif': $ext = '.gif'; break;
            }

            $ruta = 'images/posts/';
            File::delete($post->foto); // Borrar la anterior

            $foto_name = uniqid().$ext;

            $ancho_in = Image::make($imagen)->width();
            $alto_in = Image::make($imagen)->height();

            if ($ancho_in > 800)
            {
                $ancho_out = 800;
                $prop = $ancho_in / $ancho_out;
                $alto_out = $alto_in / $prop;
                $alto_out = (int)$alto_out;

                Image::make($real_path)->resize($ancho_out, $alto_out)->save($ruta.$foto_name);
                //Image::make($real_path)->crop($ancho_out, 200)->save($ruta.$foto_name);
            }

            $post->foto = $ruta.$foto_name;
        }

            $post->save();
            return Redirect::to('posts')->with('mensaje', 'Post actualizado');

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::find($id);

        File::delete($post->foto);
        $post->delete();
        return Redirect::to('posts')->with('mensaje', 'Has borrado un post!');
	}


}
