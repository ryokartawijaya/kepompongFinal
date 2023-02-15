<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class courseController extends Controller
{
      //upload schedule
   

    public function viewCourse(){ // for student
        if (Session::get('category') != 'student') {
            return redirect()->intended('/');
        }
        
        $courseData= Course::all();
        $user = Session::get('user'); // mencari tau username user yg sedang login        
        $userCategory = DB::table('tb_user')->where('username', $user)->pluck('category');
        $filteredData = Course::where('category','=',$userCategory)->get();
        return view('course', compact('filteredData'));
    }


}
