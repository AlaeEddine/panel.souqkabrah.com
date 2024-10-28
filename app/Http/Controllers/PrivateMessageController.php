<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrivateMessage;

class PrivateMessageController extends Controller
{
    public function privatemessages(Request $request){
        return view('pages.privatemessages.privatemessages',[
            'PrivateMessagesCount' => PrivateMessage::where([
                ['removed', '=',0]
            ])->count(),
            'PrivateMessages' => PrivateMessage::where([
                ['removed', '=',0]
            ])->get()
        ]);

    }

}
