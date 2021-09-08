<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class UserAuthController extends Controller
{
    public function facebokSignInProcess(){
        return Socialite::driver('facebook')->redirect();
        // $redirect_url = env('FB_REDIRECT');
        // return Socialite::driver('facebook')->
        //     scopes(['user_friends'])->
        //     redirectUrl($redirect_url)->
        //     redirect();
    }
}
