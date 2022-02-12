<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\doctor;
use App\Models\pataint;
use App\Models\nurse;
use App\Models\pharmacy;

class AdminController extends Controller
{
    //
    public function AdminRecovery(Request $request)
    {
        
        $var= admin :: where('username',$request->username)->where('email',$request->email)->first();
        
        $var->password= $request->password;
        
        $var->save();
        return  $var;
        
    }
    public function AdminProfile(Request $request)
    {
        $profile= admin :: where('username',$request->username)->first();

        return $profile;

    }
    public function AdminEditProfile(Request $request)
    {
        $profile= admin :: where('username',$request->username)->first();
        $profile->name=$request->name;
        $profile->password=$request->password;
        $profile->phone=$request->phone;
        $profile->statement=$request->statement;
        $profile->address=$request->address;
        $profile->save();

        /*$check=array($request->username,$request->name,$request->password,$request->phone,
        $request->statement,$request->address );*/

        return $profile;

    }
    //Doctor
    public function DoctorList()
    {
        $doctor= doctor::all();

        return $doctor;

    }

    public function DeleteDoctor(Request $request)
    {
        $doctor= doctor::where('username',$request->username)->first();
        $doctor->delete();

        return "delete";
    }

    public function AddDoctor(Request $request)
    {
        
        
        $var=new doctor();
        $var->doc_name=$request->name;
        $var->username= $request->username;
        $var->password= $request->password;
        $var->phone= $request->phone;
        $var->email= $request->email;
        $var->group= $request->group;
        $var->dob= $request->dob;
        $var->address= $request->address;
        $var->type="doctor";
        $var->available="Not Available";
        $var->save();
        
         return  $var;

    }
    // Pataint

    public function PataintList()
    {
        $pataint= pataint::all();

        return $pataint;

    }
    public function DeletePataint(Request $request)
    {
        $pataint= pataint::where('username',$request->username)->first();
        $pataint->delete();

        return "delete";
    }

    // Nurse

    public function NurseList()
    {
        $nurse= nurse::all();

        return $nurse;

    }

    public function DeleteNurse(Request $request)
    {
        $nurse= nurse::where('username',$request->username)->first();
        $nurse->delete();

        return "delete";
    }

    public function AddNurse(Request $request)
    {
         
        $var=new nurse();
        $var->name=$request->name;
        $var->username= $request->username;
        $var->password= $request->password;
        $var->phone= $request->phone;
        $var->email= $request->email;
        $var->dob= $request->dob;
        $var->duty=$request->duty;
        $var->address= $request->address;
        $var->type="nurse";
        $var->save();
        
         return  $var;
    }


    //pharmacy

    public function PharmacyEmployeeList()
    {
        $pharmacy= pharmacy::all();

        return $pharmacy;

    }

    public function DeletePharmacyEmployee(Request $request)
    {
        $pharmacy= pharmacy::where('username',$request->username)->first();
        $pharmacy->delete();

        return "delete";
    }

    public function AddPharmacyEmployee(Request $request)
    {
         
        $var=new pharmacy();
        $var->name=$request->name;
        $var->username= $request->username;
        $var->password= $request->password;
        $var->phone= $request->phone;
        $var->email= $request->email;
        $var->dob= $request->dob;
        $var->address= $request->address;
        $var->duty=$request->duty;
        $var->type="pharmacy";
        $var->save();
        
         return  $var;
    }

}
