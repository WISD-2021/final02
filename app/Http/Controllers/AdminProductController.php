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

    public function delete($id)
    {
        Product::destroy($id);
        return redirect()->route('admin.product.index');
    }
}
