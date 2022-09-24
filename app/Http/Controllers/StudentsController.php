<?php

namespace App\Http\Controllers;
use App\Imports\StudentsImport;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Http\Request;
use App\Students;
use App\Announcement;
use App\User;
use DB;
use PDF;

use Redirect,Response;

class StudentsController extends Controller
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
            'isUser',
        ];

        $this->middleware($array);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function dashboard()
    {
        $announcement = Announcement::all();
        //dd($announcement);
        return view('student.index',['anc'=>$announcement]);
    }

    public function profile(){
    //    dd(Auth::user());

    $data = Students::where('appnum', '=',Auth::user()->appnum)->get();
    // dd($data);

    return view('student.profile',['data' =>$data]);

    }

    public function editprofile(Students $student){
        return view('student.editprofile')->with('student',$student);
    }




    // public function updateprofile(Request $request,$id){

    //     $id = session()->get('appnum');
    //     dd($id);
    //     $this->validate($request,[
    //         'profilepic.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     if($request->hasfile('profilepic'))
    //     {

    //         if($files = $request->file('profilepic')){

    //                 $image_name = md5(rand(1000,10000));
    //                 $ext = strtolower($files->getClientOriginalExtension());
    //                 $image_full_name = $image_name.'.'.$ext;
    //                 $upload_path = 'images/';
    //                 $image_url = $upload_path.$image_full_name;
    //                 $files->move('images/profilepic',$image_full_name);
    //                 $image = $image_url;

    //         }

    //         $data = Students::find($id);

    //         $currentpic = str_replace($data->profile_pic,'',$image);
    //         $data->profile_pic = $image;
    //         $data->phonenumber =$request->input('contact');
    //         $data->email =$request->input('email');
    //         $data->address =$request->input('address');
    //         $data->update();
    //         // return back()->with('success','Successfully Updated!');
    //         return redirect('/students/profile')->with('success', 'Student has been Updated');
    //     }
    // }

    public function updateprofile(Request $request,$id){


        $this->validate($request,[
            'profile_pic.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        $studentdata = Students::find($id);

        $currentfile = $studentdata->profile_pic;
        //dd($currentfile);
        $userid = $studentdata->appnum;


        if($request->hasfile('profile_pic'))
         {
            $image = array();
            if($files = $request->file('profile_pic')){
                foreach($files as $file){
                    $image_name = md5(rand(1000,10000));
                    $ext = strtolower($file->getClientOriginalExtension());
                    $image_full_name = $image_name.'.'.$ext;
                    $upload_path = 'public/images/';
                    // $imagepath = 'public/'.$studentdata->profile_pic;
                    $image_url = $upload_path.$image_full_name;
                    $file->move($upload_path,$image_full_name);
                    $image[] = $image_url;
                }
            }


            if($studentdata->profile_pic == "")
            {
                $currentfile .= implode('|',$image);
            }
            else{
                $currentfile .= '|'. implode('|',$image);

            }

         }
            $currentpic = str_replace($studentdata->profile_pic,'',$image);
            // $studentdata->contact = $request->contact;
            // $studentdata->email = $request->email;
            // $studentdata->address = $request->address;
            $studentdata->profile_pic = $image_url;
            $studentdata->update();
            return redirect('/students/profile')->with('success', 'Profile Updated');
    }

    // public function updateprofile(Request $request,$id){
    //     // $id = session()->get('appnum');
    //     $studentdata = Students::find($id);
    //     $userid = $studentdata->appnum;
    //     // dd($userid);

    //     $this->validate($request,[
    //         'profile_pic.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);


    //     if($request->hasfile('profile_pic'))
    //     {

    //         if($files = $request->file('profile_pic')){

    //                 $image_name = md5(rand(1000,10000));
    //                 $ext = strtolower($files->getClientOriginalExtension());
    //                 $image_full_name = $image_name.'.'.$ext;
    //                 $upload_path = 'images/';
    //                 $image_url = $upload_path.$image_full_name;
    //                 $files->move('images/profile_pic',$image_full_name);
    //                 $image = $image_url;

    //         }

    //         $data = Students::find($id);

    //         $currentpic = str_replace($data->profile_pic,'',$image);
    //         $data->profile_pic = $image;
    //         $data->middlename =$request->input('contact');
    //         $data->email =$request->input('email');
    //         $data->address =$request->input('address');
    //         $data->update();

    //         return redirect('/students/profile')->with('success', 'Profile Updated');
    //     }
    // }


}
