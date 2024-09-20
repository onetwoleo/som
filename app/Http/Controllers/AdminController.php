<?php

namespace App\Http\Controllers;


use App\Models\Message;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();
        $types = DB::table('types')->get();
//        $applications = DB::table('applications')->get();
        return view('admin.admin', ['products' => $products, 'types' => $types]);
    }

    public function index_messages()
    {
        $messages = DB::table('messages')->get();
        return view('admin.messages', ['messages' => $messages]);
    }
    public function delete_message($message_id)
    {
        $Product = Message::find($message_id);
        $Product->delete();
        return redirect()->route('messages');
    }

    public function store_product(Request $request){
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $filename = time().'.'.$request['photo']->getClientOriginalExtension();
        $request['photo']->storeAs('public',$filename);
        Product::create([
                'photo'=>url('/public/storage/'.$filename),
            ] + $request->all());
        return redirect()->route('admin');
    }

    public function delete_product($product_id)
    {
        $Product = Product::find($product_id);
        $Product->delete();
        return redirect()->route('admin');
    }
    public function delete_type($type_id)
    {
        $type = Type::find($type_id);
        $type->delete();
        return redirect()->route('admin');
    }
    public function update_product( $product_id, Request $request)
    {
        $product = Product::find($product_id);
        if ($request->photo){
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $filename = time().'.'.$request['photo']->getClientOriginalExtension();
            $request['photo']->storeAs('public',$filename);
            $product->update([
                    'photo'=>url('/public/storage/'.$filename),
                ]+$request->all());
        }
        else {
            $product->update([
                    'photo' => $product->photo,
                ]+$request->all());
        }

        return back();
    }
    public function edit($product_id)
    {
        $product = Product::find($product_id);
        $types = DB::table('types')->get();
        return view('admin.product_edit', ['product' => $product, 'types' => $types]);
    }
    public function update_type( $type_id, Request $request)
    {
        $type = Type::find($type_id);
        $type ->fill($request->all());
        $type->save();
        return back();
    }
    public function store_type(Request $request){
        Type::create([

            ] + $request->all());
        return redirect()->route('admin');
    }
}
