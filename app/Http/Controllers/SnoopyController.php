<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SnoopyController extends Controller
{
    public function sayHello(string $name = '史努比')
    {
        $message = "我是Snoopy~~~";

        return view('snoopy_welcome', [
            'msg' => $message, 
            'name' => $name]);
    }

}