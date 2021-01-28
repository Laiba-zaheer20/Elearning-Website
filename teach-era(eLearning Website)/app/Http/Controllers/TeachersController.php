<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Validator;
use Auth;

class TeachersController extends Controller
{
    //
    public function dashboard(){
        return view('teacher/dashboard');
    }
    public function profile(){
        $teacherid =auth()->user()->loginid;
        $t=DB::table('teachers')
        ->where('TeacherId',$teacherid)
        ->join('cities','teachers.CityId','=','cities.CityId')
        ->join('countries','cities.CountryId','=','countries.CountryId')
        ->join('method','method.MethodId','=','teachers.MethodId')
        ->first();

        return view('teacher/profile',compact('t'));
    }
    public function courseOffered(Request $req){
        $id =auth()->user()->loginid;
        $offered=DB::table('courseoffereds')
        ->join('courses','courses.CourseId','=','courseoffereds.CourseId')
        ->join('statuss','statuss.StatusId','=','courseoffereds.StatusId')
        ->where('TeacherId','=',$id)
        ->get();
        $course=DB::table('courses')->get();
        return view('teacher/courseOffered',compact('offered','course'));
    }
    public function courses(){
        $id =auth()->user()->loginid;
        $register=DB::table('students')
        ->join('registrations','registrations.StudentId','students.StudentId')
        ->join('cities','cities.CityId','students.CityId')
        ->join('courseoffereds','courseoffereds.Covid','registrations.Covid')
        ->join('courses','courses.CourseId','courseoffereds.CourseId')
        ->where('TeacherId',$id)
        ->get();
        return view('teacher/courses',compact('register'));
    }
    public function feedback(){
        $id =auth()->user()->loginid;
        $feedback=DB::table('feedbacks')
        ->select('Feedback','courses.CourseName','students.FirstName as First','students.LastName as Last')
        ->join('registrations','registrations.RegId','feedbacks.RegId')
        ->join('students','students.StudentId','registrations.StudentId')
        ->join('courseoffereds','courseoffereds.Covid','registrations.Covid')
        ->join('teachers','teachers.TeacherId','courseoffereds.TeacherId')
        ->join('courses','courses.CourseId','courseoffereds.CourseId')
        ->where('teachers.TeacherId',$id)
        ->get();
        return view('teacher/feedback',compact('feedback'));
    }

     public function quiz(){
        $id =auth()->user()->loginid;
        $quiz=DB::table('quizes')
        ->join('courseoffereds','courseoffereds.Covid','=','quizes.Covid')
        ->join('courses','courses.CourseId','=','courseoffereds.CourseId')
        ->where('TeacherId','=',$id)
        ->get();

        $course=DB::table('courseoffereds')
        ->select('courses.CourseId','CourseName',DB::raw('count(*)'))
        ->join('courses','courses.CourseId','=','courseoffereds.CourseId')
        ->join('registrations','registrations.Covid','=','courseoffereds.Covid')
        ->where('TeacherId','=',$id)
        ->where('courseoffereds.StatusId','=','2')
        ->groupBy('registrations.Covid')
        ->havingRaw('Count(*)>?',[0])
        ->get();
        return view('teacher/quiz',compact('quiz','course'));
    }

    public function qualification(){
        $teacherid =auth()->user()->loginid;
             
        $qualification = DB::table('datas')
        ->where('TeacherId',$teacherid)
        ->join('qualifications','qualifications.QId','=','datas.QId')
        ->join('fieldss','fieldss.FieldId','=','datas.FieldId')
        ->join('institutes','institutes.InstituteId','=','datas.InstituteId')  
        ->get();
        
        $qual1 = DB::table('datas')->select('QId','FieldId','InstituteId')->where('TeacherId',$teacherid)->get();
        if(!$qual1->isEmpty()){
        foreach ($qual1 as $user) {
                $data[] = $user->QId;
        }
       
        $qual = DB::table('qualifications') 
        ->select('Qualification')
        ->whereNotIn('QId',$data)
        ->get();
    }
    else{
        $qual = DB::table('qualifications') 
        ->select('Qualification')
        ->get();
        }

        $field = DB::table('fieldss') 
        ->select('Field')
        ->get();
        $institute = DB::table('institutes') 
        ->select('Institute')
        ->get();
    
        return view('teacher/qualification',compact(['qualification','qual','field','institute']));
    }
    public function changeQualification(){
        $teacherid =auth()->user()->loginid;
             
        $qualification = DB::table('datas')
        ->where('TeacherId',$teacherid)
        ->join('qualifications','qualifications.QId','=','datas.QId')
        ->join('fieldss','fieldss.FieldId','=','datas.FieldId')
        ->join('institutes','institutes.InstituteId','=','datas.InstituteId')  
        ->get();
        
        $qual1 = DB::table('datas')->select('QId','FieldId','InstituteId')->where('TeacherId',$teacherid)->get();
        if(!$qual1->isEmpty()){
        foreach ($qual1 as $user) {
                $data[] = $user->QId;
        }
       
        $qual = DB::table('qualifications') 
        ->select('Qualification')
        ->whereNotIn('QId',$data)
        ->get();
    }
    else{
        $qual = DB::table('qualifications') 
        ->select('Qualification')
        ->get();
        }

        $field = DB::table('fieldss') 
        ->select('Field')
        ->get();
        $institute = DB::table('institutes') 
        ->select('Institute')
        ->get();
    
        return view('teacher/changeQualification',compact(['qualification','qual','field','institute']));}

   public function checkQualification(Request $request){
      $id=$request->qual;
      $qual = DB::table('qualifications') 
      ->select('Qualification')
      ->where('Qualification',$id)->first();
      if(empty($qual)){
        return response()->json(['length'=>1]);
      }
      else
      return response()->json(['length'=>0]);
   }

   public function checkField(Request $request){
    $id=$request->qual;
    $qual = DB::table('fieldss') 
    ->select('Field')
    ->where('Field',$id)->first();
    if(empty($qual)){
      return response()->json(['length'=>1]);
    }
    else
    return response()->json(['length'=>0]);
   }
    
   public function checkInstitute(Request $request){
    $id=$request->qual;
    $qual = DB::table('institutes') 
    ->select('Institute')
    ->where('Institute',$id)->first();
    
    if(empty($qual)){
      return response()->json(['length'=>1]);
    }
    else
    return response()->json(['length'=>0]);
   }

    public function marks(){
        return view('teacher/marks');
    }

    public function addQualification(Request $request){
    $teacherid =auth()->user()->loginid;
            
        $qual = DB::table('qualifications') 
        ->where('Qualification',$request->option1)->first();
        
        if(empty($qual)){
            $qid =DB::table('qualifications')
            ->insertGetId([
             'Qualification' => $request->option1,
            ]);
        }
        else
           $qid=$qual->QId;    
        $field = DB::table('fieldss') 
        ->where('Field',$request->option2)->first();
        
        if(empty($field)){
            $fieldid =DB::table('fieldss')
            ->insertGetId([
             'Field' => $request->option2,
            ]);
        }
        else
          $fieldid=$field->FieldId;
    
        $institute = DB::table('institutes') 
        ->where('Institute',$request->option3)->first();
        
        if(empty($institute)){
            $instituteid =DB::table('institutes')
            ->insertGetId([
             'Institute' => $request->option3,
            ]);
          
        }
        else
         $instituteid=$institute->InstituteId;

         DB::table('datas')
         ->insertGetId([
          'InstituteId' => $instituteid,
          'FieldId' => $fieldid,
          'QId'=> $qid,
          'TeacherId' =>$teacherid
         ]);

    }
    function getdata(Request $request){
        $teacherid =auth()->user()->loginid;
        
        $k = DB::table('method')
                ->where('Method',$request->Method)
                ->first();

        $city = DB::table('cities')
              ->where('cityName',$request->City)
              ->first();
        $country = DB::table('countries')
              ->where('CountryName',$request->Country)
              ->first();
      
        if(empty($city)){
            if(empty($country)){
               $countryid= DB::table('countries')
                   ->insertGetId([
                    'CountryName' => $request->Country
                   ]);
            }
            else
                $countryid =$country->CountryId;
                
            $cityid =DB::table('cities')
            ->insertGetId([
             'CityName' => $request->City,
             'CountryId'=>$countryid
            ]);
        
            DB::table('teachers')
                ->where('TeacherId', $teacherid)
                ->update(['FirstName' => $request->FirstName,'LastName' => $request->LastName,
                'Email'=>$request->Email,'PhoneNo'=>$request->PhoneNo,'Address'=>$request->Address,
                'About'=>$request->About,'StartTime'=>$request->StartTime,'EndTime'=>$request->EndTime,
                'MethodId'=>$k->MethodId ,'CityId'=>$cityid ]);
               
            }
          else
          {
            $cityid=$city->CityId;   
        
            DB::table('teachers')
                ->where('TeacherId', $teacherid)
                ->update(['FirstName' => $request->FirstName,'LastName' => $request->LastName,
                'Email'=>$request->Email,'PhoneNo'=>$request->PhoneNo,'Address'=>$request->Address,
                'About'=>$request->About,'StartTime'=>$request->StartTime,'EndTime'=>$request->EndTime,
                'MethodId'=>$k->MethodId ,'CityId'=>$cityid ]);
               
            }
            return response()->json(['name'=>$request->FirstName ,'lname'=>$request->LastName , 'about'=>$request->About]);
        }

        public function removeQualification(Request $request){
            $id=$request->id;
            $k =explode("_",$id);
            DB::table('datas')->where('QId','=',$k[0])
            ->where('FieldId','=',$k[1])
            ->where('InstituteId','=',$k[2])
            ->where('TeacherId','=',$k[3])
            ->delete();
           
            return response()->json(['id'=>$id]);
        }
        public function addCourses($obj,$course,$file1)
        {
            $id =auth()->user()->loginid;
            
            $query=DB::table('courseoffereds')->insert([
                'Description'=>$obj['description'],
                'Fees'=>$obj['fees'],
                'Demo'=>$file1,
                'CourseId'=>$course,
                'TeacherId'=>$id,
                'StatusId'=>'1',
            ]);
            return true;
        }
    
        public function addCourse(Request $req)
        {
            $id =auth()->user()->loginid;
        
            if($req->course!="")
            {
                $course=DB::table('courses')->where('CourseName','=',$req->course)->get();
                if(empty($course))
                {
                    return 0;
                }
                else
                {
                    return $course;
                }
            }
    
            if($req->courses=="")
            {
                $c=$req->sel;
            }
            else
            {
                $course=DB::table('courses')->select('CourseId')->where('CourseName','=',$req->courses)->get();
                if($course!='[]')
                {
                    foreach($course as $course)
                    $c=$course->CourseId;
                }
                else
                {
                    $c=DB::table('courses')->insertGetId(['CourseName'=>$req->courses,'StatusId'=>'1']);
                }
    
            }
            $select=DB::table('courseoffereds')
            ->select('Covid')
            ->join('courses','courses.CourseId','=','courseoffereds.CourseId')
            ->where('TeacherId','=',$id)
            ->where('courseoffereds.CourseId','=',$c)
            ->get();
    
            if($select=='[]')
            {
                $validator=Validator::make($req->all(),[
                    'file' => 'required|mimes:mp4,mkv,mov,avi|max:2000000',
                ]);
        
                if($validator->passes())
                {
        
                    $dateTime=date('Ymd_His');
                    $file=$req->file('file');
                    $fileName=$dateTime.'-'.$file->getClientOriginalName();
                    $savePath=public_path("/video/");
                    $file->move($savePath, $fileName);
                    $file1="http://localhost/teach-era/public/video/".$fileName;
    
                    $obj=$req->all();
                    $this->addCourses($obj,$c,$file1);
    
                    return ['message'=>true];
        
                }
                else
                {
                    return ['message'=>$validator->errors()->all()];
                }
        
            }
            else
            {
                return ['message'=>'Course Already added'];
            }
            
        }
     
        public function delCourse(Request $req)
        {
            $id=$req->id;
            DB::table('courseoffereds')->where('Covid','=',$id)->delete();
        }

        public function addQuiz(Request $req)
        {
            $id =auth()->user()->loginid;
        
            // return $req->course;
            $select=DB::table('courseoffereds')
            ->select('Covid')
            ->where('CourseId','=',$req->course)
            ->where('TeacherId','=',$id)
            ->get();
            foreach($select as $select)
            {
            $insert=DB::table('quizes')
            ->insertGetId(['QuizName'=>$req->quiz,'Covid'=>$select->Covid]);
            }
            return response()->json(['id'=>$insert]);
                        
        }
    
        public function removeQuiz(Request $req)
        {
            DB::table('quizes')->where('QuizId','=',$req->id)->delete();
            return true;
        }

        public function endRegistration(Request $req)
        {
            DB::table('registrations')->where('RegId',$req->id)->update(['Status'=>2]);
            return true;
        }
 
}