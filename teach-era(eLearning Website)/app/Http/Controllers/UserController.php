<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Auth;

class UserController extends Controller
{

    public function index(){
        return view('user/index');
        }

    public function teachers(){
        $teacher=DB::table('teachers')
        ->join('courseoffereds','courseoffereds.TeacherId','=','teachers.TeacherId')
        ->where('StatusId','=','2')
        ->groupBy('courseoffereds.TeacherId')
        ->get();

        $course=DB::table('courseoffereds')
        ->join('courses','courses.CourseId','=','courseoffereds.CourseId')
        ->where('courseoffereds.StatusId','=','2')
        ->where('courses.StatusId','=','2')
        ->get();

        $qualification=DB::table('teachers')
        ->select('teachers.TeacherId',DB::raw('max(qualifications.Qualification) as Qualification'))
        ->join('datas','datas.TeacherId','=','teachers.TeacherId')
        ->join('qualifications','qualifications.Qid','=','datas.Qid')
        ->groupBy('teachers.TeacherId')
        ->get();

        return view('user/teachers',compact('teacher','course','qualification'));
        }

    public function courses(){
        $course=DB::table('courses')
        ->where('StatusId','=','2')
        ->get();
        return view('user/courses',compact('course'));
        }

    public function profile($id){
        
        $teacher=DB::table('teachers')
        ->join('courseoffereds','courseoffereds.TeacherId','=','teachers.TeacherId')
        ->join('courses','courses.CourseId','=','courseoffereds.CourseId')
        ->join('cities','cities.CityId','teachers.CityId')
        ->join('Days','Days.DayId','teachers.DayId')
        ->where('courseoffereds.StatusId','=','2')
        ->where('courses.StatusId','=','2')
        ->where('teachers.TeacherId','=',$id)
        ->first();

        $qualification=DB::table('datas')
        ->join('qualifications','qualifications.Qid','=','datas.Qid')
        ->join('fieldss','fieldss.FieldId','=','datas.FieldId')
        ->join('institutes','institutes.InstituteId','=','datas.InstituteId')
        ->where('datas.TeacherId',$id)
        ->get();
        
        $teachers=DB::table('teachers')
        ->join('courseoffereds','courseoffereds.TeacherId','=','teachers.TeacherId')
        ->join('courses','courses.CourseId','=','courseoffereds.CourseId')
        ->where('courseoffereds.StatusId','=','2')
        ->where('courses.StatusId','=','2')
        ->where('teachers.TeacherId','=',$id)
        ->get();

        return view('user/profile',compact('teacher','qualification','teachers'));
        }

    public function login(){
        return view('user/login');
        }

    public function register(){
    
        $days = DB::table('days')->get();
        return view('user/register',compact('days'));
        
    }

        public function courseteachers($id)
        {
            $teacher=DB::table('teachers')
            ->join('courseoffereds','courseoffereds.TeacherId','=','teachers.TeacherId')
            ->where('StatusId','=','2')
            ->where('CourseId',$id)
            ->groupBy('courseoffereds.TeacherId')
            ->get();
    
            $course=DB::table('courseoffereds')
            ->join('courses','courses.CourseId','=','courseoffereds.CourseId')
            ->where('courseoffereds.StatusId','=','2')
            ->where('courses.StatusId','=','2')
            ->get();
    
            $qualification=DB::table('teachers')
            ->select('teachers.TeacherId',DB::raw('max(qualifications.Qualification) as Qualification'))
            ->join('datas','datas.TeacherId','=','teachers.TeacherId')
            ->join('qualifications','qualifications.Qid','=','datas.Qid')
            ->groupBy('teachers.TeacherId')
            ->get();
    
            return view('user/teachers',compact('teacher','course','qualification'));
        }

        public function addReg(Request $req)
        {
           DB::table('registrations')
           ->insert(['TIME'=>$req->time,
                    'StudentId'=>auth()->user()->loginid,
                    'Covid'=>1]);
                    return true;
        }
}