<?php

namespace App\Http\Controllers;

use App\Models\userRecord;
use Illuminate\Http\Request;

use Session;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class userRecordController extends Controller
{
    //
    public function register_action_test(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'studentID' => 'required',
            'info' => 'required',
           
        ]);
        
        $user = new userRecord([
            'name' => $request->name,
            'studentID' => $request->studentID,
            'info' => $request->info,
            'meetingID' => $request->meetingID,
    
            
        ]);
        $user->save();

        
    }
   


}