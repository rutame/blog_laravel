<?php

    use Illuminate\Support\Facades\Input;
    use Illuminate\Support\Facades\Redirect;
    use Illuminate\Support\Facades\View;

    class IndexController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        $posts = Post::with('categoria')->orderBy('created_at', 'desc')->get();
        $categorias = Categoria::has('posts')->get(array('id', 'nombre'));
        $tags = Tag::orderBy(DB::raw('RAND()'))->get();

        return View::make('posts.publico', compact('posts'))
            ->with('categorias', $categorias)->with('tags', $tags);
	}

    /**
     * @param $id
     * @return mixed
     */
    public function getCategoria($id)
    {
        $categorias = Categoria::has('posts')->get(array('id', 'nombre'));
        $categoria = Categoria::find($id);
        $posts = $categoria->posts()->get();

        return View::make('posts.por_categoria', compact('posts'))->with('categorias', $categorias);
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getVer($id)
	{
        $post = Post::with('categoria')->find($id);

        /*dd($post);*/
        $categorias = Categoria::has('posts')->get(array('id', 'nombre'));

        //$categorias = $posts->categoria();
        $tags = Tag::groupBy('nombre')->get();

        return View::make('posts.publico_ver', compact('post'))
            ->with('categorias', $categorias)
            ->with('tags', $tags)->with('comentarios', $this->getComentarios($id));
	}

    /** Sin usar
     * @return mixed
     */
    public function getTags()
    {
        $tags = Tag::groupBy('nombre')->get();

        dd($tags);
        return $tags;
    }

    public function getComentarios($id)
    {
        $comentarios = Post::find($id)->comentarios;
        return $comentarios;
    }


    public function postComentario()
    {
        $comentario = new Comentario();
        $comentario->nombre = Input::get('nombre');
        $comentario->comentario = Input::get('comentario');

        $post = Post::find(1);

        $comentario = $post->comentarios()->save($comentario);

        return Redirect::to('index/ver/'.$post->id)
            ->with('mensaje', 'Comentario creado')->with('comentarios', $this->getComentarios($post->id));
    }


}
