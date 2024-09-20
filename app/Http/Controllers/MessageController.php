<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function store(Request $request){
        Message::create([
            ] + $request->all());
        return redirect()->back();
    }
//    public function index()
//    {
//        $messages = DB::table('messages')->get();
//        return view('admin.messages', ['messages' => $messages]);
//    }
//    public function delete($message_id)
//    {
//        $Product = Message::find($message_id);
//        $Product->delete();
//        return redirect()->route('messages');
//    }
}
