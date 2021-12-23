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
        return view('admin.product.index', ['product' => $data]);
    }

    public function edit($id)
    {
        $data = Product::find($id);
        return view('admin.product.edit', ['product' => $data]);
    }

    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        $product->update(['name' => $_POST['name']]);
        $product->update(['type' => $_POST['type']]);
        $product->update(['price' => $_POST['price']]);
        $product->update(['quan' => $_POST['quantity']]);
        $product->update(['content' => $_POST['content']]);
        $product->update(['pic' => $_POST['pic']]);

        if($_POST['status']=='未上架')
            $product->update(['status' => '0']);
        else
            $product->update(['status' => '1']);

        //$product->update($request->all()); 無法成功
        return redirect()->route('admin.product.index');
    }

    public function delete($id)
    {
        Product::destroy($id);
        return redirect()->route('admin.product.index');
    }
}
