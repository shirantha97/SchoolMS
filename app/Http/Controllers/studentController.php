<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class studentController extends Controller
{
    public function index(){
        $student = Student::all();
        return view('student')->with('student',$student);
    }

    public function store(Request $request){

        // $this->validate($request,[
        //     'studentName'=>'required',
        //     'guardianName'=>'required',
        //     'permanetAddress'=>'required',
        //     'Gender'=>'required',
        //     'Province'=>'required',
        //     'Grade'=>'required',
        //     'BirthDay'=>'required',
        //     'mobileNumber'=>'required|max:10',
        //     'email'=>'required',
        //     'password'=>'required|max:12|min:6',
        // ]);

        $student = new Student();

        $student->studentName = $request->name;
        $student->guardianName =  $request->GuardianName;
        $student->permanetAddress = $request->PermanetAddress;
        $student->currentAddress =  $request->CurrentAddress;
        $student->Gender =  $request->Gender;
        $student->Province =  $request->Province;
        $student->Grade =  $request->Grade;
        $student->BirthDay =  $request->BirthDay;
        $student->mobileNumber =  $request->MobileNumber;
        $student->email =  $request->email;
        $student->password = $request->password;
        
        $user = new User();

        $lastUser = DB::table('users')->orderBy('id', 'desc')->first();
        $lastID = $lastUser->id;

        $user->id = $lastID + 1;
        $user->name = $request->name;
        $user->email =$request->email;
        $user->admin = 0 ;
        $user->password = Hash::make(request('password'));
        $user->role_id = 3 ;
        $user->gender = $request->Gender;
        $user->birthday =$request->BirthDay;

        $student->save();

        $user->save();

        $user = Student::all();
       // return redirect('stdTable');

       return redirect('/std')->with('student',$student);
    }

    public function show(){
        $student = Student::all();
        return view('student')->with('student',$student);
    }

    public function edit($id){
        $student = Student::find($id);
        return view('student')->with('student',$student);
    }

    public function destroy(Request $request){
        dd($request->student_id);
    }
}