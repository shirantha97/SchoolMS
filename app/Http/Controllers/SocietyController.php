<?php

namespace App\Http\Controllers;

use App\Society;
use App\User;
use App\SocietyUser;
use Faker\Provider\DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SocietyController extends Controller
{

    public function index()
    {
        $societies = Society::all();

        return view('society.index')->with('societies' , $societies );
    }

    public function create()
    {
        $teachers = User::where('role_id' , 2)->get();

       return view('society.create')->with('teachers' , $teachers);
    }

    public function store(Request $request)
    {
        $this->validate(request(),[

            'title' => 'required',
            'teacherInCharge' => 'required',
            'description' => 'required',
            'mission' => 'required',
            'venue' => 'required',
            'from' => 'required',
            'to' => 'required',
            'meetingsOn' => 'required',
            'image' => 'required',

        ]);

        if($request->has('venue'))
        {
            $location = request('venue');
            $tod = request('to');
            $fromd =request('from');

            //There is an society within the timeslot that is provided
            $societyCheck1 = Society::where('location',$location)
                ->where('from','>=', $fromd)
                ->where('to','<=',$tod)
                ->first();

            //The society created is within the timeslot of an societys that has been created previously
            $societyCheck2 = Society::where('location',$location)
                ->Where('from','<=',$fromd )
                ->Where('to','>=',$tod )
                ->first();

            //To check whether the From Date Value is entered within a timeslot of an society
            $societyCheck3 = Society::where('location',$location)
                ->where('from','<=',$fromd)
                ->where('to', '>=' , $fromd)
                ->first();

            //To check whether the to Value is entered within a timeslot of an society
            $societyCheck4 = Society::where('location',$location)
                ->where('from','<=',$tod)
                ->where('to', '>=' , $tod)
                ->first();

            if($societyCheck1)
            {
                return redirect()->back()->with('error' ,"{$societyCheck1->location}&nbsp ".' is reserved FROM '."&nbsp{$societyCheck1->from}&nbsp". ' TO &nbsp'. "{$societyCheck1->to}". ' ');

            }elseif($societyCheck2){
                return redirect()->back()->with('error' , "{$societyCheck2->location} &nbsp".'is reserved FROM '."&nbsp{$societyCheck2->from}&nbsp". ' TO &nbsp'. "{$societyCheck2->to}". ' ');
            }
            elseif ($societyCheck3){
                return redirect()->back()->with('error' , "{$societyCheck3->location}&nbsp ".'is reserved FROM '."&nbsp{$societyCheck3->from}&nbsp". ' TO &nbsp'. "{$societyCheck3->to}". ' ');
            }
            elseif($societyCheck4){
                return redirect()->back()->with('error' , "{$societyCheck4->location} &nbsp".'is reserved FROM '."&nbsp{$societyCheck4->from}&nbsp". ' TO &nbsp'. "{$societyCheck4->to}". ' ');
            }
        }

        $weekdays = $request->meetingsOn;
        $newVal = implode( ',' , $weekdays);


        if ($request->hasFile('image')) {

            $imageName = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($imageName, PATHINFO_FILENAME);
            $imageExt = $request->file('image')->getClientOriginalExtension();

            $filenameToStore = $filename . '_' . time() . '.' . $imageExt;

            $path = $request->file('image')->storeAs('public/img', $filenameToStore);


        } else {
            $filenameToStore = 'society_default.jpg';
        }

        $society = new Society;

        $society->title = request('title');
        $society->description = request('description');
        $society->from = request('from');
        $society->to = request('to');
        $society->image = $filenameToStore;
        $society->email = request('email');
        $society->user_id = request('teacherInCharge');
        $society->mission = request('mission');
        $society->location = request('venue');
        $society->role_id = 4;
        $society->meetingsOn = $newVal;


        $user = new User();

        $lastUser = DB::table('users')->orderBy('id', 'desc')->first();
        $lastID = $lastUser->id;

        $user->id = $lastID + 1;
        $user->name = request('title');
        $user->email = request('email');
        $user->admin = 0 ;
        $user->password = Hash::make(request('password'));
        $user->role_id = 4 ;
        $user->gender = "Society" ;
        $user->birthday = now() ;

        $society->save();

        $user->save();

        return redirect('/Society')->with('success', "New society '" . "{$society->title}" . "' has been created ");

    }


    public function show($id)
    {
        $society = Society::find($id);

        return view('society.show')->with('society', $society);
    }


    public function edit($id)
    {
        $sp = Society::find($id);

        $teachers = User::where('role_id' , 2)->get();

        $result = $sp->meetingsOn;
        $checkbox = explode(",", $result);

        if($sp){
            return view('Society.edit')->with('society' , $sp)->with('checkbox' , $checkbox)->with('teachers' , $teachers);
        }else{
            return back()->with('error','Could not find the society');
        }
    }


    public function update(Request $request, $id)
    {


        $this->validate(request(), [
            'title' => 'required',
            'description' => 'required',
            'mission' => 'required',
            'venue' => 'required',
            'from' => 'required',
            'meetingsOn' => 'required',
            'to' => 'required',
            'image' => 'required',
            'teacherInCharge' => 'required',
        ]);

        $old_loc = $request->originalLocation;
        $newLoc = $request->venue;
        $oldFrom = $request->originalFrom;
        $oldTo = $request->originalTo;
        $newFrom = $request->from;
        $newTo = $request->to;


        $from_old = mb_substr($oldFrom, 0, 5);
        $to_old = mb_substr($oldTo, 0, 5);


        if(! ($newLoc == $old_loc) and ($from_old==$newFrom) and ($to_old == $newTo))
        {
            $location = request('venue');
            $tod = request('to');
            $fromd =request('from');

            //There is an society within the timeslot that is provided
            $societyCheck1 = Society::where('location',$location)
                ->where('from','>=', $fromd)
                ->where('to','<=',$tod)
                ->first();

            //The society created is within the timeslot of an societys that has been created previously
            $societyCheck2 = Society::where('location',$location)
                ->Where('from','<=',$fromd )
                ->Where('to','>=',$tod )
                ->first();

            //To check whether the From Date Value is entered within a timeslot of an society
            $societyCheck3 = Society::where('location',$location)
                ->where('from','<=',$fromd)
                ->where('to', '>=' , $fromd)
                ->first();

            //To check whether the to Value is entered within a timeslot of an society
            $societyCheck4 = Society::where('location',$location)
                ->where('from','<=',$tod)
                ->where('to', '>=' , $tod)
                ->first();

            if($societyCheck1)
            {
                return redirect()->back()->with('error' ,"{$societyCheck1->location}&nbsp ".' is reserved FROM '."&nbsp{$societyCheck1->from}&nbsp". ' TO &nbsp'. "{$societyCheck1->to}". ' ');

            }elseif($societyCheck2){
                return redirect()->back()->with('error' , "{$societyCheck2->location} &nbsp".'is reserved FROM '."&nbsp{$societyCheck2->from}&nbsp". ' TO &nbsp'. "{$societyCheck2->to}". ' ');
            }
            elseif ($societyCheck3){
                return redirect()->back()->with('error' , "{$societyCheck3->location}&nbsp ".'is reserved FROM '."&nbsp{$societyCheck3->from}&nbsp". ' TO &nbsp'. "{$societyCheck3->to}". ' ');
            }
            elseif($societyCheck4){
                return redirect()->back()->with('error' , "{$societyCheck4->location} &nbsp".'is reserved FROM '."&nbsp{$societyCheck4->from}&nbsp". ' TO &nbsp'. "{$societyCheck4->to}". ' ');
            }
        }



        $weekdays = $request->meetingsOn;
        $newVal = implode( ',' , $weekdays);


        if ($request->hasFile('image')) {

            $imageName = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($imageName, PATHINFO_FILENAME);
            $imageExt = $request->file('image')->getClientOriginalExtension();

            $filenameToStore = $filename . '_' . time() . '.' . $imageExt;

            $path = $request->file('image')->storeAs('public/img', $filenameToStore);


        } else {
            $filenameToStore = 'societys_default.jpg';
        }

        $society = Society::find($id);

        $society->title = request('title');
        $society->description = request('description');
        $society->mission = request('mission');
        $society->from = request('from');
        $society->to = request('to');
        $society->user_id = request('teacherInCharge');
        $society->image = $filenameToStore;
        $society->location = request('venue');
        $society->meetingsOn = $newVal;


        $society->save();

        $societies = Society::all();

        return redirect('/Society')->with('society',$society)->with('societies' , $societies)->with('success', "society '" . "{$society->title}" . "' has been updated ");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $society = Society::find($id);


        if ($society) {

            $user = User::where('email' , $society->email);

            $user->delete();

            $society->delete();
            return redirect('Society/index')->with('success', "society '" . "{$society->title}" . "' has been deleted ");
        }

        return redirect('Society')->with('error', "society was not deleted ");
    }

    public function addStudent(request $request)
    {

        $society = Society::find($request->input('society_id'));

        $user = User::where('id', $request->input('user_id'))->first();

        $societyUser = DB::table('society_user')
            ->where('user_id', $user->id)
            ->where('society_id', $society->id)
            ->first();

        if ($societyUser) {

            return view('society.show')->with('society', $society)->with('error', "User already enrolled");

        }else{
            if ($user && $society) {
                $society->users()->attach($user->id);

                return view('society.show')->with('society', $society)->with('success', "User has been added");
            }else{
                return view('society.show')->with('error', "User has not been added");
            }

        }

    }

    public function removeStudent(request $request)
    {

        $society = Society::find($request->input('society_id'));

        $user = User::where('id', $request->input('user_id'))->first();

        $societyUser = DB::table('society_user')
            ->where('user_id', $user->id)
            ->where('society_id', $society->id)
            ->first();




        if ($societyUser)
        {

            DB::table('society_user')->where('user_id', $user->id )
                ->where('society_id',$society->id )
                ->delete();

            return view('society.show')->with('society' , $society)->with('success', "User Un-Enrolled");

        }else{

            return view('society.show')->with('society', $society)->with('error', "User was not Un-Enrolled");

        }

    }

    public function enrolledStudents(request $request)
    {
        $students = DB::table('society_user')
            ->where('society_id',$request->input('society_id'))->get();

        $user=null;

        if($students){

            foreach ($students as $student) {

                $user[] = User::find($student->user_id);
            }

            if($user)
            {
                return view('society.enrolledStudents')->with('students', $students)->with('user' , $user);
            }else{
                return redirect()->back()->with('error' , "There are no students that has enrolled under this society");
            }

        }else{
            return redirect()->back()->with('error' , "There are no students that has enrolled under this society");

        }

    }

    public function mysocieties()
    {
        if (Auth()->user())
        {
            $user = Auth()->user();
            $name = $user->name;

            $id = $user->id;

            $societies = Society::orderBy('created_at', 'desc')->where('user_id', $id)->paginate(3);

            return view('society/mysocieties')->with('societies', $societies)->with('success', "Showing societies of '" . "{$name}" . "' .");
        }

    }

    public function search()
    {
        $society = request('search');
        $societies = Society::search($society)->paginate(3);

        return view('society.index')->with('societies', $societies)->with('success', "Search Result for '" . "{$society}" . " '");
    }

    public function createDemo()
    {

        $society = new Society;

        $society->title = "Astronomy Club";
        $society->description = "Prepare a generation of young people for the challenges of the future is a task which forces us to rethink the school, not just for being difficult, but also because students feel that the school has very little to offer, especially something that interests them. Thus, the school is dysfunctional, is ill, and needs prompt treatment. School have to adjust to the new times, and this does not mean changing the old blackboards by advanced interactive whiteboards. The school has to find the way to the students with something that seduce them: the Challenge. The Astronomy Club that I lead in my school is essentially a Project space. Students who voluntarily joined the club, organize themselves according to their interests around projects whose outcome is not defined from the beginning, which requires them to do, undo and redo. Which obliges them to feel the need to ask for help to mathematics or physics to achieve answers, to feel the passion to study with a genuine purpose of learning. Some examples of the work: The younger students are challenged to reproduce the historical astronomical experiments that have opened the doors of knowledge such as the Eratosthenes experiment to determine the perimeter of the Earth (on equinox), or by using congruent triangles, determine the diameter the sun. These students are driven to establish distance scales in the solar system, which, to their astonishment, allows them to clear misconceptions that arise from some pictures of books and allows them to have a scientifically correct idea of the planetary orbit and distance separating the planets of the Solar System.";
        $society->mission = "The primary goal of the Astronomy Club is to foster interest in amateur astronomy by developing and promoting programs for its membership, and the amateur community at large, in the areas of observational astronomy and electronic communications";
        $society->location = "Auditorium";
        $society->from = "08:00:00";
        $society->to = "11:00:00";
        $society->meetingsOn = "Monday,Wednesday";
        $society->user_id =Auth()->user()->id;
        $society->image = 0;

        $result = $society->meetingsOn;
        $checkbox = explode(",", $result);

//                dd($society);
        return view('society.demo')->with('society' , $society)->with('checkbox' , $checkbox);

    }
}
