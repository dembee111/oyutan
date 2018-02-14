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
      return view('student.studentRegister', compact('programs','academics','shift','time','batch','group'));
    }
    //=====================================
    public function postStudentRegister(Request $request)
    {
    dump($request->all());
    }
}
