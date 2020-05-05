<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\DummyEmail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send(){
 
        Mail::to("feri.syah02@gmail.com")->send(new DummyEmail());
 
        return "Email telah dikirim";
    }
}