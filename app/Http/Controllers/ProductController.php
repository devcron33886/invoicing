<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->where('created_by', auth()->user()->id)->get();

        return view('users.products.index', compact('products'));
    }

    public function create()
    {
        return view('users.products.create');
    }

    public function store(StoreProductRequest $request)
    {
        DB::beginTransaction();
        try {
            DB::commit();
            $product = new Product();
            $product->name = $request->input('name');
            $product->product_code = $request->input('product_code');
            $product->price = $request->input('price');
            $product->created_by = auth()->user()->id;
            $product->save();
        } catch (Exception $exception) {
            DB::rollBack();
            $message = $exception->getMessage();
            dd($message);

            return back()->withErrors($exception);
        }

        return to_route('products.index');
    }

    public function edit(Product $product)
    {
        return view('users.products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        DB::beginTransaction();
        try {
            DB::commit();
            $product->update($request->all());
        } catch (Exception $exception) {
            DB::rollBack();

            return back()->withErrors($exception);
        }

        return to_route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return to_route('products.index');
    }
}
