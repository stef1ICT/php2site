<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadPhotosRequest;
use App\Image;
use App\Product;
use App\Specifications;
use App\SpecificationsType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    

    public function index() {
        $this->authorize('isAdmin');
        $products = Product::latest()->with(['gender','category'])->paginate(10);
        return view('Admin.Product.index', ['products'=>$products]);
    }




    public function create() {
        $this->authorize('isAdmin');
        return view('Admin.Product.create');
    }


    public function show(Product $product) {
        $this->authorize('isAdmin');
        return view('Admin.Product.show', ['product'=>$product]);
    }





    public function update(Product $product) {
        $this->authorize('isAdmin');
        $product->update([
            'name' => request('name'),
            'price' => request('price'),
            'description' => request('description'),
            'category_id' => request('category'),
            'gender_id' => request('gender')
        ]);
        
        return redirect()->back()->with('message', 'Success updated!');
    }


    public function deleteImage() {
        $this->authorize('isAdmin');
        $imageId = request('imageId');
        $productId = request('productId');
        $product = Product::where('id', $productId)->first();
        $image = Image::where('id', $imageId)->first();
        $image->delete();
        return $product->images;
    }


    public function addPhotos(Product $product, UploadPhotosRequest $request) {
        $this->authorize('isAdmin');
       
        foreach ($request->images as $image) {
            $filename = $image->store('images');
            Image::create([
                'product_id' => $product->id,
                'imageUrl' => $filename
            ]);
            Storage::move( $filename, 'public/'.$filename);
        }


        return redirect()->back();
    }

    public function deleteSpecification() {
        $this->authorize('isAdmin');

        $specificationId = request('specificationId');
        $specification =  Specifications::find($specificationId);
        $specification->delete();
        return redirect()->back()->with('deleteMessage', 'Success delete specification!');
    }



    public function addSpecification(Product $product) {
        $this->authorize('isAdmin');
        $specificationType = SpecificationsType::where('name',request('spec_type'))->first();
        if(!$specificationType) {
            $specificationType =   SpecificationsType::create([
                'name' => request('spec_type')
            ]);
        } 
        $product->specifications()->create([
            'specifications_type_id' => $specificationType->id,
            'value' => request('spec_value')
        ]);
     

        return redirect()->back()->with('message', 'Success added specification');
    }



    public function store() {

      $product =   Product::create([
            'name' => request('name'),
            'price' => request('price'),
            'description' => request('description'),
            'category_id' => request('category'),
            'gender_id' => request('gender')
        ]);


        foreach (request('images') as $image) {
            $filename =  $image->store('images');
            Image::create([
                'product_id' => $product->id,
                'imageUrl' => $filename
            ]);
            Storage::move($filename,'public/'.$filename);
        }
        return redirect()->back()->with('successMessage', 'Product created!');
    }
}
