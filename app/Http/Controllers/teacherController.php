<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Postimage;
use Illuminate\Http\Request;

use Session;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Schedule;

use Carbon\Carbon;


class teacherController extends Controller
{
    //
    public function viewSchedules(){ //for teacher to look their meeting record
        if (Session::get('category') != 'teacher') {
            return redirect()->intended('/');
        }

        $user = Session::get('user'); // mencari tau username user yg sedang login
        $date = Carbon::now()->format('Y-m-d');
        $userCourseID = DB::table('tb_user')->where('username', $user)->pluck('courseID'); // mendapatkan course ID teacher
        // $filteredData = Schedule::where('courseID','=',$userCourseID)->orderBy('date')->get();
        $schedule = Schedule::where('courseID','=',$userCourseID)->where('date','>=',$date)->orderBy('date')->get();

        $pastSchedule = Schedule::where('courseID','=',$userCourseID)->where('date','<',$date)->orderBy('date')->get();
    
        // $filteredData= Schedule::all();
        return view('home-teacher', compact('schedule','pastSchedule','date','userCourseID'));

        //test untuk stef   

    }

    public function viewModules(){
        if (Session::get('category') != 'teacher') {
            return redirect()->intended('/');
        }
        $user = Session::get('user'); // mencari tau username user yg sedang login
        $userID = DB::table('tb_user')->where('username', $user)->pluck('userID'); // mendapatkan course ID teacher
        $filteredData = Postimage::where('teacherID','=',$userID)->get();

        // $imageData= Postimage::all();
        return view('modules-teacher', compact('filteredData'));
    }
   
    public function uploadModul(){
        if (Session::get('category') != 'teacher') {
            return redirect()->intended('/');
        }
        
        $user = Session::get('user'); // mencari tau username user yg sedang login
        
        $teacherName = DB::table('tb_user')->where('username', $user)->pluck('name')->last(); // kenapa paket last, agar hilangin bracket array dan kutip pada value variablenya "[nama]"
        $teacherID = DB::table('tb_user')->where('username', $user)->pluck('userID')->last(); // kenapa paket last, agar hilangin bracket array dan kutip pada value variablenya "[nama]"

        return view('uploadModul', compact('teacherName','teacherID'));

        //test untuk stef   

    }

    public function video(){
        if (Session::get('category') != 'teacher') {
            return redirect()->intended('/');
        }

        $imageData= Postimage::all();
        return view('video-teacher', compact('imageData'));
    }

}