<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class UserLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        $UserQuery = User::where([
            ['email','=',e($event->user->email)],
            ['isAdmin','=',true],
            ['removed','=',0],
        ]);
        if($UserQuery->count() > 0){
            if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('SuperAdmin')){
                session()->put('user.id', e($UserQuery->first()->id));
                session()->put('user.name', e($UserQuery->first()->name));
                session()->put('user.email', e($UserQuery->first()->email));
                session()->put('user.phone', e($UserQuery->first()->phone));
                session()->put('user.adress', e($UserQuery->first()->adress));
            }else{
                Auth::guard('web')->logout();
                session()->invalidate();
                session()->regenerateToken();
                session()->put('error',__('ليس لديكم الصلاحيات اللازمة للولوج'));
            }
        }else{
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
            session()->put('error',__('ليس لديكم الصلاحيات اللازمة للولوج'));
        }

    }
}
