<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Mail;
use App\Mail\MailNotify;
use App\Models\User;
use Session;
use Illuminate\Support\Str;


class MailController extends Controller
{

    public $keyGenerator;

    public function keyGenerator(){
        return Str::random(100);
    }



    public function index(){

        $data = $_POST['email'];
        $key = $this->keyGenerator();
        session()->put('keyCheck', $key);
        try {
            Mail::to($data)->send(new MailNotify($data,$key));
            return response()->json(['Great, check your mail box!']);
        } catch(Exception $th){
            return response()->json(['Sorry something went wrong!']);
        }
    }


    public function indexAction($data,$key ){

        if (Session::get('keyCheck') != $key) {
            return response()->json(['Sorry something went wrong!']);
        }else{
            Session::forget('keyCheck');
            return view('reset-password', compact('data','key'));
        }

    }


}
