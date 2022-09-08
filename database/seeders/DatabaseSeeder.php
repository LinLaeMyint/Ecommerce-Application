<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //colors
        $colors=['red','green','blue','black'];
        foreach($colors as $c){
            Color::create([
                'slug' => uniqid().$c,
                'name' => $c
            ]);
        }

        //brand
        $brand=['huawei','apple','samsung','vivo'];
        foreach($brand as $c){
            Brand::create([
                'slug' => uniqid().$c,
                'name' => $c
            ]);
        }

        //category
        $category=['Electronic','Shirt','Accessory','Hat','Mobile Phone'];
        foreach($category as $c){
            Category::create([
                'slug' => uniqid().$c,
                'name' => $c
            ]);
        }

        //user
        User::create([
            'name'=>"Mg Mg",
            'email'=>"mgmg@a.com",
            'password'=>Hash::make('password'),
        ]);
        Admin::create([
            'name'=>"Admin",
            'email'=>"admin@a.com",
            'password'=>Hash::make('password'),
        ]);
        //supplier
        Supplier::create([
            'name'=>"Supplier One",
            'phone'=>"89",
            'image'=>"user.png",
        ]);
    }
}
