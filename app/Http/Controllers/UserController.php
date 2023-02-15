<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Session;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Redirect;




class UserController extends Controller
{
    ///////////////////////////////////////////////////////////////////////////////////////
    public function test(Request $request){
        $data = $_POST['email'];
        // $data = 'email';
        return view('test', compact('data'));   //works
    }

    public function register()
    {
        if (Session::get('category') == 'admin') {
            $data['title'] = 'Register';
            return view('register', $data);
        }

        return redirect()->intended('/');

    }

    public function register_teacher()
    {
        $data['title'] = 'Register';
        // return view('user/register', $data);
        return view('register-teacher', $data);
    }
    //////////////////////////////////////////////////////////////////////////////////////////
    public function register_action(Request $request)
    {
        $request->validate([
            'userID' => 'required|unique:tb_user',
            'courseID' => 'required',
            'name' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'dob' => 'required',
            'school' => 'required',
            'grade' => 'required',
            'username' => 'required|unique:tb_user',
            'password' => 'required|min:5',
            'password_confirm' => 'required|same:password',
            'category' => 'required',
            'userCategory' => 'required',
        ]);

        $user = new User([
            'userID' => $request->userID,
            'courseID' => $request->courseID,
            'name' => $request->name,
            'address' => $request->address,
            'gender' => $request->gender,
            'email' => $request->email,
            'dob' => $request->dob,
            'school' => $request->school,
            'grade' => $request->grade,
            'username' => $request->username,
            'category' => $request->category,
            'password' => Hash::make($request->password),
            'userCategory'=>$request->userCategory,

        ]);
        $user->save();

        return redirect()->route('register')->with('success', 'Registration success. Please login!');
    }

    public function register_action_teacher(Request $request)
    {
        $request->validate([
            'userID' => 'required|unique:tb_user',
            'courseID' => 'required',
            'name' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'dob' => 'required',
            'school' => 'required',
            'grade' => 'required',
            'username' => 'required|unique:tb_user',
            'password' => 'required|min:5',
            'password_confirm' => 'required|same:password',
            'category' => 'required',
            'userCategory'=>'required',

        ]);

        $user = new User([
            'userID' => $request->userID,
            'courseID' => $request->courseID,
            'name' => $request->name,
            'address' => $request->address,
            'gender' => $request->gender,
            'email' => $request->email,
            'dob' => $request->dob,
            'school' => $request->school,
            'grade' => $request->grade,
            'username' => $request->username,
            'category' => $request->category,
            'password' => Hash::make($request->password),
            'userCategory' => $request->userCategory,

        ]);
        $user->save();

        return redirect()->route('register-teacher')->with('success', 'Registration success. Please login!');
    }
    ////////////////////////////////////////////////////////////////////////////////////////////


    public function login()
    {
        $data['title'] = 'Login';
        return view('login', $data);
    }

    public function login_teacher()
    {
        $data['title'] = 'Login';
        return view('login-teacher', $data);
    }

    public function login_admin()
    {
        $data['title'] = 'Login';
        return view('login-admin', $data);
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////
    public function login_action(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            //soon taro email
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'userCategory' => 'student'])) {
            $request->session()->regenerate();
            session()->put('user', $request->username);
            session()->put('category', 'student');
            return redirect()->intended('/home-student');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }



    public function login_action_teacher(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            //soon taro email
        ]);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'userCategory' => 'teacher'])) {
            $request->session()->regenerate();
            session()->put('user', $request->username);
            session()->put('category', 'teacher');
            return redirect()->intended('/home-teacher');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }

    public function login_action_admin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            //soon taro email
        ]);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'userCategory' => 'admin'])) {
            $request->session()->regenerate();
            session()->put('user', $request->username);
            session()->put('category', 'admin');

            return redirect()->intended('/home-admin');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }





    ////////////////////////////////////////////////////////////////////////////////////////////////

    public function password()
    {
        $data['title'] = 'Change Password';
        return view('password', $data);
    }

    public function password_teacher()
    {
        $data['title'] = 'Change Password';
        return view('password', $data);
    }

    /////////////////////////////////////////////////////////////////////////////////////

    public function password_action(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return back()->with('success', 'Password changed!');
    }



    //////////////////////////////////////////////////////////////////////////////////

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function logout_teacher(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    ////////////////////////////////////////////////////////////////////////////////////////
    public function profileStudent(){
        if (Session::get('category') != 'student') {
            return redirect()->intended('/');
        }
        $user = Session::get('user'); // mencari tau username user yg sedang login
       $profileData = User::where('username', $user)->first(); //gunakan first utk cari 1 data, bkn collection, klo get jatohnya array, ntr hrus pake for each di bladenya
       return view('profile', compact('profileData'));
    }

    public function profileTeacher(){
        if (Session::get('category') != 'teacher') {
            return redirect()->intended('/');
        }
        $user = Session::get('user'); // mencari tau username user yg sedang login
       $profileData = User::where('username', $user)->first(); //gunakan first utk cari 1 data, bkn collection, klo get jatohnya array, ntr hrus pake for each di bladenya
       return view('profile-teacher', compact('profileData'));
    }




    /////////////////////////////////////////////////////////////////////////
    public function changePassword(){
        $user = Session::get('user'); // mencari tau username user yg sedang login
        return view('change-password', compact('user'));
    }

    public function changePasswordTeacher(){
        $user = Session::get('user'); // mencari tau username user yg sedang login
        return view('change-password-teacher', compact('user'));
    }

    public function changePassword_action(Request $request)
    {


        $user = User::find(Auth::id());
        $hashedPassword = $user->password;
        if (Hash::check($request->old_password,   $hashedPassword)) { // jika old pw match dgn DB
            //hashed pw itu adalah pw yg telah kestore didatabase, jd klo msh dicontroller, comparenya ga pake hashed
            if ($request->new_password == $request->new_password_confirmation) { // jika pw confirm mtch
                //add logic here
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->new_password);
                $user->save();
                $request->session()->regenerate();
                return back()->with('success', 'Password changed!');
            }else{
                return back()->withErrors([
                    'password' => 'Password confirmation does not match!',
                ]);
            }

        }
        //jika old pw salah

        return back()->withErrors([
            'password' => 'Wrong Password!',
        ]);

    }

    public function resetPassword_action(Request $request){

        $userEmail = $_POST['userEmail'];
        $user = User::where('email', $userEmail)->first();
        if ($request->new_password == $request->new_password_confirmation) { // jika pw confirm mtch
            //add logic here
            $user->password = Hash::make($request->new_password);
            $user->save();
            $request->session()->regenerate();
            return response()->json(['Password Changed, Please re-login!']);

        }
        return response()->json(['Password Confirmation does not match! Please retry!']);
    }



}
