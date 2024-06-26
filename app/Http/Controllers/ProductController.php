<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request) {
        $products = Product::orderBy('name');
    
        if($request->filter) {
            $products->where('name', 'like', "%$request->filter%");
        }
    
        $html = "<div class='flex flex-col gap-2'>";
    
        foreach($products->get() as $prod) {
            $html .= "
                <div class='p-4 rounded overflow-hidden shadow-md bg-blue-100 mt-3'>
                    <h1 class='text-2xl'>$prod->name</h1>
                    <h3 class='text-2xl'>$prod->description</h3>
                    <p class='text-lg'>Price: $prod->price</p>
                    <p class='text-lg'>Quantity: $prod->quantity</p>
                </div>
            ";
        }
    
        $html .= "</div>";
    
        return $html;
    }
    

    public function store(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'name' =>'required',
            'description' =>'required',
            'price' =>'required',
            'quantity' =>'required'
        ]);

        if($validator->fails()) {
            $products = Product::orderBy('name');
            return view('templates._error', ['errors' => $validator->errors(), 'products' => $products]);

        };
        

        $products = Product::orderBy('name');

        Product::create($request->all());

        return view('templates._products-list',['products'=>$products]);
    }
}
