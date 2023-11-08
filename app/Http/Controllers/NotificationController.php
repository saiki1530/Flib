<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notification\Userlogin;
class NotificationController extends Controller
{
    public function notify(){
        if(auth()->user()){
            $user = User::whereId(7)->first();
            auth()->user()->notify(new Userlogin($user));

        }
        dd('done');
    }
    public function markasred($id){
        if($id){
            auth()->user()->unreadNotifications->where('id',$id)->markAsRead();
        }
        return back();
    }
}
