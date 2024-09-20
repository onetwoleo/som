<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function edit($product_id)
    {
        $product = Product::find($product_id);
        $types = DB::table('types')->get();
        return view('product', ['product' => $product, 'types' => $types]);
    }
}
