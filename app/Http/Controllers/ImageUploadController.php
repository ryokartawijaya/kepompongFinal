<?php

namespace App\Http\Controllers;
use App\Models\Postimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class ImageUploadController extends Controller
{
    //
     //Add image
    // public function addImage(){
    //     return view('upload');
    // }

    //Store modul
    public function storeImage(Request $request){
        $data= new Postimage();

        $data['title']= $request->title;
        $data['description']= $request->description;
        $data['teacher']= $request->teacher;
        $data['teacherID']= $request->teacherID;
        $data['category']= $request->category;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            // $file-> move(public_path('uploadedImage'), $filename);
            $file-> move(public_path('uploadedImage'), $filename);
            $data['image']= $filename;
        }

        //video
        if($request->file('video')){
            $file= $request->file('video');
            $filename= date('YmdHi').$file->getClientOriginalName();
            // $file-> move(public_path('uploadedImage'), $filename);
            $file-> move(public_path('uploadedVideo'), $filename);
            $data['video']= $filename;
        }

        
        $data->save();



        // return redirect()->route('images.view');
        return redirect()->route('uploadModul');
    }


	//View image
    public function viewImage(){
        if (Session::get('category') != 'student') {
            return redirect()->intended('/');
        }

        $imageData= Postimage::all();
        return view('modules', compact('imageData'));
    }


    //video
    public function video(){
        if (Session::get('category') != 'student') {
            return redirect()->intended('/');
        }

        $imageData= Postimage::all();
        return view('video', compact('imageData'));
    }


   




}
