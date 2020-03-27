<?php

use App\Category;
use App\Gender;
use App\Image;
use App\OrderStatus;
use App\Product;
use App\Role;
use App\Specifications;
use App\SpecificationsType;
use App\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    
    {   
        factory(OrderStatus::class,3)->create();
        factory(Role::class,2)->create();
        factory(User::class,2)->create();
        factory(Gender::class,2)->create();
        factory(Category::class,5)->create();
        factory(SpecificationsType::class, 10)->create();
        factory(Product::class,15)->create()->each(function($product){
          
           $product->images()->save(factory(Image::class)->make());
         
           for($i=0; $i<4; $i++) {
            $product->specifications()->save(factory(Specifications::class)->make());
           }
        
       
        });

        factory(Image::class, 50)->create();
        
    }
}
