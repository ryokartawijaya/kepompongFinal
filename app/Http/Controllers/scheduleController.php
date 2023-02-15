<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class scheduleController extends Controller
{

    public function viewSchedule(){ //for student
        if (Session::get('category') != 'student') {
            return redirect()->intended('/');
        }
        $user = Session::get('user'); // mencari tau username user yg sedang login
        $date = Carbon::now()->format('Y-m-d');
        $userCategory = DB::table('tb_user')->where('username', $user)->pluck('category');
        $schedule = Schedule::where('category','=',$userCategory)->where('date','>=',$date)->orderBy('date')->get();
        $pastSchedule = Schedule::where('category','=',$userCategory)->where('date','<',$date)->orderBy('date')->get();
        // $filteredData= Schedule::all();
        return view('home', compact('schedule', 'pastSchedule','date'));

        //test untuk stef   

    }

    public function viewForum(){
        if (Session::get('category') != 'student') {
            return redirect()->intended('/');
        }
        return view('forum');
    }

    

    

}
