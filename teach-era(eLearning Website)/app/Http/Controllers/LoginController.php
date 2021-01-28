<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Validator;
use Auth;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function logout(){
        auth()->logout();
        return view('user/index');
    }

    public function checkLogin(Request $request){        
        
        $p=validator::make($request->all(), [
        'username' => 'required|email',
        'password' => 'required|alphaNum|min:4',
        ]);
        
        if($p->passes()){
        
            $user_data = array(
                'email' => $request->get('username'),
                'password' => $request->get('password'),
        );
        if(Auth::attempt($user_data)){
            $user = Auth::user();
            if($user->code == "U"){
            return response()->json(['key'=>'done1']);
            }
            else{
                if($user->code == "T"){
            return response()->json(['key'=>'done2']);
            }
            else{
                return response()->json(['key'=>'done3']);
           }
         }
        }
        else{
            return response()->json(['key'=>'YOU HAVE TO SIGN UP FIRST !!']);    
        }
    }
    else{
        return response()->json(['error'=>$p->errors()->all()]);
    }
    }

    public function checkSignIn(Request $request){
       
        if($request->status == "student"){
         $p=validator::make($request->all(), [
             'fname' => 'required',
             'lname' => 'required',
             'phoneNo' => 'required',
             'alterNo' => 'required',
             'address' => 'required',
             'city' => 'required',
             'country' => 'required',
             'email' => 'required|email',
             'password' => 'required|confirmed',
         ]);
         }
        else{
            $p=validator::make($request->all(), [
                'fname' => 'required',
                'lname' => 'required',
                'phoneNo' => 'required',
                'Method' => 'required',
                'address' => 'required',
                'gender' => 'required',
                'city' => 'required',
                'country' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed',
                'days' => 'required'
            ]); 
        }

        if($p->passes()){
        
            $city = DB::table('cities')
            ->where('cityName',$request->city)
            ->first();
    
            $country = DB::table('countries')
            ->where('CountryName',$request->country)
            ->first();
    
        if(empty($city)){
        if(empty($country)){
            $countryid= DB::table('countries')
                ->insertGetId([
                'CountryName' => $request->country
                ]);
        }
        else
            $countryid =$country->CountryId;
            
        $cityid =DB::table('cities')
        ->insertGetId([
        'CityName' => $request->city,
        'CountryId'=>$countryid
        ]);

                        if($request->status == "student"){
                            $user_data = array(
                                'FirstName' => $request->get('fname'),
                                'LastName' => $request->get('lname'),
                                'Email' => $request->get('email'),
                                'PhoneNo' => $request->get('phoneNo'),
                                'AlternativeNo' => $request->get('alterNo'),
                                'Email' => $request->get('email'),
                                'Address' => $request->get('address'),
                                'CityId' => $cityid,            
                            );
                            $id1 = DB::table('teachers')
                            ->insertGetId($user_data);
                        
                            $user_data = array(
                                'email' =>  $request->get('email'),
                                'password' =>  $request->get('password'),
                                'loginid' => $id1,
                                'name' =>  $request->get('fname'),
                                'code' => "U"
                            );
                            $user = User::create($user_data);
                        }
                        else{
                                $k = DB::table('method')
                                ->where('Method',$request->Method)
                                ->first();

                                $user_data = array(
                                    'FirstName' => $request->get('fname'),
                                    'LastName' => $request->get('lname'),
                                    'Email' => $request->get('email'),
                                    'PhoneNo' => $request->get('phoneNo'),
                                    'MethodId' => $k->MethodId,
                                    'Email' => $request->get('email'),
                                    'Address' => $request->get('address'),
                                    'CityId' => $cityid,            
                                    'Gender' => $request->get('gender'),
                                    'Image' => null,
                                    'DayId' => $request->get('days'),
                                    'About' => null,
                                    'StartTime' => null,
                                    'EndTime' => null,
                                );
                            
                                $id1 = DB::table('teachers')
                                ->insertGetId($user_data);
                            
                                $user_data = array(
                                    'email' =>  $request->get('email'),
                                    'password' =>  $request->get('password'),
                                    'loginid' => $id1,
                                    'name' =>  $request->get('fname'),
                                    'code' => "T"
                                );
                                $user = User::create($user_data);
                        }      
        }
        else
        {
        $cityid=$city->CityId;   
                if($request->status == "student"){ 
                $user_data = array(
                    'FirstName' => $request->get('fname'),
                    'LastName' => $request->get('lname'),
                    'Email' => $request->get('email'),
                    'PhoneNo' => $request->get('phoneNo'),
                    'AlternativeNo' => $request->get('alterNo'),
                    'Email' => $request->get('email'),
                    'Address' => $request->get('address'),
                    'CityId' => $cityid,            
                );
                $id1 = DB::table('students')
                    ->insertGetId($user_data);
                
                    $user_data = array(
                        'email' =>  $request->get('email'),
                        'password' =>  $request->get('password'),
                        'loginid' => $id1,
                        'name' =>  $request->get('fname'),
                        'code' => "U"
                    );
                    $user = User::create($user_data);
                }
                else{
                    $k = DB::table('method')
                    ->where('Method',$request->Method)
                    ->first();
                    $user_data = array(
                        'FirstName' => $request->get('fname'),
                        'LastName' => $request->get('lname'),
                        'Email' => $request->get('email'),
                        'PhoneNo' => $request->get('phoneNo'),
                        'MethodId' => $k->MethodId,
                        'Email' => $request->get('email'),
                        'Address' => $request->get('address'),
                        'CityId' => $cityid,            
                        'Gender' => $request->get('gender'),
                        'Image' => null,
                        'DayId' => $request->get('days'),
                        'About' => null,
                        'StartTime' => null,
                        'EndTime' => null,
                    );
                
                    $id1 = DB::table('teachers')
                        ->insertGetId($user_data);
                    
                    $user_data = array(
                            'email' =>  $request->get('email'),
                            'password' =>  $request->get('password'),
                            'loginid' => $id1,
                            'name' =>  $request->get('fname'),
                            'code' => "T"
                        );
                        $user = User::create($user_data);
            
                }
        } 
      return response()->json(['key'=>'done!']);
     }
 
     else{
         return response()->json(['error'=>$p->errors()->all()]);
     }
 
    }

}   
