<?php

namespace App\Http\Controllers;
use App\Newsletter;

use Illuminate\Http\Request;

class newsletterUser extends Controller
{
    public function newUser(Request $request) {
        $status = 400;
        $data = (object)['message' => ''];
        try {
            $emailUser = $request->input('email');
            $token = str_random(10);
            $newsletterData = ['email' => $emailUser, 'token' => $token];
            Newsletter::create($newsletterData);
            $status = 200;
        }catch(\Exception $e){
            $data->message = $e->getMessage();
        }
        return response()->json($data, $status);
    }
}
