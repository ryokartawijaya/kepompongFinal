<?php

namespace App\Http\Controllers;
use App\Models\Attendance;
use App\Models\Schedule;
use Illuminate\Http\Request;

class attendanceController extends Controller
{
    //
    public function storeAttendance(Request $request){
        $data= new Schedule();

        $data['title']= $request->title;
        $data['date']= $request->date;
        $data['teacher']= $request->teacher;
        $data['info']= $request->link;  
        $data->save();



        // return redirect()->route('images.view');
        // return redirect()->route('uploadSchedule');
        return redirect('uploadAttendance');
    }

    public function viewAttendance(){
        $attendanceData= Attendance::all();
        return view('attendanceHistory', compact('attendanceData'));
    }


}
