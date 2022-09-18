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
use Illuminate\Support\Str;

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
        Category::create([
            'slug'=>Str::slug('computer'),
            'en_name'=>'computer',
            'mm_name'=>'ကွန်ပျူတာ',
            'image'=>'63184aeb214faWork-From-Home-WhatsApp-Group.jpg',
        ]);
        Category::create([
            'slug'=>Str::slug('mobile-phone'),
            'en_name'=>'Mobile Phone',
            'mm_name'=>'မိုဘိုင်းဖုန်း',
            'image'=>'631b34e770fddvivo.png',
        ]);
        // $category=['Electronic','Shirt','Accessory','Hat','Mobile Phone'];
        // foreach($category as $c){
        //     Category::create([
        //         'slug' => uniqid().$c,
        //         'name' => $c
        //     ]);
        // }

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
