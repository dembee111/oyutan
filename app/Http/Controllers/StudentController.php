<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academic;
use App\Program;
use App\Level;
use App\Shift;
use App\Time;
use App\Batch;
use App\Group;
use App\MyClass;
use App\Student;
use App\Status;
use Auth;
use File;
use Storage;
use DB;

class StudentController extends Controller
{
    public function getStudentRegister()
    {
      $programs = Program::all();
      $shift =Shift::all();
      $time =Time::all();
      $batch =Batch::all();
      $group = Group::all();
      $academics = Academic::orderby('academic_id','DESC')->get();
      $student_id = Student::max('student_id');
      return view('student.studentRegister', compact('programs','academics','shift','time','batch','group','student_id'));
    }
    //=====================================
    public function postStudentRegister(Request $request)
    {
          $st = new Student;
          $st->first_name = $request->first_name;
          $st->last_name  = $request->last_name;
          $st->sex = $request->sex;
          $st->dob = $request->dob;
          $st->email = $request->email;
          $st->rac = $request->rac;
          $st->status = $request->status;
          $st->nationality = $request->nationality;
          $st->national_card = $request->national_card;
          $st->passport = $request->passport;
          $st->phone = $request->phone;
          $st->village = $request->village;
          $st->commune = $request->commune;
          $st->district = $request->district;
          $st->province = $request->province;
          $st->current_address = $request->current_address;
          $st->dateregistered = $request->dateregistered;
          $st->user_id = $request->user_id;

                  if($request->hasFile('photo')){
                         //Get File with the extension
                         $filenameWithExt = $request->file('photo')->getClientOriginalName();
                         //Get just $fileName
                         $fileName =pathinfo($filenameWithExt, PATHINFO_FILENAME);
                         //get just ext
                         $extension = $request->file('photo')->getClientOriginalExtension();
                         //file name to store
                         $fileNameToStore = $fileName.'_'.time().'.'.$extension;
                         //Upload Image
                         $path = $request->file('photo')->storeAs('public/photo', $fileNameToStore);
                   }else{
                     $fileNameToStore = 'noimage.jgp';
                   }
          $st->photo = $fileNameToStore;
          if ($st->save())
          {
            $student_id = $st->student_id;
            Status::insert(['student_id'=>$student_id,'class_id'=>$request->class_id]);
            return redirect()->route('goPayment',['student_id'=>$student_id]);
          }
    }
    //----------------------------show in student info -------------------------------
    public function studentInfo(Request $request)
    {
      if($request->has('search')){
          $students = Student::where('student_id',$request->search)
                            ->Orwhere('first_name',"LIKE","%".$request->search."%")
                            ->Orwhere('last_name',"LIKE","%".$request->search."%")
                            ->select(DB::raw('student_id,
                                              first_name,
                                              last_name,
                                              CONCAT(first_name," ",last_name) AS full_name,
                                              (CASE WHEN Sex=0 THEN "M" ELSE "F" END) AS Sex, dob'))
                                              ->paginate(10);

      }else
      {
            $students = Student::select(DB::raw('student_id,
                                                first_name,
                                                last_name,
                                                CONCAT(first_name," ",last_name) AS full_name,
                                                (CASE WHEN Sex=0 THEN "M" ELSE "F" END) AS Sex,
                                                dob'))
                              ->paginate(10)
                              ->appends('search',$request->search);
      }

         return view('student.studentList',compact('students'));
    }


}
