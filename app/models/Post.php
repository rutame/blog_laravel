<?php
    use Carbon\Carbon;

    /**
 * file name Post.php @ Project blog_laravel
 * Time: 19:47 Date: 26/02/2015
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

class Post extends Eloquent
{
    protected $table = 'posts';

 /*   protected $guarded = ['id', 'created_at', 'updated_at'];*/

    // Usuario
    public function usuario()
    {
        return $this->belongsTo('Usuario');
    }

    public function tags()
    {
        return $this->belongsToMany('Tag');
    }

    public function categoria()
    {
        return $this->belongsTo('Categoria');
    }

    // Comentarios
    public function comentarios()
    {
       return $this->hasMany('Comentario');
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
        return  Carbon::parse($fecha)->format('d/m/Y');
    }



}