<?php

namespace App\Http\Controllers;
use App\Imports\StudentsImport;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Students;
use App\Announcement;
use App\AnnouncementImage;
use App\User;
use App\Admin;
use DB;
use PDF;
use Auth;
use Carbon\Carbon;
use Storage;
use Mail;
use App\Mail\MailNotify;

use Redirect,Response;

class AdminsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $array = [
            'auth',
            'isAdmin',

        ];
        $this->middleware($array);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */





    // public function index(){
    //     $students = Students::all();
    //     $data = [
    //         'students' => $students,
    //     ];

    //     return view('index', $data);
    // }

    // public function create(){
    //     return view('create');
    // }

    /**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/

	public function index(Request $request)
	{

		$students = Students::get();
        if($request->ajax()){
            $allData = DataTables::of($students)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                // EDIT
                $btn = '<a href="javascript:void(0)" data-toggle="toolip" data-id="'.
                $row->id.'" data-original-title="Edit" class="edit btn btn-success btn-sm
                editStudent">Edit</a>';

                // DELETE
                $btn.= '<a href="javascript:void(0)" data-toggle="toolip" data-id="'.
                $row->id.'" data-original-title="Delete" class="edit btn btn-danger btn-sm
                deleteStudent">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
            return $allData;
        }

		return view('index',compact('students'));
	}

    // public function application()
	// {

	// 	$students = Students::paginate(4);
	// 	return view('index',compact('students'))->with('i', (request()->input('page', 1) - 1) * 4);
	// }

	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/

	public function newadmin()
	{
		return view('create');
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @return \Illuminate\Http\Response
	*/

    //registration

    public function store(Request $request){
        // dd($request->all());

        $getData = Students::where('id',$request->student_id)->first();
        $userID = "";
        if(!empty($getData)){
            $userID = $getData->userid;
        }
        // dd($userID);
        $this->validate($request, [
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'birthday' => 'required|date|before:-18 years',
            'birthplace' => 'required',
            'contact' => 'required|numeric',
            'address' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$request->student_id], // yung validation naman dito nalilito siya kasi unique dapat per user kaso di niya alam kung kaninong user ba yung email na pinapasa kaya dinugtong ko to sa unique:user "email,'.$request->student_id"
        ]);
        // dd($request->student_id);
        $email = $request['email'];

        $isEmpty = User::count();
        $fullname = $request['firstname'].' '. $request['middlename'].' '. $request['lastname'];

        if($isEmpty == 0){

             $latestID = 00001;
             $applicationID = '2022A'.$latestID;
         }
         else{
             $latest = User::all()->last()->id;
             $latestID = $latest + 00001;
             $applicationID = '2022A'.$latestID;
         }

         // dapat ang target mo dito di yung $request->student_id, dapat yung user_id na foreign key dun sa Students table mo
         $userdata = User::updateOrCreate(
            ['id' => $userID],
            [
                'appnum' => $applicationID,
                'firstname' => $request['firstname'],
                'middlename' => $request['middlename'],
                'lastname' => $request['lastname'],
                'username' => $request['username'],
                'emailVerify_token'=>Str::random(60),
                'email' => $request['email'],
                'password' => Hash::make($request['lastname']),
                'user_level' => '2',

            ]);

        // ito okay na
        Students::updateOrCreate(
            ['id' =>$request['student_id']],
            [
                'userid' => $userdata->id,
                'appnum' => $applicationID,
                'name' => $request['firstname'].' '.$request['middlename']. ' '.$request['lastname'],
                'firstname' => $request['firstname'],
                'middlename' => $request['middlename'],
                'lastname' => $request['lastname'],
                'username' => $request['username'],
                'gender' => $request['gender'],
                'birthday' => $request['birthday'],
                'birthplace' => $request['birthplace'],
                'age' => $request['agevalue'],
                'contact' => $request['contact'],
                'email' => $request['email'],
                'address' => $request['address'],
                'profile_pic' => 'images/admin_user.png',
                'created_at' => now(),
            ]);


        $studentdata = Students::where('email',$userdata->email)->first();
        if ($studentdata){

            $studentdata->update([
                'userid' => $userdata->id,
            ]);
        }

        Mail::to($email)->send(new MailNotify($userdata));

        // return redirect('/application')->with('success', 'Student has been Added');
        return response()->json(['success' => 'Student has been Added']);
    }

    // public function store(Request $request){

    //     $this->validate($request, [
    //                 'firstname' => 'required',
    //                 'middlename' => 'required',
    //                 'lastname' => 'required',
    //                 'username' => 'required',
    //                 'gender' => 'required',
    //                 'birthday' => 'required|date|before:-18 years',
    //                 'birthplace' => 'required',
    //                 'contact' => 'required|numeric',
    //                 'address' => 'required',
    //                 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //             ]);

    //             $email = $request['email'];

    //     $isEmpty = User::count();
    //     $fullname = $request['firstname'].' '. $request['middlename'].' '. $request['lastname'];

    //     if($isEmpty == 0){

    //          $latestID = 00001;
    //          $applicationID = '2022A'.$latestID;
    //      }
    //      else{
    //          $latest = User::all()->last()->id;
    //          $latestID = $latest + 00001;
    //          $applicationID = '2022A'.$latestID;
    //      }

    //             $userdata = User::create([
    //                         'appnum' => $applicationID,
    //                         'firstname' => $request['firstname'],
    //                         'middlename' => $request['middlename'],
    //                         'lastname' => $request['lastname'],
    //                         'username' => $request['username'],
    //                         'emailVerify_token'=>Str::random(60),
    //                         'email' => $request['email'],
    //                         'password' => Hash::make($request['lastname']),
    //                         'user_level' => '2',

    //                     ]);

    //     Students::updateOrCreate(
    //         ['id'=>$request->student_id],
    //             [
    //                 'userid' => $userdata->id,
    //                 'appnum' => $applicationID,
    //                 'name' => $request['firstname'].' '.$request['middlename']. ' '.$request['lastname'],
    //                 'firstname'=>$request->firstname,
    //                 'middlename'=>$request->middlename,
    //                 'lastname'=>$request->lastname,
    //                 'username'=>$request->username,
    //                 'gender'=>$request->gender,
    //                 'birthday'=>$request->birthday,
    //                 'birthplace'=>$request->birthplace,
    //                 'contact'=>$request->contact,
    //                 'address'=>$request->address,
    //                 'email'=>$request->email,

    //             ]
    //     );
    //     Mail::to($email)->send(new MailNotify($userdata));

    //     return response()->json(['success' => 'Student has been Added']);
    // }

    public function emailverification($token){
        $checktoken = User::where('emailVerify_token','=',$token)->first();
        if(isset($checktoken)){
            if(!$checktoken->email_verified_at){

                $checktoken->email_verified_at = Carbon::now();
                $checktoken->update();
                return redirect('login')->with('success','Successfully Verified!');
            }

        }else{
            return redirect('login')->with('fail','Account is already verified!');
        }
    }


        // SHOW UPDATE
    // public function edit(Students $student){
    //     return $student;
    //     // return view('edit')->with('student',$student);
    // }

        // UPDATE FUNCTION
    public function update(Request $request, Students $student){


        //$email = $student->email;
        // dd($email);

        $student->update([
            // 'name' => $request->firstname.' '.$request->middlename.' '.$request->lastname,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'gender' => $request->gender,
            'age' => $request->age,
            'birthday' => $request->birthday,
            'birthplace' => $request->birthplace,
            'contact' => $request->contact,
            'email' => $request->email,
            'address' => $request->address,
            'updated_at' => now(),
        ]);
        // $studentdata = User::where('email',$student->email)->first();
        $data = User::where('appnum',$student->appnum)->first();
        if ($data){

            $data->update([
                'email' => $student->email,
            ]);
        }
        // return redirect('/application')->with('success', 'Student has been Updated');
        return response()->json(['success' => 'Student has been Edit']);
    }

    public function edit($id){
        $students = Students::find($id);
        return response()->json($students);

        }

    public function editPost(request $request){

        // dd($request);
        dd($request->all());

        $post = Post::find ($student->id);
        $post->firstname = $student->firstname;
        $post->middlename = $student->middlename;
        $post->lastname = $student->lastname;
        $post->gender = $student->gender;
        $post->birthday = $student->birthday;
        $post->birthplace = $student->birthplace;
        $post->contact = $student->contact;
        $post->email = $student->email;
        $post->address = $student->address;
        $post->updated_at = now();
        $post->update();
        return response()->json($post);
    }





        //DELETE FUNCTION
    public function destroy($id)
	{

        $studentdata = Students::find($id);
        //dd($studentdata);
        $userID = $studentdata->userid;

        User::where('id',$userID)->delete();
        Students::where('id',$id)->delete();
        // return redirect('/application')->with('success','Student has been Deleted');
        return response()->json(['success' => 'Student has been Deleted']);
	}


    /**
	* Show the form for editing the specified resource.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/

	// public function edit($id)
	// {
	// 	$where = array('id' => $id);
	// 	$student = Students::where($where)->first();
	// 	return Response::json($student);
	// }

	// /**
	// * Update the specified resource in storage.
	// *
	// * @param \Illuminate\Http\Request $request
	// * @param int $id
	// * @return \Illuminate\Http\Response
	// */



      //PDF EXPORT
      public function downloadPDF(){
        $students = Students::all();
       $pdf = PDF::loadView('studentlist', array('students' => $students))
       ->setPaper('a4','landscape');
        //dd($pdf);
        return $pdf->download('Student-List.pdf');

    }
    //IMPORT TO EXCEL
    public function importForm(){
        return view('import-form');
    }

    public function import(Request $request){
        //dd($request);
        Excel::import(new StudentsImport,$request->file);
        return redirect('/students')->with('success','Excel file imported successfully');
    }


    //EXPORT TO EXCEL

    public function exportIntoExcel(Request $request){
        //dd($request);
        return Excel::download(new StudentsExport,'students.xlsx');
    }

    public function exportIntoCSV(){
        return Excel::download(new StudentsExport,'student.csv');
    }


    // CHARTS
    public function piecharts(Students $student){
        // return view('chart')->with('chart',$student);

     $data = DB::table('students')
       ->select(
        DB::raw('gender as gender'),
        DB::raw('count(*) as number'))
       ->groupBy('gender')
       ->get();
     $array[] = ['Gender', 'Number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->gender, $value->number];
     }
     return view('piechart')->with('gender', json_encode($array));
    }


    public function linecharts(){

        $data['lineChart'] = Students::select(\DB::raw("COUNT(*) as count"),\DB::raw("MONTHNAME(created_at) as month_name"),\DB::raw('max(created_at) as createdAt'))
        ->whereYear('created_at', date('Y'))
        ->groupBy('month_name')
        ->orderBy('createdAt')
        ->get();

        // dd($data);

        return view('linechart', $data);

    }


    public function dashboard(){
        //linechart

        $data['lineChart'] = Students::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created_at) as month_name"),\DB::raw('max(created_at) as createdAt'))
        ->whereYear('created_at', date('Y'))
        ->groupBy('month_name')
        ->orderBy('createdAt')
        ->get();


        //piechart
        $applicants= DB::table('students')
        ->select(
         DB::raw('gender as gender'),
         DB::raw('count(*) as number'))
        ->groupBy('gender')
        ->get();
      $array[] = ['Gender', 'Number'];
      foreach($applicants as $key => $value)
      {
       $array[++$key] = [$value->gender, $value->number];
      }
      return view('dashboard',$data)->with('gender', json_encode($array));
    }

    public function addAnnouncement()
	{
        // $image = Announcement::paginate(4);

        // return view('announcement',['anc'=>$image])->with('i', (request()->input('page', 1) - 1) * 4);
        return view('announcement');
	}

    public function announcement_store(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'start_date' =>'required',
            'end_date' =>'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        if($request->hasfile('filename'))
         {
            $image = array();
            if($files = $request->file('filename')){
                foreach($files as $file){
                    $image_name = md5(rand(1000,10000));
                    $ext = strtolower($file->getClientOriginalExtension());
                    $image_full_name = $image_name.'.'.$ext;
                    $upload_path = 'images/';
                    $image_url = $upload_path.$image_full_name;
                    $file->move($upload_path,$image_full_name);
                    $image[] = $image_url;
                }
            }
            Announcement::insert([
                'title' =>$request->title,
                'content' =>$request->content,
                'filename' =>implode('|',$image),
                'start_date' =>$request->start_date,
                'end_date' =>$request->end_date,
            ]);

            // return back();
            return redirect('/announcements')->with('success', 'New Announcement Uploaded');
        }

    }


    public function displayAnnouncements()
	{
        $data = Announcement::paginate(4);

		// return view('index',compact('students'))->with('i', (request()->input('page', 1) - 1) * 4);
        return view('announcementlist',['anc'=>$data])->with('i', (request()->input('page', 1) - 1) * 4);
	}

    public function deleteAnnouncement($id){


        $data = Announcement::find($id);
        $files = $data->file;
        $image = explode('|',$files);
        foreach ($image as $a) {

        //    Storage::delete("/".$a);
        }
        $data->delete();
        return back()->with('success', 'Deleted');
    }

    public function showEdit( $id){
        $edit = Announcement::find($id);
        return view('editannouncement',['edit'=>$edit]);
    }

    public function updateAnnouncement(Request $request,$id){

        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'start_date' =>'required',
            'end_date' =>'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        $annc = Announcement::find($id);

        $currentfile = $annc->filename;

        if($request->hasfile('filename'))
         {
            $image = array();
            if($files = $request->file('filename')){
                foreach($files as $file){
                    $image_name = md5(rand(1000,10000));
                    $ext = strtolower($file->getClientOriginalExtension());
                    $image_full_name = $image_name.'.'.$ext;
                    $upload_path = 'images/';
                    $image_url = $upload_path.$image_full_name;
                    $file->move($upload_path,$image_full_name);
                    $image[] = $image_url;
                }
            }


            if($annc->filename == "")
            {
                $currentfile .= implode('|',$image);
            }
            else{
                $currentfile .= '|'. implode('|',$image);

            }


         }
         $annc->title = $request->title;
        $annc->content = $request->content;
        $annc->start_date = $request->start_date;
        $annc->end_date =$request->end_date;
        $annc->filename = $currentfile;
        $annc->update();
        return redirect('/announcements')->with('success', 'Announcement Updated');
    }


    // create new admin

    public function adminstore(Request $request){

        $this->validate($request, [
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255'],
            'gender' => 'required',
            'birthday' => 'required',
            'birthplace' => 'required',
            'contact' => 'required|numeric',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => 'required',
        ]);

        $email = $request['email'];
        $Year = date("Y");
        $user_admin = User::where('user_level','=','1')->count();
        $check_email = User::where('email','=',$request->email)->first();
        $isEmpty = User::count();
        $fullname = $request['firstname'].' '. $request['middlename'].' '. $request['lastname'];
        $check_email = User::where('email','=',$request->email)->first();

        if($check_email == true){
            return back()->with('success', 'Email is already existed');
        }
        if($isEmpty == 0){

             $latestID = 00001;
             $adminID = $Year.'ADMIN'.$latestID;
         }
         else{
             $latest = User::all()->last()->id;
             $latestID = $latest + 00001;
             $adminID = $Year.'ADMIN'.$latestID;
         }

         $userdata = User::create([
            'appnum' => $adminID,
            'firstname' => $request['firstname'],
            'middlename' => $request['middlename'],
            'lastname' => $request['lastname'],
            'username' => $request['username'],
            'emailVerify_token'=>Str::random(60),
            'email' => $request['email'],
            'password' => Hash::make($request['lastname']),
            'user_level' => '1',

        ]);

        Admin::create([
            'userid' => $userdata->id,
            'appnum' => $adminID,
            'name' => $request['firstname'].' '.$request['middlename']. ' '.$request['lastname'],
            'firstname' => $request['firstname'],
            'middlename' => $request['middlename'],
            'lastname' => $request['lastname'],
            'username' => $request['username'],
            'gender' => $request['gender'],
            'birthday' => $request['birthday'],
            'birthplace' => $request['birthplace'],
            'age' => $request['agevalue'],
            'contact' => $request['contact'],
            'email' => $request['email'],
            'address' => $request['address'],
            'created_at' => now(),
        ]);


        $studentdata = Students::where('email',$userdata->email)->first();
        if ($studentdata){

            $studentdata->update([
                'userid' => $userdata->id,
            ]);
        }

        Mail::to($email)->send(new MailNotify($userdata));

        //return redirect()->route('student.index')->with('success', 'Student has been Added');
        return redirect('/new-admin')->with('success', 'New Admin Account Created');
    }


}
