<?php
    use Carbon\Carbon;

    /**
     * file name Usuario.php @ Project blog_laravel
     * Time: 19:44 Date: 26/02/2015
     *
     * Copyright (C) 2015 Pedro Gabriel Manrique Gutiérrez <pedrogm@grafycomp.com> <pedrogmanrique@gmail.com>
     *
     * This program is free software: you can redistribute it and/or modify
     * it under the terms of the GNU General Public License as published by
     * the Free Software Foundation, either version 3 of the License, or
     * (at your option) any later version.
     *
     * This program is distributed in the hope that it will be useful,
     * but WITHOUT ANY WARRANTY; without even the implied warranty of
     * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     * GNU General Public License for more details.
     *
     * You should have received a copy of the GNU General Public License
     * along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */
    //class Usuario extends Eloquent
class Usuario extends Eloquent  {


        protected $table = 'usuarios';

        //protected $hidden = array('password', 'remember_token');
    protected $guarded = ['id', 'foto', 'rol', 'password', 'confirm_password'];


        public function posts()
        {
            return $this->hasMany('Post');
        }

        public function categorias()
        {
            return $this->hasMany('Categoria');
        }


        // Mutador para poner la fecha a formato MySQL, PSR-0 set + fecha + attribute
        public function setFechaAttribute($fecha)
        {
            $this->attributes['fecha'] = Carbon::createFromFormat('d/m/Y', $fecha)
                ->toDateString();
        }

        // Accessor para cambiar la fecha de formato inglés a español
        public function getFechaAttribute($fecha)
        {
            return Carbon::parse($fecha)->format('d/m/Y');
        }

         // Accessor para cambiar la created_at
        public function getCreatedAtAttribute($fecha)
        {
            return Carbon::parse($fecha)->format('d/m/Y');
        }
    }