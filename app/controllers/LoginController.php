<?php

    use Illuminate\Support\Facades\Input;
    use Illuminate\Support\Facades\Redirect;

    class LoginController extends \BaseController {

        /**
         * Display a listing of the resource.
         *
         * @return Response
         */
        public function index()
        {
            if(Auth::check()):
                return Redirect::to('contactos');
            endif;
            return View::make('login.login');
        }

        /**
         * @return mixed
         */
        public function comprueba(){

            $userdata = array(
                'username' => Input::get('username'),
                'password' => Input::get('password'));


            if(Auth::attempt($userdata, true) ) {
                return Redirect::to('categorias');

            }

            return Redirect::to('login')
                ->with('mensaje_error', 'Datos incorrectos')->withInput();

        }

        /**
         * @return mixed
         */
        public function logout(){
            Auth::logout();
            return Redirect::to('login')->with('mensaje_error', 'Has cerrado sesión');

        }



    }
