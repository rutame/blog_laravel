<?php

    /**
     * file name UsuarioTableSeeder.php @ Project blog_laravel
     * Time: 23:58 Date: 26/02/2015
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
    class UsuarioTableSeeder extends Seeder
    {

        public function run()
        {
            // Recoge el metodo en la propieda y en Español
            $faker = Faker\Factory::create('es_ES');

            // Vaciar la tabla
            //Usuario::truncate();

            foreach (range(1, 5) as $index)
            {
                $roles = array('admin', 'user', 'editor');
                shuffle($roles);

                Usuario::create(array(
                    'nombre'   => $faker->firstName . ' ' . $faker->lastName,
                    'telefono' => $faker->phoneNumber,
                    'rol'      => $roles[0],
                    'email'    => $faker->email,
                    'username' => $faker->userName,
                    'password' => rand(1111, 999),
                ));

            }

        }
    }