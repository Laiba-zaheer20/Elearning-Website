<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    //
    public function dashboard(){
        $institute=DB::table('institutes')->get();
        $field=DB::table('fieldss')->get();
        $qualification=DB::table('qualifications')->get();
        $city=DB::table('cities')->join('countries','cities.CountryId','=','countries.CountryId')->get();
        $quiz=DB::table('quizes')
        ->join('courseoffereds','courseoffereds.Covid','=','quizes.Covid')
        ->join('teachers','courseoffereds.TeacherId','=','teachers.TeacherId')
        ->join('courses','courseoffereds.CourseId','=','courses.CourseId')
        ->get();

        $count=DB::table('students')
        ->select('CountryName',DB::raw('count(*) as number'))
        ->join('cities','cities.CityId','=','students.CityId')
        ->join('countries','countries.CountryId','=','cities.CountryId')
        ->groupBy('countries.CountryName')
        ->get();

        return view('admin/dashboard',compact('city','institute','field','qualification','quiz','count'));
   
    }

    public function teachers(){
        $teacher=DB::table('teachers')
        ->join('cities','teachers.CityId','=','cities.CityId')
        ->join('days','teachers.DayId','=','days.DayId')
        ->join('method','method.MethodId','=','teachers.MethodId')
        ->get();
        return view('admin/teachers',compact('teacher'));
    }

    public function students(){
        $student=DB::table('students')
        ->join('cities','students.CityId','=','cities.CityId')
        ->get();
        
        return view('admin/students',compact('student'));
    }

    public function courses(){
        $courses=DB::table('courses')
        ->join('statuss','courses.statusId','=','statuss.statusId')
        ->get();
        return view('admin/courses',compact('courses'));
    }

    public function updateCourseStatus(Request $request){
        
        $affected = DB::table('courses')
        ->where('CourseId', $request->get('id'))
        ->update(['StatusId' => $request->get('status')]);
        if($request->get('status') == 1)
        return response()->json(['status'=>"Pending"]);
        else
        return response()->json(['status'=>"Approved"]);
        
    }


   
    public function coursesOffered(){
        $offered=DB::table('courseoffereds')
        ->join('courses','courses.CourseId','=','courseoffereds.CourseId')
        ->join('teachers','teachers.TeacherId','=','courseoffereds.TeacherId')
        ->join('statuss','statuss.StatusId','=','courseoffereds.StatusId')
        ->get();
        return view('admin/coursesOffered',compact('offered'));
    }
    public function removeOffer(request $request){
        DB::table('courseoffereds')->where('Covid','=',$request->id)->delete();
        return 'done!';
    }

    public function updateOfferStatus(Request $request){
        
        $affected = DB::table('courseoffereds')
        ->where('Covid', $request->get('id'))
        ->update(['StatusId' => $request->get('status')]);
        if($request->get('status') == 1)
        return response()->json(['status'=>"Pending"]);
        else
        return response()->json(['status'=>"Approved"]);
        
    }

    public function registration(){
        $register=DB::table('students')
        ->select('students.FirstName as First','students.LastName as Last'
        ,'teachers.FirstName','teachers.LastName','CourseName','Fees','registrations.Status')
        ->join('registrations','registrations.StudentId','students.StudentId')
        ->join('courseoffereds','courseoffereds.Covid','registrations.Covid')
        ->join('teachers','teachers.TeacherId','courseoffereds.TeacherId')
        ->join('courses','courses.CourseId','courseoffereds.CourseId')
        ->get();
        return view('admin/registration',compact('register'));
    }

    public function complain(){
        return view('admin/complain');
    }
    public function feedback(){
        $feedback=DB::table('feedbacks')
        ->select('Feedback','courses.CourseName','students.FirstName as First','students.LastName as Last'
        ,'teachers.FirstName','teachers.LastName')
        ->join('registrations','registrations.RegId','feedbacks.RegId')
        ->join('students','students.StudentId','registrations.StudentId')
        ->join('courseoffereds','courseoffereds.Covid','registrations.Covid')
        ->join('teachers','teachers.TeacherId','courseoffereds.TeacherId')
        ->join('courses','courses.CourseId','courseoffereds.CourseId')
        ->get();
        return view('admin/feedback',compact('feedback'));
    }

    public function delteacher(Request $req){
        DB::table('teachers')->where('TeacherId','=',$req->id)->delete();
       return true;
    }
    public function removeStudent(request $request){
        DB::table('students')->where('StudentId','=',$request->id)->delete();
        return 'done!';
    }
    
    public function removeCourse(request $request){
        DB::table('courses')->where('CourseId','=',$request->id)->delete();
        return 'done!';
    }

    public function searchteacher(Request $req)
    {
        $data=$req->value;
        $teacher=DB::table('teachers')
        ->join('cities','teachers.CityId','=','cities.CityId')
        ->join('days','teachers.DayId','=','days.DayId')
        ->join('countries','cities.CountryId','=','countries.CountryId')
        ->join('method','method.MethodId','=','teachers.MethodId')
        ->where('FirstName','LIKE','%'.$data.'%')
        ->orWhere('LastName','LIKE','%'.$data.'%')
        ->orWhere('PhoneNo','LIKE','%'.$data.'%')
        ->orWhere('Email','LIKE','%'.$data.'%')
        ->orWhere('Method','LIKE','%'.$data.'%')
        ->orWhere('Days','LIKE','%'.$data.'%')
        ->orWhere('Gender','LIKE',$data.'%')
        ->orWhere('CityName','LIKE','%'.$data.'%')
        ->orWhere('CountryName','LIKE','%'.$data.'%')
        ->orderBy('TeacherId')
        ->get();

        return view('admin.teachers1',compact('teacher'));
    }
}
