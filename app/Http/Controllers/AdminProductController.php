<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('products')->orderBy('id','ASC')->get();
        return view('admin.products.index', ['product' => $data]);
        //return view('admin.products.create');
    }

    public function create()
    {
        return view('admin.products.create');
    }
    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $data = Product::find($id);
        return view('admin.products.edit', ['product' => $data]);
    }

    public function update(Request $request, $id)
    {
        $product=Product::find($id);

        $product->update($request->all());

        return redirect()->route('admin.products.index');
    }

    public function delete($id)
    {
        Product::destroy($id);
        return redirect()->route('admin.products.index');
    }
}
