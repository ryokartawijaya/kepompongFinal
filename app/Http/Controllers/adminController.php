<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Schedule;
use App\Models\Postimage;
use Illuminate\Http\Request;

use Session;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;





class adminController extends Controller
{
    //
    public function viewUser(){ 
        if (Session::get('category') != 'admin') {
            return redirect()->intended('/');
        }
        $date = date('d-m-Y');    
        $listStudent = User::where('userCategory','=','student')->get();
        $listTeacher = User::where('userCategory','=','teacher')->get();
        return view('home-admin', compact('listStudent','listTeacher','date'));

    }


  

    public function destroy($userID) //test ryo
    {
        if (Session::get('category') != 'admin') {
            return redirect()->intended('/');
        }
       $user = User::where('userID', $userID)->firstorfail()->delete();
       echo ("User Record deleted successfully.");
       return redirect()->route('users.index');
    }
    


    public function uploadSchedule(){
        if (Session::get('category') != 'admin') {
            return redirect()->intended('/');
        }
        return view('uploadSchedule');
    }

    public function storeSchedule(Request $request){ // hanya admin
        if (Session::get('category') != 'admin') {
            return redirect()->intended('/');
        }
        $data= new Schedule();

        $data['meetingID']= $request->meetingID;
        $data['courseID']= $request->courseID;
        $data['title']= $request->title;
        $data['date']= $request->date;
        $data['time']= $request->time;
        $data['teacher']= $request->teacher;
        $data['category']= $request->category;  
        $data['link']= $request->link;  
        $data->save();



        // return redirect()->route('images.view');
        // return redirect()->route('uploadSchedule');
        return redirect('uploadschedule');
    }

    public function viewSchedule(){ //for admin
        if (Session::get('category') != 'admin') {
            return redirect()->intended('/');
        }
     
       
        $date = Carbon::now()->format('Y-m-d');
     

        $scheduleA = Schedule::where('category','=','A')->where('date', '>=' , $date )->get();
        // dd($date);
        $scheduleB = Schedule::where('category','=','B')->where('date','>=',$date)->orderBy('date')->get();
        $scheduleA_past = Schedule::where('category','=','A')->where('date','<',$date)->get();
       
        $scheduleB_past = Schedule::where('category','=','B')->where('date','<',$date)->get();
        
        return view('schedule-admin', compact('scheduleA','scheduleB','scheduleA_past','scheduleB_past','date'));


    }

    public function destroySchedule($meetingID) 
    {
        if (Session::get('category') != 'admin') {
            return redirect()->intended('/');
        }
       $schedule = Schedule::where('meetingID', $meetingID)->firstorfail()->delete();
       echo ("Schedule Record deleted successfully.");
       return redirect()->route('schedules.index');
    }
    
    public function uploadCourse(){
        if (Session::get('category') != 'admin') {
            return redirect()->intended('/');
        }
        return view('uploadCourse');
    }

    public function storeCourse(Request $request){
        $data= new Course();

        $data['courseId']= $request->courseId;
        $data['name']= $request->name;
        $data['description']= $request->description;
        $data['teacher']= $request->teacher;
        $data['category']= $request->category;  
        $data->save();

        return redirect('uploadcourse');
    }

    public function viewCourse(){ // for admin
        if (Session::get('category') != 'admin') {
            return redirect()->intended('/');
        }
        
        $courseData= Course::all();
        // $user = Session::get('user'); // mencari tau username user yg sedang login        
        // $userCategory = DB::table('tb_user')->where('username', $user)->pluck('category');
        // $filteredData = Course::where('category','=',$userCategory)->get();
        return view('course-admin', compact('courseData'));
    }

    public function destroyCourse($courseId) 
    {
        if (Session::get('category') != 'admin') {
            return redirect()->intended('/');
        }
       $course = Course::where('courseId', $courseId)->firstorfail()->delete();
       echo ("Course Record deleted successfully.");
       return redirect()->route('courses.index');
    }


    public function viewModules(){
        if (Session::get('category') != 'admin') {
            return redirect()->intended('/');
        }
        $imageData= Postimage::all();
        return view('modules-admin', compact('imageData'));
    }

    public function destroyModules($id) 
    {
        if (Session::get('category') != 'admin') {
            return redirect()->intended('/');
        }
       $modul = Postimage::where('id', $id)->firstorfail()->delete();
       echo ("Module Record deleted successfully.");
       return redirect()->route('modules.index');
    }

    public function video(){
        if (Session::get('category') != 'admin') {
            return redirect()->intended('/');
        }

        $imageData= Postimage::all();
        return view('video-admin', compact('imageData'));
    }

}



























