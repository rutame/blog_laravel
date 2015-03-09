<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

    public function migaPan($url){
        $array = explode('/', $url);
        $ruta = array_pop($array);
        return $ruta;
    }

    /**
     * Sube multiples imágenes
     * @param $imagen
     * @return string
     */
    public function imagenUpload($imagenes, $titulo = null, $fecha_= null, $id, $post)
    {

        $usuario = Auth::user()->username;
        //$ruta = 'images/evento/'.$usuario.'/'.$titulo.'/'.$fecha_;
        $ruta = 'images/posts/'.$usuario;

        if(!File::isDirectory($ruta)):
            File::makeDirectory($ruta, 0775, true); // Recursivo
        endif;
        // haz uno

        foreach($imagenes as $imagen ):
            $foto = new Foto();
            // Regla de validación: required: serían todos o required|mimetyps
            $rules = array('file'=>'required|mimes:png,gif,jpeg');
            $validator = Validator::make(array('file'=>$imagen), $rules);

            if($validator->passes()){
                $tipo = $imagen->getMimeType();

                switch($tipo)
                {
                    case 'image/jpg': case 'image/jpeg': $ext = '.jpg'; break;
                    case 'image/png': case 'image/pneg': $ext = '.png'; break;
                    case 'image/gif': $ext = '.gif'; break;
                }
                $foto_name = uniqid().$ext;

                $imagen->move($ruta, $foto_name);
                //return $foto_name;
                /*$foto->nombre = $foto_name;
                $foto->evento_id = $id;
                $foto->save();*/

                $post->fotos()->save($foto);
            }
            else{
                return Redirect::to('posts/create')
                    ->withInput()->withErrors($validator);
            }

        endforeach;

    }

    public function validador($input)
    {
        $reglas = array(
            'titulo' => 'required',
            'detalle' => 'required|min:20',
            'fecha' => 'required|date_format: d/m/y');
        $mensajes = array(
            'required' => 'El campo :attribute es requerido',
            'min' => 'Descripción demasiado corta',
            'date' => 'La fecha es necesaria');

        //$input = Input::all();
        $validator = Validator::make($input, $reglas, $mensajes);

        if($validator->fails()) {
//            return Redirect::to('eventos/create')->withInput()->withErrors($validator);
            return Redirect::back()->withInput()->withErrors($validator);
        }
    }

}
