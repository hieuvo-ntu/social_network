<?php

namespace App\Http\Controllers;

use App\Events\RedisEvent;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedisController extends Controller
{
    public function index($id)
    {
        $messages=Message::all();
        return view('page.message',compact('messages'));
    }

    public function postSendMessage(Request $req)
    {
        $message=Message::create(['content'=>$req->textmessage,'user_from'=>Auth::user()->id,'user_to'=>$req->id]);
        event(
            $e=new RedisEvent($message)
        );
        return redirect()->back();

    }
}
