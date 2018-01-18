<?php

namespace App\Http\Controllers;
use \Auth;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;

class UtilsController extends Controller
{
    public function URL($argument){
        return \LaravelLocalization::getLocalizedURL(null, \LaravelLocalization::transRoute('routes.'.$argument));
    }
    public function URL_ARG($argument, $parameter){
        $local = request()->segment(1);
        $translatedArgument = __("fake.".$argument);
        return "/".$local."/".$translatedArgument."/".$parameter;
    }

    public static function instance(){
        return new UtilsController();
    }
}
