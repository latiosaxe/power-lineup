<?php

namespace App\Http\Controllers\Control;

use \Auth;
use Illuminate\Http\Request;
use App\Token;
use App\Http\Controllers\Controller;

class DashboardController extends Controller{
    public function index(){
        $users = Auth::user()->name;
        $tokens = Token::all();
        $data = [
            'user' => $users,
            'tokens'  => $tokens,
        ];
        return view('control.dashboard.dashboard', $data);
    }

    public function fakeUpdate(Request $request){
        $status = 400;
        $data = (object)['message' => ''];
        try{
            $element = Token::find(1);
            $element->token_init = $request->input('token_init', '');
            $element->token_end = $request->input('token_end', '');

            $element->save();
            $status = 200;
        }catch(\Exception $e){
            $data->message = $e->getMessage();
        }
        return response()->json($data, $status);
    }
    public function getTokens(){
        $tokens = Token::all();
        $data = [
            'tokens'  => $tokens,
        ];
        return $data;
    }
}
