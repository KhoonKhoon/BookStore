<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dashboards = [
            ['name' => 'view', 'code' => 'view'],
        ];

        $users = [
            ['name' => 'view', 'code' => 'view'],
            ['name' => 'Create', 'code' => 'create'],
            ['name' => 'Edit', 'code' => 'edit'],
            ['name' => 'Delete', 'code' => 'delete'],
            ['name' => 'Filter', 'code' => 'filter']
        ];

        $books = [
            ['name' => 'view', 'code' => 'view'],
            ['name' => 'Create', 'code' => 'create'],
            ['name' => 'Edit', 'code' => 'edit'],
            ['name' => 'Delete', 'code' => 'delete'],
            ['name' => 'Filter', 'code' => 'filter']
        ];

        $categories = [
            ['name' => 'view', 'code' => 'view'],
            ['name' => 'Create', 'code' => 'create'],
            ['name' => 'Edit', 'code' => 'edit'],
            ['name' => 'Delete', 'code' => 'delete'],
            ['name' => 'Filter', 'code' => 'filter']
        ];

        $authors =[
            ['name' => 'view', 'code' => 'view'],
            ['name' => 'Create', 'code' => 'create'],
            ['name' => 'Edit', 'code' => 'edit'],
            ['name' => 'Delete', 'code' => 'delete'],
            ['name' => 'Filter', 'code' => 'filter']
        ];

        $orders = [
            ['name' => 'view', 'code' => 'view'],
            ['name' => 'Create', 'code' => 'create'],
            ['name' => 'Edit', 'code' => 'edit'],
            ['name' => 'Delete', 'code' => 'delete'],
            ['name' => 'Filter', 'code' => 'filter']
        ];

        $app_modules = [
            'dashboard',
            'users',
            'books',
            'categories',
            'authors',
            'orders',
        ];

        Permission::truncate();

        foreach ($app_modules as $key => $module) {
            if ($module == 'dashboard') {
                foreach ($dashboards as $dashboard) {
                    Permission::create([
                        'app_module' => $module,
                        'name' => $dashboard['name'],
                        'code' =>  $dashboard['code']
                    ] + $dashboard);
                }
            }

            if ($module == 'user') {
                foreach ($users as $user) {
                    Permission::create([
                        'app_module' => $module,
                        'name' => $user['name'],
                        'code' =>  $user['code']
                    ] + $user);
                }
            }

            if ($module == 'books') {
                foreach ($books as $book) {
                    Permission::create([
                        'app_module' => $module,
                        'name' => $book['name'],
                        'code' =>  $book['code']
                    ] + $book);
                }
            }


            if ($module == 'categories') {
                foreach ($categories as $category) {
                    Permission::create([
                        'app_module' => $module,
                        'name' => $category['name'],
                        'code' =>  $category['code']
                    ] + $category);
                }
            }

            if ($module == 'authors') {
                foreach ($authors as $author) {
                    Permission::create([
                        'app_module' => $module,
                        'name' => $author['name'],
                        'code' =>  $author['code']
                    ] + $author);
                }
            }
        }

        if ($module == 'orders') {
            foreach ($orders as $order) {
                Permission::create([
                    'app_module' => $module,
                    'name' => $order['name'],
                    'code' =>  $order['code']
                ] + $order);
            }
        }


    }
}
