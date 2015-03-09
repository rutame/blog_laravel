<?php
/**
 * file name Tag.php @ Project blog_laravel
 * Time: 15:50 Date: 07/03/2015
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

class Tag extends Eloquent{

    protected $table = 'tags';
    public  $timestamps = false;


    // Tag __belongs_to_many__ Post
    public function posts()
    {
        return $this->belongsToMany('Post');
    }

}