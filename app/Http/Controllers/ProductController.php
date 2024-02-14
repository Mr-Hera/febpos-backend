<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Support\Arr;
use App\Models\VatStatement;
use Illuminate\Http\Request;
use App\Models\DiscountStatement;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'string|required',
            'unit' => 'string|required',
            'description' => 'string|required',
            'category_name' => 'string|required',
            'sales_count' => 'integer|required',
            'price' => 'integer|required',
            'vat' => 'string|required',
            'discount' => 'string|required',
        ]);

        $product = Product::where('name', $request->name)->first();
        // return($product->sales[0]);

        // if record exists update
        if(!$product) {

            // create product
            $product = Product::create([
                'name' => $request->name,
                'unit' => $request->unit,
                'description' => $request->description,
            ]);

            // creates & associates category to existing product
            $product->category()->create([
                'name' => $request->category_name,
            ]);
    
            // creates & associates sale to existing product
            $product->sales()->create([
                'sales_count' => $request->sales_count,
                'price' => $request->price,
            ]);
        }
        $product->sales()->update([
            'sales_count' => $product->sales[0]->sales_count + $request->sales_count,
        ]);

        if($request->vat == 'vat') {
            VatStatement::create([
                'name' => $request->name,
                'category' => $request->category_name,
                'unit' => $request->unit,
                'price' => ((($request->price * 16) / 100) + $request->price),
            ]);
        } elseif($request->discount == 'discount') {
            DiscountStatement::create([
                'name' => $request->name,
                'category' => $request->category_name,
                'unit' => $request->unit,
                'price' => (($request->price) - (($request->price * 10) / 100)),
            ]);
        }
        $success = [
            'product' => new ProductResource($product),
            'message' => 'Product relationship updated Successfully!'
        ];

        return $success;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
