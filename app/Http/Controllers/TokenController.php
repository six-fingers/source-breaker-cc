<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\TokenGetRequest;
use Illuminate\Support\Facades\Hash;


class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( TokenGetRequest $request )
    {
        $user = User::where('email', $request->get('email'))->first();

        if( !empty($user) ) {
            $auth = Hash::check($request->get('password'), $user->password);
        }
        
        if( empty($user) || false==$auth ){
            throw new \Exception('User Not Found or Invalid Credentials', 404);
        }

        return response()->json([
            'api_token' => $user->api_token
        ]);
    }

}
